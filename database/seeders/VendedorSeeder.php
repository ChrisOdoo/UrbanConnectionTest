<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vendedor;

class VendedorSeeder extends Seeder
{
    public function run()
    {
        Vendedor::insert([
            ['nombre' => 'Juan Pérez', 'email' => 'juan@example.com'],
            ['nombre' => 'María López', 'email' => 'maria@example.com'],
            ['nombre' => 'Carlos Ramírez', 'email' => 'carlos@example.com']
        ]);
    }
}
