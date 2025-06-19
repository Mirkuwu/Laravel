<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDireccionRequest;
use App\Http\Requests\StoreInfoFamiliarRequest;
use App\Http\Requests\StoreInfoProfesionalRequest;
use App\Models\Direccione;
use App\Models\InfoFamiliar;
use App\Models\InfoProfesional;
use Illuminate\Database\Eloquent\Model;

class InformacionController extends Controller
{
    public function direcciones(Request $request)
    {
        $user = $request->user()->load('direcciones');

        if ($user->direcciones->isEmpty()) {
            return response()->json(['error' => 'No se encontraron direcciones'], 404);
        }

        return response()->json([
            'direcciones' => $user->direcciones
        ]);
    }

    public function infofamiliar(Request $request)
    {
        $user = $request->user()->load('infoFamiliar');
        if ($user->infoFamiliar->isEmpty()) {
            return response()->json(['error' => 'No se encontraron registros'], 404);
        }
        return response()->json([
            'infoFamiliar' => $user->infoFamiliar,
        ]);

    }

    public function infoProfesional(Request $request)
    {
        $user = $request->user()->load('infoProfecional');

        if ($user->infoProfecional->isEmpty()) {
            return response()->json(['error' => 'No se encontraron registros'], 404);
        }

        return response()->json([
            'infoProfecional' => $user->infoProfecional,
        ]);
    }


    public function storeDireccion(StoreDireccionRequest $request)
    {
        $user = $request->user();

        $direccion = Direccione::create([
            'Usuario_id' => $user->id,
            ...$request->validated()
        ]);

        return response()->json(['mensaje' => 'Dirección registrada con éxito', 'data' => $direccion], 201);
    }

    public function storeInfoFamiliar(StoreInfoFamiliarRequest $request)
    {
        $user = $request->user();

        $familiar = InfoFamiliar::create([
            'Usuario_id' => $user->id,
            ...$request->validated()
        ]);

        return response()->json(['mensaje' => 'Familiar registrado con éxito', 'data' => $familiar], 201);
    }

    public function storeInfoProfesional(StoreInfoProfesionalRequest $request)
    {
        $user = $request->user();

        $info = InfoProfesional::create([
            'Usuario_id' => $user->id,
            ...$request->validated()
        ]);

        return response()->json(['mensaje' => 'Información profesional registrada con éxito', 'data' => $info], 201);
    }


    public function destroyDireccion(Request $request ,$id)
    {
        $direccion = Direccione::findOrFail($id);
        $this->authorizeOwnership($direccion, $request);

        $direccion->delete();
        return response()->json(['mensaje' => 'Dirección eliminada'], 200);
    }

    public function destroyInfoFamiliar(Request $request, $id)
    {
        $familiar = InfoFamiliar::findOrFail($id);
        $this->authorizeOwnership($familiar, $request);

        $familiar->delete();
        return response()->json(['mensaje' => 'Familiar eliminado'], 200);
    }

    public function destroyInfoProfesional(Request $request , $id)
    {
        $info = InfoProfesional::findOrFail($id);
        $this->authorizeOwnership($info, $request);

        $info->delete();
        return response()->json(['mensaje' => 'Información profesional eliminada'], 200);
    }


    
    private function authorizeOwnership(Model $model, Request $request)
    {
        if ($model->Usuario_id !== $request->user()->id) {
            abort(403, 'No autorizado.');
        }
    }
}
