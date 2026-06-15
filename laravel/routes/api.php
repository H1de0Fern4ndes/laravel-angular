<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/aluno')->group(function(){
    Route::post('/add', [App\Http\Controllers\AlunoController::class, 'add'])->name('aluno.add');
}); 

Route::prefix('/curso')->group(function(){
    Route::post('/add', [App\Http\Controllers\CursoController::class, 'add'])->name('curso.add');
}); 

Route::prefix('/professor')->group(function(){
    Route::post('/add', [App\Http\Controllers\ProfessorController::class, 'add'])->name('professor.add');
}); 

Route::prefix('/componente')->group(function(){
    Route::post('/add', [App\Http\Controllers\ComponenteController::class, 'add'])->name('componente.add');
}); 

Route::prefix('/administrador')->group(function(){
    Route::post('/add', [App\Http\Controllers\AdministradorController::class, 'add'])->name('administrador.add');
}); 