<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Детали задачи</title>
</head>
@extends('layouts.app')

@section('title', 'Список задач')

@section('content')
<body>
<h1>Детали задачи</h1>
<div>
    <h2>{{ $task->title }}</h2>
    <p>{{ $task->description }}</p>
    <p>Статус: {{ $task->completed ? 'Выполнена' : 'Не выполнена' }}</p>
    <p>Создано: {{ $task->created_at->format('d.m.Y H:i') }}</p>
    <p>Обновлено: {{ $task->updated_at->format('d.m.Y H:i') }}</p>
    <p>Выполнить до: {{ $task->do_before->format('d.m.Y H:i') }}</p>
    @if(!empty($task->recurrence))
        <p>Периодичность: {{ $task->recurrence }}</p>
    @endif
</div>
<form action="{{ route('tasks.edit', $task->id) }}">
    <button type="submit" class="btn btn-edit">Редактировать</button>
</form>
<form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить эту задачу?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-delete">Удалить</button>
</form>
<form action="{{ route('tasks.index') }}">
    <button type="submit" class="btn">Назад к списку задач</button>
</form>
</body>
</html>
@endsection
