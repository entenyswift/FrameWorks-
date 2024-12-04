<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список задач</title>
</head>
<body>
    <h1>Список задач</h1>
    <a href="{{ route('tasks.create') }}">Добавить новую задачу</a>
    <ul>
        @foreach($tasks as $task)
            <li>
                {{ $task->title }} ({{ $task->category->name }})
                <a href="{{ route('tasks.edit', $task->id) }}">Редактировать</a>
            </li>
        @endforeach
    </ul>
</body>
</html>
