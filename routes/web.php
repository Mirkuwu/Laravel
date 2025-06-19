<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\LogDemoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/log-demo', [LogDemoController::class, 'testLogs']);


Route::get('/api/documentation', function () {
    return view('l5-swagger::index');
});