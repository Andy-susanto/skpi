<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SeminarPelatihan extends Model
{
    use HasFactory;
    protected $table      = 'seminar_pelatihan';
    protected $primaryKey = 'id_seminar_pelatihan';
    protected $guarded    = [];

    public function kegiatan_mahasiswa(){
        return $this->HasOne(KegiatanMahasiswa::class,'detail_id','id_seminar_pelatihan');
    }

    public function kegiatan_mahasiswa_single(){
        return $this->HasOne(KegiatanMahasiswa::class,'detail_id','id_seminar_pelatihan')->where('id_mhs_pt',Auth::user()->id);
    }

    public function penyelenggara(){
        return $this->belongsTo(Penyelenggara::class,'penyelenggara_id');
    }

    public function tingkat(){
        return $this->belongsTo(Tingkat::class,'tingkat_id');
    }

    public function peran(){
        return $this->belongsTo(Peran::class,'peran_id');
    }
}
