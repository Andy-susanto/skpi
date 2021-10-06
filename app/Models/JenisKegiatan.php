<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKegiatan extends Model
{
    use HasFactory;
    protected $table      = 'jenis_kegiatan';
    protected $primaryKey = 'id_jenis_kegiatan';
    protected $guarded    = [];

    public function scopeAktif($query){
        return $query->where('status','1');
    }

}
