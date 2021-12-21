    @extends('adminlte::page')

@section('title', 'Magang')

@section('content_header')
    <div class="row">
        <div class="mb-3 col-12">
            <h1 class="m-0 font-bold text-dark"><i class="fa fa-bookmark" aria-hidden="true"></i> Magang</h1>
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
                        aria-controls="nav-profile" aria-selected="false"><i class="fa fa-book" aria-hidden="true"></i> Daftar Magang</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <form action="{{ route('magang.store') }}" method="post"
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
                                                <label for="">Nama Perusahaan / Industri / Instansi</label><span class="text-danger">*</span>
                                                <input type="text" class="form-control" name="nama" id=""
                                                    aria-describedby="helpId" placeholder="ex : Telkom Indonesia" autofocus>
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="">Bergerak di bidang </label><span
                                                    class="text-danger">*</span>
                                                <select class="form-control select" name="ref_bidang_id"
                                                    id="bidang">
                                                @foreach (Helper::bidang() as $loopBidang)
                                                    <option value="{{$loopBidang->id_ref_bidang}}">{{$loopBidang->nama}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="">Divisi</label><span class="text-danger">*</span>
                                                <select class="form-control select2" name="ref_divisi_id" id="tingkat">
                                                    @foreach (Helper::divisi() as $loopDivisi)
                                                        <option value="{{$loopDivisi->id_ref_divisi}}">{{$loopDivisi->nama}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-4">
                                                <div class="form-group">
                                                  <label for="">Alamat Perusahaan</label>
                                                  <textarea class="form-control" name="alamat" id="" rows="1" placeholder="Jalan xxxx"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="">Tanggal Mulai Kegiatan</label><span
                                                    class="text-danger">*</span>
                                                <input type="date" class="form-control" name="tgl_mulai"
                                                    id="" aria-describedby="helpId" placeholder="">
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="">Tanggal Selesai Kegiatan</label><span
                                                    class="text-danger">*</span>
                                                <input type="date" class="form-control" name="tgl_selesai"
                                                    id="" aria-describedby="helpId" placeholder="">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-4">
                                                <div class="form-group">
                                                  <label for="">Tugas Utama Magang</label>
                                                  <textarea class="form-control" name="tugas_utama_magang" id="" rows="1" placeholder="Tugas Saya sebagai ...."></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="">Dosen Pembimbing</label>
                                                <select class="form-control" name="kepeg_pegawai_id"
                                                    id="dosen_pembimbing">
                                                </select>
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="">Bukti Kegiatan</label><span class="text-danger">*</span>
                                                <input type="file" class="form-control-file" name="bukti_kegiatan" id=""
                                                    placeholder="" aria-describedby="fileHelpId">
                                            </div>
                                            <div class="form-group col-4">
                                                <label for="">Tema / Judul Laporan Akhir Magang</label><span class="text-danger">*</span>
                                                <input type="text" class="form-control" name="judul_laporan_akhir" id=""
                                                    aria-describedby="helpId" placeholder="ex: Pengembangan xxxx">
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
                                                <th>Nama Perusahaan</th>
                                                <th>Tanggal Mulai Kegiatan</th>
                                                <th>Tanggal Selesai Kegiatan</th>
                                                <th>Dosen Pembimbing</th>
                                                <th>Status</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($data['utama'] as $loopUtama)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $loopUtama->nama }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($loopUtama->tgl_mulai)->isoFormat('D MMMM Y') }}
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($loopUtama->tgl_selesai)->isoFormat('D MMMM Y') }}
                                                    </td>
                                                    <td>
                                                        @if ($loopUtama->kepeg_pegawai()->exists())
                                                            {{ Helper::nama_gelar($loopUtama->kepeg_pegawai)}}
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($loopUtama->status_validasi == '0')
                                                            <span class="badge badge-warning"><i>Sedang di Ajukan</i></span>
                                                        @elseif($loopUtama->kegiatan_mahasiswa_single->validasi == '1')
                                                            <span class="badge badge-success"><i>di Validasi</i></span>
                                                        @elseif($loopUtama->kegiatan_mahasiswa_single->validasi == '2')
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
                                                                    href="{{ route('magang.show', encrypt($loopUtama->id_magang)) }}"><i
                                                                        class="fa fa-info" aria-hidden="true"></i>
                                                                    Detail</a>
                                                                <a class="dropdown-item" href="{{route('magang.edit',encrypt($loopUtama->id_magang))}}"><i class="fas fa-edit"
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
@include('plugins.alertify')
@section('plugins.Datatables', true)
@section('plugins.Select2',true)
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

        function confirmation(id) {
            alertify.confirm("Konfirmasi!", "Kirim Data ? Pastikan data yang anda isi sudah benar !", function() {
                $('#' + id).submit();
            }, function() {

            })
        }

    </script>
@endsection
