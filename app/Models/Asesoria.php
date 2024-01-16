<?php

namespace App\Models;

use App\Models\Zona;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asesoria extends Model
{
    use HasFactory;

    protected $table = 'asesorias';

    public function cjga(){
        return $this->hasOne(CJGA::class, 'id' , 'cjga_id' );
    }

    public function genero(){
        return $this->hasOne(Genero::class, 'id' , 'genero_id' );
    }

    public function pais(){
        return $this->hasOne(Pais::class, 'id' , 'pais_id' );
    }

    public function etnia(){
        return $this->hasOne(Etnia::class, 'id' , 'etnia_id' );
    }

    public function instruccion(){
        return $this->hasOne(Instruccion::class, 'id' , 'instruccion_id' );
    }

    public function ocupacion(){
        return $this->hasOne(Ocupacion::class, 'id' , 'ocupacion_id' );
    }

    public function estadoCivil(){
        return $this->hasOne(Estado_civil::class, 'id' , 'estado_civil_id' );
    }

    public function nivelIngresos(){
        return $this->hasOne(Nivel_ingresos::class, 'id' , 'nivel_ingresos_id' );
    }

    public function zona(){
        return $this->hasOne(Zona::class, 'id' , 'zona_vive_id' );
    }

    public function lineaServicios(){
        return $this->hasOne(Linea_servicios::class, 'id' , 'linea_servicio_id' );
    }

    public function Servicios(){
        return $this->hasOne(Servicios::class, 'id' , 'servicio_id' );
    }

    public function materias(){
        return $this->hasOne(Materias::class, 'id' , 'materias_id' );
    }

    public function TipoUsuario(){
        return $this->hasOne(Tipo_usuario::class, 'id' , 'tipo_usuario_id' );
    }
    
    public function Derivado(){
        return $this->hasOne(Derivado::class, 'id' , 'derivado_id' );
    }

    public function estadoDerivada(){
        return $this->hasOne(Estado_derivada::class, 'id' , 'estado_causa_id' );
    }

    public function Clientes(){
        return $this->hasOne(Cliente::class, 'id' , 'cliente_id' );
    }

    public function provincia(){
        return $this->hasOne(Provincias::class, 'id' , 'provincia_id' );
    }

    public function ciudad(){
        return $this->hasOne(Ciudades::class, 'id' , 'ciudad_id' );
    }

    public function asesorias(){
        return $this->hasOne(Asesoria::class);
    }

    public function patrocinio(){
        return $this->hasOne(Patrocinio::class);
    }
    


}
