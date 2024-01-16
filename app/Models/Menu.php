<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';

    public function roles(){
        return $this->belongsToMany(Role::class, 'menu_role', 'menu_id', 'role_id');
    }

    public function menuPadre(){
        return $this->hasOne(Menu::class, 'id', 'padre_id')->withDefault([
            'nombre' => 'Root'
        ]);
    }


}
