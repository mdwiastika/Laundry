@extends('user.layouts.app')
@section('content')
    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col">
                    <div class="card">
                        <div class="card-body p-4">

                            <div class="row">

                                <div class="col-lg-7">
                                    <h5 class="mb-3"><a href="#!" class="text-body"><i
                                                class="fas fa-long-arrow-alt-left me-2"></i>{{ $linkref }}</a>
                                    </h5>
                                    <hr>

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div>
                                            <p class="mb-1">Detail Transaksi</p>
                                            <p class="mb-0">Kamu punya {{ $transaksi->detail_transaksi->count() }} items
                                                di detail transaksi</p>
                                        </div>
                                    </div>
                                    @foreach ($transaksi->detail_transaksi as $single_detail_transaksi)
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div>
                                                            <img src="{{ asset('/storage/' . $single_detail_transaksi->paket->gambar) }}"
                                                                class="img-fluid rounded-3" alt="Shopping item"
                                                                style="width: 65px;">
                                                        </div>
                                                        <div class="ms-3">
                                                            <h5>{{ $single_detail_transaksi->paket->nama_paket }}</h5>
                                                            <p class="small mb-0">
                                                                Rp
                                                                {{ number_format($single_detail_transaksi->paket->harga, 0, '.', ',') }}
                                                                X {{ $single_detail_transaksi->qty }} buah
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div style="width: 160px;">
                                                            <h5 class="mb-0">
                                                                Rp
                                                                {{ number_format($single_detail_transaksi->paket->harga * $single_detail_transaksi->qty, 0, '.', ',') }}
                                                            </h5>
                                                        </div>
                                                        <a href="#!" style="color: #cecece;"><i
                                                                class="fas fa-trash-alt"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="col-lg-5">

                                    <div class="card bg-white text-white rounded-3">
                                        <div class="card-body">
                                            <a href="#!" type="submit" class="text-white"><i
                                                    class="fab fa-cc-mastercard fa-2x me-2"></i></a>
                                            <a href="#!" type="submit" class="text-white"><i
                                                    class="fab fa-cc-visa fa-2x me-2"></i></a>
                                            <a href="#!" type="submit" class="text-white"><i
                                                    class="fab fa-cc-amex fa-2x me-2"></i></a>
                                            <a href="#!" type="submit" class="text-white"><i
                                                    class="fab fa-cc-paypal fa-2x"></i></a>

                                            <form class="mt-4">
                                                <div class="form-outline form-white mb-4">
                                                    <label for="" class="text-dark">Kode Invoice</label>
                                                    <input type="text" id="typeName"
                                                        class="form-control form-control-lg" siez="17"
                                                        placeholder="Cardholder's Name"
                                                        value="{{ $transaksi->kode_invoice }}" disabled />
                                                </div>
                                                <div class="form-outline form-white mb-4">
                                                    <label for="" class="text-dark">Tanggal Transaksi</label>
                                                    <input type="text" id="typeName"
                                                        class="form-control form-control-lg" siez="17"
                                                        placeholder="Cardholder's Name" value="{{ $transaksi->tgl }}"
                                                        disabled />
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col-md-6">
                                                        <div class="form-outline form-white">
                                                            <label for="" class="text-dark">Status</label>
                                                            <input type="text" id="typeExp"
                                                                class="form-control form-control-lg"
                                                                value="{{ $transaksi->status }}" disabled />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-outline form-white">
                                                            <label for="" class="text-dark">Pembayaran</label>
                                                            <input type="text" id="typeExp"
                                                                class="form-control form-control-lg"
                                                                value="{{ $transaksi->dibayar == 'dibayar' ? 'Sudah Dibayar' : 'Belum Dibayar' }}"
                                                                disabled />
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>

                                            <hr class="my-4">
                                            @php
                                                $diskon_transaksi = ($transaksi->diskon / 100) * ($transaksi->biaya_tambahan + $transaksi->denda);
                                                $pajak_transaksi = ($transaksi->pajak / 100) * ($transaksi->biaya_tambahan - $diskon_transaksi);
                                                $transaksi_total = $transaksi->biaya_tambahan - $diskon_transaksi + $pajak_transaksi;
                                            @endphp
                                            <div class="d-flex justify-content-between">
                                                <p class="mb-2">Subtotal</p>
                                                <p class="mb-2">Rp {{ number_format($transaksi->biaya_tambahan) }}</p>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="mb-2">Pajak</p>
                                                <p class="mb-2">Rp {{ number_format($pajak_transaksi) }}</p>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="mb-2">Diskon</p>
                                                <p class="mb-2">Rp {{ number_format($diskon_transaksi) }}</p>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="mb-2">Total Bayar</p>
                                                <p class="mb-2">Rp {{ number_format($transaksi_total) }}</p>
                                            </div>

                                            <a href="{{ route('history-user') }}"
                                                class="btn btn-primary btn-block text-white btn-lg"><i
                                                    class="bi-reply"></i>
                                                Kembali</a>
                                        </div>
                                        </button>

                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
