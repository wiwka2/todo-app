@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
@endif

@extends('layouts.app')

@section('title', 'Список задач')

@section('content')
    <form action="{{ url('/') }}" class="home-btn">
        <button type="submit" class="btn btn-new" id="btn-initial-new">Домой</button>
    </form>

    <form action="{{ route('tasks.create') }}" class="btn">
        <button type="submit" class="btn btn-new" id="btn-initial-new">Добавить новую задачу</button>
    </form>



@if(isset($tasks) && $tasks->count())
    @foreach ($tasks as $task)
        <div class="task">
            <h3>{{ $task->title }}</h3>
            <p>{{ $task->description }}</p>
            <p>{{ $task->completed ? 'Выполнена' : 'Не выполнена' }}</p>
            <p>Выполнить до {{ $task->do_before->format('d.m.Y H:i') }}</p>
            @if ($task->recurrence)
                <p>Периодичность: {{ $task->recurrence }}</p>
            @endif
            <div class="task-actions">
                <form action="{{ route('tasks.show', $task->id) }}">
                    <button type="submit" class="btn btn-info">Подробнее</button>
                </form>
                <form action="{{ route('tasks.edit', $task->id) }}">
                    <button type="submit" class="btn btn-edit">Редактировать</button>
                </form>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить эту задачу?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-delete">Удалить</button>
                </form>
            </div>
        </div>
    @endforeach
@else
    <p>{{ __('No tasks available') }}</p>
@endif
@endsection
