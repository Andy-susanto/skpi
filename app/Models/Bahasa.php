<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahasa extends Model
{
    use HasFactory;
    protected $table      = 'ref_bahasa';
    protected $primaryKey = 'id_ref_bahasa';
    protected $guarded    = [];
}
