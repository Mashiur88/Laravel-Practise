<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    //
    public function index()
    {
        return view('project.createProject');
    }
    public function createProject(Request $request)
    {
        $project = new Project();
        $project->project_name = $request->project_name;
        $project->project_code = $request->project_code;
        $project->project_deadline = $request->deadline;
        $project->project_status = $request->p_status;
        $project->save();
        return redirect()->route('projectTask');
        
    }
}
