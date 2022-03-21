<?php

namespace Database\Seeders;

use App\Models\Heading;
use Illuminate\Database\Seeder;

class HeadingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Heading::create(['name' => 'Librería', 'description' => 'Artículos de librería Escolar y Comercial']);
        Heading::create(['name' => 'Ferretería', 'description' => 'Herramientas, consumibles, otros...']);
        Heading::create(['name' => 'Bazar', 'description' => 'Artículos Gastronómicos, vajilla, otros...']);
        Heading::create(['name' => 'Jugueteria', 'description' => 'Juguetes infantiles, inflables, de agua, etc...']);
        Heading::create(['name' => 'Varios', 'description' => 'Artículos Generales sin clasificar']);

    }
}
