@extends('admin.layouts.app')
@section('content')
  <div class="container">
    <div class="row pad-botm">
      <div class="col-md-12">
        <h4 class="header-line">TABLE USER</h4>

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
            <a href="{{ route('user.create') }}" class="btn btn-success" style="margin-bottom: 10px"><i
                class="fa fa-plus
                            "></i> Tambah Data</a>
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover" id="example">
                {{-- <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Outlet</th>
                    <th>Aksi</th>
                  </tr>
                </thead> --}}
                {{-- <tbody>
                                    @foreach ($users as $key => $user)
                                        <tr class="odd gradeX">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $user->nama }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role }}</td>
                                            <td>{{ $user->outlet->nama }}</td>
                                            <td>
                                                <div style="display: flex; justify-content: center; column-gap: 10px">
                                                    <a href="{{ route('user.show', $user->id) }}"
                                                        class="btn btn-primary d-inline-block">
                                                        <i class="fa fa-eye"></i> Show</a>
                                                    <a href="{{ route('user.edit', $user->id) }}"
                                                        class="btn btn-warning d-inline-block"><i class="fa fa-edit"></i>
                                                        Edit</a>
                                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST"
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
                                </tbody> --}}
              </table>
            </div>

          </div>
        </div>
        <!--End Advanced Tables -->
      </div>
    </div>
  </div>
  <script>
    window.onload = () => {
      // cara pertama
      $('#example').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('get-user-datatable') }}',
        responsive: true,
        "columns": [
            { "data": null, "title": "No" },
            { "data": "nama", "title": "Nama" },
            { "data": "email", "title": "Email" },
            { "data": "role", "title": "Role" },
            { "data": "outlet.nama", "title": "Outlet" },
            { "data": null, "title": "Aksi" },
        ],
        "aoColumnDefs": [{
            "aTargets": [0],
            "mData": null,
            "mRender": function(data, type, row, meta) {
                return meta.row + meta.settings._iDisplayStart + 1;
            }
        },{
            "aTargets": [5],
            "mData": null,
            "mRender": function(data, type, row, meta) {
                return `<div style="display: flex; justify-content: center; column-gap: 10px">
                                                    <a href="{{ route('user.show', ':id') }}"
                                                        class="btn btn-primary d-inline-block">
                                                        <i class="fa fa-eye"></i> Show</a>
                                                    <a href="{{ route('user.edit', ':id') }}"
                                                        class="btn btn-warning d-inline-block"><i class="fa fa-edit"></i>
                                                        Edit</a>
                                                    <form action="{{ route('user.destroy', ':id') }}" method="POST"
                                                        class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="fa fa-trash-o"></i> Hapus</button>
                                                    </form>
                                                </div>`.replaceAll(':id', data.id);
            }
        }]
    });
}
  </script>
@endsection
