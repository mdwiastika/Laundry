@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row pad-botm">
            <div class="col-12">
                <h4 class="header-line">FORM USER</h4>

            </div>

        </div>
        <div class="row">
            <div class="col-md-12 col-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        FORM TAMBAH USER
                    </div>
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input required class="form-control" required type="text" placeholder="Masukkan Nama"
                                    name="nama" id="nama">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input required class="form-control" required type="email" placeholder="Masukkan Email"
                                    name="email" id="email">
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input required class="form-control" required type="text" placeholder="Masukkan Username"
                                    name="username" id="username">
                            </div>
                            <div class="form-group">
                                <label for="id_outlet">Outlet</label>
                                <select required name="id_outlet" id="id_outlet" class="form-control" required>
                                    <option value="">-- Pilih Outlet --</option>
                                    @foreach ($outlets as $outlet)
                                        <option value="{{ $outlet->id }}">{{ $outlet->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select required name="role" id="role" class="form-control" required>
                                    <option value="">-- Pilih Role --</option>
                                    <option value="admin">Admin</option>
                                    <option value="kasir">Kasir</option>
                                    <option value="owner">Owner</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input required class="form-control" required type="password" placeholder="Password"
                                    name="password" id="password">
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah User</button>
                            <a href="{{ route('user.index') }}" class="btn btn-info"><i class="fa fa-reply"></i> Kembali</a>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
