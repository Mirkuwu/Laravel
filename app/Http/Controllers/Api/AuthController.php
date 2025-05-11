<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterAuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'usuario' => 'required|string|max:10',
                'password' => 'required|string',
            ]);

            $user = User::where('codUsuario', $request->input('usuario'))->first();

            if (!$user || !Hash::check($request->input('password'), $user->password)) {
                return response()->json([
                    'message' => 'Credenciales inválidas',
                ], 401);
            }

            return response()->json([
                'message' => 'Login exitoso',
                'user' => $user,
                'token' => $user->createToken('auth_token')->plainTextToken,
                200
            ]);
        } catch (Exception $e) {

            return response()->json([
                'message' => 'Error interno del servidor',$e
            ], 500);
        }

    }

    public function logout(Request $request)
    {
        return response()->json(['message' => 'Logout successful']);
    }
    public function register(RegisterAuthRequest $request)
    {
        $usuario = User::create([
            'codUsuario' => $request->input('usuario'),
            'password' => bcrypt($request->input('password')),
            'apePaterno' => $request->input('apePaterno'),
            'apeMaterno' => $request->input('apeMaterno'),
            'nombres' => $request->input('nombres'),
            'cargo' => $request->input('cargo'),
        ]);

        if($request->tipo== 'alumno'){
            $usuario->alumno()->create([
                'codAlumno' => $request->input('usuario'),
                'especialidad' => $request->input('especialidad'),
                'perIngreso' => $request->input('perIngreso'),
                'usuSistema' => $request->input('usuSistema'),
            ]);
        }


        return response()->json(['message' => 'Registration successful']);
    }
}
