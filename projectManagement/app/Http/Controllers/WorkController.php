<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;
use App\ProjectToTask;

class WorkController extends Controller 
{

    public $i = 0;
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
                if(!empty($request->project_id))
                {
                $data[$i]['project_id'] = $request->project_id;
                $data[$i]['task_id'] = $request->task_id[$taskId];
                $data[$i]['assigned_date'] = $request->assign_date[$taskId];
                $i++;
                }
                else 
                {
                    return response()->json(['error' => true,'msg' => 'Project Id Not Found']);
                }
            }
            ProjectToTask::insert($data);
            //return redirect()->route('projectTask');
            return response()->json(['success' => true,'msg' => 'Data Successfully Saved']);
        }

        
    }
    public function addRow()
    {
        $i = 1;
        $tasks = Task::all();
        return view('task.addTask')->with('tasks', $tasks)
                                   ->with('i',$i);
    }
    
    public function addnewRow(Request $request)
    {
        $i = $request->i;
        $i++;
        $tasks = Task::all();
        $view = view('task.addRow', compact('tasks','i'))->render();
        return response()->json(['row' => $view,'msg' => 'row successfully added']);
    }
}
