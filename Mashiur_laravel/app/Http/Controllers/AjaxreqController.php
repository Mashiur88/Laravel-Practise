<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\District;
use App\Thana;

class AjaxreqController extends Controller
{
    //
    public function reqhandle(Request $request)
    {
        $id = $request->id;
        $status = $request->status;
        $btn = $request->btn;
        
        $status =(int)!$status;
        //
        //echo $id,$status,$btn; exit;
        $result = User::where('id',$id)->first();
        //print_r($result); exit;
        $result->status = $status; 
        $bool = $result->save();
        if($bool)
        {
         $txt = view('changStat',compact('id','status','btn'))->render(); 
         return response()->json(['text' => $txt]);
            
//        return view('changStat')->with('id',$id)
//                    ->with('stat',$status)
//                    ->with('btn',$btn);
        }
    }
}


