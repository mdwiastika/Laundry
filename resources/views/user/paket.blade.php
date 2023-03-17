@extends('user.layouts.app')
@section('content')
    <style>
        .primary-button {
            font-family: 'Ropa Sans', sans-serif;
            /* font-family: 'Valorant', sans-serif; */
            color: white;
            cursor: pointer;
            font-size: 13px;
            font-weight: bold;
            letter-spacing: 0.05rem;
            border: 1px solid #0E1822;
            padding: 0.8rem 2.1rem;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 531.28 200'%3E%3Cdefs%3E%3Cstyle%3E .shape %7B fill: %23FF4655 /* fill: %230E1822; */ %7D %3C/style%3E%3C/defs%3E%3Cg id='Layer_2' data-name='Layer 2'%3E%3Cg id='Layer_1-2' data-name='Layer 1'%3E%3Cpolygon class='shape' points='415.81 200 0 200 115.47 0 531.28 0 415.81 200' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E%0A");
            background-color: #1177de;
            background-size: 200%;
            background-position: 200%;
            background-repeat: no-repeat;
            transition: 0.3s ease-in-out;
            transition-property: background-position, border, color;
            position: relative;
            z-index: 1;
        }

        .primary-button:hover {
            border: 1px solid #FF4655;
            color: white;
            background-position: 40%;
        }

        .primary-button:before {
            content: "";
            position: absolute;
            background-color: #0E1822;
            width: 0.2rem;
            height: 0.2rem;
            top: -1px;
            left: -1px;
            transition: background-color 0.15s ease-in-out;
        }

        .primary-button:hover:before {
            background-color: white;
        }

        .primary-button:hover:after {
            background-color: white;
        }

        .primary-button:after {
            content: "";
            position: absolute;
            background-color: #FF4655;
            width: 0.3rem;
            height: 0.3rem;
            bottom: -1px;
            right: -1px;
            transition: background-color 0.15s ease-in-out;
        }

        .button-borders {
            position: relative;
            width: fit-content;
            height: fit-content;
        }

        .button-borders:before {
            content: "";
            position: absolute;
            width: calc(100% + 0.5em);
            height: 50%;
            left: -0.3em;
            top: -0.3em;
            border: 1px solid #0E1822;
            border-bottom: 0px;
            /* opacity: 0.3; */
        }

        .button-borders:after {
            content: "";
            position: absolute;
            width: calc(100% + 0.5em);
            height: 50%;
            left: -0.3em;
            bottom: -0.3em;
            border: 1px solid #0E1822;
            border-top: 0px;
            /* opacity: 0.3; */
            z-index: 0;
        }

        .shape {
            fill: #0070e1;
        }
    </style>
    <section class="services-section section-padding">
        <div class="container" style="position: relative">
            <form action="{{ route('user-transaksi') }}" id="form-create-transaksi" method="POST">
                <div class="button-borders"
                    style="position: fixed; z-index: 99; bottom: 50px; right: 0; left: 0; margin-left: auto; margin-right: auto">
                    <button class="primary-button" type="submit"> BAYAR
                    </button>
                </div>
                {{-- <button class="btn btn-success" style="position: fixed; z-index: 99; bottom: 200px; right: 10px;"
                    type="submit"><i class="bi-plus"></i> Bayar</button> --}}
                @csrf
                <div class="row">
                    @foreach ($pakets as $paket)
                        <div class="col-lg-6 col-12" style="margin-bottom: 20px">
                            <div class="services-thumb section-bg mb-lg-0">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5 col-12">
                                        <div class="services-image-wrap">
                                            <a href="services-detail.html">
                                                <img src="{{ asset('/storage/' . $paket->gambar) }}"
                                                    class="services-image img-fluid" alt="">
                                                <img src="{{ asset('/storage/' . $paket->gambar) }}"
                                                    class="services-image services-image-hover img-fluid" alt="">

                                                <div class="services-icon-wrap">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="text-white mb-0">
                                                            <i class="bi-cash me-2"></i>
                                                            Rp {{ number_format($paket->harga, 0, '.', ',') }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-7 col-md-7 col-12 d-flex align-items-center">
                                        <div class="services-info mt-4 mt-lg-0 mt-md-0 d-flex w-100"
                                            style="flex-direction: column">
                                            <h4 class="services-title mb-1 mb-lg-2">
                                                <a class="services-title-link"
                                                    href="services-detail.html">{{ $paket->nama_paket }}</a>
                                            </h4>

                                            <p>
                                            <ul style="text-decoration: none;">
                                                <li>Jenis: {{ $paket->jenis }}</li>
                                                <li>Outlet: {{ $paket->outlet->nama }}</li>
                                            </ul>
                                            </p>

                                            <div class="d-flex align-items-center">
                                                <div class="input-group">
                                                    <span class="input-group-btn dash" data-id='{{ $paket->id }}'>
                                                        <button type="button" class="btn btn-danger btn-number dash"
                                                            data-id='{{ $paket->id }}' data-type="minus"
                                                            data-field="quant[2]">
                                                            <i class="bi-dash dash" style="font-size: 1.3em"
                                                                data-id='{{ $paket->id }}'></i>
                                                        </button>
                                                    </span>
                                                    <input type="number" style="text-align: center"
                                                        name="qty[{{ $paket->id }}]"
                                                        class="form-control input-number input-js" value="0"
                                                        min="0" max="100" id="input{{ $paket->id }}">
                                                    <span class="input-group-btn plus" data-id='{{ $paket->id }}'>
                                                        <button type="button" class="btn btn-success btn-number plus"
                                                            data-type="plus" data-field="quant[2]"
                                                            data-id='{{ $paket->id }}'>
                                                            <i class="bi-plus plus" style="font-size: 1.3em"
                                                                data-id='{{ $paket->id }}'></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </form>
        </div>
    </section>
    <script>
        document.addEventListener('click', function(e) {
            let input_qty;
            if (e.target.classList.contains('dash')) {
                input_qty = document.getElementById(`input${e.target.getAttribute('data-id')}`)
                if (input_qty.value > 0) {
                    input_qty.value = (parseInt(input_qty.value) - 1);
                }
            } else if (e.target.classList.contains('plus')) {
                input_qty = document.getElementById(`input${e.target.getAttribute('data-id')}`)
                input_qty.value = (parseInt(input_qty.value) + 1);
            }
        })
        const form_transaksi = document.getElementById('form-create-transaksi');
        form_transaksi.addEventListener('submit', function(e) {
            const all_input = document.querySelectorAll('.input-js');
            console.log(all_input);
            for (let i = 0; i < all_input.length; i++) {
                if (all_input[i].value != 0) {
                    return true;
                }
            }
            e.preventDefault();
            Swal.fire({
                title: 'Error!',
                html: '<h3>Isi setidaknya satu buah dalam list paket</h3>',
                icon: 'error',
                confirmButtonText: 'Close'
            })
        })
    </script>
@endsection
