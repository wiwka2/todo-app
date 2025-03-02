<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить задачу</title>
</head>
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
    <button type="submit">Добавить задачу</button>
</div>
</form>
<a href="{{ route('tasks.index') }}">Назад к списку задач</a>
</body>
</html>
