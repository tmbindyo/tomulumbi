<?php

namespace App\Http\Controllers\Landing;

use App\Project;
use App\ProjectGallery;
use App\ProjectView;
use App\Traits\ViewTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    use ViewTrait;

    public function projects(Request $request)
    {
        // save that user visited
        $cookie = $request->cookie();
        $view_type = "0d7740e6-8e3c-4f25-9448-3ecf92543436";
        $view_id = '';
        $view = $this->trackView($cookie,$request,$view_type,$view_id);
        // Get projects
        $projects = Project::where('status_id','be8843ac-07ab-4373-83d9-0a3e02cd4ff5')->with('cover_image')->get();
        return view('landing.projects.projects',compact('projects'));
    }

    public function projectShow(Request $request, $project_id)
    {
        // Check if project exists
        $project = Project::findOrFail($project_id);
        // Get project
        $project = Project::where('id',$project_id)->with('cover_image')->first();
        // Get project gallery
        $projectGallery = ProjectGallery::where('project_id',$project->id)->with('upload')->get();
        // project view
        $projectExists = Project::findOrFail($project_id);
        $projectExists->views++;
        $projectExists->save();
        // create view record
        $projectView = new ProjectView();
        $projectView->is_project = True;
        $projectView->cookie = $request->cookie();
        $projectView->project_id = $project_id;
        $projectView->number = $projectExists->views;
        $projectView->save();
        // save that user visited
        $cookie = $request->cookie();
        $view_type = "0d7740e6-8e3c-4f25-9448-3ecf92543436";
        $view_id = $projectView->id;
        $view = $this->trackView($cookie,$request,$view_type,$view_id);
        return view('landing.projects.project_show',compact('project','projectGallery'));

    }

}
