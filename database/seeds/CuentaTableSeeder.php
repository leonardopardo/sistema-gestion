<?php

namespace Database\Seeders;

use App\Models\Cuenta;


class CuentaTableSeeder extends \Flynsarmy\CsvSeeder\CsvSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Cuenta::class, 50)->create();
    }
}
