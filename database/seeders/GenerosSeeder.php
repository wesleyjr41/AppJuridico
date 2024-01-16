<?php

namespace Database\Seeders;

use App\Models\Genero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenerosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $generos = ["Femenino", "Masculino", "LGBTI"];

        foreach ($generos as $nombre) {
            Genero::create([
                'name' => $nombre
            ]);
        }
    }
}
