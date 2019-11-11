<?php

namespace App\Http\Controllers\Landing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function projects()
    {
        //

        return view('landing.projects.projects');
    }
    public function projectShow($project_id)
    {

        return view('landing.projects.project_show');

    }
}
