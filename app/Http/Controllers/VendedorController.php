<?php

namespace App\Http\Controllers;

use App\Models\Vendedor;
use Illuminate\Http\Request;

class VendedorController extends Controller
{

    public function index()
    {
        return response()->json(Vendedor::all());
    }

    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:vendedores,correo', // Validación para asegurar que el email no esté repetido
        ]);

        
        $vendedor = Vendedor::create($request->all());
        return response()->json($vendedor, 201);
    }

    public function show($id)
    {
        $vendedor = Vendedor::findOrFail($id);
        return response()->json($vendedor);
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:vendedores,correo', // Validación para asegurar que el email no esté repetido
        ]);

        
        $vendedor = Vendedor::findOrFail($id);
        $vendedor->update($request->all());
        return response()->json($vendedor);
    }

    public function destroy($id)
    {
        $vendedor = Vendedor::findOrFail($id);
        $vendedor->delete();
        return response()->json(null, 204);
    }
}
