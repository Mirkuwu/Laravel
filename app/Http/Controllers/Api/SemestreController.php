<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Semestre;
use Illuminate\Http\Request;

class SemestreController extends Controller
{

    public function index(Request $request)
    {
        // $request->validate([
        // 'semestre' => 'nullable|integer|min:2000|max:' . (Carbon::now()->year + 1)
        //  ]);

        // $fecha = $request->query('year', Carbon::now()->year);
        // $index = Matricula::whereYear('created_at', $fecha)->get();

        // return response()->json([
        //     'Matriculas' => $index
        // ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 'semestre',
		// 'fecInicio',
		// 'fecFinal',
		// 'estado'
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Semestre $semestre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Semestre $semestre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Semestre $semestre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Semestre $semestre)
    {
        //
    }
}
