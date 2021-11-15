<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table      = 'ref_kategori';
    protected $primaryKey = 'id_ref_kategori';
    protected $guarded    = [];

    public function jenis_kegiatan(){
        return $this->belongsToMany(JenisKegiatan::class,'ref_kategori_has_ref_jenis_kegiatan','ref_kategori_id','ref_jenis_kegiatan_id');
    }
}
