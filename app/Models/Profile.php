<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    public function clientes(){
        return $this->hasOne(Cliente::class);
    }

    public function generos(){
        return $this->belongsTo(Genero::class, 'genero_id');
    }

    public function paises(){
        return $this->belongsTo(Pais::class, 'pais_id');
    }

    public function etnias(){
        return $this->belongsTo(Etnia::class, 'etnia_id');
    }

    
}
