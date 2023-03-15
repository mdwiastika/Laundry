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
                        SHOW PAKET
                    </div>
                    <form>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="nama_paket">Nama Paket</label>
                                <input disabled value="{{ $paket->nama_paket }}" required class="form-control" required type="text" placeholder="Masukkan Nama Paket"
                                    name="nama_paket" id="nama_paket">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga Paket</label>
                                <input disabled value="{{ $paket->harga }}" required class="form-control" required type="number" placeholder="Masukkan Harga Paket"
                                    name="harga" id="harga">
                            </div>
                            <div class="form-group">
                                <label for="gambar" style="display: block">Gambar Paket</label>
                                <img src="{{ asset('/storage/' . $paket->gambar) }}" width="300" style="margin-bottom: 20px" height="200" class="" alt="">
                            </div>
                            <div class="form-group">
                                <label for="jenis">Jenis Paket</label>
                                <select disabled required name="jenis" id="jenis" class="form-control" required>
                                    <option value="">-- Pilih Jenis Paket --</option>
                                    <option value="kiloan" {{ $paket->jenis == "kiloan" ? 'selected' : ''  }}>Kiloan</option>
                                    <option value="selimut" {{ $paket->jenis == "selimut" ? 'selected' : ''  }}>Selimut</option>
                                    <option value="bed_cover" {{ $paket->jenis == "bed_cover" ? 'selected' : ''  }}>Bed Cover</option>
                                    <option value="kaos" {{ $paket->jenis == "kaos" ? 'selected' : ''  }}>Kaos</option>
                                    <option value="lain" {{ $paket->jenis == "lain" ? 'selected' : ''  }}>Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_outlet">Outlet</label>
                                <select disabled required name="id_outlet" id="id_outlet" class="form-control" required>
                                    <option value="">-- Pilih Outlet --</option>
                                    @foreach ($outlets as $outlet)
                                        <option value="{{ $outlet->id }}" {{ $paket->outlet->id == $outlet->id ? 'selected' : '' }}>{{ $outlet->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <a href="{{ route('paket.index') }}" class="btn btn-info"><i class="fa fa-reply"></i> Kembali</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
