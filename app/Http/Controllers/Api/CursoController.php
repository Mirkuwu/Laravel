<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CursoDocente;

class CursoController extends Controller
{
    public function storeCurso(Request $request)
    {
        try{
            $curso = Curso::create(
            [
                'codCursos' => $request->codCursos,
                'nomCursos' => $request->nomCursos,
                'especialidad' => $request->especialidad,
                'sisEvaluacion' => $request->sisEvaluacion,
                'horTeoria' => $request->horTeoria,
                'horPractica' => $request->horPractica,
                'horLaboratorio' => $request->horLaboratorio,
                'creditos' => $request->creditos,
                'preRequisitos' => $request->preRequisitos,
                'verCurricular' => $request->verCurricular,
            ]);
            return response()->json([
                'message' => 'Curso creado correctamente',
            ], 201);
        }
        catch (\Exception $e) {
        return response()->json([
            'message' => 'Error al crear el curso: ' . $e->getMessage(),
        ], 500);
        }
    }

    public function destroyCurso($id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();

        return response()->json([
            'message' => 'Curso eliminado correctamente'
        ],200);
    }
    public function storeCursoDocente(Request $request)
    {
        $CursoDocente = CursoDocente::create([
            'docente_id' => $request->docente_id,
            'curso_id' => $request->curso_id,
            'seccion' => $request->seccion,
        ]);
        return response()->json([
            'message' => 'Curso y docente asignados correctamente',
            'data' => $CursoDocente
        ], 201);
    }

    public function destroyCursoDocente($id)
    {
        $CursoDocente = CursoDocente::findOrFail($id);
        $CursoDocente->delete();

        return response()->json([
            'message' => 'Curso y docente eliminados correctamente'
        ], 200);
    }
}
