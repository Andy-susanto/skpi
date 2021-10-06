<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiakadMhspt extends Model
{
    use HasFactory;
    protected $table      = 'siakad.mhs_pt';
    protected $guarded    = [];
    protected $primaryKey = 'id_mhs_pt';

    public function mahasiswa(){
        return $this->belongsTo(SiakadMahasiswa::class,'id_mahasiswa','id_mahasiswa');
    }

    public function prodi(){
        return $this->belongsTo(SiakadProdi::class,'id_prodi','id_prodi');
    }

}
