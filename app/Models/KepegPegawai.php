<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KepegPegawai extends Model
{
    use HasFactory;
    protected $table      = 'kepeg.pegawai';
    protected $guarded    = [];
    protected $primaryKey = 'id_pegawai';
}
