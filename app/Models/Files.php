<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;
    protected $table        = 'file_kegiatan';
    protected $guarded      = [];
    protected $primaryKey   = 'id_file';
    public    $incrementing = true;
}
