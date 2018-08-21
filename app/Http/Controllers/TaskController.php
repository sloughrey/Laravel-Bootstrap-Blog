<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Displays a list of all tasks
     *
     * @return void
     */
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    public function show(Task $task) // will do a Task::find($id) behind the scenes
    {
        return view('tasks.show', compact('task'));
    }
}
