@extends('adminlte::page')

@section('title', 'Penerima Hibah')

@section('content_header')
    <h1 class="m-0 text-dark">Penerima Hibah</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                        aria-controls="nav-home" aria-selected="true">Mendaftar</a>
                    <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                        aria-controls="nav-profile" aria-selected="false">Daftar Hibah</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <form action="{{ route('penerima-hibah.store') }}" method="post"
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
                                        <div class="form-group">
                                            <label for="">Penyelenggara Kegiatan</label><span class="text-danger">*</span>
                                            <select class="form-control" name="penyelenggara_kegiatan" id="penyelenggara">
                                                @forelse(Helper::penyelenggara('1') as $penyelenggara)
                                                    <option value="{{ $penyelenggara->id_penyelenggara }}">
                                                        {{ $penyelenggara->nama_penyelenggara }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tingkat Kegiatan</label><span class="text-danger">*</span>
                                            <select class="form-control" name="tingkat_kegiatan" id="tingkat">
                                                @forelse(Helper::tingkat('1') as $tingkat)
                                                    <option value="{{ $tingkat->id_tingkat }}">
                                                        {{ $tingkat->nama_tingkat }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tanggal Mulai Kegiatan</label><span class="text-danger">*</span>
                                            <input type="date" class="form-control" name="tanggal_mulai_kegiatan" id=""
                                                aria-describedby="helpId" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tanggal Selesai Kegiatan</label><span class="text-danger">*</span>
                                            <input type="date" class="form-control" name="tanggal_selesai_kegiatan" id=""
                                                aria-describedby="helpId" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Peran</label><span class="text-danger">*</span>
                                            <select class="form-control" name="peran" id="peran">
                                                @forelse(Helper::peran(3) as $peran)
                                                    <option value="{{ $peran->id_peran }}">
                                                        {{ $peran->nama_peran }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Dosen Pembimbing</label>
                                            <select class="form-control" name="dosen_pembimbing" id="dosen_pembimbing">
                                            </select>
                                        </div>
                                        <div class="form-group">
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
                                            @forelse ($hibah as $data)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$data->nama_kegiatan}}</td>
                                                    <td>{{\Carbon\Carbon::parse($data->kegiatan_mahasiswa->tanggal_mulai)->isoFormat('D MMMM Y')}}</td>
                                                    <td>{{\Carbon\Carbon::parse($data->kegiatan_mahasiswa->tanggal_selesai)->isoFormat('D MMMM Y')}}</td>
                                                    <td>{{Helper::nama_gelar($data->kegiatan_mahasiswa->kepeg_pegawai)}}</td>
                                                    <td>
                                                        @if ($data->kegiatan_mahasiswa->validasi == '1')
                                                            <span class="text-info"><i>Sedang di Ajukan</i></span>
                                                        @endif
                                                    </td>
                                                    <td><a name="" id="" class="btn btn-primary btn-sm" href="{{route('penerima-hibah.show',encrypt($data->id_penerima_hibah))}}" role="button">Detail</a></td>
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
    </script>
@endsection
