<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyelenggara extends Model
{
    use HasFactory;
    protected $table      = 'penyelenggara';
    protected $primaryKey = 'id_penyelenggara';
    protected $guarded    = [];
}
