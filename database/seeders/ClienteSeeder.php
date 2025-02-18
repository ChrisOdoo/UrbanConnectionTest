<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    public function run()
    {
        Cliente::insert([
            ['nombre' => 'Luis García', 'correo' => 'luis@example.com'],
            ['nombre' => 'Ana Rodríguez', 'correo' => 'ana@example.com'],
            ['nombre' => 'Pedro Fernández', 'correo' => 'pedro@example.com']
        ]);
    }
}

