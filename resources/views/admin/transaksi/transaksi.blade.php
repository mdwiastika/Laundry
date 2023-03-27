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
                            <table class="table table-striped table-bordered table-hover" id="example">
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
                            </table>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>
    <script>
        window.onload = () => {
      // cara pertama
      $('#example').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('transaksi.index') }}',
        "columns": [
            { "data": "id", "name": "id" },
            { "data": "kode_invoice", "name": "kode_invoice" },
            { "data": "member.nama", "name": "member.nama" },
            { "data": "status", "name": "status" },
            { "data": "dibayar", "name": "dibayar" },
            { "data": "transaksi_total", "name": "transaksi_total" },
            { "data": "id", "name": "id" },
        ],
        "aoColumnDefs": [{
            "aTargets": [0],
            "mData": null,
            "mRender": function(data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },{
            "aTargets": [6],
            "mData": null,
            "mRender": function(data, type, full) {
                return `<div style="display: flex; justify-content: center; column-gap: 10px">
                                                    <a href="{{ route('transaksi.show', ':id') }}"
                                                        class="btn btn-primary d-inline-block">
                                                        <i class="fa fa-eye"></i> Show</a>
                                                    <a href="{{ route('transaksi.edit', ':id') }}"
                                                        class="btn btn-warning d-inline-block"><i class="fa fa-edit"></i>
                                                        Edit</a>
                                                    <form action="{{ route('transaksi.destroy', ':id') }}" method="POST"
                                                        class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="fa fa-trash-o"></i> Hapus</button>
                                                    </form>
                                                </div>`.replaceAll(':id', data);
            }
        }]
    });
}
    </script>
@endsection
