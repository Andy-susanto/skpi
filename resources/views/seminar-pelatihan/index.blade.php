@extends('adminlte::page')

@section('title', 'Seminar Pelatihan')

@section('content_header')
<div class="row">
    <div class="mb-3 col-12">
        <h1 class="m-0 font-bold text-dark">Seminar Pelatihan</h1>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Capaian Bobot</th>
                            <th>Bobot saat ini</th>
                            <th>Kekurangn Bobot</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>100</td>
                            <td>100</td>
                            <td>0</td>
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
                        aria-controls="nav-home" aria-selected="true">Mendaftar</a>
                    <a class="font-bold nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                        aria-controls="nav-profile" aria-selected="false">Daftar Seminar Pelatihan</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <form action="{{ route('seminar-pelatihan.store') }}" method="post"
                                    enctype="multipart/form-data" id="form-seminar">
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
                                                <input type="text"
                                                    class="form-control @error('nama_kegiatan') is-invalid @enderror"
                                                    name="nama_kegiatan" id="" aria-describedby="helpId"
                                                    placeholder="Nama Kegiatan">
                                                @error('nama_kegiatan')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="">Penyelenggara Kegiatan</label><span
                                                    class="text-danger">*</span>
                                                <select
                                                    class="form-control @error('penyelenggara_kegiatan') is-invalid @enderror"
                                                    name="penyelenggara_kegiatan" id="penyelenggara"
                                                    onchange="load_bobot();">
                                                    @forelse($data['penyelenggara'] as $penyelenggara)
                                                        <option value="{{ $penyelenggara->id_penyelenggara }}">
                                                            {{ $penyelenggara->nama }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                                @error('penyelenggara_kegiatan')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="">Tingkat Kegiatan</label><span class="text-danger">*</span>
                                                <select class="form-control @error('tingkat_kegiatan') is-invalid @enderror"
                                                    name="tingkat_kegiatan" id="tingkat" onchange="load_bobot();">
                                                    @forelse($data['tingkat'] as $tingkat)
                                                        <option value="{{ $tingkat->id_tingkat }}">
                                                            {{ $tingkat->nama }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                                @error('tingkat_kegiatan')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-4">
                                                <label for="">Tanggal Mulai Kegiatan</label><span
                                                    class="text-danger">*</span>
                                                <input type="date"
                                                    class="form-control @error('tanggal_mulai_kegiatan') is-invalid @enderror"
                                                    name="tanggal_mulai_kegiatan" id="" aria-describedby="helpId"
                                                    placeholder="">
                                                @error('tanggal_mulai_kegiatan')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="">Tanggal Selesai Kegiatan</label><span
                                                    class="text-danger">*</span>
                                                <input type="date"
                                                    class="form-control @error('tanggal_selesai_kegiatan') is-invalid @enderror"
                                                    name="tanggal_selesai_kegiatan" id="" aria-describedby="helpId"
                                                    placeholder="">
                                                @error('tanggal_selesai_kegiatan')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="">Peran</label><span class="text-danger">*</span>
                                                <select class="form-control @error('peran') is-invalid @enderror"
                                                    name="peran" id="peran" onchange="load_bobot();">
                                                    @forelse($data['peran'] as $peran)
                                                        <option value="{{ $peran->id_peran }}">
                                                            {{ $peran->nama }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                                @error('peran')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-4">
                                                <label for="">Dosen Pembimbing</label>
                                                <select class="form-control @error('dosen_pembimbing') is-invalid @enderror"
                                                    name="dosen_pembimbing" id="dosen_pembimbing">
                                                </select>
                                                @error('dosen_pembimbing')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="">Bukti Kegiatan</label><span class="text-danger">*</span>
                                                <input type="file"
                                                    class="form-control-file @error('bukti_kegiatan') is-invalid @enderror"
                                                    name="bukti_kegiatan" id="" placeholder=""
                                                    aria-describedby="fileHelpId">
                                                @error('dosen_pembimbing')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="">Bobot Nilai Kegiatan</label>
                                                <div id="bobot">0</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-center card-footer">
                                            <button type="button" onclick="confirmation('form-seminar')"  class="btn btn-primary btn-md">Kirim Data</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
                                            @forelse ($seminar as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->nama_kegiatan }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($data->kegiatan_mahasiswa_single->tanggal_mulai)->isoFormat('D MMMM Y') }}
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($data->kegiatan_mahasiswa_single->tanggal_selesai)->isoFormat('D MMMM Y') }}
                                                    </td>
                                                    <td>{{ Helper::nama_gelar($data->kegiatan_mahasiswa_single->kepeg_pegawai) }}
                                                    </td>
                                                    <td>
                                                        @if ($data->kegiatan_mahasiswa_single->validasi == '1')
                                                            <span class="badge badge-warning"><i>Sedang di Ajukan</i></span>
                                                        @elseif($data->kegiatan_mahasiswa_single->validasi == '2')
                                                            <span class="badge badge-success"><i>di Validasi</i></span>
                                                        @elseif($data->kegiatan_mahasiswa_single->validasi == '3')
                                                            <span class="badge badge-danger"><i>di Tolak</i></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-info btn-sm dropdown-toggle"
                                                                type="button" id="triggerId" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                Proses
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('seminar-pelatihan.show', encrypt($data->id_seminar_pelatihan)) }}"><i
                                                                        class="fa fa-info" aria-hidden="true"></i>
                                                                    Detail</a>
                                                                <a class="dropdown-item" href="#"><i class="fas fa-edit"
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

@endsection
@include('plugins.select2')
@section('plugins.Datatables', true)
@include('plugins.alertify')
@section('js')
    <script>
        $('#table').DataTable();
        $('#penyelenggara,#tingkat,#peran').select2();
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
                    'jenis_kegiatan': 2,
                    'penyelenggara': $('#penyelenggara').val(),
                    'tingkat': $('#tingkat').val(),
                    'peran': $('#peran').val()
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
