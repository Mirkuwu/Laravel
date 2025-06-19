<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Matricula;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MatriculaController extends Controller
{

    public function indexMatricula(Request $request)
    {
        $request->validate([
        'year' => 'nullable|integer|min:2000|max:' . (Carbon::now()->year + 1)
         ]);


        $index = $fecha
        ? Matricula::whereYear('created_at', $fecha)->get()
        : Matricula::all();

        return response()->json([
                'Matriculas' => $index
            ], 200);
    }


    public function storeMatricula(Request $request)
    {
        $Matricula = Matricula::create([
            'semestre_id'=> $request->semeste_id,
		    'fec_ingreso'=> $request->fec_ingreso,
		    'ciclo'=> $request->ciclo
        ]);
         return response()->json([
                'message' => 'Matricula creado correctamente',
            ], 201);

    }

    public function storeMatricula_A(Request $request)
    {
        $Matricula = MatriculaAlumno::create([
        'alumno_id'=>$request->alumno_id,
		'matricula_id'=>$request->matricula_id
        ]);
    }


    public function storeMatricula_C(Request $request)
    {
        $Matricula = MatriculaCurso::create([
		'matricula_id'=>$request->matricula_id,
        'horario_id'=>$request->horario_id
        ]);
    }
}
