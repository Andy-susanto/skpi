<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BobotNilai extends Model
{
    use HasFactory;
    protected $table      = 'bobot_nilai';
    protected $guarded    = [];
    protected $primaryKey = 'id_bobot_nilai';
}
