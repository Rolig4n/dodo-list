<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefaController;

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

Route::get('/tarefas', [TarefaController::class, 'index'])->name('tarefas.index');

Route::get('/tarefas/create', [TarefaController::class, 'create'])->name('tarefas.create');

Route::post('/tarefas', [TarefaController::class, 'store'])->name('tarefas.store');

Route::get('/tarefas/{tarefa}/edit', [TarefaController::class, 'edit'])->name('tarefas.edit');

Route::get('/tarefas/{tarefa}/update', [TarefaController::class, 'update'])->name('tarefas.update');

Route::delete('/tarefas/{tarefa}/destroy', [TarefaController::class, 'destroy'])->name('tarefas.destroy');