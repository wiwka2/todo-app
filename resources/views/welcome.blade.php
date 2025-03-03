<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добро пожаловать в To-Do List</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<div class="welcome-container">
    <h1>Добро пожаловать в To-Do List!</h1>
    <p>Организуй свои задачи легко и просто.</p>
    <a href="{{ route('tasks.index') }}" class="btn btn-primary">Перейти к списку задач</a>
</div>
</body>
</html>
