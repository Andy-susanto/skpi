@extends('adminlte::page')

@section('title', 'Validasi Rekam Kegiatan')

@section('content_header')
    <h1 class="m-0 text-dark">Validasi Rekam Kegiatan</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Jenis Kegiatan</label>
                                <select class="form-control" name="" id="jenis_kegiatan" onchange="load_data()">
                                    <option value="" selected>Semua</option>
                                    @forelse ($jenis_kegiatan as $jenis)
                                        <option value="{{ $jenis->id_jenis_kegiatan }}">{{ ucwords($jenis->nama_kegiatan) }}
                                        </option>
                                    @empty

                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Status Kegiatan</label>
                                <select class="form-control" name="" id="status_kegiatan" onchange="load_data()">
                                    <option value="" selected>Semua</option>
                                    <option value="1">di Ajukan</option>
                                    <option value="2">di Validasi</option>
                                    <option value="3">di Tolak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-stripped" id="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Mahasiswa</th>
                                <th>NIM</th>
                                <th>Program Studi</th>
                                <th>Jenis Kegiatan</th>
                                <th>Nama Kegiatan</th>
                                <th>Bukti Kegiatan</th>
                                <th>Status</th>
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
@stop

@include('plugins.select2')
@section('plugins.Datatables', true)
@include('plugins.alertify')

@push('js')
    <script>
        $(document).ready(function() {
            $('#jenis_kegiatan,#status_kegiatan').select2();
            load_data();
        });

        function load_data() {
            var table = $('#table').DataTable({
                bAutoWidth: false,
                bLengthChange: true,
                iDisplayLength: 20,
                searching: true,
                processing: true,
                serverSide: true,
                bDestroy: true,
                bStateSave: true,
                ajax: {
                    data: {
                        id_jenis_kegiatan: $('#jenis_kegiatan').val(),
                        status_kegiatan: $('#status_kegiatan').val()
                    },
                    url: "{{ route('validasi-rekam-kegiatan.index') }}",
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable:false,searchable:false
                    },
                    {
                        data: 'nama_mahasiswa',
                        name: 'nama_mahasiswa'
                    },
                    {
                        data: 'nim',
                        name: 'nim'
                    },
                    {
                        data: 'program_studi',
                        name: 'program_studi'
                    },
                    {
                        data: 'jenis_kegiatan',
                        name: 'jenis_kegiatan'
                    },
                    {
                        data: 'nama_kegiatan',
                        name: 'nama_kegiatan'
                    },
                    {
                        data: 'bukti_kegiatan',
                        name: 'bukti_kegiatan'
                    },
                    {
                        data: 'validasi',
                        name: 'validasi',
                        orderable:false,searchable:false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable:false,searchable:false
                    }
                ],
                aLengthMenu: [
                    [10, 15, 25, 35, 50, 100, -1],
                    [10, 15, 25, 35, 50, 100, "All"]
                ],
                responsive: !0,
                drawCallback: function() {
                    this.api().state.clear();
                }
            });
        }

        function konfirmasi(id,text) {
            alertify.confirm("Konfirmasi!",text, function() {
                $('#' + id).submit();
            }, function() {

            })
        }
    </script>
@endpush
