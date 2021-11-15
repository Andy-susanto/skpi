@extends('adminlte::page')

@section('title', 'Penerima Hibah')

@section('content_header')
    <div class="row">
        <div class="mb-3 col-12">
            <h1 class="m-0 font-bold text-dark"><i class="fa fa-bookmark" aria-hidden="true"></i> Penerima Hibah</h1>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>Capaian Bobot</th>
                                <th>Bobot saat ini</th>
                                <th>Kekurangan Bobot</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>100</td>
                                <td>100</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">Proses Bobot : 75/100</div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
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
                        aria-controls="nav-profile" aria-selected="false"><i class="fa fa-book" aria-hidden="true"></i> Daftar Penerima Hibah</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <form action="{{ route('penerima-hibah.store') }}" method="post"
                                    enctype="multipart/form-data" id="form-penerima-hibah">
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
                                                <label for="">Nama Kegiatan</label><span class="text-danger">*</span>
                                                <input type="text" class="form-control" name="nama_kegiatan" id=""
                                                    aria-describedby="helpId" placeholder="Nama Kegiatan">
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="">Pemberi Dana</label><span
                                                    class="text-danger">*</span>
                                                <select class="form-control" name="penyelenggara_kegiatan"
                                                    id="penyelenggara" onchange="load_bobot();">
                                                    @forelse(Helper::penyelenggara(3) as $penyelenggara)
                                                        <option value="{{ $penyelenggara->id_ref_penyelenggara }}">
                                                            {{ $penyelenggara->nama }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="">Tingkat Kegiatan</label><span class="text-danger">*</span>
                                                <select class="form-control" name="tingkat_kegiatan" id="tingkat"
                                                    onchange="load_bobot();">
                                                    @forelse(Helper::tingkat(3) as $tingkat)
                                                        <option value="{{ $tingkat->id_ref_tingkat }}">
                                                            {{ $tingkat->nama }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-4">
                                                <label for="">Tanggal Mulai Kegiatan</label><span
                                                    class="text-danger">*</span>
                                                <input type="date" class="form-control" name="tanggal_mulai_kegiatan"
                                                    id="" aria-describedby="helpId" placeholder="">
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="">Tanggal Selesai Kegiatan</label><span
                                                    class="text-danger">*</span>
                                                <input type="date" class="form-control" name="tanggal_selesai_kegiatan"
                                                    id="" aria-describedby="helpId" placeholder="">
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="">Peran</label><span class="text-danger">*</span>
                                                <select class="form-control" name="prestasi" id="prestasi"
                                                    onchange="load_bobot();">
                                                    @forelse(Helper::prestasi(3) as $prestasi)
                                                        <option value="{{ $prestasi->id_ref_peran_prestasi }}">
                                                            {{ $prestasi->nama }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-4">
                                                <label for="">Dosen Pembimbing</label>
                                                <select class="form-control" name="dosen_pembimbing"
                                                    id="dosen_pembimbing">
                                                </select>
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="">Bukti Kegiatan</label><span class="text-danger">*</span>
                                                <input type="file" class="form-control-file" name="bukti_kegiatan" id=""
                                                    placeholder="" aria-describedby="fileHelpId">
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="">Bobot Nilai Kegiatan :</label>
                                                <div id="bobot"></div>
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
                                <button type="button" onclick="confirmation('form-penerima-hibah')"  class="btn btn-primary btn-md"><i class="fas fa-save" aria-hidden="true"></i> Kirim Data</button>
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
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Kegiatan</th>
                                                <th>Tanggal Mulai Kegiatan</th>
                                                <th>Tanggal Selesai Kegiatan</th>
                                                <th>Dosen Pembimbing</th>
                                                <th>Status</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($data['utama'] as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->nama }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($data->tgl_mulai)->isoFormat('D MMMM Y') }}
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($data->tgl_selesai)->isoFormat('D MMMM Y') }}
                                                    </td>
                                                    <td>
                                                        @if ($data->kepeg_pegawai()->exists())
                                                            {{ Helper::nama_gelar($data->kepeg_pegawai)}}
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($data->status_validasi == '0')
                                                            <span class="badge badge-warning"><i>Sedang di Ajukan</i></span>
                                                        @elseif($data->kegiatan_mahasiswa_single->validasi == '1')
                                                            <span class="badge badge-success"><i>di Validasi</i></span>
                                                        @elseif($data->kegiatan_mahasiswa_single->validasi == '2')
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
                                                                    href="{{ route('penerima-hibah.show', encrypt($data->id_penerima_hibah_pendanaan)) }}"><i
                                                                        class="fa fa-info" aria-hidden="true"></i>
                                                                    Detail</a>
                                                                <a class="dropdown-item" href="{{route('penerima-hibah.edit',encrypt($data->id_penerima_hibah_pendanaan))}}"><i class="fas fa-edit"
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
                    'jenis_kegiatan': 3,
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
