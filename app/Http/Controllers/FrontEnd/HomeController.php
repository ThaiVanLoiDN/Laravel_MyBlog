<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Ads;
use App\Models\Quotes;
use App\Models\Project;
use App\Models\Slider;
use App\Models\Skill;
use App\Models\Work;

class HomeController extends Controller
{
    public function index()
    {
    	$listPost = Post::orderBy('id', 'desc')->limit(3)->get();
    	$listAds = Ads::get();
        $listProject = Project::get();
        $listSlider = Slider::get();
    	$listSkill = Skill::get();
    	$listWork = Work::get();
    	$listQuotes = Quotes::inRandomOrder()->limit(3)->get();
    	//dd($listQuotes);

    	return view('frontend.home.index', ['listPost' => $listPost, 'listAds' => $listAds, 'listQuotes' => $listQuotes, 'listProject' => $listProject, 'listWork' => $listWork, 'listSlider' => $listSlider, 'listSkill' => $listSkill]);
    }
}
