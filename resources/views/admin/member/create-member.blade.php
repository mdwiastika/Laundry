@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row pad-botm">
            <div class="col-12">
                <h4 class="header-line">FORM MEMBER</h4>

            </div>

        </div>
        <div class="row">
            <div class="col-md-12 col-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        FORM TAMBAH MEMBER
                    </div>
                    <form action="{{ route('member.store') }}" method="POST">
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
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" class="form-control" id="alamat" placeholder="Masukkan Alamat" required cols="30"
                                    rows="10"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="tlp">Telepon</label>
                                <input required class="form-control" required type="text" placeholder="Masukkan Telepon"
                                    name="tlp" id="tlp">
                            </div>

                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select required name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Level Member</label>
                                <select required name="keterangan" id="keterangan" class="form-control" required>
                                    <option value="">-- Pilih Level Member --</option>
                                    <option value="bronze">Bronze</option>
                                    <option value="silver">Silver</option>
                                    <option value="gold">Gold</option>
                                </select>
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
                                <label for="password">Password</label>
                                <input required class="form-control" required type="password" placeholder="Password"
                                    name="password" id="password">
                            </div>
                            <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Member</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
