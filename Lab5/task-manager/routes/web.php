<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
| Здесь вы можете зарегистрировать маршруты вашего приложения.
| Эти маршруты загружаются RouteServiceProvider, и все они будут
| работать в группе middleware "web".
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Маршруты, доступные только для авторизованных пользователей
Route::middleware(['auth'])->group(function() {
    // Панель управления
    Route::get('/dashboard', [AuthController::class, 'index'])->name('dashboard');
    
    // Просмотр профиля пользователя
    Route::get('/dashboard/user/{user}', [AuthController::class, 'showUser'])->name('dashboard.user.show');
    
    // Страница управления пользователями для администраторов
    Route::get('/dashboard/users', [AuthController::class, 'manageUsers'])->name('dashboard.users');
    
    // Просмотр задач пользователя (персональные задачи)
    Route::get('/dashboard', [TaskController::class, 'userTasks'])->name('dashboard');
    
    // Создание задачи
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    
    // Редактирование задачи
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    
    // Удаление задачи
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});

// Маршруты для редактирования профиля пользователя
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Панель администратора
Route::middleware(['auth'])->get('/admin/tasks', [TaskController::class, 'adminTasks'])->name('admin.tasks');





require __DIR__.'/auth.php';
