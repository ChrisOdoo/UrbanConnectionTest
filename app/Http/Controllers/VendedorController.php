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
