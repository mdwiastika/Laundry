@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">TABLE PAKET</h4>

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
                        <a href="{{ route('paket.create') }}" class="btn btn-success" style="margin-bottom: 10px"><i
                                class="fa fa-plus
                            "></i> Tambah Data</a>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Paket</th>
                                        <th>Harga</th>
                                        <th>Outlet</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pakets as $key => $paket)
                                        <tr class="odd gradeX">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $paket->nama_paket }}</td>
                                            <td>Rp {{ number_format($paket->harga, 0, '.', ',') }}</td>
                                            <td>{{ $paket->outlet->nama }}</td>
                                            <td>
                                                <div style="display: flex; justify-content: center; column-gap: 10px">
                                                    <a href="{{ route('paket.show', $paket->id) }}"
                                                        class="btn btn-primary d-inline-block">
                                                        <i class="fa fa-eye"></i> Show</a>
                                                    <a href="{{ route('paket.edit', $paket->id) }}"
                                                        class="btn btn-warning d-inline-block"><i class="fa fa-edit"></i>
                                                        Edit</a>
                                                    <form action="{{ route('paket.destroy', $paket->id) }}" method="POST"
                                                        class="d-inline-block">
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
