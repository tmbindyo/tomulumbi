<?php

namespace App\Http\Controllers\Landing;

use App\Project;
use App\ProjectGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function projects()
    {
        //

        $projects = Project::where('status_id','be8843ac-07ab-4373-83d9-0a3e02cd4ff5')->with('cover_image')->get();
        return view('landing.projects.projects',compact('projects'));
    }
    public function projectShow($project_id)
    {
        $project = Project::findOrFail($project_id);
        $project = Project::where('id',$project_id)->with('cover_image')->first();
        $projectGallery = ProjectGallery::where('project_id',$project->id)->with('upload')->get();
        return view('landing.projects.project_show',compact('project','projectGallery'));

    }
}
