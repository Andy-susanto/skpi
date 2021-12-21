<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Psy\Command\ListCommand\FunctionEnumerator;

class SiakadUser extends Model
{
    use HasFactory;
    protected $table   = 'siakad.users';
    protected $guarded = [];

    public function siakad_file(){
        return $this->hasOne(SiakadFiles::class,'user','id')->latestOfMany();
    }
}
