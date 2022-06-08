<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Userlist;
use App\User;

class UserController extends Controller
{
    //
    public function viewDashboard()
    {
        return view('user.dashboard');
    }
    public function showArray()
    {
        $list =  Userlist::leftJoin('divisions','divisions.id','=','userlists.division')
                ->leftJoin('districts','districts.id','=','userlists.district')
                ->leftJoin('thanas','thanas.id','=','userlists.thana')
                ->select('userlists.*','divisions.name as divName','districts.name as disName','thanas.name as tName')
                ->orderBY('divName','ASC')
                ->orderBY('disName','ASC')
                ->orderBY('tName','ASC')
                ->get();
        //return $list;
        return view('Array.arrayShow')->with('Aarray',$list);
    }
    public function userlist()
    {
        $userlist = User::all();
        return view('userlist')->with('users',$userlist);
    }
    
    public function searchUser(Request $request)
    {
        //$name = Input::get('name');
        $key = $request->search;
        //print_r($key); exit;
        $userlist = User::where('first_name','like','%'.$key.'%')
                    ->orwhere('last_name','like','%'.$key.'%')
                    ->get();
        return view('userlist')->with('users',$userlist);
    }
}
