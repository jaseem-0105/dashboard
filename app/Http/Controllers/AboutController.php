<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Profile;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function viewAbout()
    {
        $profile = Profile::latest()->first();
        $abouts = About::where('profile_id',$profile->id)->latest()->get();
        $profiles = Profile::get();
        return view('about.viewAbout', compact('abouts', 'profiles'));
    }
    public function addAbout(Request $request)
    {
        $about = new About;
        $about->profile_id = $request->profile_name;
        $about->age = $request->age;
        $about->qualification = $request->qualification;
        $about->post = $request->post;
        $about->experience = $request->experience;
        $about->projects_completed = $request->projects_completed;
        if ($request->cv) {
            $file = $request->file('cv');
            $filename = time() . $file->getClientOriginalName();
            $file->move(public_path('/about/'), $filename);
            $about->cv = "/about/" . $filename;
        }
        $about->save();
        return redirect()->back();
    }
    public function editAbout(Request $request, $id)
    {
        $about = About::where('id', $id)->first();
        $about->profile_id = $request->profile_name;
        $about->age = $request->age;
        $about->qualification = $request->qualification;
        $about->post = $request->post;
        $about->experience = $request->experience;
        $about->projects_completed = $request->projects_completed;
        if ($request->cv) {
            if ($about->cv) {
                @unlink(public_path($about->cv));
                $file = $request->file('cv');
                $filename = time() . $file->getClientOriginalName();
                $file->move(public_path('/about/'), $filename);
                $about->cv = "/about/" . $filename;
            } else {
                $file = $request->file('cv');
                $filename = time() . $file->getClientOriginalName();
                $file->move(public_path('/about/'), $filename);
                $about->cv = "/about/" . $filename;
            }
        }
        $about->save();
        return redirect()->back();
    }
    public function deleteAbout($id){
        $about=About::where('id',$id)->first();
        $about->delete();
        return redirect()->back();
    }
}
