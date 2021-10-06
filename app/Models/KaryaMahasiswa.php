<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaryaMahasiswa extends Model
{
    use HasFactory;
    protected $table      = 'karya_mahasiswa';
    protected $primaryKey = 'id_karya_mahasiswa';
    protected $guarded    = [];
}
