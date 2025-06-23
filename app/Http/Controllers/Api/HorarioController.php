<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\HorarioService;

class HorarioController extends Controller
{
    protected $horarioService;

    public function __construct(HorarioService $horarioService)
    {
        $this->horarioService = $horarioService;
    }

    public function horarioAlumno(Request $request)
    {
        $user = $request->user();
        $horarios = $this->horarioService->obtenerHorarioAlumno($user->id);

        if (is_null($horarios)) {
            return response()->json(['error' => 'Alumno no encontrado'], 404);
        }

        return response()->json(['horario' => $horarios]);
    }

    public function horarioDocente(Request $request)
    {
        $user = $request->user();
        $horarios = $this->horarioService->obtenerHorarioDocente($user->id);

        if (is_null($horarios)) {
            return response()->json(['error' => 'Docente no encontrado'], 404);
        }

        return response()->json(['horario' => $horarios]);
    }

    public function storeHorario(Request $request)
    {
        $request->validate([
            'codHorario' => 'required|string',
            'curso_docente_id' => 'required|exists:curso_docente,id',
            'aula_id' => 'required|exists:aulas,id',
            'dia' => 'required|string',
            'hora' => 'required|string',
            'tipo_sesion' => 'required|string',
            'tope' => 'required|integer',
            'estado' => 'required|string',
        ]);

        $this->horarioService->crearHorario($request->all());

        return response()->json(['message' => 'Horario creado correctamente']);
    }
}
