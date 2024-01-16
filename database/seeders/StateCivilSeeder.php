<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Etnia;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StateCivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nombres = ["Mestiza/o", "Montubia/o", "Afroecuatoriano/Afrodescendiente", "Indígena", "Blanco", "Otro", "Shuar", "Cayapas", "Achuar", "Andoa", "Awá", "Tsáchilas", "Huaoranis", "Kitu Kara (Quitus)", "0Huancavilcas", "Cofanes", "Pastos", "Shiwiar", "Secoyas", "Siona", "Zápara", "Épera", "Paltas", "Mantas"];

        foreach ($nombres as $nombre) {
            Etnia::create([
                'name' => $nombre
            ]);
        }
    }
}
