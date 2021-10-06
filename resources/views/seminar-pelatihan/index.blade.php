@extends('adminlte::page')

@section('title', 'Seminar Pelatihan')

@section('content_header')
    <h1 class="m-0 font-bold text-dark">Seminar Pelatihan</h1>
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
                                    enctype="multipart/form-data">
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
                                        <div class="form-group col-4">
                                            <label for="">Nama Kegiatan</label><span class="text-danger">*</span>
                                            <input type="text" class="form-control" name="nama_kegiatan" id=""
                                                aria-describedby="helpId" placeholder="Nama Kegiatan">
                                        </div>
                                        <div class="form-group col-4">
                                            <label for="">Penyelenggara Kegiatan</label><span
                                                class="text-danger">*</span>
                                            <select class="form-control" name="penyelenggara_kegiatan" id="penyelenggara" onchange="load_bobot();">
                                                @forelse(Helper::penyelenggara('2') as $penyelenggara)
                                                    <option value="{{ $penyelenggara->id_penyelenggara }}">
                                                        {{ $penyelenggara->nama_penyelenggara }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                        <div class="form-group col-4">
                                            <label for="">Tingkat Kegiatan</label><span class="text-danger">*</span>
                                            <select class="form-control" name="tingkat_kegiatan" id="tingkat" onchange="load_bobot();">
                                                @forelse(Helper::tingkat('1') as $tingkat)
                                                    <option value="{{ $tingkat->id_tingkat }}">
                                                        {{ $tingkat->nama_tingkat }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                        <div class="form-group col-4">
                                            <label for="">Tanggal Mulai Kegiatan</label><span
                                                class="text-danger">*</span>
                                            <input type="date" class="form-control" name="tanggal_mulai_kegiatan" id=""
                                                aria-describedby="helpId" placeholder="">
                                        </div>
                                        <div class="form-group col-4">
                                            <label for="">Tanggal Selesai Kegiatan</label><span
                                                class="text-danger">*</span>
                                            <input type="date" class="form-control" name="tanggal_selesai_kegiatan" id=""
                                                aria-describedby="helpId" placeholder="">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-4">
                                                <label for="">Peran</label><span class="text-danger">*</span>
                                                <select class="form-control" name="peran" id="peran" onchange="load_bobot();">
                                                    @forelse(Helper::peran(2) as $peran)
                                                        <option value="{{ $peran->id_peran }}">
                                                            {{ $peran->nama_peran }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div class="form-group col-4 offset-1">
                                                <label for="">Bobot Nilai Kegiatan</label>
                                                <div id="bobot">0</div>
                                            </div>
                                        </div>
                                        <div class="form-group col-4">
                                            <label for="">Dosen Pembimbing</label>
                                            <select class="form-control" name="dosen_pembimbing" id="dosen_pembimbing">
                                            </select>
                                        </div>
                                        <div class="form-group col-4">
                                            <label for="">Bukti Kegiatan</label><span class="text-danger">*</span>
                                            <input type="file" class="form-control-file" name="bukti_kegiatan" id=""
                                                placeholder="" aria-describedby="fileHelpId">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">Kirim Data</button>
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
                                                    <td>{{ \Carbon\Carbon::parse($data->kegiatan_mahasiswa->tanggal_mulai)->isoFormat('D MMMM Y') }}
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($data->kegiatan_mahasiswa->tanggal_selesai)->isoFormat('D MMMM Y') }}
                                                    </td>
                                                    <td>{{ Helper::nama_gelar($data->kegiatan_mahasiswa->kepeg_pegawai) }}
                                                    </td>
                                                    <td>
                                                        @if ($data->kegiatan_mahasiswa->validasi == '1')
                                                            <span class="text-info"><i>Sedang di Ajukan</i></span>
                                                        @endif
                                                    </td>
                                                    <td><a name="" id="" class="btn btn-primary btn-sm"
                                                            href="{{ route('seminar-pelatihan.show', encrypt($data->id_seminar_pelatihan)) }}"
                                                            role="button">Detail</a></td>
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
                    'prestasi': $('#prestasi').val()
                },
                success: function(data) {
                    $('#bobot').text(data);
                }
            })
        }
    </script>
@endsection
