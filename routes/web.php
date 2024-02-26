<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;;


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
    return view('welcome');
});

Route::get('/project/create', [ProjectController::class, 'index'])->name('project/create.index');
Route::get('/project/listado', [ProjectController::class, 'listado'])->name('project/listado.listado');
Route::post('form/store', [ProjectController::class, 'store'])->name('guardar_todo');



