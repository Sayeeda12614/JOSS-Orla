<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\IntegrantesApi;
use \App\Http\Controllers\CiclosApi;
use \App\Http\Controllers\CursosApi;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("integrantes",[IntegrantesApi::class,"index"]);
Route::get("ciclos",[CiclosApi::class,"index"]);
Route::get("cursos",[CursosApi::class,"index"]);