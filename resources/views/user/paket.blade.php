@extends('user.layouts.app')
@section('content')
    <section class="services-section section-padding">
        <div class="container" style="position: relative">
            <form action="{{ route('user-transaksi') }}" id="form-create-transaksi" method="POST">
                <button class="btn btn-success" style="position: fixed; z-index: 99; bottom: 200px; right: 10px;"
                    type="submit"><i class="bi-plus"></i> Bayar</button>
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
            alert('Pilih Setidaknya satu paket');
        })
    </script>
@endsection
