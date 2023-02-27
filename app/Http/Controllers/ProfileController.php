<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function viewProfile(){
        $profiles = Profile::get();
        return view('profile.viewProfile',compact('profiles'));
    }
    public function addProfile(Request $request){
        {
            $profile = new Profile;
            $profile->name = $request->name;

            if ($request->profile_image){
                $file = $request->file('profile_image');
                $imagename = time() . $file->getClientOriginalName();
                $file->move(public_path('/profile/'), $imagename);
                $profile->profile_image = "/profile/" . $imagename;
            }
            if ($request->background_image){
                $file = $request->file('background_image');
                $imagename = time() . $file->getClientOriginalName();
                $file->move(public_path('/profile/'), $imagename);
                $profile->background_image = "/profile/" . $imagename;
            }
            $profile->description = $request->description;
            $profile->save();
            return redirect()->back();
        }

    }
    public function editProfile(Request $request,$id)
    {
        $profile = Profile::where('id', $id)->first();
        $profile->name = $request->name;
            if ($request->profile_image){
                if ($profile->profile_image) {
                    @unlink(public_path($profile->profile_image));
                    $file = $request->file('profile_image');
                    $filename = time() . $file->getClientOriginalName();
                    $file->move(public_path('/profile/'), $filename);
                    $profile->profile_image = "/profile/" . $filename;
                } else {
                    $file = $request->file('profile_image');
                    $filename = time() . $file->getClientOriginalName();
                    $file->move(public_path('/profile/'), $filename);
                    $profile->profile_image = "/profile/" . $filename;
                }
            }
            if ($request->background_image){
                if ($profile->background_image) {
                    @unlink(public_path($profile->background_image));
                    $file = $request->file('background_image');
                    $filename = time() . $file->getClientOriginalName();
                    $file->move(public_path('/profile/'), $filename);
                    $profile->background_image = "/profile/" . $filename;
                } else {
                    $file = $request->file('background_image');
                    $filename = time() . $file->getClientOriginalName();
                    $file->move(public_path('/profile/'), $filename);
                    $profile->background_image = "/profile/" . $filename;
                }
            }
            $profile->description = $request->description;
            $profile->save();
            return redirect()->back();
        }
        public function deleteProfile($id){
            $profile=Profile::where('id',$id)->first();
            $profile->delete();
            return redirect()->back();
        }
        public function deleatedUser(){
            $profiles = Profile::onlyTrashed()->get();
            return view('deleatedUser',compact('profiles'));
        }
        public function viewDeleatedUser($id){
            $profile=Profile::onlyTrashed()->where('id',$id)->first();
            $profile->restore();
            return redirect()->back();
        }
}
