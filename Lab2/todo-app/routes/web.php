<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


// Маршруты для главной страницы и страницы "О нас"
Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);


