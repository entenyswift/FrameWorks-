<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{



    public function index()
    {
        // Получаем задачи для текущего пользователя
        $tasks = Task::where('user_id', auth()->id())->get();

        // Отправляем задачи в представление
        return view('dashboard', compact('tasks'));
    }

    public function adminTasks()
    {
        // Получаем все задачи всех пользователей
        $tasks = Task::with(['category', 'user'])->get();
    
        // Отправляем данные в представление
        return view('admin.Tasks.dashboard', compact('tasks'));
    }

    // Отображение всех задач пользователя
    public function userTasks()
    {
        // Получаем задачи для текущего авторизованного пользователя
        $tasks = Task::where('user_id', auth()->id())->with('category')->get();
        return view('dashboard', compact('tasks'));
    }

    // Функция для отображения формы создания задачи
    public function create()
    {
        // Получаем все категории для выбора
        $categories = Category::all();
        return view('tasks.create', compact('categories'));  // Передаем категории в представление
    }

    // Функция для сохранения новой задачи
    public function store(CreateTaskRequest $request)
    {
        // Создаем новую задачу с данными из формы
        Task::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'category_id' => $request->category_id,  // Сохраняем выбранную категорию
        ]);

        // Перенаправляем на панель управления с сообщением об успехе
        return redirect()->route('dashboard')->with('success', 'Задача успешно создана!');
    }

    // Функция для отображения формы редактирования задачи
    public function edit(Task $task)
    {
        // Получаем все категории для выбора
        $categories = Category::all();
        return view('tasks.edit', compact('task', 'categories')); // Передаем задачу и категории в представление
    }

    // Функция для обновления задачи
    public function update(UpdateTaskRequest $request, Task $task)
    {

        // Обновляем задачу с данными из формы
        $task->update($request->validated());

        // Перенаправляем на страницу редактирования с сообщением об успехе
        return redirect()->route('tasks.edit', $task)->with('success', 'Задача обновлена!');
    }

    // Функция для отображения подробностей задачи
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    // Функция для удаления задачи
    public function destroy(Task $task)
    {

        // Удаляем задачу
        $task->delete();

        // Перенаправляем на панель управления с сообщением об успехе
        return redirect()->route('dashboard')->with('success', 'Задача удалена.');
    }
}
