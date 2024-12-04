<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Просмотр задачи</title>
</head>
<body>
    <h1>{{ $task->title }}</h1>
    <p>Описание: {{ $task->description }}</p>
    <p>Дата выполнения: {{ $task->due_date }}</p>
    <p>Категория: {{ $task->category->name }}</p>
    <a href="{{ route('tasks.edit', $task->id) }}">Редактировать</a>
    <a href="{{ route('tasks.index') }}">Вернуться к списку</a>
</body>
</html>
