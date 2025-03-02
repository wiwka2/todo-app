<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактировать задачу</title>
</head>
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
    <input type="checkbox" name="completed" id="completed" value="1" {{ $task->completed ? 'checked' : '' }}>
</div>
<div>
    <button type="submit">Обновить задачу</button>
</div>
</form>
<a href="{{ route('tasks.index') }}">Назад к списку задач</a>
</body>
</html>
