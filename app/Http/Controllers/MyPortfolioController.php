<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Education;
use App\Models\Home;
use App\Models\Portfolio;
use App\Models\Profile;
use Illuminate\Http\Request;

class MyPortfolioController extends Controller
{
    public function home(){
        $profile = Profile::latest()->first();
        $home = Home::where('profile_id',$profile->id)->latest()->first();
        return view('myportfolio.home',compact('home'));
    }
    public function about(){
        $profile = Profile::latest()->first();
        $about = About::where('profile_id',$profile->id)->latest()->first();
        return view('myportfolio.about',compact('about'));
    }
    public function education(){
        $profile = Profile::latest()->first();
        $educations = Education::where('profile_id',$profile->id)->get();
        return view('myportfolio.education',compact('educations'));
    }
    public function portfolio(){
        $profile = Profile::latest()->first();
        $portfolios = Portfolio::where('profile_id',$profile->id)->get();
        return view('myportfolio.portfolio',compact('portfolios'));
    }
    // public function sidebar(){
    //     $profile =Profile::first();
    //     // dd($profile);
    //     return view('includes.sidebar2',compact('profile'));
    // }
}
