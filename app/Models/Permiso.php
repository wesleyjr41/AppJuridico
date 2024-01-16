<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;

    protected $table      = 'permisos';
    protected $primaryKey = 'permisoid';
    protected $guarded    = ['permisoid'];

    public function modulos(){
        return $this->belongsToMany(Modulo::class)->withTimestamps();
    }
}
