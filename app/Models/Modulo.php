<?php

namespace App\Models;

use App\Models\ModuloPermiso;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Modulo extends Model
{
    use HasFactory;

    protected $table      = 'modulos';
    protected $primaryKey = 'moduloid';
    protected $guarded    = ['moduloid'];

    public function modulopermiso()
    {
        return $this->hasMany(ModuloPermiso::class, 'moduloid', 'moduloid');
    }

    public function permisos(){
        return $this->belongsToMany(Permiso::class, 'modulopermiso', 'moduloid', 'permisoid')->withTimestamps();
    }

    public function roles(){
        return $this->belongsToMany(Role::class, 'rolModuloPermiso', 'modulopermisoid', 'rolid');
    }
    
}
