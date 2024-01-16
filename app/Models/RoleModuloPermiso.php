<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleModuloPermiso extends Model
{
    use HasFactory;

    protected $table = "rolModuloPermiso";
    protected $primaryKey = 'rolmodulopermisoid';
    protected $guarded = ['rolmodulopermisoid'];

    public function rol()
    {
        return $this->hasOne(Role::class, 'rolid', 'rolid');
    }

    public function modulopermiso()
    {
        return $this->hasMany(ModuloPermiso::class, 'modulopermisoid', 'modulopermisoid');
    }
}
