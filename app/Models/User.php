<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table      = 'users';
    protected $guarded    = [];
    public $incrementing = false;

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class,'users_has_roles','user_id','role_id');
    }

    public function role_id(){
    $data =[];
        foreach ($this->roles as $roles) {
            $data[] = $roles->id_role;
        }

        return $data;
    }

    public function instansi()
    {
        return $this->belongsToMany(UnitKerja::class,'user_instansi','user_id','unit_kerja_id');
    }

    public function kepeg_pegawai(){
        return $this->belongsTo(KepegPegawai::class,'id','id_pegawai');
    }

    public function siakad_mhspt(){
    return $this->belongsTo(SiakadMhspt::class,'id','id_mhs_pt');
    }

    public function hasPermission($key){
        $data =[];
        foreach ($this->roles as $dataRole) {
            foreach ($dataRole->permissions as $dataPermission) {
                $data[]= $dataPermission->permission;
            }
        }
        return in_array($key,$data);
    }

    public function SiakadUser(){
        return $this->belongsTo(SiakadUser::class,'username','username');
    }

    public function unit_kerja(){
        $unit = [];
        if($this->level_akun == 1){
            foreach ($this->instansi as $v) {
                $unit[] = (int) $v->id_unit_kerja_siakad;
            }
        }
        return $unit;
    }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
}
