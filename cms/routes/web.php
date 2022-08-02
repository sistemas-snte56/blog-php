<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdministradoresController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ArticulosController;
use App\Http\Controllers\OpinionesController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\AnunciosController;

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
    return view('plantilla');
});

// Agregar la página como contenido dinamico
// Route::view('','paginas.blog');
// Route::view('/administradores','paginas.administradores');
// Route::view('/anuncios','paginas.anuncios');
// Route::view('/articulos','paginas.articulos');
// Route::view('/banner','paginas.banner');
// Route::view('/categorias','paginas.categorias');
// Route::view('/opiniones','paginas.opiniones');

Route::get('/', [BlogController::class, 'index']);
Route::get('/administradores', [AdministradoresController::class, 'index']);
Route::get('/categorias', [CategoriasController::class, 'index']);
Route::get('/articulos', [ArticulosController::class, 'index']);
Route::get('/opiniones', [OpinionesController::class, 'index']);
Route::get('/banner', [BannerController::class, 'index']);
Route::get('/anuncios', [AnunciosController::class, 'index']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
