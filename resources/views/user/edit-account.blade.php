@extends('user.layouts.app')
@section('content')
    <div class="row my-5">
        <div class="card bg-white text-white rounded-3 col-10 mx-auto">
            <div class="card-body">
                <h2 class="text-center">Form Login</h2>
                <form class="mt-4" method="POST" action="{{ route('user-update-account') }}">
                    @csrf
                    <div class="form-outline form-white mb-4">
                        <label for="" class="text-dark">Nama</label>
                        <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                            placeholder="Masukkan Nama" name="nama" value="{{ auth()->user()->nama }}" />
                    </div>
                    <div class="form-outline form-white mb-4">
                        <label for="" class="text-dark">Username</label>
                        <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
                            placeholder="Masukkan Username" value="{{ auth()->user()->username }}" name="username"
                            required />
                    </div>
                    <div class="form-outline form-white mb-4">
                        <label for="" class="text-dark">Password (Isi jika ingin mengganti)</label>
                        <input type="password" id="typeName" class="form-control form-control-lg" siez="17"
                            placeholder="Masukkan Password" name="password" />
                    </div>
                    <div class="form-outline form-white mb-4">
                        <label for="" class="text-dark">Outlet User</label>
                        <select name="id_outlet" required id="id_outlet" class="form-control form-control-lg">
                            <option value="">-- Pilih Outlet --</option>
                            @foreach ($outlets as $outlet)
                                <option value="{{ $outlet->id }}"
                                    {{ $outlet->id == auth()->user()->outlet->id ? 'selected' : '' }}>{{ $outlet->nama }}
                                    ({{ $outlet->alamat }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-warning text-white">Edit</button>
                </form>
            </div>
            </button>

        </div>
    </div>
@endsection
