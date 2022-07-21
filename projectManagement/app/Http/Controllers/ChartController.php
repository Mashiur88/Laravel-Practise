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
        
        foreach($projectList as $projectId => $project)
        {
            $count = array(array(array_fill(0,5,0)));
            $count[$projectId] = Task::where('project_id',$projectId)
                    ->select('task_status')
                    ->selectRaw('count(*) as s_count')
                    ->groupBy('task_status')->pluck('s_count','task_status')->toArray();
//            echo "<pre>";
//            print_r($count);
            
            $statusWiseProjectArr['pending'][$projectId] = !empty($count[$projectId][1]) ? $count[$projectId][1] : 0;
            $statusWiseProjectArr['In-Progress'][$projectId] = !empty($count[$projectId][2]) ? $count[$projectId][2] : 0;
            $statusWiseProjectArr['Paused'][$projectId] = !empty($count[$projectId][3]) ? $count[$projectId][3] : 0;
            $statusWiseProjectArr['completed'][$projectId] = !empty($count[$projectId][4]) ? $count[$projectId][4] : 0;
        }
//        $statusWiseProjectArr['pending'] = [
//            '1' => 40, 
//            '2' => 39, 
//            '3' => 25
//        ];
//        $statusWiseProjectArr['In-Progress'] = [
//            '1' => 33, 
//            '2' => 11, 
//            '3' => 56
//        ];
//        $statusWiseProjectArr['Paused'] = [
//            '1' => 20, 
//            '2' => 66, 
//            '3' => 30
//        ];
//        $statusWiseProjectArr['completed'] = [
//            '1' => 35, 
//            '2' => 31, 
//            '3' => 50
//        ];
        return view('barChart')->with(compact('projectList', 'statusWiseProjectArr'));
    }
    
    public function getChart()
    {
        
    }
}
