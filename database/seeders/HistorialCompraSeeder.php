<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HistorialCarrito;

class HistorialCompraSeeder extends Seeder
{
    public function run()
    {
        HistorialCarrito::insert([
            ['cliente_id' => 1, 'producto_id' => 5, 'cantidad' => 2, 'total' => 3000, 'tienda_id' => 7, 'vendedor_id' => 1],
            ['cliente_id' => 1, 'producto_id' => 6, 'cantidad' => 1, 'total' => 50, 'tienda_id' => 7, 'vendedor_id' => 1],
            ['cliente_id' => 2, 'producto_id' => 7, 'cantidad' => 1, 'total' => 120, 'tienda_id' => 8, 'vendedor_id' => 1],
            ['cliente_id' => 3, 'producto_id' => 8, 'cantidad' => 1, 'total' => 300, 'tienda_id' => 9, 'vendedor_id' => 1]
        ]);
    }


}
