<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patrocinio extends Model
{
    use HasFactory;

    protected $table = 'patrocinio';

    public function asesoria(){
        return $this->hasOne(Asesoria::class, 'id', 'asesoria_id');
    }
}
