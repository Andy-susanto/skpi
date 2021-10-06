<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiakadProdi extends Model
{
    use HasFactory;
    protected $table      = 'siakad.prodi';
    protected $guarded    = [];
    protected $primaryKey = 'id_prodi';
}
