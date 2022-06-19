<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index()
    {
        return view('task.createTask');
    }
    public function createTask(Request $request)
    {
        
    }
}
