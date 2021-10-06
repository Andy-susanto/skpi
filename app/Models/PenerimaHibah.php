<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaHibah extends Model
{
    use HasFactory;
    protected $table      = 'penerima_hibah';
    protected $primaryKey = 'id_penerima_hibah';
    protected $guarded    = [];

    public function kegiatan_mahasiswa(){
        return $this->HasOne(KegiatanMahasiswa::class,'detail_id','id_penerima_hibah');
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
