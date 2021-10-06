@extends('adminlte::page')

@section('title', 'Menus')

@section('content_header')
    <h1 class="m-0 text-dark">Halaman Menus</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-menu">Tambah Menus</button>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-stripped" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Nama Menu</th>
                                <th>URl</th>
                                <th>Icon</th>
                                <th>Parent Menu</th>
                                <th>Permission</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($menus as $menu)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $menu->nama_menu }}</td>
                                    <td>{{ $menu->url }}</td>
                                    <td><i class="{{ $menu->icon }}"></i></td>
                                    <td>{{ $menu->parent ? $menu->parent->nama_menu : '-' }}</td>
                                    <td>
                                        @forelse($menu->permissions as $permission)
                                            {{ $permission->permission }}<br />
                                        @empty
                                            No permission
                                        @endforelse
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                        Aksi
                                                    </button>
                                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                                <a class="dropdown-item editmenu" href="#" data-target="#edit-menu" data-toggle="modal"
                                                data-id="{{ $menu->id_menu }}">Edit</a>
                                                <a class="dropdown-item deletemenu" href="#" data-id="{{ $menu->id_menu }}"
                                                    data-nama="{{ $menu->nama_menu }}">Delete</a>
                                                    <form action="{{ url('menus' . $menu->id_menu) }}"
                                                        method="post" id="{{ $menu->id_menu }}">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                <a class="dropdown-item addpermission" href="#" data-target="#add-permission"
                                                data-toggle="modal" data-id="{{ $menu->id_menu }}"
                                                data-nama="{{ $menu->nama_menu }}">Tambah permission</a>
                                            </div>
                                        </div>
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

    <div class="modal fade" id="add-menu">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="{{route('menus.store')}}" method="post" class="form-horizontal">
                    @csrf
                    <div class="modal-header">
                        <div class="modal-title">
                            <h3><b><i class="glyphicon glyphicon-plus"></i> Tambah Menu Baru</b></h3>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-sm-3">Nama Menu</label>
                            <div class="col-sm-8">
                                <input type="text" name="nama_menu" class="form-control" placeholder="Nama Menu"
                                    required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">URL</label>
                            <div class="col-sm-8">
                                <input type="text" name="url" class="form-control" placeholder="URL Menu" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Parent Menu</label>
                            <div class="col-sm-8">
                                <select class="form-control select2" name="parent_id" style="width: 100%;">
                                    <option value="">Pilih menu parent..</option>
                                    <option value="0">Sebagai parent menu</option>
                                    @foreach ($menus as $parent)
                                        <option value="{{ $parent->id_menu }}">Child menu dari
                                            {{ $parent->nama_menu }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Icon</label>
                            <div class="col-sm-8">
                                <div class="input-group">

                                    <input type="text" name="icon" class="form-control icon"
                                        placeholder="Tentukan icon menu">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-primary btn-md button-icon" data-search="true"
                                            data-rows="5" data-cols="5" data-search="true" data-iconset="fontawesome"
                                            data-selected-class="btn-danger" data-unselected-class="btn-info"
                                            data-placement="top" id="target" role="iconpicker"></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i
                                class="glyphicon glyphicon-remove"></i> Batal</button>
                        <button class="btn btn-sm btn-info"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit-menu">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="" id="form-edit-menu" method="post" class="form-horizontal">
                    @csrf
                    @method('patch')
                    <div class="modal-header">
                        <div class="modal-title">
                            <h3><b><i class="fa fa-edit"></i> Edit Menu</b></h3>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-sm-3">Nama Menu</label>
                            <div class="col-sm-8">
                                <input type="text" name="nama_menu" id="nama_menu" class="form-control"
                                    placeholder="Nama Menu" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">URL</label>
                            <div class="col-sm-8">
                                <input type="text" name="url" id="url" class="form-control" placeholder="URL Menu"
                                    required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Menu Parent</label>
                            <div class="col-sm-8">
                                <select class="form-control select2" name="parent_id" id="parent_id" style="width: 100%;">
                                    <option value="">Pilih menu parent..</option>
                                    <option value="0">Sebagai parent menu</option>
                                    @foreach ($menus as $parent)
                                        <option value="{{ $parent->id_menu }}">Child menu dari
                                            {{ $parent->nama_menu }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Icon</label>
                            <div class="col-sm-8">
                                <div class="input-group">

                                    <input type="text" name="icon" class="form-control icon" id="icon"
                                        placeholder="Pick an icon">
                                    <div class="input-group-btn">
                                        <button type="button" class="btn btn-primary btn-md button-icon" data-search="true"
                                            data-rows="5" data-cols="5" data-search="true" data-iconset="fontawesome"
                                            data-selected-class="btn-danger" data-unselected-class="btn-info"
                                            data-placement="top" id="target" role="iconpicker"></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i
                                class="glyphicon glyphicon-remove"></i> Tutup</button>
                        <button class="btn btn-sm btn-info"><i class="glyphicon glyphicon-floppy-disk"></i> Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-permission">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form action="{{ url('permission/create') }}" method="post" class="form-horizontal">
                    @csrf
                    <div class="modal-header">
                        <div class="modal-title">
                            <h3><b><i class="glyphicon glyphicon-plus"></i> Tambah Permission Menu <span
                                        id='nama_menu_permission'></span></b></h3>
                        </div>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="menu_id" id="menu_id">
                        <div class="form-group">
                            <label class="control-label col-sm-3">Permission</label>
                            <div class="col-sm-8">
                                <input type="text" name="permission" class="form-control" placeholder="Permission"
                                    required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Keterangan</label>
                            <div class="col-sm-8">
                                <input type="text" name="keterangan_permission" class="form-control"
                                    placeholder="Keterangan Permission" required="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i
                                class="glyphicon glyphicon-remove"></i> Batal</button>
                        <button class="btn btn-sm btn-info"><i class="glyphicon glyphicon-floppy-disk"></i>
                            Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop
@section('plugins.Datatables', true)
@include('plugins.alertify')
@section('js')
    <script>
        $('.button-icon').on('change', function(e) {
            $('.icon').val("fa " + e.icon);
        });

        var table = $('#table').DataTable({
            bLengthChange: true,
            iDisplayLength: 10,
            searching: true,
            processing: false,
            serverSide: false,
            aLengthMenu: [
                [5, 10, 15, 25, 35, 50, 100, -1],
                [5, 10, 15, 25, 35, 50, 100, "All"]
            ],
            responsive: !0,
            bStateSave: true

        });

        // Delete Menu
        $('.deletemenu').on('click', function() {

            var id = $(this).data('id');
            var menu = $(this).data('nama');

            alertify.confirm("Konfirmasi!", "Apakah anda yakin menghapus menu " + menu + " ?", function() {
                $('#' + id).submit();
            }, function() {

            })
        });

        // Edit Menu
        $('.editmenu').on('click', function() {
            id = $(this).data('id');
            $.ajax({
                url: "{{ url('/menus') }}/" + id + "/edit",
                type: 'get',
                success: function(data) {
                    $('#edit-menu').modal('show');
                    var url = "{{ url('/menus') }}/" + id;
                    $('#form-edit-menu').attr('action', url);
                    $('#nama_menu').val(data.nama_menu);
                    $('#url').val(data.url);
                    $('#icon').val(data.icon);
                    $("#parent_id option[value='" + data.parent_id + "']").prop('selected', true);
                }
            });
        });

        // Add Permission
        $('.addpermission').on('click', function() {
        var id = $(this).data('id');
        var menu = $(this).data('nama');
        $('#add-permission').modal('show');
        $('#menu_id').val(id);
        $('#nama_menu_permission').html(menu);
        });
    </script>
@endsection
