<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    public function profiles(){
        return $this->hasOne(Profile::class, 'id', 'profile_id');
    }

    public function asesorias(){
        return $this->hasMany(Asesoria::class);
    }
}
