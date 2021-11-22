@extends('adminlte::page')
@section('title', 'Master Kategori')
@section('content_header')
    <div class="row">
        <div class="mb-3 col-12">
            <h1 class="m-0 font-bold text-dark"><i class="fa fa-book" aria-hidden="true"></i> Master Kategori</h1>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                @if ($errors->any())
                    <div class="card-header">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                <div class="card-body">
                    <button type="button" data-toggle="modal" data-target="#modalTambah"
                        class="mb-2 btn btn-outline-primary btn-sm"><i class="fa fa-plus-circle" aria-hidden="true"></i>
                        Tambah Data</button>
                    <table class="table" id="table-bobot">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Nama Kategori</th>
                                <th>Jenis Kegiatan</th>
                                <th><i class="fa fa-cogs" aria-hidden="true"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data['pokok'] as $dataKategori)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $dataKategori->nama_kategori }}</td>
                                    <td>
                                        <div class="list-group">
                                            @foreach ($dataKategori->jenis_kegiatan as $jenisKegiatan)
                                            <div class="dropdown open">
                                                <a class="list-group-item list-group-item-action btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"aria-expanded="false">
                                                        {{$jenisKegiatan->nama}}</a>
                                                <div class="dropdown-menu" style="width: 100%" aria-labelledby="triggerId">
                                                    <a class="dropdown-item" href="#"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>
                                        <div class="dropdown open">
                                            <button class="btn btn-info btn-sm dropdown-toggle" type="button" id="triggerId"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-tasks" aria-hidden="true"></i> Proses
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                                <a class="dropdown-item ubah-data" href="#modalUbah" data-toggle="modal"
                                                    data-update="{{ route('kategori.update', encrypt($dataKategori->id_ref_kategori)) }}"
                                                    data-edit="{{ route('kategori.edit', encrypt($dataKategori->id_ref_kategori)) }}"><i
                                                        class="fa fa-edit" aria-hidden="true"></i> Ubah</a>

                                                <a class="dropdown-item"
                                                    onclick="confirmation('kategori_{{ $dataKategori->id_ref_kategori }}')"><i
                                                        class="fa fa-trash" aria-hidden="true"></i> Hapus
                                                    <form
                                                        action="{{ route('kategori.destroy', encrypt($dataKategori->id_ref_kategori)) }}"
                                                        method="post" id="kategori_{{ $dataKategori->id_ref_kategori }}">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6"> Data Kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal  Tambah-->
    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kategori.store') }}" method="post" id="form-kategori">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Kategori</label>
                            <input type="text" class="form-control" name="nama_kategori" id="" aria-describedby="helpId"
                                placeholder="Nama Kategori">
                        </div>

                        <div class="form-group">
                            <label for="">Jenis Kegiatan</label>
                            <select class="form-control" name="ref_jenis_kegiatan_id[]" id="jenis_kegiatan" required
                                style="width:100%" multiple>
                                @forelse (Helper::jenis_kegiatan() as $jenis_kegiatan)
                                    <option value="{{ $jenis_kegiatan->id_ref_jenis_kegiatan }}">
                                        {{ $jenis_kegiatan->nama }}
                                    </option>
                                @empty
                                    <option>Tidak Ada Data</option>
                                @endforelse
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block btn-sm"><i class="fas fa-save"
                                aria-hidden="true"></i> Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalUbah" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa fa-edit" aria-hidden="true"></i> Ubah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="form-ubah">
                        @csrf
                        @method('put')
                        <div class="konten_form">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('plugins.Datatables', true)
@include('plugins.alertify')
@include('plugins.select2')
@section('js')
    <script>
        $('#jenis_kegiatan').select2({
            dropdownParent: $('#modalTambah')
        });
        $('#table-bobot').DataTable();
        $('.ubah-data').on('click', function() {
            $route_update = $(this).data('update');
            $route_edit = $(this).data('edit');
            $.ajax({
                url: $route_edit,
                beforeSend: function() {
                    $('#modalUbah').find('.konten_form').html(
                        'Mohon Tunggu <i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
                },
                success: function(data) {
                    $('.form-ubah').attr('action', $route_update);
                    $('#modalUbah').find('.konten_form').html(data);
                }
            });
        })

        function confirmation(id) {
            alertify.confirm("Konfirmasi !", "Anda yakin ini menghapus data ini ?", function() {
                $('#' + id).submit();
            }, function() {

            })
        }
    </script>
@endsection
