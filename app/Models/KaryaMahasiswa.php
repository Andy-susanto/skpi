<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaryaMahasiswa extends Model
{
    use HasFactory;
    protected $table      = 'karya_mahasiswa';
    protected $primaryKey = 'id_karya_mahasiswa';
    protected $guarded    = [];

    public function kategori(){
        return $this->belongsTo(Kategori::class,'ref_kategori_id');
    }

    public function jenis(){
        return $this->belongsTo(Jenis::class,'ref_jenis_id');
    }

    public function mhspt(){
        return $this->belongsTo(SiakadMhspt::class,'siakad_mhspt_id');
    }

    public function files(){
        return $this->belongsTo(Files::class,'file_kegiatan_id','id_files');
    }

}
