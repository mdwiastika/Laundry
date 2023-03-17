@extends('user.layouts.app')
@section('content')
    @php
        use Carbon\Carbon;
    @endphp
    <section class="" style="background-color: #ffffff; margin-top: 30px; margin-bottom: 30px; ">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <p><span class="h2">Semua Transaksi </span><span class="h4">({{ $transaksis->count() }} item di
                            transaksi)</span></p>
                    @foreach ($transaksis as $transaksi)
                        <div class="card mb-4">
                            <div class="card-body p-4">

                                <div class="row align-items-center">
                                    <div class="col-md-2 d-flex">
                                        <div>
                                            <p class="small text-muted mb-4 pb-2">Kode Invoice</p>
                                            <p class="lead fw-normal mb-0">{{ $transaksi->kode_invoice }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex">
                                        <div>
                                            <p class="small text-muted mb-4 pb-2">Tanggal</p>
                                            <p class="lead fw-normal mb-0"><i class="fas fa-circle me-2"
                                                    style="color: #fdd8d2;"></i>{{ Carbon::parse($transaksi->tgl)->format('d-m-Y') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex">
                                        <div>
                                            @php
                                                $diskon_transaksi = ($transaksi->diskon / 100) * ($transaksi->biaya_tambahan + $transaksi->denda);
                                                $pajak_transaksi = ($transaksi->pajak / 100) * ($transaksi->biaya_tambahan - $diskon_transaksi);
                                                $transaksi_total = $transaksi->biaya_tambahan - $diskon_transaksi + $pajak_transaksi;
                                            @endphp
                                            <p class="small text-muted mb-4 pb-2">Total</p>
                                            <p class="lead fw-normal mb-0">
                                                Rp {{ number_format($transaksi_total, 0, '.', ',') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex">
                                        <div>
                                            <p class="small text-muted mb-4 pb-2">Status</p>
                                            <p class="lead fw-normal mb-0">{{ $transaksi->status }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex">
                                        <div>
                                            <p class="small text-muted mb-4 pb-2">Pembayaran</p>
                                            <p class="lead fw-normal mb-0">
                                                {{ $transaksi->dibayar == 'dibayar' ? 'Dibayar' : 'Belum Dibayar' }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex">
                                        <div>
                                            <p class="small text-muted mb-4 pb-2">Aksi</p>
                                            <p class="lead fw-normal mb-0">
                                                <a href="{{ route('user-show-history', $transaksi->id) }}"
                                                    class="btn btn-primary"> <i class="bi-eye-fill"> Detail</i></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
