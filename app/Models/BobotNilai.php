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


    public function jenis_kegiatan(){
        return $this->belongsTo(JenisKegiatan::class,'ref_jenis_kegiatan_id');
    }

    public function penyelenggara(){
        return $this->belongsTo(Penyelenggara::class,'ref_penyelenggara_id');
    }

    public function tingkat(){
        return $this->belongsTo(Tingkat::class,'ref_tingkat_id');
    }

    public function prestasi(){
        return $this->belongsTo(Prestasi::class,'ref_peran_prestasi_id');
    }

}
