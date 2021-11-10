<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class SeminarPelatihan extends Model
{
    use HasFactory;
    protected $table      = 'seminar_pelatihan_workshop_diklat';
    protected $primaryKey = 'id_seminar_pelatihan_workshop_diklat';
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
