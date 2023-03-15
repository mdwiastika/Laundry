@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row pad-botm">
            <div class="col-12">
                <h4 class="header-line">FORM OUTLET</h4>

            </div>

        </div>
        <div class="row">
            <div class="col-md-12 col-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        FORM EDIT OUTLET
                    </div>
                    <form action="{{ route('outlet.update', $outlet->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input value="{{ $outlet->nama }}" required class="form-control" required type="text" placeholder="Masukkan Nama"
                                    name="nama" id="nama">
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" class="form-control" id="alamat" placeholder="Masukkan Alamat" required cols="30"
                                    rows="10">{{ $outlet->alamat }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="tlp">Telepon</label>
                                <input value="{{ $outlet->tlp }}" required class="form-control" required type="text" placeholder="Masukkan Telepon"
                                    name="tlp" id="tlp">
                            </div>
                            <button type="submit" class="btn btn-warning"><i class="fa fa-edit"></i> Update Outlet</button>
                            <a href="{{ route('outlet.index') }}" class="btn btn-info"><i class="fa fa-reply"></i> Kembali</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
