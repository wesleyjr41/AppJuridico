<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Wesley Uwaoma',
            'email' => 'uwaomawesley@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
            'profile_id' => 2
        ]); 

        User::factory()
            ->count(10)
            ->create();
    }
}
