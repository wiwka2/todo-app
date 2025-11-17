# Todo App

This Todo App is a simple project built with Laravel. It allows users to perform basic CRUD (Create, Read, Update, Delete) operations on tasks.

## Features

- Add new tasks
- View a list of tasks
- Edit existing tasks
- Delete tasks
- Mark tasks as completed
- Set due dates and recurrence for tasks

## Technologies Used

- PHP
- Laravel
- JavaScript
- NPM
- Composer

## Installation

1. Clone the repository:
    ```sh
    git clone https://github.com/wiwka2/todo-app.git
    cd todo-app
    ```

2. Install dependencies:
    ```sh
    composer install
    npm install
    ```

3. Copy the `.env.example` file to `.env` and configure your environment variables:
    ```sh
    cp .env.example .env
    ```

4. Generate the application key:
    ```sh
    php artisan key:generate
    ```

5. Run the database migrations:
    ```sh
    php artisan migrate
    ```

6. Start the development server:
    ```sh
    php artisan serve
    ```

## Usage

- Visit `http://localhost:8000` in your browser to access the Todo App.
- Use the interface to add, view, edit, and delete tasks.

