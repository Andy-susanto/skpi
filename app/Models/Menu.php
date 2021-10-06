<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table   = 'menus';
    protected $primaryKey = 'id_menu';
    protected $guarded = [];
    public $timestamps = false;

    public function submenus()
    {
        return $this->hasMany(Menu::class, 'parent_id', 'id_menu');
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roles_has_menus', 'menu_id', 'role_id');
    }
    public function permissions()
    {
        return $this->hasMany(Permissions::class, 'menu_id', 'id_menu');
    }
    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id', 'id_menu');
    }
}
