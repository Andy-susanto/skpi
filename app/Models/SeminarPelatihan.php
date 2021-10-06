<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeminarPelatihan extends Model
{
    use HasFactory;
    protected $table      = 'seminar_pelatihan';
    protected $primaryKey = 'id_seminar_pelatihan';
    protected $guarded    = [];

    public function kegiatan_mahasiswa(){
        return $this->HasOne(KegiatanMahasiswa::class,'detail_id','id_seminar_pelatihan');
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
