<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Events\StockUpdated;

class ProductoController extends Controller
{
    

    public function index()
    {
        return response()->json(Producto::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'tienda_id' => 'required|exists:tiendas,id', // Validamos que el tiend_id exista en la tabla tiendas
        ]);

        $producto = Producto::create($request->all());
        return response()->json($producto, 201);
    }

    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return response()->json($producto);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'tienda_id' => 'required|exists:tiendas,id', // Validamos que el tiend_id exista en la tabla tiendas
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update($request->all());

        event(new StockUpdated($producto->id, $request->stock));

        return response()->json($producto);
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return response()->json(null, 204);
    }
}
