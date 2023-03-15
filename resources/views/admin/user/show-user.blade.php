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
                        SHOW DATA USER
                    </div>
                    <form>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input disabled value="{{ $user->nama }}" required class="form-control" required
                                    type="text" placeholder="Masukkan Nama" name="nama" id="nama">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input disabled value="{{ $user->email }}" required class="form-control" required
                                    type="email" placeholder="Masukkan Email" name="email" id="email">
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input disabled value="{{ $user->username }}" required class="form-control" required
                                    type="text" placeholder="Masukkan Username" name="username" id="username">
                            </div>
                            <div class="form-group">
                                <label for="id_outlet">Outlet</label>
                                <select disabled required name="id_outlet" id="id_outlet" class="form-control" required>
                                    <option value="">-- Pilih Outlet --</option>
                                    @foreach ($outlets as $outlet)
                                        <option value="{{ $outlet->id }}"
                                            {{ $user->outlet->id == $outlet->id ? 'selected' : '' }}>{{ $outlet->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select required name="role" id="role" class="form-control" required>
                                    <option value="">-- Pilih Role --</option>
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="kasir" {{ $user->role == 'kasir' ? 'selected' : '' }}>Kasir</option>
                                    <option value="owner" {{ $user->role == 'owner' ? 'selected' : '' }}>Owner</option>
                                </select>
                            </div>
                            <a href="{{ route('user.index') }}" class="btn btn-info"><i class="fa fa-reply"></i>
                                Kembali</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
