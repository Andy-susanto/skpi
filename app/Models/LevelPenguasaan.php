<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelPenguasaan extends Model
{
    use HasFactory;
    protected $table      = 'ref_level_bahasa';
    protected $primaryKey = 'id_ref_level_bahasa';
    protected $guarded    = [];
}
