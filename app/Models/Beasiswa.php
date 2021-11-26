<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    use HasFactory;
    protected $table      = 'beasiswa';
    protected $primaryKey = 'id_beasiswa';
    protected $guarded    = [];

    public function kategori(){
        return $this->belongsTo(Kategori::class,'ref_kategori_id');
    }

    public function cakupan_beasiswa(){
        return $this->belongsTo(CakupanBeasiswa::class,'ref_cakupan_beasiswa_id');
    }

    public function mhspt(){
        return $this->belongsTo(SiakadMhspt::class,'siakad_mhspt_id');
    }

    public function files(){
        return $this->belongsTo(Files::class,'file_kegiatan_id','id_files');
    }

}
