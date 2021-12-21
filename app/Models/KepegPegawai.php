<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeUnit\FunctionUnit;

class KepegPegawai extends Model
{
    use HasFactory;
    protected $table      = 'kepeg.pegawai';
    protected $guarded    = [];
    protected $primaryKey = 'id_pegawai';

    public function unit_kerja(){
        return $this->belongsTo(UnitKerja::class,'unit_kerja_id');
    }

    public function biodata(){
        return $this->hasOne(KepegBiodata::class,'pegawai_id','id_pegawai');
    }

}
