<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengabdianMasyarakat extends Model
{
    use HasFactory;
    protected $table     = 'pengabdian_masyarakat';
    protected $primaryKey = 'id_pengabdian_masyarakat';
    protected $guarded   = [];

    public function penyelenggara(){
        return $this->belongsTo(Penyelenggara::class,'penyelenggara_id');
    }

    public function tingkat(){
        return $this->belongsTo(Tingkat::class,'tingkat_id');
    }

    public function peran(){
        return $this->belongsTo(Prestasi::class,'prestasi_id');
    }

}
