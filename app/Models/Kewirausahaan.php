<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kewirausahaan extends Model
{
    use HasFactory;
    protected $table      = 'kewirausahaan';
    protected $primaryKey = 'id_kewirausahaan';
    protected $guarded    = [];
}
