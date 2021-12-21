@extends('adminlte::page')

@section('title', 'Kewirausahan')

@section('content_header')
    <div class="row">
        <div class="mb-3 col-12">
            <h1 class="m-0 font-bold text-dark"><i class="fa fa-bookmark" aria-hidden="true"></i> Kewirausahaan</h1>
        </div>
    </div>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="font-bold nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                        aria-controls="nav-home" aria-selected="true"><i class="fa fa-arrow-right" aria-hidden="true"></i> Mendaftar</a>
                    <a class="font-bold nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                        aria-controls="nav-profile" aria-selected="false"><i class="fa fa-book" aria-hidden="true"></i> Daftar Kewirausahaan</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <form action="{{ route('kewirausahaan.store') }}" method="post"
                                    enctype="multipart/form-data" id="form-penghargaan">
                                    <div class="card-header">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-4">
                                                <label for="">Nama Usaha Mandiri</label><span class="text-danger">*</span>
                                                <input type="text" class="form-control" name="nama_usaha" id=""
                                                    aria-describedby="helpId" placeholder="Nama Usaha Mandiri">
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="">Kategori Usaha Mandiri </label><span
                                                    class="text-danger">*</span>
                                                <select class="form-control select" name="ref_kategori_id"
                                                    id="bidang">
                                                    @foreach (Helper::kategori(9) as $loopKategori)
                                                        <option value="{{$loopKategori->id_ref_kategori}}">{{$loopKategori->nama_kategori}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="">Jenis Kegiatan </label><span
                                                    class="text-danger">*</span>
                                                <select class="form-control select" name="ref_jenis_id"
                                                    id="bidang">
                                                    @foreach (Helper::jenis() as $loopJenis)
                                                        <option value="{{$loopJenis->id_ref_jenis}}">{{$loopJenis->nama}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-4">
                                                <div class="form-group">
                                                  <label for="">Alamat Usaha Mandiri</label>
                                                  <textarea class="form-control" name="alamat_usaha" placeholder="ex: Jalan gajahmada ..." id="" rows="1"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="">No Izin Usaha Mandiri</label><span class="text-danger">*</span>
                                                <input type="text" class="form-control" name="no_izin" id=""
                                                    aria-describedby="helpId" placeholder="ex : 10/ad/xxx">
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="">Bukti Kegiatan</label><span class="text-danger">*</span>
                                                <input type="file" class="form-control-file" name="bukti_kegiatan" id=""
                                                    placeholder="" aria-describedby="fileHelpId">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <p class="">Catatan :
                                            <ol class="ml-2 list-decimal text-red">
                                                <li>Tanda * harus di isi</li>
                                            </ol>
                                        </p>
                                    </div>
                            </div>
                            <div class="text-center card-footer">
                                <button type="button" onclick="confirmation('form-penghargaan')"  class="btn bg-blue-400 text-white hover:bg-cyan-400 btn-md drop-shadow-md"><i class="fas fa-save" aria-hidden="true"></i> Kirim Data</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-bordered table-stripped" id="table">
                                        <thead class="bg-gradient-to-r from-cyan-500 to-blue-500 text-white">
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Usaha Mandiri</th>
                                                <th>Alamat Usaha Mandiri</th>
                                                <th>Kategori Usaha Mandiri</th>
                                                <th>No Izin Usaha</th>
                                                <th>Status</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($data['utama'] as $loopUtama)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $loopUtama->nama_usaha }}</td>
                                                    <td>{{$loopUtama->alamat_usaha}}</td>
                                                    <td>{{$loopUtama->kategori->nama_kategori}}</td>
                                                    <td>{{$loopUtama->no_izin}}</td>
                                                    <td>
                                                        @if ($loopUtama->status_validasi == '0')
                                                            <span class="badge badge-warning"><i>Sedang di Ajukan</i></span>
                                                        @elseif($loopUtama->status_validasi == '1')
                                                            <span class="badge badge-success"><i>di Validasi</i></span>
                                                        @elseif($loopUtama->status_validasi == '2')
                                                            <span class="badge badge-danger"><i>di Tolak</i></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-info btn-sm dropdown-toggle" type="button"
                                                                id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <i class="fa fa-hourglass-start" aria-hidden="true"></i> Proses
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('kewirausahaan.show', encrypt($loopUtama->id_kewirausahaan)) }}"><i
                                                                        class="fa fa-info" aria-hidden="true"></i>
                                                                    Detail</a>
                                                                <a class="dropdown-item" href="{{route('kewirausahaan.edit',encrypt($loopUtama->id_kewirausahaan))}}"><i class="fas fa-edit"
                                                                        aria-hidden="true"></i> Ubah</a>
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
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
@include('plugins.select2')
@include('plugins.alertify')
@section('plugins.Datatables', true)
@section('js')
    <script>
        $('#table').DataTable();
        $('#penyelenggara,#tingkat,#prestasi').select2();
        $("#dosen_pembimbing").select2({
            placeholder: "Cari Dosen Pembimbing..",
            ajax: {
                url: "{{ route('load.dosen') }}",
                dataTyper: "json",
                data: function(param) {
                    var value = {
                        search: param.term,
                    }
                    return value;
                },
                processResults: function(hasil) {

                    return {
                        results: hasil,
                    }
                }
            }
        });

        load_bobot()

        function load_bobot() {
            $.ajax({
                url: "{{ route('fungsi.load-bobot') }}",
                data: {
                    'jenis_kegiatan': 1,
                    'penyelenggara': $('#penyelenggara').val(),
                    'tingkat': $('#tingkat').val(),
                    'prestasi': $('#prestasi').val()
                },
                beforeSend: function() {
                    $('#bobot').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>')
                },
                success: function(data) {
                    $('#bobot').text(data);
                }
            })
        }

        function confirmation(id) {
            alertify.confirm("Konfirmasi!", "Kirim Data ? Pastikan data yang anda isi sudah benar !", function() {
                $('#' + id).submit();
            }, function() {

            })
        }

    </script>
@endsection
