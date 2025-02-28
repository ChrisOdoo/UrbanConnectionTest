<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{

    private function authorizeDelete()
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'No autenticado'], 401);
        }

        $roles = $user->roles->pluck('name');

        if ($roles->contains('cliente')) {
            return response()->json(['message' => 'No autorizado'], 403);
        }
        return null;
    }

    public function index()
    {
        return response()->json(Cliente::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:clientes,correo',
        ]);

        $cliente = Cliente::create($request->all());
        return response()->json($cliente, 201);
    }

    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return response()->json($cliente);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:clientes,correo',
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        return response()->json($cliente);
    }

    public function destroy($id)
    {
        // Verifica la autorización antes de eliminar
        if ($response = $this->authorizeDelete()) {
            return $response;
        }

        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return response()->json(null, 204);
    }
}
