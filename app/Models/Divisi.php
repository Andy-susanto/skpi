<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;
    protected $table      = 'ref_divisi';
    protected $primaryKey = 'id_ref_divisi';
    protected $guarded    = [];
}
