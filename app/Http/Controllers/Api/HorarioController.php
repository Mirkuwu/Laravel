<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\Docente;
use App\Models\CursoDocente;
use Illuminate\Http\Request;

/*  Error tremendo que hay aqui, el controlador no esta
    cumpliendo el principio de responsabilidad unica
    de momento funciona asi que no lo cambiare hasta terminar,
    deberia crear una carpeta Service dentro de app para poner
    toda la logica y llamarlo desde este controlador para que
    todo sea mas limpio.
*/
class HorarioController extends Controller
{
    public function horarioAlumno(Request $request)
    {
        $user = $request->user();
        $alumno = Alumno::where('Usuario_id', $user->id)->first();

         if (!$alumno) {
         return response()->json(['error' => 'Alumno no encontrado'], 404);
         }
        $estudiante = $alumno->id;

        $horarios = CursoDocente::whereHas('horarios.matricula_cursos.matricula.matricula_alumnos', function ($query) use ($estudiante) {
            $query->where('alumno_id', $estudiante);
        })
        ->with(['curso','docente', 'horarios.aula'])
        ->get()
        ->flatMap(function ($cursoDocente) {
            return $cursoDocente->horarios->map(function ($horario) use ($cursoDocente) {
                return [
                    'curso' => $cursoDocente->curso->nomCursos,
                    'codCurso' => $cursoDocente->curso->codCursos,
                    'seccion' => $cursoDocente->seccion,
                    'codDocente' => $cursoDocente->docente->codDocente ?? null,
                    'nombreDocente' =>$cursoDocente->docente->user->nombres,
                    'teopra' => $horario->tipo_sesion,
                    'hora' => $horario->hora,
                    'dia' => $horario->dia,
                    'aula' => $horario->aula->nombreAula ?? null
                ];
            });
        });

        return response()->json([
            'horario' => $horarios,
        ]);
    }
    public function horarioDocente(Request $request){
        $user = $request->user();
        $docente = Docente::where('Usuario_id', $user->id)->first();

        if (!$docente) {
            return response()->json(['error' => 'Docente no encontrado'], 404);
        }

        $horarios = CursoDocente::where('docente_id', $docente->id)
            ->with(['curso', 'horarios.aula'])
            ->get()
            ->flatMap(function ($cursoDocente) {
                return $cursoDocente->horarios->map(function ($horario) use ($cursoDocente) {
                    return [
                        'curso' => $cursoDocente->curso->nomCursos,
                        'codCurso' => $cursoDocente->curso->codCursos,
                        'seccion' => $cursoDocente->seccion,
                        'dia' => $horario->dia,
                        'hora' => $horario->hora,
                        'aula' => $horario->aula->nombreAula ?? null,
                    ];
                });
            });
         return response()->json([
            'horario' => $horarios,
        ]);
    }
}
