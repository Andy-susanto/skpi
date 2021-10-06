<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferensiUnitKerja extends Model
{
    use HasFactory;
    protected $table      = 'kepeg.referensi_unit_kerja';
    protected $guarded    = [];
    protected $primaryKey = 'id_ref_unit_kerja';
}
