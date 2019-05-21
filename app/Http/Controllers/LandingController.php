<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class LandingController extends Controller
{
    // Index 
    public function index () {
        // Fetch All Project [limit to 12]

        $projects = Project::with('project_investments')->limit(12)->get();

        // return ($projects);
        return view('welcome',compact('projects'));
    }

    public function offerings($id) {
        // $id = decrypt($id);
        $project = $projects = Project::where('id', $id)->with('project_investments')->with('project_teams')->first();
        // echo $project;
        return view('offering')->withProject($project);
    }
}
