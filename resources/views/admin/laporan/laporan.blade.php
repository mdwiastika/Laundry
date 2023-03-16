@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">LAPORAN TRANSAKSI</h4>

            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Advanced Tables
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('laporan') }}" method="GET" style="margin-bottom: 25px">
                            <div class="row mb-4" style="display: flex; justify-content: center;">
                                <div class="col-2">
                                    Range Tanggal
                                </div>
                                <div class="col-md-4">
                                    <input type="date" name="start_date" id="start_date" class="form-control"
                                        value="{{ isset($_GET['start_date']) ? $_GET['start_date'] : '' }}">
                                </div>
                                <div class="col-md-1" style="display: flex; justify-content: center">
                                    -
                                </div>
                                <div class="col-md-4">
                                    <input type="date" name="end_date" id="end_date" class="form-control"
                                        value="{{ isset($_GET['end_date']) ? $_GET['end_date'] : '' }}">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>
                                        Cari</button>
                                    <a class="btn btn-warning text-white" onclick="print()"><i class="fa fa-print"></i>
                                        Print</a>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Invoice</th>
                                        <th>Member</th>
                                        <th>Status</th>
                                        <th>Pembayaran</th>
                                        <th>Total Bayar</th>
                                        <th>Paket Transaksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaksis as $key => $transaksi)
                                        <tr class="odd gradeX">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $transaksi->kode_invoice }}</td>
                                            <td>{{ $transaksi->member->nama }}</td>
                                            <td>{{ $transaksi->status }}</td>
                                            <td>{{ $transaksi->dibayar }}</td>
                                            @php
                                                $diskon_transaksi = ($transaksi->diskon / 100) * ($transaksi->biaya_tambahan + $transaksi->denda);
                                                $pajak_transaksi = ($transaksi->pajak / 100) * ($transaksi->biaya_tambahan - $diskon_transaksi);
                                                $transaksi_total = $transaksi->biaya_tambahan - $diskon_transaksi + $pajak_transaksi;
                                            @endphp
                                            <td>
                                                Rp {{ number_format($transaksi_total, 0, '.', ',') }}
                                            </td>
                                            <td>
                                                <ul>
                                                    @foreach ($transaksi->detail_transaksi as $single_transaksi)
                                                        <li>{{ $single_transaksi->paket->nama_paket }}
                                                            ({{ $single_transaksi->qty }} buah)</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>
    <script>
        function print() {
            let start_date = $('#start_date').val();
            let end_date = $('#end_date').val();
            window.open(
                `{{ route('print-laporan-transaksi') }}?start_date=${start_date}&end_date=${end_date}`,
                '_blank');
        }
    </script>
@endsection
