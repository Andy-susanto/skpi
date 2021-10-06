@extends('adminlte::page')

@section('title', 'Penghargaan Kejuaraan')

@section('content_header')
    <h1 class="m-0 text-dark"><span><a name="" id="" class="btn btn-default btn-sm" href="{{route('penghargaan-kejuaraan.index')}}" role="button">Kembali</a></span> Penghargaan Kejuaraan Detail</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td>Nama Kegiatan</td>
                            <td>:</td>
                            <td>{{$data->nama_kegiatan}}</td>
                        </tr>
                        <tr>
                            <td>Penyelenggara Kegiatan</td>
                            <td>:</td>
                            <td>{{$data->penyelenggara->nama_penyelenggara}}</td>
                        </tr>
                        <tr>
                            <td>Tingkat Kegiatan</td>
                            <td>:</td>
                            <td>{{$data->tingkat->nama_tingkat}}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Mulai Kegiatan</td>
                            <td>:</td>
                            <td>{{\Carbon\Carbon::parse($data->kegiatan_mahasiswa->tanggal_mulai)->isoFormat('D MMMM Y')}}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Selesai Kegiatan</td>
                            <td>:</td>
                            <td>{{\Carbon\Carbon::parse($data->kegiatan_mahasiswa->tanggal_selesai)->isoFormat('D MMMM Y')}}</td>
                        </tr>
                        <tr>
                            <td>Prestasi</td>
                            <td>:</td>
                            <td>{{$data->prestasi->nama_prestasi}}</td>
                        </tr>
                        <tr>
                            <td>Bobot Nilai Kegiatan</td>
                            <td>:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Dosen Pembimbing</td>
                            <td>:</td>
                            <td>{{$data->kegiatan_mahasiswa->kepeg_pegawai->nip}} - {{Helper::nama_gelar($data->kegiatan_mahasiswa->kepeg_pegawai)}}</td>
                        </tr>
                        <tr>
                            <td>Bukti Kegiatan</td>
                            <td>:</td>
                            <td><a href="{{asset('storage/'.$data->kegiatan_mahasiswa->files->path)}}" class="btn btn-sm btn-info">Lihat Bukti</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
