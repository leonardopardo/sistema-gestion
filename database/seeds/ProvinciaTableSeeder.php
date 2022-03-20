<?php

namespace Database\Seeders;

use App\Models\Provincia;
use Illuminate\Database\Seeder;

class ProvinciaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provincia::create([ 'id' => '1', 'pais_id' => 13, 'codigo' => 'A', 'iso' => 'AR-A', 'nombre' => 'SALTA' ]);
        Provincia::create([ 'id' => '2', 'pais_id' => 13, 'codigo' => 'B', 'iso' => 'AR-B', 'nombre' => 'BUENOS AIRES' ]);
        Provincia::create([ 'id' => '3', 'pais_id' => 13, 'codigo' => 'C', 'iso' => 'AR-C', 'nombre' => 'CIUDAD AUTONOMA BUENOS AIRES' ]);
        Provincia::create([ 'id' => '4', 'pais_id' => 13, 'codigo' => 'D', 'iso' => 'AR-D', 'nombre' => 'SAN LUIS' ]);
        Provincia::create([ 'id' => '5', 'pais_id' => 13, 'codigo' => 'E', 'iso' => 'AR-E', 'nombre' => 'ENTRE RÍOS' ]);
        Provincia::create([ 'id' => '6', 'pais_id' => 13, 'codigo' => 'F', 'iso' => 'AR-F', 'nombre' => 'LA RIOJA' ]);
        Provincia::create([ 'id' => '7', 'pais_id' => 13, 'codigo' => 'G', 'iso' => 'AR-G', 'nombre' => 'SANTIAGO DEL ESTERO' ]);
        Provincia::create([ 'id' => '8', 'pais_id' => 13, 'codigo' => 'H', 'iso' => 'AR-H', 'nombre' => 'CHACO' ]);
        Provincia::create([ 'id' => '9', 'pais_id' => 13, 'codigo' => 'J', 'iso' => 'AR-J', 'nombre' => 'SAN JUAN' ]);
        Provincia::create([ 'id' => '10', 'pais_id' => 13, 'codigo' => 'K', 'iso' => 'AR-K', 'nombre' => 'CATAMARCA' ]);
        Provincia::create([ 'id' => '11', 'pais_id' => 13, 'codigo' => 'L', 'iso' => 'AR-L', 'nombre' => 'LA PAMPA' ]);
        Provincia::create([ 'id' => '12', 'pais_id' => 13, 'codigo' => 'M', 'iso' => 'AR-M', 'nombre' => 'MENDOZA' ]);
        Provincia::create([ 'id' => '13', 'pais_id' => 13, 'codigo' => 'N', 'iso' => 'AR-N', 'nombre' => 'MISIONES' ]);
        Provincia::create([ 'id' => '14', 'pais_id' => 13, 'codigo' => 'P', 'iso' => 'AR-P', 'nombre' => 'FORMOSA' ]);
        Provincia::create([ 'id' => '15', 'pais_id' => 13, 'codigo' => 'Q', 'iso' => 'AR-Q', 'nombre' => 'NEUQUÉN' ]);
        Provincia::create([ 'id' => '16', 'pais_id' => 13, 'codigo' => 'R', 'iso' => 'AR-R', 'nombre' => 'RÍO NEGRO' ]);
        Provincia::create([ 'id' => '17', 'pais_id' => 13, 'codigo' => 'S', 'iso' => 'AR-S', 'nombre' => 'SANTA FE' ]);
        Provincia::create([ 'id' => '18', 'pais_id' => 13, 'codigo' => 'T', 'iso' => 'AR-T', 'nombre' => 'TUCUMÁN' ]);
        Provincia::create([ 'id' => '19', 'pais_id' => 13, 'codigo' => 'U', 'iso' => 'AR-U', 'nombre' => 'CHUBUT' ]);
        Provincia::create([ 'id' => '20', 'pais_id' => 13, 'codigo' => 'V', 'iso' => 'AR-V', 'nombre' => 'TIERRA DEL FUEGO' ]);
        Provincia::create([ 'id' => '21', 'pais_id' => 13, 'codigo' => 'W', 'iso' => 'AR-W', 'nombre' => 'CORRIENTES' ]);
        Provincia::create([ 'id' => '22', 'pais_id' => 13, 'codigo' => 'X', 'iso' => 'AR-X', 'nombre' => 'CÓRDOBA' ]);
        Provincia::create([ 'id' => '23', 'pais_id' => 13, 'codigo' => 'Y', 'iso' => 'AR-Y', 'nombre' => 'JUJUY' ]);
        Provincia::create([ 'id' => '24', 'pais_id' => 13, 'codigo' => 'Z', 'iso' => 'AR-Z', 'nombre' => 'SANTA CRUZ' ]);
    }
}
