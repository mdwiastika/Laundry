@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row pad-botm">
            <div class="col-12">
                <h4 class="header-line">FORM TRANSAKSI</h4>

            </div>

        </div>
        <div class="row">
            <div class="col-md-12 col-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        FORM EDIT TRANSAKSI
                    </div>
                    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="tgl_bayar">Tanggal Bayar (Kosongkan jika belum membayar)</label>
                                <input class="form-control" type="datetime-local" placeholder="Masukkan Tangal Transaksi"
                                    name="tgl_bayar" id="tgl_bayar">
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select required name="status" id="status" class="form-control" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="baru" {{ $transaksi->status == 'baru' ? 'selected' : '' }}>Baru
                                    </option>
                                    <option value="proses" {{ $transaksi->status == 'proses' ? 'selected' : '' }}>Proses
                                    </option>
                                    <option value="selesai" {{ $transaksi->status == 'selesai' ? 'selected' : '' }}>Selesai
                                    </option>
                                    <option value="diambil" {{ $transaksi->status == 'diambil' ? 'selected' : '' }}>Diambil
                                    </option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-warning"><i class="fa fa-edit"></i> Update
                                Pembayaran</button>
                            <a href="{{ route('transaksi.index') }}" class="btn btn-info"><i class="fa fa-reply"></i>
                                Kembali</a>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <script>
        const _token = '{{ csrf_token() }}'
        const member_select = document.getElementById('id_member');
        const card_all = document.getElementById('card-paket');
        member_select.addEventListener('change', async function() {
            const fetching_data = await fetch(
                `http://127.0.0.1:8000/get-paket-by-member/${member_select.value}`, {
                    method: 'GET',
                    headers: {
                        Authorization: _token,
                    }
                }).catch(err => console.log(err));
            const json_data = await fetching_data.json();
            const data_select = json_data.data;
            let html_select = ``;
            let harga_barang = 0;
            data_select.map(data => {
                html_select += ` <div class="col-md-6">
                                        <div class="panel panel-default  panel--styled">
                                            <div class="panel-body">
                                                <div class="col-md-12 panelTop">
                                                    <div class="col-md-4">
                                                        <img class="img-responsive" style="width:150px; height:100px; background-size:cover;"
                                                            src="http://127.0.0.1:8000/storage/${data.gambar}" alt="" />
                                                    </div>
                                                    <div class="col-md-8">
                                                        <h2>${data.nama_paket}</h2>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 panelBottom">
                                                    <div class="col-md-4 text-left">
                                                        <h5>Rp <span class="itemPrice">${data.harga}</span></h5>
                                                    </div>
                                                    <div class="col-md-8 text-center">
                                                        <div class="input-group">
                                                            <span class="form-group input-group-btn ok-minus"
                                                                id="${data.id}">
                                                                <button class="btn btn-default ok-minus" type="button"
                                                                    id="${data.id}"><i class="fa fa-minus ok-minus"
                                                                        id="${data.id}"></i></button>
                                                            </span>
                                                            <input type="number" value="0" id="input${data.id}" name="qty[${data.id}]"
                                                                class="form-control center-input">
                                                            <span class="form-group input-group-btn fa-plus" id="${data.id}">
                                                                <button class="btn btn-default ok-plus"id="${data.id}"
                                                                    type="button"><i class="fa fa-plus ok-plus"
                                                                        id="${data.id}"></i></button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`
            });
            card_all.innerHTML = html_select;
        })
        document.addEventListener('click', function(e) {
            const span = document.createElement('span')
            let input_qty;
            if (e.target.classList.contains('ok-minus')) {
                input_qty = document.getElementById(`input${e.target.id}`)
                console.log('minus')
                console.log(e.target.id, input_qty)
                if (input_qty.value > 0) {
                    input_qty.value = (parseInt(input_qty.value) - 1);
                }
            } else if (e.target.classList.contains('ok-plus')) {
                input_qty = document.getElementById(`input${e.target.id}`)
                console.log('plus')
                console.log(e.target.id, input_qty)
                input_qty.value = (parseInt(input_qty.value) + 1);
            }
        })
    </script>
@endsection
