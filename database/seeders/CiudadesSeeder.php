<?php

namespace Database\Seeders;

use App\Models\Ciudades;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CiudadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $Guayas = ["Guayaquil", "Alfredo Baquerizo Moreno", "Balao", "Balzar", "Colimes", "Daule", "Durán", "El Empalme", "El Triunfo", "Antonio Elizalde (Bucay)", "Isidro Ayora", "Lomas de Sargentillo", "Marcelino Maridueña", "Milagro", "Naranjal", "Naranjito", "Nobol", "Palestina", "Pedro Carbo", "Playas", "Salitre", "Samborondón", "Santa Lucía", "Simón Bolivar", "Yaguachi"];

        foreach ($Guayas as $modulo) {
            Ciudades::create([
                'name' => $modulo,
                'provincia_id' => 10
            ]);
        }
    }
}
