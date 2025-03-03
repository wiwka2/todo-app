<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактировать задачу</title>
</head>
@extends('layouts.app')

@section('title', 'Список задач')

@section('content')
<body>
    <h1>Редактировать задачу</h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
@csrf <!-- Защита от CSRF-атак -->
@method('PUT') <!-- Указываем метод HTTP PUT -->
<div>
    <label for="title">Название задачи:</label>
    <input type="text" name="title" id="title" value="{{ $task->title }}" required>
</div>
<div>
    <label for="description">Описание задачи:</label>
    <textarea name="description" id="description" rows="4">{{ $task->description }}</textarea>
</div>
<div>
    <label for="completed">Статус задачи:</label>
    <input type="checkbox" id="checkbox" name="completed" id="completed" value="1" {{ $task->completed ? 'checked' : '' }}>
</div>
        <div>
            <label for="do_before">Выполнить до:</label>
            <input
                type="datetime-local"
                name="do_before"
                id="do_before"
                value="{{ old('do_before', date('Y-m-d\TH:i', time())) }}"
                min="{{ date('Y-m-d\TH:i', time()) }}"
            />
            <div>
                <div>
                    <label for="recurrence">Периодичность:</label>
                    <select name="recurrence" id="recurrence">
                        <option value="">Без повторения</option>
                        <option value="Ежедневно">Ежедневно</option>
                        <option value="Еженедельно">Еженедельно</option>
                        <option value="Ежемесячно">Ежемесячно</option>
                    </select>
                </div>
<div>
    <button type="submit" class="btn btn-edit">Обновить задачу</button>
</div>
</form>
    <form action="{{ route('tasks.index') }}">
        <button type="submit" class="btn">Назад к списку задач</button>
    </form>
</body>
</html>
@endsection
