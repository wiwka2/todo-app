@if (session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('tasks.create') }}">Добавить новую задачу</a>

@if(isset($tasks) && $tasks->count())
            @foreach ($tasks as $task)
                <div>
                    <h3>{{ $task->title }}</h3>
                    <p>{{ $task->description }}</p>
                    <a href="{{ route('tasks.show', $task->id) }}">Подробнее</a>
                    <a href="{{ route('tasks.edit', $task->id) }}">Редактировать</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить эту задачу?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Удалить</button>
                    </form>
                </div>
            @endforeach
        @else
            <p>{{ __('No tasks available') }}</p>
        @endif

