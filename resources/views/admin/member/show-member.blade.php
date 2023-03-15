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
                        SHOW DATA MEMBER
                    </div>
                    <form>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input disabled value="{{ $member->nama }}" required class="form-control" required type="text" placeholder="Masukkan Nama"
                                    name="nama" id="nama">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input disabled value="{{ $member->user->email }}" required class="form-control" required type="email" placeholder="Masukkan Email"
                                    name="email" id="email">
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input disabled value="{{ $member->user->username }}" required class="form-control" required type="text" placeholder="Masukkan Username"
                                    name="username" id="username">
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea disabled name="alamat" class="form-control" id="alamat" placeholder="Masukkan Alamat" required cols="30"
                                    rows="10">{{ $member->alamat }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="tlp">Telepon</label>
                                <input disabled value="{{ $member->tlp }}" required class="form-control" required type="text" placeholder="Masukkan Telepon"
                                    name="tlp" id="tlp">
                            </div>

                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select disabled required name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="L" {{ $member->jenis_kelamin == "L" ? 'selected' : ''}}>Laki-Laki</option>
                                    <option value="P" {{ $member->jenis_kelamin == "P" ? 'selected' : ''}}>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Level Member</label>
                                <select disabled required name="keterangan" id="keterangan" class="form-control" required>
                                    <option value="">-- Pilih Level Member --</option>
                                    <option value="bronze" {{ $member->keterangan == "bronze" ? 'selected' : ''}}>Bronze</option>
                                    <option value="silver" {{ $member->keterangan == "silver" ? 'selected' : ''}}>Silver</option>
                                    <option value="gold" {{ $member->keterangan == "gold" ? 'selected' : ''}}>Gold</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_outlet">Outlet</label>
                                <select disabled required name="id_outlet" id="id_outlet" class="form-control" required>
                                    <option value="">-- Pilih Outlet --</option>
                                    @foreach ($outlets as $outlet)
                                        <option value="{{ $outlet->id }}"{{ $member->user->id_outlet == $outlet->id ? 'selected' : '' }}>{{ $outlet->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <a href="{{ route('member.index') }}" class="btn btn-info"><i class="fa fa-reply"></i> Kembali</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
