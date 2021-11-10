<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyelenggara extends Model
{
    use HasFactory;
    protected $table      = 'ref_penyelenggara';
    protected $primaryKey = 'id_ref_penyelenggara';
    protected $guarded    = [];

    public function jenis_kegiatan(){
        return $this->belongsToMany(JenisKegiatan::class,'ref_penyelenggara_has_ref_jenis_kegiatan','ref_penyelenggara_id','ref_jenis_kegiatan_id');
    }

}
