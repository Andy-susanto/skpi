<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    use HasFactory;
    protected $table      = 'kepeg.unit_kerja';
    protected $primaryKey = 'id_unit_kerja';
    protected $guarded    = [];

    public function ref_unit()
    {
        return $this->belongsTo(ReferensiUnitKerja::class, 'referensi_unit_kerja_id', 'id_ref_unit_kerja');
    }
    public function parent_unit()
    {
        return $this->belongsTo(UnitKerja::class, 'parent_unit_id', 'id_unit_kerja');
    }
    public function parent_unit_utama()
    {
        return $this->belongsTo(UnitKerja::class, 'parent_unit_utama_id', 'id_unit_kerja');
    }

    public function scopeFilterUnit()
    {
        if (auth()->user()->level_akun == 1) {
            $unit = [];
            foreach (auth()->user()->instansi as $v) {
                $unit[] = $v->id_unit_kerja;
            }
            return $this->whereIn('id_unit_kerja', $unit);
        }
    }
}
