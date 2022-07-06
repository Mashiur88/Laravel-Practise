<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Validator;
use App\Task;
use App\Project;

class TaskController extends Controller {

    //
    public function index() {
        $projects = Project::all();
        return view('task.createTask')->with('projects', $projects);
    }

    public function createTask(Request $request) {
        $task = new Task();
        $task->task_name = $request->task_name;
        $task->task_detail = $request->task_detail;
        $task->task_status = $request->t_status;
        $task->assign_date = $request->assign_date;
        $task->deadline = $request->deadline;
        $task->project_id = $request->project_id;
        $task->save();
        return redirect()->route('projectTask');
    }

    public function summary(Request $request) {
        
        $projects = Project::all();
        $projectId = $request->id;
        $sDate = $request->sdate;
        $eDate = $request->edate;

        $tasks = Task::where('project_id', $projectId)
                ->whereBetween('assign_date', [$sDate, $eDate]);
        $tTasks = $tasks->get();
        $count = $tasks->select('task_status', DB::raw('count(*) as s_count'))
                        ->groupBy('task_status')->get();
//       echo "<pre>";
//        print_r($ptasks->toArray());
//        print_r($count->toArray());   
//       exit;
        return view('taskSummary')->with('projects', $projects)
                        ->with('tasks', $tTasks)
                        ->with('count', $count);
    }

    public function getReport(Request $request) {
        $projectId = $request->project_id;
        $sDate = $request->start_date;
        $eDate = $request->end_date;
        $url = url("/taskSummary?id=" . $projectId . "&sdate=" . $sDate . "&edate=" . $eDate);
        return redirect($url);

        //return redirect()->back();
    }

}
