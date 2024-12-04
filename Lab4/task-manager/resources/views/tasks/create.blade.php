
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создать задачу</title>
</head>
<body>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Название</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}">
            @error('title')<p>{{ $message }}</p>@enderror
        </div>
        <div>
            <label for="description">Описание</label>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
            @error('description')<p>{{ $message }}</p>@enderror
        </div>
        <div>
            <label for="due_date">Дата выполнения</label>
            <input type="date" id="due_date" name="due_date" value="{{ old('due_date') }}">
            @error('due_date')<p>{{ $message }}</p>@enderror
        </div>
        <div>
            <label for="category_id">Категория</label>
            <select id="category_id" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')<p>{{ $message }}</p>@enderror
        </div>
        <button type="submit">Добавить</button>
    </form>
</body>
</html>
