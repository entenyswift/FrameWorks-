<!-- resources/views/admin/tasks/admin.task.index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Задачи всех пользователей') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="min-w-full bg-white dark:bg-gray-800">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-left">Название</th>
                                <th class="px-4 py-2 text-left">Описание</th>
                                <th class="px-4 py-2 text-left">Категория</th>
                                <th class="px-4 py-2 text-left">Пользователь</th>
                                <th class="px-4 py-2 text-left">Дата выполнения</th>
                                <th class="px-4 py-2 text-left">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="px-4 py-2">{{ $task->title }}</td>
                                    <td class="px-4 py-2">{{ $task->description }}</td>
                                    <td class="px-4 py-2">{{ $task->category->name }}</td>
                                    <td class="px-4 py-2">{{ $task->user->name }}</td>
                                    <td class="px-4 py-2">{{ $task->due_date }}</td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('tasks.edit', $task) }}" class="text-blue-500 hover:text-blue-700">Редактировать</a>
                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">Удалить</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
