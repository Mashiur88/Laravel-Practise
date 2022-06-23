<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;
use App\ProjectToTask;

class WorkController extends Controller {

    //
    public function index() {
        $projects = Project::all();
        $tasks = Task::all();
        return view('taskAssign')->with('projects', $projects)
                        ->with('tasks', $tasks);
    }

    public function taskAssign(Request $request) {
        //echo '<pre>';print_r($request->all());exit;
        $data = [];

        if (!empty($request->task_id)) {
            $i = 0;
            foreach ($request->task_id as $key => $taskId) {
                $data[$i]['project_id'] = $request->project_id;
                $data[$i]['task_id'] = $request->task_id[$taskId];
                $data[$i]['assigned_date'] = $request->assign_date[$taskId];
                $i++;
            }
        }

        ProjectToTask::insert($data);
        return redirect()->route('projectTask');
    }
    public function addRow()
    {
        $tasks = Task::all();
        return view('task.addTask')->with('tasks', $tasks);
    }

}
