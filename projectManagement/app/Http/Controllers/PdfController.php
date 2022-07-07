<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Task;

class PdfController extends Controller
{
    //
    public function PDFdownload(Request $request)
    {
        $projectId = $request->id;
        $sDate = $request->sdate;
        $eDate = $request->edate;
        $type = $request->type;
        
        $tasks = Task::where('project_id', $projectId)
                ->whereBetween('assign_date', [$sDate, $eDate]);
        $tTasks = $tasks->get();
        $count = $tasks->select('task_status', DB::raw('count(*) as s_count'))
                        ->groupBy('task_status')->get();
        
        $pdf = PDF::loadView('reportPdf', compact('tTasks','count'));    
        if($type == 'print')
        {
            return view('reportPdf', compact('tTasks','count'));
//            $pdf->render();
        }
        else
        {
        return $pdf->stream('report.pdf');
        }
        
    }
    
}
