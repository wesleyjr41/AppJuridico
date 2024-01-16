<?php

namespace Database\Seeders;

use App\Models\Permiso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermisosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permisos')->insert([
            'nombre' => 'Lectura',
            'nombreLaravel' => 'view',
            'color' => 'primary'
        ]);

        DB::table('permisos')->insert(
            [
                'nombre' => 'Crear',
                'nombreLaravel' => 'create',
                'color' => 'primary'
            ]
        );
        DB::table('permisos')->insert(
            [
                'nombre' => 'Editar',
                'nombreLaravel' => 'edit',
                'color' => 'primary'
            ]
        );
        DB::table('permisos')->insert(
            [
                'nombre' => 'Eliminar',
                'nombreLaravel' => 'delete',
                'color' => 'danger'
            ]
        );
    }
}
