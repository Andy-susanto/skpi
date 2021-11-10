<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;
    protected $table = 'ref_peran_prestasi';
    protected $primaryKey = 'id_ref_peran_prestasi';
    protected $guarded = [];

    public function jenis_kegiatan(){
        return $this->belongsToMany(JenisKegiatan::class,'ref_peran_has_ref_jenis_kegiatan','ref_peran_id','ref_jenis_kegiatan_id');
    }
}
