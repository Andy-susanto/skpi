<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magang extends Model
{
    use HasFactory;
    protected $table      = 'magang';
    protected $primaryKey = 'id_magang';
    protected $guarded    = [];

    public function kepeg_pegawai(){
        return $this->belongsTo(KepegPegawai::class,'kepeg_pegawai_id');
    }

    public function mhspt(){
        return $this->belongsTo(SiakadMhspt::class,'siakad_mhspt_id');
    }

    public function files(){
        return $this->belongsTo(Files::class,'file_kegiatan_id','id_files');
    }
}
