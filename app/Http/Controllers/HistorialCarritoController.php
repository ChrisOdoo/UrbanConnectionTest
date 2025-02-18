<?php

namespace App\Http\Controllers;

use App\Models\HistorialCarrito;
use Illuminate\Http\Request;

class HistorialCarritoController extends Controller
{
   

    // Mostrar todos los registros de historial
    public function index()
    {
        return response()->json(HistorialCarrito::all());
    }

    // Crear un nuevo registro en el historial del carrito
    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'tienda_id' => 'required|exists:tiendas,id',
            'vendedor_id' => 'required|exists:vendedores,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        $historial = HistorialCarrito::create($request->all());
        return response()->json($historial, 201);
    }

    // Mostrar un historial específico por su ID
    public function show($id)
    {
        $historial = HistorialCarrito::findOrFail($id);
        return response()->json($historial);
    }

    // Actualizar un historial específico
    public function update(Request $request, $id)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'tienda_id' => 'required|exists:tiendas,id',
            'vendedor_id' => 'required|exists:vendedores,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        $historial = HistorialCarrito::findOrFail($id);
        $historial->update($request->all());
        return response()->json($historial);
    }

    // Eliminar un historial específico
    public function destroy($id)
    {
        $historial = HistorialCarrito::findOrFail($id);
        $historial->delete();
        return response()->json(null, 204);
    }
}
