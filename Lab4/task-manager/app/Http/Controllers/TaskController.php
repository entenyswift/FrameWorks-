<?php
//taskController.php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    public function index()
    {
    $tasks = Task::with('category')->get();
    return view('tasks.index', compact('tasks'));
    }

    public function create() {
        $categories = Category::all();
        return view('tasks.create', compact('categories'));
    }

    public function store(CreateTaskRequest $request) {
        Task::create($request->validated());
        return redirect()->route('tasks.create')->with('success', 'Задача добавлена!');
    }

    public function edit(Task $task)
    {
        $categories = Category::all(); // Получение списка категорий
        return view('tasks.edit', compact('task', 'categories'));
    }
    
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        return redirect()->route('tasks.edit', $task)->with('success', 'Задача обновлена!');
    }
    
    public function show(Task $task){
        return view('tasks.show', compact('task'));

    }

}
