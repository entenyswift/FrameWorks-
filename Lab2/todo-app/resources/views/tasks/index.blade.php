@extends('layouts.app')

@section('content')
    <h1>Список задач</h1>

    <ul>
        @foreach ($tasks as $task)
            <li>
                <a href="{{ route('tasks.show', $task['id']) }}">{{ $task['title'] }}</a>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('tasks.create') }}">Создать новую задачу</a>
@endsection
