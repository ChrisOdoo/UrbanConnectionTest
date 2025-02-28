<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Events\StockUpdated;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    /**
     * Verifica que el usuario autenticado tenga el rol "vendedor".
     *
     * @return \Illuminate\Http\JsonResponse|null
     */
    private function authorizeVendedorActions()
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'No autenticado'], 401);
        }
        
        // Obtenemos los nombres de los roles asignados al usuario
        $roles = $user->roles->pluck('name');
        
        // Si el usuario no tiene el rol "vendedor", se retorna error 403
        if (!$roles->contains('vendedor')) {
            return response()->json(['message' => 'No autorizado'], 403);
        }
        
        return null;
    }

    public function index()
    {
        return response()->json(Producto::all());
    }

    public function store(Request $request)
    {
        if ($response = $this->authorizeVendedorActions()) {
            return $response;
        }

        $request->validate([
            'nombre'    => 'required|string|max:255',
            'precio'    => 'required|numeric|min:0',
            'stock'     => 'required|integer|min:0',
            'tienda_id' => 'required|exists:tiendas,id',
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
        if ($response = $this->authorizeVendedorActions()) {
            return $response;
        }

        $request->validate([
            'nombre'    => 'required|string|max:255',
            'precio'    => 'required|numeric|min:0',
            'stock'     => 'required|integer|min:0',
            'tienda_id' => 'required|exists:tiendas,id',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update($request->all());

        

        event(new StockUpdated($producto->id, $request->stock));

        return response()->json($producto);
    }

    public function destroy($id)
    {
        if ($response = $this->authorizeVendedorActions()) {
            return $response;
        }

        $producto = Producto::findOrFail($id);
        $producto->delete();
        return response()->json(null, 204);
    }
}
