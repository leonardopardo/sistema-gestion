<?php

namespace Database\Seeders;

use App\Models\Provincia;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinciaTestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provincias')
            ->insert(['pais_id' => 13, 'codigo' => 'C', 'iso' => 'AR-C', 'nombre' => 'CIUDAD AUTONOMA BUENOS AIRES' ]);
    }
}
