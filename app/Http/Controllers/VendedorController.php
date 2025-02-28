<?php

namespace App\Http\Controllers;

use App\Models\Vendedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class VendedorController
{
    private function authorizeVendedor()
    {
        $user = auth()->user();
        if (!$user) {

            

            return response()->json(['message' => 'No autenticado'], 401);
        }
        // Obtiene los nombres de los roles asignados al usuario
        $roles = $user->roles->pluck('name');
        // Si el usuario tiene el rol "cliente", se le niega el acceso
        if ($roles->contains('cliente')) {
            return response()->json(['message' => 'No autorizado'], 403);
        }
        return null; // Autorizado
    }


    public function index()
    {
        if ($response = $this->authorizeVendedor()) {
            return $response;
        }

        return response()->json(User::all());
    }

    public function store(Request $request)
    {
        if ($response = $this->authorizeVendedor()) {
            return $response;
        }

        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:vendedores,correo',
        ]);

        $vendedor = User::create($request->all());
        return response()->json($vendedor, 201);
    }

    public function show($id)
    {
       
        if ($response = $this->authorizeVendedor()) {
            return $response;
        }

        $vendedor = User::findOrFail($id);


        return response()->json($vendedor);
    }

    public function update(Request $request, $id)
    {
        if ($response = $this->authorizeVendedor()) {
            return $response;
        }

        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:vendedores,correo',
        ]);

        $vendedor = User::findOrFail($id);
        $vendedor->update($request->all());
        return response()->json($vendedor);
    }

    public function destroy($id)
    {
        if ($response = $this->authorizeVendedor()) {
            return $response;
        }

        $vendedor = User::findOrFail($id);
        $vendedor->delete();
        return response()->json(null, 204);
    }
}
