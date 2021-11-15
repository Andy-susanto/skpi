<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaHibah extends Model
{
    use HasFactory;
    protected $table      = 'penerima_hibah_pendanaan';
    protected $primaryKey = 'id_penerima_hibah_pendanaan';
    protected $guarded    = [];

    public function penyelenggara(){
        return $this->belongsTo(Penyelenggara::class,'ref_penyelenggara_id');
    }

    public function tingkat(){
        return $this->belongsTo(Tingkat::class,'ref_tingkat_id');
    }

    public function prestasi(){
        return $this->belongsTo(Prestasi::class,'ref_peran_prestasi_id');
    }

    public function kepeg_pegawai(){
        return $this->belongsTo(KepegPegawai::class,'kepeg_pegawai_id');
    }

    public function files(){
        return $this->belongsTo(Files::class,'file_kegiatan_id','id_files');
    }

    public function bobot_nilai(){
        return $this->belongsTo(BobotNilai::class,'bobot_nilai_id','id_bobot_nilai');
    }

}
