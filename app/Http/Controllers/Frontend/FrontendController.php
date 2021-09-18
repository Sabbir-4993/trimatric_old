<?php

namespace App\Http\Controllers\Frontend;

use App\Circular;
use App\Client;
use App\Http\Controllers\Controller;
use App\Project;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{

    public function index(){
        $sliders = Slider::all();
        return view('frontend.pages.index',compact('sliders'));
    }

    public  function project (){
        $projects = Project::orderBy('id','asc')->get();
        return view('frontend.pages.project',compact('projects'));
    }

    public  function singleProject ($id){
//        $id = Crypt::decrypt($id);
        $projects = Project::where('title',$id)->first();
        return view('frontend.pages.singleProject',compact('projects'));
    }

    public  function portfolio (){
        $portfolios = DB::table('portfolios')
            ->join('projects','projects.id','=','portfolios.project_id')
            ->select('projects.cat_name','projects.title','projects.id','portfolios.*')
            ->get();
        return view('frontend.pages.portfolio',compact('portfolios'));
    }

    public function client(){
        $clients= Client::all();
        return view('frontend.pages.client',compact('clients'));
    }

    public function team(){
        return view('frontend.pages.team_list');
    }

    public function career(){
        $careers = Circular::all();
        return view('frontend.pages.career', compact('careers'));
    }

    public function circular($title){
        $circulars = Circular::where('title', $title)->first();
        return view('frontend.pages.circular', compact('circulars'));
    }

    public function contact(){
        return view('frontend.pages.contact');
    }
}
