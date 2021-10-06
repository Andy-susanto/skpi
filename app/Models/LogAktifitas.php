<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogAktifitas extends Model
{
    use HasFactory;
    protected $table      = 'log_aktifitas';
    protected $primaryKey = 'id_log_aktifitas';
    protected $guarded    = [];
}
