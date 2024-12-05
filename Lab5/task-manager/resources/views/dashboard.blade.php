<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            
            <div class="flex space-x-4">
                <!-- Кнопка для добавления задачи -->
                <a href="{{ route('tasks.create') }}" 
                   class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Добавить задачу
                </a>

                <!-- Кнопка для доступа к панели администратора, видна только для администраторов -->
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.tasks') }}" 
                       class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">
                        Панель администратора
                    </a>
                @endif
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-4">
                        <strong>Ваша роль: </strong>
                        <span class="text-sm text-gray-600">{{ auth()->user()->role }}</span>
                    </div>
                    @if(request()->get('action') === 'add')
                        @include('tasks.create')  <!-- Вставляем форму из create.blade.php -->
                    @else
                        <h3 class="text-xl font-semibold mb-4">Ваши задачи:</h3>
                        @if($tasks->isEmpty())
                            <p>У вас пока нет задач.</p>
                        @else
                            <table class="table-auto w-full text-left border-collapse">
                                <thead>
                                    <tr>
                                        <th class="border px-4 py-2">Название</th>
                                        <th class="border px-4 py-2">Категория</th>
                                        <th class="border px-4 py-2">Дата выполнения</th>
                                        <th class="border px-4 py-2">Действия</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tasks as $task)
                                        <tr>
                                            <td class="border px-4 py-2">{{ $task->title }}</td>
                                            <td class="border px-4 py-2">{{ $task->category->name ?? 'Без категории' }}</td>
                                            <td class="border px-4 py-2">{{ $task->due_date }}</td>
                                            <td class="border px-4 py-2">
                                                <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-500 hover:underline">Редактировать</a>
                                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Вы уверены?')">Удалить</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
