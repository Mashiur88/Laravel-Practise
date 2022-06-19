<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Userlist;
use App\User;
use App\Division;
use App\District;
use App\Thana;
use Redirect;

class UserController extends Controller {

    //
    public function showArray() {
        $list = Userlist::leftJoin('divisions', 'divisions.id', '=', 'userlists.division')
                ->leftJoin('districts', 'districts.id', '=', 'userlists.district')
                ->leftJoin('thanas', 'thanas.id', '=', 'userlists.thana')
                ->select('userlists.*', 'divisions.name as divName', 'districts.name as disName', 'thanas.name as tName')
                ->orderBY('divName', 'ASC')
                ->orderBY('disName', 'ASC')
                ->orderBY('tName', 'ASC')
                ->get();
        //return $list;
        return view('Array.arrayShow')->with('Aarray', $list);
    }

    public function userlist(Request $request) {
        //echo '<pre>';print_r($request->all());exit;
        $key = $request->key;
        $userlist = User::select('*');
        if (!empty($key)) {
            $userlist = $userlist->where('first_name', 'like', '%' . $key . '%')
                    ->orwhere('last_name', 'like', '%' . $key . '%');
        }

        $userlist = $userlist->paginate(1);
        //echo '<pre>';print_r($userlist); exit;
        return view('userlist')->with('users', $userlist);
    }

    public function searchUser(Request $request) {
        //$name = Input::get('name');
        $key = $request->search;
        $url = url("/user/list?key=" . $key);
        // echo $url;
        return redirect($url);
        //print_r($key); exit;
        //redirect()->route('user.list',['key'=>$key]);
//        $userlist = User::where('first_name','like','%'.$key.'%')
//                    ->orwhere('last_name','like','%'.$key.'%')      
//                    ->get();
//        return view('userlist')->with('users',$userlist);
    }

    public function deleteUser($id) {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.list');
    }

    public function showModal(Request $request) {
        $id = $request->id;
        $address = User::select('users.address as address', 'divisions.name as division', 'districts.name as district', 'thanas.name as thana')
                ->leftJoin('divisions', 'divisions.id', '=', 'users.division')
                ->leftJoin('districts', 'districts.id', '=', 'users.district')
                ->leftJoin('thanas', 'thanas.id', '=', 'users.thana')
                ->where('users.id', '=', $id)
                ->first();
        //return $address;
        //return view('modalAddress')->with('address', $address);
        $view = view('user.modalAddress', compact('address'))->render();
        return response()->json(['text' => $view]);
    }

    public function editDistrict(Request $request) {
        $id = $request->id;
        $districts = District::where('division_id', $id)->get();
        
        $txt = view('getDistrict')->with('districts',$districts)->render();
        return response()->json(['text' => $txt]);
        
        //return view('getDistrict')->with('districts', $districts);
    }

    public function editThana(Request $request) {
        $id = $request->id;
        $thanas = Thana::where('district_id', $id)->get();
        
        $txt = view('getThana')->with('thana',$thanas)->render();
        return response()->json(['text' => $txt]);
        //return view('getThana')->with('thana', $thanas);
    }

    public function editUser($id) 
    {
        $division = Division::all();

        $user = User::where('users.id', '=', $id)
                ->leftJoin('divisions', 'divisions.id', '=', 'users.division')
                ->leftJoin('districts', 'districts.id', '=', 'users.district')
                ->leftJoin('thanas', 'thanas.id', '=', 'users.thana')
                ->select('users.*', 'divisions.id as divId', 'districts.id as dId', 'thanas.id as tId', 'divisions.name as division', 'districts.name as district', 'thanas.name as thana')
                ->first();

        //echo '<pre>';print_r($user);echo '<pre>';print_r($division);exit;
        return view('edit')->with('user', $user)
                        ->with('division', $division);
    }

    public function updateUser(Request $request) {
        $id = $request->id;
        $user = User::find($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->user_name = $request->user_name;
        $user->gender = $request->gender;
        $user->division = $request->division;
        $user->district = $request->district;
        $user->thana = $request->thana;
        $user->address = $request->address;
        $user->status = $request->status;
        $user->save();
        return redirect()->route('user.list');
    }

}
