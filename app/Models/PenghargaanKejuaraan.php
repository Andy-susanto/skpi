<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class PenghargaanKejuaraan extends Model
{
    use HasFactory;
    protected $table      = 'penghargaan_kejuaraan_kompetensi';
    protected $guarded    = [];
    protected $primaryKey = 'id_penghargaan_kejuaraan_kompetensi';

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
}
