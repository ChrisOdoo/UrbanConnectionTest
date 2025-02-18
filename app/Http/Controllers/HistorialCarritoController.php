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
            'cliente_id' => 'required|exists:clientes,id', // Verifica que el cliente exista
            'producto_id' => 'required|exists:productos,id', // Verifica que el producto exista
            'tienda_id' => 'required|exists:tiendas,id', // Verifica que la tienda exista
            'vendedor_id' => 'required|exists:vendedores,id', // Verifica que el vendedor exista
            'cantidad' => 'required|integer|min:1', // Asegura que la cantidad sea un número entero y mayor a 0
            'total' => 'required|numeric|min:0', // Asegura que el total sea un número válido
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
            'cliente_id' => 'required|exists:clientes,id', // Verifica que el cliente exista
            'producto_id' => 'required|exists:productos,id', // Verifica que el producto exista
            'tienda_id' => 'required|exists:tiendas,id', // Verifica que la tienda exista
            'vendedor_id' => 'required|exists:vendedores,id', // Verifica que el vendedor exista
            'cantidad' => 'required|integer|min:1', // Asegura que la cantidad sea un número entero y mayor a 0
            'total' => 'required|numeric|min:0', // Asegura que el total sea un número válido
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
