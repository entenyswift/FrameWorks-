@extends('layouts.app')

@section('content')
    <h1>{{ $task['title'] }}</h1>
    <p>{{ $task['description'] }}</p>
    <p>Создана: {{ $task['created_at'] }}</p>
    <p>Обновлена: {{ $task['updated_at'] }}</p>

    <a href="{{ route('tasks.edit', $task['id']) }}">Редактировать задачу</a>
@endsection
