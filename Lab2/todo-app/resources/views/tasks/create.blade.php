@extends('layouts.app')

@section('content')
    <h1>Создать новую задачу</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Название:</label>
            <input type="text" name="title" id="title" required>
        </div>

        <div>
            <label for="description">Описание:</label>
            <textarea name="description" id="description" required></textarea>
        </div>

        <button type="submit">Сохранить задачу</button>
    </form>
@endsection
