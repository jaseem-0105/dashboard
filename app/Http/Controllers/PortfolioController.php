<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Profile;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function viewPortfolio()
    {
        $profile = Profile::latest()->first();
        $portfolios = Portfolio::where('profile_id',$profile->id)->get();
        $profiles = Profile::get();
        return view('portfolio.viewPortfolio', compact('portfolios', 'profiles'));
    }
    public function addPortfolio(Request $request)
    {
        $portfolio = new Portfolio;
        $portfolio->profile_id = $request->profile_name;

        if ($request->image) {
            $file = $request->file('image');
            $imagename = time() . $file->getClientOriginalName();
            $file->move(public_path('/portfolio/'), $imagename);
            $portfolio->image = "/portfolio/" . $imagename;
        }
        $portfolio->save();
        return redirect()->back();
    }
    public function editPortfolio(Request $request, $id)
    {
        $portfolio = Portfolio::where('id', $id)->first();
        $portfolio->profile_id = $request->profile_name;
        if ($request->image) {
            if ($portfolio->image) {
                @unlink(public_path($portfolio->image));
                $file = $request->file('image');
                $filename = time() . $file->getClientOriginalName();
                $file->move(public_path('/portfolio/'), $filename);
                $portfolio->image = "/portfolio/" . $filename;
            } else {
                $file = $request->file('image');
                $filename = time() . $file->getClientOriginalName();
                $file->move(public_path('/portfolio/'), $filename);
                $portfolio->image = "/portfolio/" . $filename;
            }
        }
        $portfolio->save();
        return redirect()->back();
    }
    public function deletePortfolio($id){
        $portfolio=Portfolio::where('id',$id)->first();
        $portfolio->delete();
        return redirect()->back();
    }
}

