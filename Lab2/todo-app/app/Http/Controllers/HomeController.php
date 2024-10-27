<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Метод для главной страницы
    public function index()
    {
        // Возвращает представление home.blade.php
        return view('home');
    }

    // Метод для страницы "О нас"
    public function about()
    {
        // Возвращает представление about.blade.php
        return view('about');
    }
}
