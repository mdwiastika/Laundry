@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row pad-botm">
            <div class="col-12">
                <h4 class="header-line">FORM PAKET</h4>

            </div>

        </div>
        <div class="row">
            <div class="col-md-12 col-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        FORM TAMBAH PAKET
                    </div>
                    <form action="{{ route('paket.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="nama_paket">Nama Paket</label>
                                <input required class="form-control" required type="text" placeholder="Masukkan Nama Paket"
                                    name="nama_paket" id="nama_paket">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga Paket</label>
                                <input required class="form-control" required type="number" placeholder="Masukkan Harga Paket"
                                    name="harga" id="harga">
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar Paket</label>
                                <input required class="form-control" required type="file" placeholder="Masukkan Gambar Paket"
                                    name="gambar" id="gambar">
                            </div>
                            <div class="form-group">
                                <label for="jenis">Jenis Paket</label>
                                <select required name="jenis" id="jenis" class="form-control" required>
                                    <option value="">-- Pilih Jenis Paket --</option>
                                    <option value="kiloan">Kiloan</option>
                                    <option value="selimut">Selimut</option>
                                    <option value="bed_cover">Bed Cover</option>
                                    <option value="kaos">Kaos</option>
                                    <option value="lain">Lainnya</option>
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
                            <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Paket</button>
                            <a href="{{ route('paket.index') }}" class="btn btn-info"><i class="fa fa-reply"></i> Kembali</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
