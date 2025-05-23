<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asistencia;
use App\Models\Matricula;
use App\Http\Requests\StoreAsistenciaRequest;
use App\Models\Alumno;
use App\Models\User;

class AsistenciaController extends Controller
{
    public function asistenciaAlumnos()
    {
       $asistenciasAlumnos = Asistencia::whereHas('usuario.alumno')->get();
         return response()->json([
              'asistenciasAlumnos' => $asistenciasAlumnos,
         ]);
    }
    public function storaAsistenciaAlumno(StoreAsistenciaRequest $request, $id)
    {

        $alumno = Alumno::find($id);

        $comprobacion = Matricula::whereHas('alumnos', function ($query) use ($alumno) {
            $query->where('Usuario_id', $alumno->Usuario_id);
        })->whereHas('matricula_cursos.horario', function ($query) use ($request) {
            $query->where('id', $request->horario_id);
        })->first();

        if (!$comprobacion) {
            return response()->json(['error' => 'No se encontró la matrícula'], 404);
        }

        $asistencia = Asistencia::create([
            'horario_id' => $request->horario_id,
            'usuario_id' => $alumno->Usuario_id,
            'fecha' => $request->fecha,
            'estado' => $request->estado,
            'hora_entrada' => $request->hora_entrada,
            'hora_salida' => $request->hora_salida
        ]);

        return response()->json([
            'asistencia' => $asistencia,
        ]);
    }
}
