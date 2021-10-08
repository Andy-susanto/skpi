<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PenghargaanKejuaraan extends Model
{
    use HasFactory;
    protected $table      = 'penghargaan_kejuaraan';
    protected $guarded    = [];
    protected $primaryKey = 'id_penghargaan_kejuaraan';

    public function kegiatan_mahasiswa(){
        return $this->HasOne(KegiatanMahasiswa::class,'detail_id','id_penghargaan_kejuaraan');
    }

    public function kegiatan_mahasiswa_single(){
        return $this->HasOne(KegiatanMahasiswa::class,'detail_id','id_penghargaan_kejuaraan')->where('id_mhs_pt',Auth::User()->id);
    }

    public function penyelenggara(){
        return $this->belongsTo(Penyelenggara::class,'penyelenggara_id');
    }

    public function tingkat(){
        return $this->belongsTo(Tingkat::class,'tingkat_id');
    }

    public function prestasi(){
        return $this->belongsTo(Prestasi::class,'prestasi_id');
    }
}
