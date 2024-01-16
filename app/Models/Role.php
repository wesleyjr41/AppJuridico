<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Role extends Model
{
    use HasFactory;

    protected $table      = 'roles';
    protected $primaryKey = 'rolid';
    protected $guarded    = ['rolid'];


    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function modulos(){
        return $this->belongsToMany(Modulo::class, 'rolModuloPermiso', 'modulopermisoid', 'rolid');
    }

    public function menus(){
        return $this->belongsToMany(Menu::class, 'menu_role', 'role_id', 'menu_id');
    }



    
}
