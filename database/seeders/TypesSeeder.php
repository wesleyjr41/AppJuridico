<?php

namespace Database\Seeders;

use App\Models\Derivado;
use App\Models\Estado;
use App\Models\Estado_civil;
use App\Models\Estado_derivada;
use App\Models\Instruccion;
use App\Models\Linea_servicios;
use App\Models\Materias;
use App\Models\Nivel_ingresos;
use App\Models\Ocupacion;
use App\Models\Tipo_judicatura;
use App\Models\Tipo_patrocinio;
use App\Models\Tipo_usuario;
use App\Models\Zona;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $estado = ["Activo", "Resuelto", "Inactivo"];
        $estado_civil = ["Soltero", "Casado", "Unido", "Separado", "Viudo", "Divorciado"];
        $instruccion = ["Analfabeto", "Prescolar", "Primaria", "Secundaria", "Superior", "Postgrado", "Doctorado"];
        $ocupacion = ["Empleado Privado", "Cuenta propia", "Jornalero o peón", "Empleado u obrero del Estado, Municipio o Consejo Provincial", "No declarado", "Empleado doméstico", "Patrono", "Trabajador no remunerado", "Socio"];
        $materias = ["Civil", "Familia, Mujer, Niñez y Adolescencia", "Constitucional", "Inquilinato", "Laboral", "Movilidad Humana", "Penal", "Tierras", "Administrativo", "Otros", "Violencia Intrafamiliar", "Ejecución de la pena"];
        $zona = ["Urbana", "Rural", "No delimitada en frontera"];
        $nivel_ingresos = ["0", "< 1 SBU", "1 SBU", "2 SBU", "3 SBU", "4 SBU", "5 SBU", "> 5 SBU"];
        $tipo_usuario = ["Actor/a", "Denunciante", "Denunciado", "Demandado/a", "Víctima", "Procesado"];
        $tipo_patrocinio = ["Nuevo", "Seguimiento"];
        $tipo_judicatura = ["Juzgado", "Tribunal", "Sala de la Corte", "Unidad judicial", "Inspectoría"];
        $linea_servicios = ["Constitucional", "Civil", "Familia, Mujer, Niñez y Adolescencia", "Otros", "Inquilinato", "Laboral", "Movilidad Humana", "Penal", "Tierras", "Administrativo", "Violencia Intrafamiliar", "Ejecución de la Pena"];
        $derivado_por = ["Defensoría Pública", "Consultorio Jurídico Gratuito", "Juzgado o Unidad Judicial", "Otros", "No"];
        $estado_causa_derivado = ["En proceso", "Falta de documentación", "Usuario no asistió", "Desistimiento de la causa", "Archivo", "Pasivo", "No cumple con la normativa", "Tramitado en mediación"];


        foreach ($estado as $nombre) {
            Estado::create([
                'nombre' => $nombre
            ]);
        }
        foreach ($estado_civil as $nombre) {
            Estado_civil::create([
                'nombre' => $nombre
            ]);
        }
        foreach ($instruccion as $nombre) {
            Instruccion::create([
                'nombre' => $nombre
            ]);
        }
        foreach ($ocupacion as $nombre) {
            Ocupacion::create([
                'nombre' => $nombre
            ]);
        }
        foreach ($materias as $nombre) {
            Materias::create([
                'nombre' => $nombre
            ]);
        }
        foreach ($zona as $nombre) {
            Zona::create([
                'nombre' => $nombre
            ]);
        }
        foreach ($nivel_ingresos as $nombre) {
            Nivel_ingresos::create([
                'nombre' => $nombre
            ]);
        }
        foreach ($tipo_usuario as $nombre) {
            Tipo_usuario::create([
                'nombre' => $nombre
            ]);
        }
        foreach ($tipo_patrocinio as $nombre) {
            Tipo_patrocinio::create([
                'nombre' => $nombre
            ]);
        }
        foreach ($tipo_judicatura as $nombre) {
            Tipo_judicatura::create([
                'nombre' => $nombre
            ]);
        }
        foreach ($linea_servicios as $nombre) {
            Linea_servicios::create([
                'nombre' => $nombre
            ]);
        }
        foreach ($derivado_por as $nombre) {
            Derivado::create([
                'nombre' => $nombre
            ]);
        }
        foreach ($estado_causa_derivado as $nombre) {
            Estado_derivada::create([
                'nombre' => $nombre
            ]);
        }
    }
}
