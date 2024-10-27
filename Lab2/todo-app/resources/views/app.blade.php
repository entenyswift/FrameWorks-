<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ToDo App')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <nav>
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/about') }}">About</a>
            <a href="{{ route('tasks.index') }}">Tasks</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>
    
    <footer>
        <p>&copy; {{ date('Y') }} ToDo App. All rights reserved.</p>
    </footer>
</body>
</html>
