<?php

namespace App\Http\Controllers;

use App\Models\Tienda;
use Illuminate\Http\Request;

class TiendaController extends Controller
{

    public function index()
    {
        return response()->json(Tienda::all());
    }

    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'vendedor_id' => 'required|exists:vendedores,id', // Asegura que el vendedor exista
        ]);


        $tienda = Tienda::create($request->all());
        return response()->json($tienda, 201);
    }

    public function show($id)
    {
        $tienda = Tienda::findOrFail($id);
        return response()->json($tienda);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'vendedor_id' => 'required|exists:vendedores,id', // Asegura que el vendedor exista
        ]);

        
        $tienda = Tienda::findOrFail($id);
        $tienda->update($request->all());
        return response()->json($tienda);
    }

    public function destroy($id)
    {
        $tienda = Tienda::findOrFail($id);
        $tienda->delete();
        return response()->json(null, 204);
    }
}
