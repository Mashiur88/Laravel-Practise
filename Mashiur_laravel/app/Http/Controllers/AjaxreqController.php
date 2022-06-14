<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\District;
use App\Thana;

class AjaxreqController extends Controller
{
    //
    public function reqhandle($id,$status,$btn)
    {
        
        $status =(int)!$status;
        //print_r($status); exit;
        $result = User::where('id',$id)->first();
        
        $result->status = "$status"; 
        //echo $id,$status,$btn; exit;
        if($result->save())
        {
        return view('changStat')->with('id',$id)
                    ->with('stat',$status)
                    ->with('btn',$btn);
        }
    }
}


