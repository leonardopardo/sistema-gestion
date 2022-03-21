<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(CuentaTableSeeder::class);
        $this->call(ProvinciaTableSeeder::class);
        $this->call(HeadingTableSeeder::class);
        $this->call(SupplierTableSeeder::class);
        //$this->call(LocalidadTableSeeder::class);
    }
}
