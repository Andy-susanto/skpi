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
                        <a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalLoginAs"><i
                                    class="fa fa-plus"></i> Impersonate / Login As</a>
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

    <!-- Modal -->
    <div class="modal fade" id="modalLoginAs" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-gradient-primary">
                    <h5 class="modal-title font-bold"><i class="fa fa-user" aria-hidden="true"></i> Login AS</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body table-respponsive">
                    <table class="table table-hover table-stripped" id="tabel-login-as">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Nama User</th>
                                <th>Usertype</th>
                                <th><i class="fa fa-cogs" aria-hidden="true"></i></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
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


        var tabel_login_as = $('#tabel-login-as').DataTable({
            bAutoWidth: false,
            bLengthChange: true,
            iDisplayLength: 10,
            searching: true,
            processing: true,
            serverSide: true,
            bDestroy: true,
            bStateSave: true,
            ajax:{
                url: '{{ route("cari.user") }}',
            },
            columns:[
                {
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data:'name',
                    name:'name'

                },
                {
                    data:'usertype',
                    name:'usertype'
                },
                {
                    data: 'aksi',
                    orderable: false,
                    searchable: false
                }
            ],
            aLengthMenu: [
                [10, 15, 25, 35, 50, 100, -1],
                [10, 15, 25, 35, 50, 100, "All"]
            ],
            responsive: !0
        });

        var tableImpersonate = $('#tabel-login-as').DataTable();

        function confirmation(id) {
            alertify.confirm("Konfirmasi!", "Apakah anda yakin menghapus data ini?", function() {
                $('#' + id).submit();
            }, function() {

            })
        }
    </script>
@endsection
