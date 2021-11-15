<?php

namespace App\Helper;

use App\Models\JenisKegiatan;
use App\Models\Kategori;
use App\Models\LogAktifitas;
use App\Models\Penyelenggara;
use App\Models\Peran;
use App\Models\Prestasi;
use App\Models\Tingkat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class Helpers
{

    public static function jenis_kegiatan(){
        return JenisKegiatan::all();
    }

    public static function penyelenggara($jenis=null)
    {
        if ($jenis==null) {
           return Penyelenggara::all();
        }else{
            return Penyelenggara::whereHas('jenis_kegiatan',function($q) use ($jenis){
                $q->where('id_ref_jenis_kegiatan',$jenis);
            })->get();
        }
    }

    public static function kategori($jenis=null)
    {
        if ($jenis==null) {
           return Kategori::all();
        }else{
            return Kategori::whereHas('jenis_kegiatan',function($q) use ($jenis){
                $q->where('id_ref_jenis_kegiatan',$jenis);
            })->get();
        }
    }

    public static function tingkat($jenis=null)
    {
        if ($jenis==null) {
            return Tingkat::all();
        }else{
            return Tingkat::whereHas('jenis_kegiatan',function($q) use ($jenis){
                $q->where('id_ref_jenis_kegiatan',$jenis);
            })->get();
        }
    }

    public static function prestasi($jenis=null){
        if ($jenis == null) {
            return Prestasi::all();
        }else{
            return Prestasi::whereHas('jenis_kegiatan',function($q) use ($jenis){
                $q->where('id_ref_jenis_kegiatan',$jenis);
            })->get();
        }
    }

    public static function tahun_aktif()
    {
        $data = DB::table('saestu.tahun_aktif')->where('status', 1)->first();
        return $data->tahun;
    }

    public static function tahun_capaian()
    {
        $data = DB::table('saestu.tahun_aktif')->orderBy('tahun', 'desc')->get();
        return $data;
    }

    public static function unit($u)
    {
        return "(" . $u->parent_unit_utama->ref_unit->singkatan_unit . ") " . $u->ref_unit->nama_ref_unit_kerja_lengkap;
    }
    public static function alert($type = null, $message = null)
    {
        $alert = ['type' => $type, 'message' => $message];
        Session::flash('alert', $alert);
    }
    public static function nama_gelar($data)
    {

        if (!empty($data->gelar_belakang)) $koma = ',';
        else $koma = '';
        $nama_gelar = $data->gelar_depan . ' ' . $data->nama_pegawai . $koma . ' ' . $data->gelar_belakang;

        return $nama_gelar;
    }
    public static function set_active($uri, $output = 'active')
    {
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if (Route::is($u)) {
                    return $output;
                }
            }
        } else {
            if (Route::is($uri)) {
                return $output;
            }
        }
    }
    public static function validasi($validasi)
    {
        $status = "";
        if ($validasi->validasi == 'menunggu') {
            $status = "<span class='label label-primary'>Menunggu</span>";
        } else if ($validasi->validasi == 'valid') {
            $status = "<i style='font-size:12px'>Divalidasi <b>Valid</b> Oleh:" . Helpers::nama_gelar($validasi->validator) . ' pada ' . Tanggal::time_indo($validasi->tgl_validasi) . '</i>';
        } else {
            $status = "<i style='font-size:12px; color:red'> Divalidasi <b >Tidak Valid</b> Oleh:" . Helpers::nama_gelar($validasi->validator) . ' Alasan : ' . $validasi->catatan_validasi . '</i>';
        }
        return $status;
    }


    public static function log($aktivitas, $nama_pelaku = null)
    {

        if (Session::has('userlogin')) {
            $datauseraktif = Session::get('userlogin');
            if ($datauseraktif['id_pelaku'] != 'support') {
                $inserlog = new LogAktifitas();
                $inserlog->ip = $datauseraktif['ip'];
                $inserlog->id_pelaku = $datauseraktif['id_pelaku'];
                $inserlog->nama_pelaku = $datauseraktif['nama_pelaku'];
                $inserlog->user_agent = $datauseraktif['user_agent'];
                $inserlog->tanggal = date('Y-m-d H:i:s');
                $inserlog->aktifitas = $aktivitas;
                $inserlog->save();
            }
        } else {


            ($nama_pelaku == null) ? $nama = "visitor" : $nama = $nama_pelaku;

            $inserlog = new LogAktifitas();
            $inserlog->ip = request()->ip();
            $inserlog->id_pelaku = 'visitor';
            $inserlog->nama_pelaku = $nama;
            $inserlog->user_agent = request()->server('HTTP_USER_AGENT');
            $inserlog->tanggal = date('Y-m-d H:i:s');
            $inserlog->aktifitas = $aktivitas;
            $inserlog->save();
        }
    }

    public static function clean_string($string)
    {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

    public static function tahun()
    {
        $now = date('Y');
        return $now;
    }
}
