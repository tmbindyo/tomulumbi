<?php

namespace App\Http\Controllers;

use Auth;
use App\Project;
use App\ProjectTeam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ProjectTeamRequest;

class ProjectTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $project = Project::find($id);
        return view("project_teams.create", ["project"=>$project]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, ProjectTeamRequest $request, ProjectTeam $model)
    {
        $project = Project::find($id);
        
        $image = Input::file("image");
        $image_name = $image->getClientOriginalName();
        $image->move(public_path()."/images/projects/", $image_name);
 

        $projectTeam = new ProjectTeam;
        $projectTeam->description = "";
        $projectTeam->name = $request->name;
        $projectTeam->position = $request->position;
        $projectTeam->image = $image;
        $projectTeam->description = $request->description;
        $projectTeam->project_id = $project->id;
        $projectTeam->user_id = Auth::user()->id;
        $projectTeam->status_id = 1;
        $projectTeam->save();

        $projectTeams = ProjectTeam::find($project->id);
        return redirect()->route('project.index')->withID($id)->withStatus(__('Project team successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProjectTeam  $projectTeam
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $projectTeams = ProjectTeam::find($project->id);
        return view('project_teams.index',compact('projectTeams'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProjectTeam  $projectTeam
     * @return \Illuminate\Http\Response
     */
    public function edit($project_id, ProjectTeam $projectTeam)
    {
        $project = Project::find($project_id);
        $projectTeam = ProjectTeam::find($projectTeam->id);
        return view('project_teams.edit',compact('projectTeam','project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProjectTeam  $projectTeam
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, ProjectTeam $projectTeam)
    {
        if($projectTeam->status_id == 2){
            // Create record for project investment
        }
        $projectTeam = ProjectTeam::find($projectTeam->id);
        $projectTeam->team_amount = $request->team_amount;
        $projectTeam->status_id = $request->status_id;
        $projectTeam->save();
        return redirect()->route('project.index')->withID($id)->withStatus(__('Project team successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProjectTeam  $projectTeam
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectTeam $projectTeam)
    {
        //
    }
}
