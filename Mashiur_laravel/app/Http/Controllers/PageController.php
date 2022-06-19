<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use Illuminate\Support\Str;

class PageController extends Controller
{
    //
    public function viewGallery()
    {
        $path = "https://static.toiimg.com/photo/msid-58515713,width-96,height-65.cms"; 
        return view('gallery')->with('path',$path);
    }
    
    public function uploadPhoto(Request $request)
    {
        $hold = new Image();
        $path = $request->file('image');
        $image_name=$path->getClientOriginalName();
        $image_ext=$path->getClientOriginalExtension();  
        $image_new_name =strtoupper(Str::random(6)); 
        $image_full_name=$image_new_name.'.'.$image_ext;
        $upload_path='public/user/';
        $image_url=$upload_path.$image_full_name;
        $success=$path->move($upload_path,$image_full_name);
        //echo $image_url;
        $hold->path = $image_url;
        if($hold->save())
        {
        return view('gallery')->with('path',$image_url);
        }
//        echo "<pre>";
//        print_r($request->all()); exit;
    }
    public function viewAbout()
    {
        return view('about');
    }
}
