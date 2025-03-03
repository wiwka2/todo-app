<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить задачу</title>
</head>
@extends('layouts.app')

@section('title', 'Список задач')

@section('content')
<body>
    <h1>Добавить новую задачу</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf <!-- Защита от CSRF-атак -->
        <div>
            <label for="title">Название задачи:</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="description">Описание задачи:</label>
            <textarea name="description" id="description" rows="4"></textarea>
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
        </div>
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
            <button type="submit" class="btn btn-new">Добавить задачу</button>
        </div>
    </form>
    <form action="{{ route('tasks.index') }}">
        <button type="submit" class="btn">Назад к списку задач</button>
    </form>
</body>
</html>
@endsection
