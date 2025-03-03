<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'do_before' => 'required|date',
            'recurrence' => 'nullable|in:Ежедневно,Еженедельно,Ежемесячно',
        ]);
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => false, // По умолчанию задача не выполнена
            'do_before' => $request->do_before,
            'recurrence' => $request->recurrence,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Задача успешно добавлена!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'completed' => 'nullable|boolean',
            'do_before' => 'required|date',
        ]);

        $completed = $request->has('completed') ? 1 : 0;

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $completed,
            'do_before' => $request->do_before,
            'recurrence' => $request->recurrence,
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Задача успешно обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Задача успешно удалена!');
    }
}
