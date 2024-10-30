@extends('layouts.app')

@section('content')
    <h1>Редактировать задачу</h1>

    <form action="{{ route('tasks.update', $task['id']) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Название:</label>
            <input type="text" name="title" id="title" value="{{ $task['title'] }}" required>
        </div>

        <div>
            <label for="description">Описание:</label>
            <textarea name="description" id="description" required>{{ $task['description'] }}</textarea>
        </div>

        <button type="submit">Обновить задачу</button>
    </form>
@endsection
