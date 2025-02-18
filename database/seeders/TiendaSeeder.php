<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tienda;

class TiendaSeeder extends Seeder
{
    public function run()
    {
        Tienda::insert([
            ['nombre' => 'Tienda Central', 'direccion' => 'Av. Principal 123', 'vendedor_id' => 1],
            ['nombre' => 'Tienda Norte', 'direccion' => 'Calle Secundaria 456', 'vendedor_id' => 1],
            ['nombre' => 'Tienda Sur', 'direccion' => 'Av. Industrial 789', 'vendedor_id' => 1]
        ]);
    }
}

