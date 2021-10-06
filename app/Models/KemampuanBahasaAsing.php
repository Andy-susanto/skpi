<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KemampuanBahasaAsing extends Model
{
    use HasFactory;
    protected $table      = 'kemampuan_bahasa_asing';
    protected $primaryKey = 'id_kemampuan_bahasa_asing';
    protected $guarded    = [];
}
