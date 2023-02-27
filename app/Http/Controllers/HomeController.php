<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Profile;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function viewHome(){
        $profile = Profile::latest()->first();
        $homes = Home::where('profile_id',$profile->id)->latest()->get();
        $profiles=Profile::get();
        return view('home.viewHome',compact('homes','profiles'));
    }
    public function addHome(Request $request){
        $home = new Home;
        $home->profile_id= $request->profile_name;
        $home->sub_title = $request->sub_title;
        $home->description = $request->description;
        $home->save();
        return redirect()->back();
    }
    public function editHome(Request $request,$id){
        $home = Home::where('id', $id)->first();
        $home->profile_id= $request->profile_name;
        $home->sub_title = $request->sub_title;
        $home->description = $request->description;
        $home->save();
        return redirect()->back();
    }
    public function deleteHome($id){
        $home=Home::where('id',$id)->first();
        $home->delete();
        return redirect()->back();
    }
}


