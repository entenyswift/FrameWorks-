<?php
//web.php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;

Route::resource('tasks', TaskController::class);
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');


Route::get('/', function () {
    return view('welcome');
});
