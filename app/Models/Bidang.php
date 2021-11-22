<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory;
    protected $table      = 'ref_bidang';
    protected $primaryKey = 'id_ref_bidang';
    protected $guarded    = [];
}
