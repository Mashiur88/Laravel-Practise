<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    //
    public function index()
    {
        return view('task.createTask');
    }
    public function createTask(Request $request)
    {
        $task = new Task();
        $task->task_name = $request->task_name;
        $task->task_code = $request->task_code;
        $task->task_status = $request->t_status;
        $task->save();
        return redirect()->route('projectTask');
    }
}
