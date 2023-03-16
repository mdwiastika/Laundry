@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">TABLE TRANSAKSI</h4>

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
                        <a href="{{ route('transaksi.create') }}" class="btn btn-success" style="margin-bottom: 10px"><i
                                class="fa fa-plus
                            "></i> Tambah Data</a>
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
                                        <th>Aksi</th>
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
                                                <div style="display: flex; justify-content: center; column-gap: 10px">
                                                    <a href="{{ route('transaksi.show', $transaksi->id) }}"
                                                        class="btn btn-primary d-inline-block">
                                                        <i class="fa fa-eye"></i> Show</a>
                                                    @if (!$transaksi->tgl_bayar)
                                                        <a href="{{ route('transaksi.edit', $transaksi->id) }}"
                                                            class="btn btn-warning d-inline-block"><i
                                                                class="fa fa-edit"></i>
                                                            Edit</a>
                                                    @endif
                                                    <form action="{{ route('transaksi.destroy', $transaksi->id) }}"
                                                        method="POST" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="fa fa-trash-o"></i> Hapus</button>
                                                    </form>
                                                </div>
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
@endsection
