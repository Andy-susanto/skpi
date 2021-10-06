<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table      = 'roles';
    protected $primaryKey = 'id_role';
    protected $guarded    = [];
    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_has_roles','role_id','user_id');
    }
     public function menus()
    {
        return $this->belongsToMany(Menu::class, 'roles_has_menus','role_id','menu_id');
    }
    public function permissions()
    {
        return $this->belongsToMany(Permissions::class, 'roles_has_permissions','role_id','permission_id');
    }

}
