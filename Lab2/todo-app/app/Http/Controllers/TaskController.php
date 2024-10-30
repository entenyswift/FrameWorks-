<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Метод для отображения списка задач
    public function index()
    {
        // На данный момент возвращаем статический список задач
        $tasks = [
            ['id' => 1, 'title' => 'Task 1', 'description' => 'Description of Task 1'],
            ['id' => 2, 'title' => 'Task 2', 'description' => 'Description of Task 2'],
            ['id' => 3, 'title' => 'Task 3', 'description' => 'Description of Task 3'],
        ];

        // Передаем список задач в шаблон tasks/index.blade.php
        return view('tasks.index', compact('tasks'));
    }

    // Метод для отображения конкретной задачи
    public function show($id)
    {
        // Возвращаем статические данные задачи
        $task = [
            'id' => $id,
            'title' => "Task $id",
            'description' => "Description of Task $id",
            'created_at' => now(),
            'updated_at' => now(),
        ];

        // Передаем задачу в шаблон tasks/show.blade.php
        return view('tasks.show', compact('task'));
    }

    // Метод для отображения формы создания новой задачи (пока пустой)
    public function create()
    {
        return view('tasks.create');
    }

    // Метод для сохранения новой задачи (пока пустой)
    public function store(Request $request)
    {
        // Логика сохранения будет добавлена позже
    }

    // Метод для редактирования задачи (пока пустой)
    public function edit($id)
    {
        $task = [
            'id' => $id,
            'title' => 'Название задачи',
            'description' => 'Описание задачи'
        ];
    
        return view('tasks.edit', ['task' => $task]);
    }

    // Метод для обновления задачи (пока пустой)
    public function update(Request $request, $id)
    {
        // Логика обновления будет добавлена позже
    }

    // Метод для удаления задачи (пока пустой)
    public function destroy($id)
    {
        // Логика удаления будет добавлена позже
    }
}
