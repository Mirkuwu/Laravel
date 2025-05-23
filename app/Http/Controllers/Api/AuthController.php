<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAuthRequest;
use App\Http\Requests\RegisterAuthRequest;
use App\Models\User;
use App\Models\Alumno;
use App\Models\Docente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;

class AuthController extends Controller
{
    public function login(LoginAuthRequest $request)
    {
        try {
            $request->validated();
            $user = User::where('codUsuario', $request->codUsuario)->first();
            $scope = strtolower($user->cargo);

            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json([
                    'message' => 'Credenciales inválidas',
                ], 401);
            }

            return response()->json([
                'message' => 'Login exitoso',
                'user' => $user,
                'token' => $user->createToken('auth_token', [$scope])->plainTextToken,
                200
            ]);
        } catch (Exception $e) {

            return response()->json([
                'message' => 'Error interno del servidor',
                'error' => $e->getMessage(),
            ], 500);
        }

    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logout successful']);
    }


    public function register(RegisterAuthRequest $request)
    {

        $usuario = User::create([
            'codUsuario' => $request->input('codUsuario'),
            'password' => bcrypt($request->input('password')),
            'apePaterno' => $request->input('apePaterno'),
            'apeMaterno' => $request->input('apeMaterno'),
            'nombres' => $request->input('nombres'),
            'cargo' => $request->input('cargo'),
        ]);
    if ($request->cargo === 'alumno') {
        Alumno::create([
            'Usuario_id' => $usuario->id,
            'codAlumno' => $request->codUsuario,
            'especialidad' => $request->especialidad,
            'perIngreso' => $request->perIngreso,
            'usuSistema' => $request->usuSistema,
        ]);
    }
    elseif ($request->cargo === 'docente') {
        Docente::create([
            'Usuario_id' => $usuario->id,
            'codDocente' => $request->codUsuario,
            'codUni' => $request->codUni,
            'depAcademico' => $request->depAcademico,
            'dedicacion' => $request->dedicacion,
            'observacion' => $request->observacion,
            'condicion' => $request->condicion,
        ]);
    }
    return response()->json(['message' => 'Registro exitoso'], 201);
    }
}
