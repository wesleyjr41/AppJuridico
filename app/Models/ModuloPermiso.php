<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuloPermiso extends Model
{
    use HasFactory;

    protected $table      = 'moduloPermiso';
    protected $primaryKey = 'modulopermisoid';
    protected $guarded    = ['modulopermisoid'];

    public function permisos()
    {
        return $this->hasOne(Permiso::class, 'permisoid', 'permisoid');
    }

    public function modulos()
    {
        return $this->hasOne(Modulo::class, 'moduloPermiso', 'pemisoid', 'moduloid'  );
    }
}
