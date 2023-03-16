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
                        SHOW TRANSAKSI
                    </div>
                    <form>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="">Paket Yang di Pesan</label>
                                <div class="row" id="card-paket">
                                    @foreach ($transaksi->detail_transaksi as $single_detail)
                                        <div class="col-md-6">
                                            <div class="panel panel-default  panel--styled">
                                                <div class="panel-body">
                                                    <div class="col-md-12 panelTop">
                                                        <div class="col-md-4">
                                                            <img class="img-responsive"
                                                                style="width:150px; height:100px; background-size:cover;"
                                                                src="{{ asset('/storage/' . $single_detail->paket->gambar) }}"
                                                                alt="" />
                                                        </div>
                                                        <div class="col-md-8">
                                                            <h2>{{ $single_detail->paket->nama_paket }}</h2>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 panelBottom" style="margin-bottom: 14px;">
                                                        <div class="col-md-4 text-left">
                                                            <h4>Rp <span
                                                                    class="itemPrice">{{ number_format($single_detail->paket->harga, 0, '.', ',') }}</span>
                                                            </h4>
                                                        </div>
                                                        <div class="col-md-8 text-center">
                                                            <div class="input-group">
                                                                <span class="form-group input-group-btn ok-minus">
                                                                    <button class="btn btn-default ok-minus"
                                                                        type="button"><i
                                                                            class="fa fa-minus ok-minus"></i></button>
                                                                </span>
                                                                <input type="number" value="{{ $single_detail->qty }}"
                                                                    disabled name="qty[${data.id}]"
                                                                    class="form-control center-input">
                                                                <span class="form-group input-group-btn fa-plus">
                                                                    <button class="btn btn-default ok-plus"
                                                                        type="button"><i
                                                                            class="fa fa-plus ok-plus"></i></button>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tgl">Kode Invoice</label>
                                <input disabled class="form-control" type="text" value="{{ $transaksi->kode_invoice }}">
                            </div>
                            <div class="form-group">
                                <label for="tgl">Nama Member</label>
                                <input disabled class="form-control" type="text" value="{{ $transaksi->member->nama }}">
                            </div>
                            <div class="form-group">
                                <label for="tgl">Tanggal Transaksi</label>
                                <input disabled class="form-control" type="text" value="{{ $transaksi->tgl }}">
                            </div>
                            <div class="form-group">
                                <label for="tgl">Batas Waktu</label>
                                <input disabled class="form-control" type="text" value="{{ $transaksi->batas_waktu }}">
                            </div>
                            <div class="form-group">
                                <label for="tgl">Tanggal Bayar</label>
                                <input disabled class="form-control" type="text" value="{{ $transaksi->tgl_bayar }}">
                            </div>
                            <div class="form-group">
                                <label for="tgl">Biaya Tambahan</label>
                                <input disabled class="form-control" type="text"
                                    value="{{ $transaksi->biaya_tambahan }}">
                            </div>
                            <div class="form-group">
                                <label for="tgl">Diskon</label>
                                <input disabled class="form-control" type="text" value="{{ $transaksi->diskon }}">
                            </div>
                            <div class="form-group">
                                <label for="tgl">Denda</label>
                                <input disabled class="form-control" type="text" value="{{ $transaksi->denda }}">
                            </div>
                            <div class="form-group">
                                <label for="tgl">Pajak</label>
                                <input disabled class="form-control" type="text" value="{{ $transaksi->pajak }}">
                            </div>
                            <div class="form-group">
                                <label for="tgl">Status Barang</label>
                                <input disabled class="form-control" type="text" value="{{ $transaksi->status }}">
                            </div>
                            <div class="form-group">
                                <label for="tgl">Status Pembayaran</label>
                                <input disabled class="form-control" type="text" value="{{ $transaksi->dibayar }}">
                            </div>
                            <div class="form-group">
                                <label for="tgl">Nama User</label>
                                <input disabled class="form-control" type="text" value="{{ $transaksi->user->nama }}">
                            </div>
                            <a href="{{ route('transaksi.index') }}" class="btn btn-info"><i class="fa fa-reply"></i>
                                Kembali</a>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
