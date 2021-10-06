<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanMahasiswa extends Model
{
    use HasFactory;
    protected $table      = 'kegiatan_mahasiswa';
    protected $guarded    = [];
    protected $primaryKey = 'id_kegiatan_mahasiswa';

    public function penghargaan_kejuaraan(){
        return $this->belongsTo(PenghargaanKejuaraan::class,'detail_id','id_penghargaan_kejuaraan');
    }

    public function seminar_pelatihan(){
        return $this->belongsTo(SeminarPelatihan::class,'detail_id','id_seminar_pelatihan');
    }

    public function penerima_hibah(){
        return $this->belongsTo(PenerimaHibah::class,'detail_id','id_penerima_hibah');
    }

    public function pengabdian_masyarakat(){
        return $this->belongsTo(PengabdianMasyarakat::class,'detail_id','id_pengabdian_masyarakat');
    }

    public function kepeg_pegawai(){
        return $this->belongsTo(KepegPegawai::class,'pegawai_id','id_pegawai');
    }

    public function files(){
        return $this->belongsTo(Files::class,'file_id');
    }

    public function mhspt(){
        return $this->belongsTo(SiakadMhspt::class,'id_mhs_pt','id_mhs_pt');
    }

    public function jenis_kegiatan(){
        return $this->belongsTo(JenisKegiatan::class,'jenis_kegiatan_id','id_jenis_Kegiatan');
    }

    public function kegiatan(){
        if($this->jenis_kegiatan_id == 1){
            return $this->penghargaan_kejuaraan;
        }else if($this->jenis_kegiatan_id == 2){
            return $this->seminar_pelatihan;
        }else if($this->jenis_kegiatan_id == 3){
            return $this->penerima_hibah;
        }else if($this->jenis_kegiatan_id == 4){
            return $this->pengabdian_masyarakat;
        }
    }

}
