<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

class LogDemoController extends Controller
{
    public function testLogs()
    {

        Log::error('❌ Error: Prueba de error.');

        return response()->json([
            'message' => 'Logs generados. Revisa Laravel Telescope o storage/logs/laravel.log'
        ]);
    }
}
