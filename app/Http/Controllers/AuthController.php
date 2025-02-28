<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\Role;

class AuthController extends Controller
{
    // Método para registrar un nuevo usuario
    public function register(Request $request)
    {
            // Validar los datos de entrada
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'role' => 'required|string|max:30', 
            ]);

             // Crear los roles si no existen
            if($request->role == "vendedor" || $request->role == "cliente"){
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $role = Role::firstOrCreate(['name' => $request->role]);

            if (!$role->exists) {
                throw ValidationException::withMessages(['role' => 'Hubo un problema al crear el rol.']);
            }

            }else{
                  return response()->json(['message' => 'Rol no valido solo clientes y vendedores.'], 401);
            }
            // Guardar la relación en role_user
            $user->roles()->attach($role->id);
        return response()->json(['message' => 'User registered successfully'], 201);
    }

    // Método para iniciar sesión
    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Credenciales incorrectas'], 401);
    }

    // Crear y devolver el token
    $token = $user->createToken('YourAppName')->plainTextToken;

    return response()->json([
        'token' => $token,
    ]);
}
}