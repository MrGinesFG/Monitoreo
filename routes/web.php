<?php
use App\Http\Controllers\DemoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServerController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/demo/abrir/{app}', [DemoController::class, 'abrir'])
->whereIn('app', ['calculadora', 'bloc'])
->middleware('throttle:2,1'); // cada PC puede abrir 2 programas por minuto
Route::get('/graficos', fn () => view('graficos'));
Route::get('/servidor', [ServerController::class, 'index']);