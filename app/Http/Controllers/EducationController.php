<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Profile;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function viewEducation()
    {
        $profile = Profile::latest()->first();
        $educations = Education::where('profile_id',$profile->id)->get();
        $profiles = Profile::get();
        return view('education.viewEducation', compact('educations', 'profiles'));
    }
    public function addEducation(Request $request){
      $education = new Education;
      $education->profile_id = $request->profile_name;
      $education->year = $request->year;
      $education->course = $request->course;
      $education->description = $request->description;
      $education->save();
      return redirect()->back();
    }
    public function editEducation(Request $request, $id)
    {
        $education = Education::where('id', $id)->first();
        $education->profile_id = $request->profile_name;
        $education->year = $request->year;
        $education->course = $request->course;
        $education->description = $request->description;
        $education->save();
        return redirect()->back();
    }
    public function deleteEducation($id){
        $education=Education::where('id',$id)->first();
        $education->delete();
        return redirect()->back();
    }
}

