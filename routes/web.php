<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\ClavesController;
use App\Http\Controllers\CiclosController;
use App\Http\Controllers\IntegrantesController;
use App\Http\Controllers\AccesoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas para los cursos
Route::resource("cursos",CursosController::class);

//Rutas para los Ciclos
Route::resource("admin/ciclos",CiclosController::class);

//Ruta controlada, solo podrán acceder a ella los tutores
Route::group(['middleware'=>['auth.basic','auth.tutor']],function(){
   //Rutas para los Integrantes, y dejamos libre la ruta para crear
    Route::resource("integrantes",IntegrantesController::class,["except"=>["create"]]);
    //Rutas para las claves
    Route::resource("claves",ClavesController::class);
}); 
//Rutas para los el control de claves
Route::resource("control",AccesoController::class);