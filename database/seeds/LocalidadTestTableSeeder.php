<?php

namespace Database\Seeders;

use App\Models\Localidad;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalidadTestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('localidades')
            ->insert(['provincia_codigo' => 'C', 'nombre' => 'CIUDAD AUTONOMA BUENOS AIRES' ]);
    }
}
