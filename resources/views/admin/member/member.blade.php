@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">TABLE MEMBER</h4>

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
                        <a href="{{ route('member.create') }}" class="btn btn-success" style="margin-bottom: 10px"><i
                                class="fa fa-plus
                            "></i> Tambah Data</a>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Keterangan</th>
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
        window.onload = ()=>{
            $('#example').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('member.index') }}',
                "columns": [
                    { "data": "id", "name": "id" },
                    { "data": "nama", "name": "nama" },
                    { "data": "jenis_kelamin", "name": "jenis_kelamin" },
                    { "data": "keterangan", "name": "keterangan" },
                    { "data": "id", "name": "id" },
                ],
                "aoColumnDefs": [{
                    "aTargets": [0],
                    "mData": null,
                    "mRender": function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },{
                    "aTargets": [4],
                    "mData": null,
                    "mRender": function(data, type, full) {
                        return `<div style="display: flex; justify-content: center; column-gap: 10px">
                                                            <a href="{{ route('member.show', ':id') }}"
                                                                class="btn btn-primary d-inline-block">
                                                                <i class="fa fa-eye"></i> Show</a>
                                                            <a href="{{ route('member.edit', ':id') }}"
                                                                class="btn btn-warning d-inline-block"><i class="fa fa-edit"></i>
                                                                Edit</a>
                                                            <form action="{{ route('member.destroy', ':id') }}" method="POST"
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
