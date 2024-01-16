<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //$this->call(UsersTableSeeder::class);
        $this->call(ModulosTableSeeder::class);
        $this->call(PermisosTableSeeder::class);
        $this->call(StateCivilSeeder::class);
        $this->call(PaisSeeder::class);
        $this->call(ProvinciasSeeder::class);
        $this->call(CiudadesSeeder::class);
        $this->call(TypesSeeder::class);
        $this->call(CJGASeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(GenerosSeeder::class);
    }
}
