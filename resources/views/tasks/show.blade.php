<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Детали задачи</title>
</head>
<body>
<h1>Детали задачи</h1>
<div>
    <h2>{{ $task->title }}</h2>
    <p>{{ $task->description }}</p>
    <p>Статус: {{ $task->completed ? 'Выполнена' : 'Не выполнена' }}</p>
    <p>Создано: {{ $task->created_at->format('d.m.Y H:i') }}</p>
    <p>Обновлено: {{ $task->updated_at->format('d.m.Y H:i') }}</p>
</div>
<a href="{{ route('tasks.edit', $task->id) }}">Редактировать</a>
<form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить эту задачу?');">
    @csrf
    @method('DELETE')
    <button type="submit">Удалить</button>
</form>
<a href="{{ route('tasks.index') }}">Назад к списку задач</a>
</body>
</html>
