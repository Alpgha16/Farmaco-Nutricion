<?php

use App\Http\Controllers\editController;
use App\Http\Controllers\farmacoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    Storage::disk("google")->put("test.txt", "Prueba Almacenamiento en Drive");
    return "Archivo almacenado correctamente";
    //return view('forms.farmaco');
});

Route::get('/grupos', function(){
    return view('home.grupos');
});

Route::get('/bibliografia', function(){
    return view('home.bibliografia');
});

Route::controller(farmacoController::class)->group(function(){
    Route::get('/farmacos', 'view_farmaco');
    Route::post('/farmacos', 'store_farmaco');
    Route::get('/grupos', 'view_grupo');
    Route::post('/grupos', 'store_grupo');
    Route::get('/bibliografia', 'view_bibliografia');
    Route::post('/bibliografia', 'store_bibliografia');
    Route::get('/interacciones/{id}', 'view_interaccion');
    Route::post('/interacciones', 'store_interaccion');
    Route::get('/relaciones/{id}', 'view_relaciones');
    Route::post('/relaciones', 'store_relacion');
    Route::get('/eliminar_farmaco/{id}', 'delete_farmaco');
    Route::get('/eliminar_interaccion/{id}/{id_inter}', 'delete_interaccion');
    Route::get('/eliminar_grupo/{id}', 'delete_grupo');
    Route::get('/eliminar_bibliografia/{id}', 'delete_bibliografia');
    Route::get('/eliminar_relacion/{id}/{id_rel}', 'delete_relacion');
    Route::get('/view_farmacos', 'view_farmacos');
    Route::get('/view_grupos', 'view_grupos');
    Route::get('/view_bibliografias', 'view_bibliografias');
});

Route::controller(editController::class)->group(function(){
    Route::get('/farmaco/editar/{id}', 'edit_farmaco');
    Route::get('/grupo/editar/{id}', 'edit_grupo');
    Route::get('/bibliografia/editar/{id}', 'edit_bibliografia');
    Route::get('/interaccion/editar/{id}/{id_inter}', 'edit_interaccion');
    Route::post('/farmacos/editar', 'update_farmaco');
    Route::post('/grupos/editar', 'update_grupo');
    Route::post('/bibliografia/editar', 'update_bibliografia');
    Route::post('/interaccion/editar', 'update_interaccion');
});