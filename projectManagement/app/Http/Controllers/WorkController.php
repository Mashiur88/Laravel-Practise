<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;
use App\Project_to_task;

class WorkController extends Controller
{
    //
    public function index()
    {
        $projects = Project::all();
        $tasks = Task::all();
        return view('taskAssign')->with('projects',$projects)
                                ->with('tasks',$tasks);
    }
    public function taskAssign(Request $request)
    {
      //  $id = $request->
    }
}
