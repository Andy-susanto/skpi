<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CakupanBeasiswa extends Model
{
    use HasFactory;
    protected $table      = 'ref_cakupan_beasiswa';
    protected $primaryKey = 'id_ref_cakupan_beasiswa';
    protected $guarded    = [];
}
