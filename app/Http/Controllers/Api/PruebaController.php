<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use OpenApi\Annotations as OA;


/**
* @OA\Info(title="L5 Swagger UI", version="1.0")
*
* @OA\Server(url="http://swagger.local")
*/


class PruebaController extends Controller
{
   /**
    * @OA\Get(
    *     path="/api/usuarios",
    *     summary="Mostrar usuarios",
    *     @OA\Response(
    *         response=200,
    *         description="Mostrar todos los usuarios."
    *     ),
    *     @OA\Response(
    *         response="default",
    *         description="Ha ocurrido un error."
    *     )
    * )
    */

   
    public function listar_usuarios()
    {
        $lista_usuarios = User::all();
        return $lista_usuarios;

    }
}
