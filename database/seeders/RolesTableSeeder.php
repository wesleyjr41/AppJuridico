<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            'nombre' => 'Administrador',
            'descripcion' => 'administrador',
        ]);

        DB::table('roles')->insert(
            [
                'nombre' => 'Secretaria',
                'descripcion' => 'secretaria',
            ]
        );
        DB::table('roles')->insert(
            [
                'nombre' => 'Abogada',
                'descripcion' => 'abogada',
            ]
        );
        DB::table('roles')->insert(
            [
                'nombre' => 'Cliente',
                'descripcion' => 'cliente',
            ]
        );
    }
}
