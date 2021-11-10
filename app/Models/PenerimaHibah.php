<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaHibah extends Model
{
    use HasFactory;
    protected $table      = 'penerima_hibah_pendanaan';
    protected $primaryKey = 'id_penerima_hibah_pendanaan';
    protected $guarded    = [];

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
