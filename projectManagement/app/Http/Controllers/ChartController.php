<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;

class ChartController extends Controller
{
    //
    public function viewChart()
    {
        $projectList = Project::pluck('project_name', 'id')->toArray();
        $statusWiseProjectArr['pending'] = [
            '1' => 30, 
            '2' => 30, 
            '3' => 30, 
            '7' => 30, 
            '10' => 30, 
        ];
        $statusWiseProjectArr['In-Progress'] = [
            '1' => 30, 
            '2' => 30, 
            '3' => 30, 
            '7' => 30, 
            '10' => 30, 
        ];
        $statusWiseProjectArr['Paused'] = [
            '1' => 20, 
            '2' => 30, 
            '3' => 30, 
            '7' => 40, 
            '10' => 30, 
        ];
        $statusWiseProjectArr['completed'] = [
            '1' => 35, 
            '2' => 30, 
            '3' => 50, 
            '7' => 30, 
            '10' => 30, 
        ];
        return view('barChart')->with(compact('projectList', 'statusWiseProjectArr'));
    }
    
    public function getChart()
    {
        
    }
}
