<?php

namespace App\Http\Controllers\ProjectManager;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectManagerController extends Controller
{
    public function dashboard()
    {
        $projects = new Project();

        $offers = $projects->authenticatedUserProjectBids()
            ->where('status_id', '=', 1)
            ->get();

        $projects = $projects->authenticatedUserInvestment()
            ->where('status_id', '=', 1)
            ->get();


        return view('project_manager_dashboard', compact('projects', 'offers'));
    }
}
