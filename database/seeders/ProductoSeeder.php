<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        Producto::insert([
            ['nombre' => 'Laptop Dell', 'precio' => 1500, 'stock' => 10, 'tienda_id' => 7],
            ['nombre' => 'Mouse Logitech', 'precio' => 50, 'stock' => 100, 'tienda_id' => 7],
            ['nombre' => 'Teclado Mecánico', 'precio' => 120, 'stock' => 50, 'tienda_id' => 8],
            ['nombre' => 'Monitor 24"', 'precio' => 300, 'stock' => 30, 'tienda_id' => 9]
        ]);
    }
}

