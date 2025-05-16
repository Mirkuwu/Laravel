<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\CursoDocente;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function horario(Request $request)
    {
        $user = $request->user();
        $estudiante = Alumno::where('Usuario_id', $user->id)->first()->id;

    $horario = CursoDocente::whereHas('horarios.matricula_cursos.matricula.matricula_alumnos', function ($query) use ($estudiante) {
        $query->where('alumno_id', $estudiante);
    })->with('curso')
    ->get()
    ->pluck('curso.nomCursos');

        return response()->json([
            'horario' => $horario,
        ]);
    }
}
