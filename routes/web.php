<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\TodolistController;

Route::get('/', [TodolistController::class, 'index'])->name('tasks.index');

Route::get('/tasks/create', [TodolistController::class, 'create'])->name('tasks.create');
Route::post('/tasks/store', [TodolistController::class, 'store'])->name('tasks.store');

Route::get('/tasks/detail/{id}', [TodolistController::class, 'show'])->name('tasks.show');

Route::post('/tasks/update/{id}', [TodolistController::class, 'updateStatus'])->name('tasks.status');

Route::get('/tasks/edit/{id}', [TodolistController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/update/{id}', [TodolistController::class, 'update'])->name('tasks.update');

Route::delete('/tasks/destroy/{id}', [TodolistController::class, 'destroy'])->name('tasks.destroy');




