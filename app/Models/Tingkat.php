<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tingkat extends Model
{
    use HasFactory;
    protected $table      = 'ref_tingkat';
    protected $guarded    = [];
    protected $primaryKey = 'id_ref_tingkat';

    public function jenis_kegiatan(){
        return $this->belongsToMany(JenisKegiatan::class,'ref_tingkat_has_ref_jenis_kegiatan','ref_tingkat_id','ref_jenis_kegiatan_id');
    }
}
