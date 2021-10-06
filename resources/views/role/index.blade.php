@extends('adminlte::page')

@section('title', 'Role')

@section('content_header')
    <h1 class="m-0 text-dark">Role</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                 <a name="" id="" class="btn btn-primary btn-sm" href="{{route('roles.create')}}" role="button">Tambah Role</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-stripped" id="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Role</th>
                                <th>Keterangan Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->nama_role }}</td>
                                    <td>{{ $role->keterangan_role }}</td>
                                    <td>
                                        <a href="{{ url('roles/' . $role->id_role . '/edit') }}"
                                            class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit</a> |
                                        <a onclick="confirmation('{{ $role->id_role }}')" class="btn btn-xs btn-danger"><i
                                                class="fa fa-trash"></i> Delete</a>
                                        <form id="{{ $role->id_role }}" action="{{ url('roles/' . $role->id_role) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                    </td>
                                </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@section('plugins.Datatables', true)
@include('plugins.alertify')
@section('js')
    <script data-turbolinks-track="reload">
        var table = $('#table').DataTable({
            bAutoWidth: false,
            bLengthChange: true,
            iDisplayLength: 10,
            searching: true,
            processing: false,
            serverSide: false,
            aLengthMenu: [
                [10, 15, 25, 35, 50, 100, -1],
                [10, 15, 25, 35, 50, 100, "All"]
            ],
            responsive: !0
        });

        function confirmation(id) {
            alertify.confirm("Konfirmasi!", "Apakah anda yakin menghapus data role ini?", function() {
                $('#' + id).submit();
            }, function() {

            })
        }
    </script>
@endsection
