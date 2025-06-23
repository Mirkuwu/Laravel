<?php

namespace App\Services;

use App\Models\Alumno;
use App\Models\Docente;
use App\Models\CursoDocente;
use App\Models\Horario;

class HorarioService
{
    public function obtenerHorarioAlumno($userId)
    {
        $alumno = Alumno::where('Usuario_id', $userId)->first();

        if (!$alumno) {
            return null;
        }

        $estudianteId = $alumno->id;

        return CursoDocente::whereHas('horarios.matricula_cursos.matricula.matricula_alumnos', function ($query) use ($estudianteId) {
                $query->where('alumno_id', $estudianteId);
            })
            ->with(['curso', 'docente', 'horarios.aula'])
            ->get()
            ->flatMap(function ($cursoDocente) {
                return $cursoDocente->horarios->map(function ($horario) use ($cursoDocente) {
                    return [
                        'curso' => $cursoDocente->curso->nomCursos,
                        'codCurso' => $cursoDocente->curso->codCursos,
                        'seccion' => $cursoDocente->seccion,
                        'codDocente' => $cursoDocente->docente->codDocente ?? null,
                        'nombreDocente' => $cursoDocente->docente->user->nombres ?? null,
                        'teopra' => $horario->tipo_sesion,
                        'hora' => $horario->hora,
                        'dia' => $horario->dia,
                        'aula' => $horario->aula->nombreAula ?? null,
                    ];
                });
            });
    }

    public function obtenerHorarioDocente($userId)
    {
        $docente = Docente::where('Usuario_id', $userId)->first();

        if (!$docente) {
            return null;
        }

        return CursoDocente::where('docente_id', $docente->id)
            ->with(['curso', 'horarios.aula'])
            ->get()
            ->flatMap(function ($cursoDocente) {
                return $cursoDocente->horarios->map(function ($horario) use ($cursoDocente) {
                    return [
                        'horario_id' => $horario->id,
                        'curso' => $cursoDocente->curso->nomCursos,
                        'codCurso' => $cursoDocente->curso->codCursos,
                        'seccion' => $cursoDocente->seccion,
                        'dia' => $horario->dia,
                        'hora' => $horario->hora,
                        'aula' => $horario->aula->nombreAula ?? null,
                    ];
                });
            });
    }

    public function crearHorario(array $data)
    {
        return Horario::create($data);
    }
}
