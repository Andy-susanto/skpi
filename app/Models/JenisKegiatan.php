<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKegiatan extends Model
{
    use HasFactory;
    protected $table      = 'ref_jenis_kegiatan';
    protected $primaryKey = 'id_ref_jenis_kegiatan';
    protected $guarded    = [];
}
