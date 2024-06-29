<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Log::info('Session token: ' . session('_token'));
        Log::info('Request token: ' . $request->input('_token'));

        $tasks = Task::orderBy('due_date')->paginate(5);
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(Task::$validationRules);

        $task = Task::create($validated);

        return redirect()->route('tasks.show', ['task' => $task])
            ->with('success', 'Task is successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tasks.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate(Task::$validationRules);

        $task->update($validated);

        return redirect()->route('tasks.show', ['task' => $task])
            ->with('success', 'Task is successfully updated.');
    }

    /**
     * Update the status of the task.
     */
    public function complete(Task $task)
    {
        $task->complete();

        return back()->with('success', 'Task is successfully completed.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('home')->with('success', 'Task is successfully deleted.');
    }
}
