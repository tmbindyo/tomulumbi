<?php

namespace App\Http\Controllers\Investor;

use App\Project;
use App\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectInvestorController extends Controller
{
    public function dashboard()
    {
        // Get projects
        $projects = new Project();

        $offers = $projects->authenticatedUserProjectBids()
            ->where('status_id', '=', 1)
            ->get();

        $projects = $projects->authenticatedUserInvestment()
            ->where('status_id', Status::all()[0]['id'])
            ->get();

        return view('investor_dashboard', compact('projects', 'offers'));

    }
}
