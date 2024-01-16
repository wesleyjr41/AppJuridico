<?php

namespace Database\Seeders;

use App\Models\Modulo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModulosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        //
        $tablesToExclude = [
            'categoria_servicios', 'failed_jobs', 'menu_role',
            'migrations', 'modulopermiso', 'password_reset_tokens',
            'password_resets', 'personal_access_tokens', 'role_user',
            'rolmodulopermiso', 'users', 'clientes', 'asesorias'
        ];

        $tables = DB::table('information_schema.tables')
            ->select('table_name')
            ->where('table_schema', '=', env('DB_DATABASE')) // Ajusta esto según tu configuración
            ->whereNotIn('table_name', $tablesToExclude)
            ->get();

            foreach ($tables as $table) {
                $tableName = $table->TABLE_NAME;
                $tableName = str_replace('_', ' ', $tableName);
                $tableName = ucwords($tableName);
                echo($tableName. "<br>" );
                Modulo::create([
                    'nombre' => $tableName,
                    'ruta' => '/'.$table->TABLE_NAME
                ]);
            }
    }
}
