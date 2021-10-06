@extends('adminlte::page')

@section('title', 'User')

@section('content_header')
    <h1 class="m-0 text-dark">User</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="pull-right">
                        <a href="{{ url('user/create') }}" class="btn btn-sm btn-primary"><i
                                class="fa fa-plus"></i> Tambah User</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Nama </th>
                                <th>Roles</th>
                                <th>Level Akun</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('plugins.Datatables', true)
@include('plugins.alertify')

@section('js')
    <script>
        var table = $('#table').DataTable({
            bAutoWidth: false,
            bLengthChange: true,
            iDisplayLength: 10,
            searching: true,
            processing: true,
            serverSide: true,
            bDestroy: true,
            bStateSave: true,
            ajax: {
                url: '{{ url("user") }}'
            },
            columns: [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },

                {
                    data: 'username',
                    name: 'username'
                },
                {
                    data: 'nama_gelar',
                    name: 'nama_gelar',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'roles',
                    name: 'roles'
                },
                {
                    data: 'level_akun',
                    name: 'level_akun'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'action',
                    name: 'action'
                },
                {
                    data: 'nama_pegawai',
                    name: 'a.nama_pegawai',
                    visible: false
                },
            ],
            aLengthMenu: [
                [10, 15, 25, 35, 50, 100, -1],
                [10, 15, 25, 35, 50, 100, "All"]
            ],
            responsive: !0
        });

        function confirmation(id) {
            alertify.confirm("Konfirmasi!", "Apakah anda yakin menghapus data ini?", function() {
                $('#' + id).submit();
            }, function() {

            })
        }
    </script>
@endsection
