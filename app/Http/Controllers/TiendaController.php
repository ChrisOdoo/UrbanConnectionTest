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
