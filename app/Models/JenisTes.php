<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisTes extends Model
{
    use HasFactory;
    protected $table      = 'ref_jenis_tes';
    protected $primaryKey = 'id_ref_jenis_tes';
    protected $guarded    = [];
}
