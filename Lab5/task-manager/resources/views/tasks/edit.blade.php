<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактировать задачу</title>
</head>
<body>
    <h1>Редактировать задачу</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Метод PUT для обновления -->
        <div>
            <label for="title">Название</label>
            <input type="text" id="title" name="title" value="{{ old('title', $task->title) }}">
            @error('title')<p>{{ $message }}</p>@enderror
        </div>
        <div>
            <label for="description">Описание</label>
            <textarea id="description" name="description">{{ old('description', $task->description) }}</textarea>
            @error('description')<p>{{ $message }}</p>@enderror
        </div>
        <div>
            <label for="due_date">Дата выполнения</label>
            <input type="date" id="due_date" name="due_date" value="{{ old('due_date', $task->due_date) }}">
            @error('due_date')<p>{{ $message }}</p>@enderror
        </div>
        <div>
            <label for="category_id">Категория</label>
            <select id="category_id" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $task->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')<p>{{ $message }}</p>@enderror
        </div>
        <button type="submit">Сохранить изменения</button>
    </form>
</body>
</html>
