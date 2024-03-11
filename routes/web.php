<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AlumnoController;


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

Route::get('/school/form', [AlumnoController::class, 'form_alumno'])->name('school/alumno.form_alumno');
Route::get('/school/evidence', [AlumnoController::class, 'form_evidence'])->name('school/evidence.form_evidence');
Route::post('alumno/create', [AlumnoController::class, 'store'])->name('alumno/create.store');
Route::post('evidence/create', [AlumnoController::class, 'store_evidence'])->name('alumno/evidence.store_evidence');
Route::get('/school/list', [AlumnoController::class, 'list_alumno'])->name('school/listado.list_alumno');





