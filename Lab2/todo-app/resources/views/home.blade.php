@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
    <div class="container">
        <h1>Welcome to ToDo App</h1>
        <p>This is a simple To-Do application for managing tasks within a team.</p>
        
        <h2>Navigation</h2>
        <ul>
            <li><a href="{{ route('tasks.index') }}">View Task List</a></li>
            <li><a href="{{ url('/about') }}">About Us</a></li>
        </ul>

        <h3>About This App</h3>
        <p>The To-Do App helps teams organize tasks, track progress, and collaborate effectively.</p>
    </div>
@endsection
