<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KemampuanBahasaAsing extends Model
{
    use HasFactory;
    protected $table      = 'kemampuan_bahasa_asing';
    protected $primaryKey = 'id_kemampuan_bahasa_asing';
    protected $guarded    = [];

    public function bahasa(){
        return $this->belongsTo(Bahasa::class,'ref_bahasa_id');
    }

    public function level_bahasa(){
        return $this->belongsTo(LevelPenguasaan::class,'ref_level_bahasa_id');
    }

    public function jenis_tes(){
        return $this->belongsTo(JenisTes::class,'ref_jenis_tes_id');
    }

    public function files(){
        return $this->belongsTo(Files::class,'file_kegiatan_id','id_files');
    }

    public function mhspt(){
        return $this->belongsTo(SiakadMhspt::class,'siakad_mhspt_id');
    }

}
