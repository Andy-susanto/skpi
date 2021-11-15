<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peran extends Model
{
    use HasFactory;
    protected $table      = 'ref_peran_prestasi';
    protected $primaryKey = 'id_ref_peran_prestasi';
    protected $guarded    = [];
}
