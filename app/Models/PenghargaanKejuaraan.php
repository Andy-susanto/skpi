<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PenghargaanKejuaraan extends Model
{
    use HasFactory;
    protected $table      = 'penghargaan_kejuaraan_kompetensi';
    protected $guarded    = [];
    protected $primaryKey = 'id_penghargaan_kejuaraan_kompetensi';

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
