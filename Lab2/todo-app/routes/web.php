<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;

// Маршруты для главной страницы и страницы "О нас"
Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);

// Группировка маршрутов для задач
Route::prefix('tasks')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/{id}', [TaskController::class, 'show'])->name('tasks.show')->where('id', '[0-9]+');
});

// Использование ресурсного контроллера для задач
Route::resource('tasks', TaskController::class);
