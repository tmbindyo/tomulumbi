<?php

namespace App\Http\Controllers;

use Auth;
use App\Project;
use App\ProjectUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ProjectUpdateRequest;

class ProjectUpdateController extends Controller
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
        return view("project_updates.create", ["project"=>$project]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, ProjectUpdateRequest $request, ProjectUpdate $model)
    {
        $project = Project::find($id);
        
        if (Input::file("image")){
            $image = Input::file("image");
            $image_name = $image->getClientOriginalName();
            $image->move(public_path()."/projects/", $image_name);
        }else{
            $image_name = "";
        }
        
 

        $projectUpdate = new ProjectUpdate;
        $projectUpdate->name = $request->name;
        $projectUpdate->image = "/projects/.$image_name";
        $projectUpdate->description = $request->description;
        $projectUpdate->project_id = $project->id;
        $projectUpdate->user_id = Auth::user()->id;
        $projectUpdate->status_id = 1;
        $projectUpdate->save();


        // Project updates
        $projectUpdates = DB::table('project_updates')->where('status_id',1)->where('project_id', $project->id)->get();


        // $projectMilestones = ProjectMilestone::all();
        if (Auth::user()->user_type_id == 1)
            $projectBids = DB::table('project_bids')->where('project_id', $project->id)->where('status_id', 1)->get();
        elseif (Auth::user()->user_type_id == 3) {
            $projectBids = DB::table('project_bids')->where('project_id', $project->id)->where('status_id', 1)->where('user_id', Auth::user()->id)->get();
        }elseif (Auth::user()->user_type_id == 4) {
            $projectBids = DB::table('project_bids')->where('project_id', $project->id)->where('status_id', 1)->get();
        }else {
            $projectBids = [];
        }
        $projectMilestones = DB::table('project_milestones')->where('project_id', $project->id)->get();

        if (Auth::user()->user_type_id == 1)
            $projectTeams = DB::table('project_teams')->where('status_id',1)->where('project_id', $project->id)->get();
        elseif (Auth::user()->user_type_id == 3) {
            $projectTeams = DB::table('project_teams')->where('status_id',1)->where('project_id', $project->id)->where('user_id', Auth::user()->id)->get();
        }elseif (Auth::user()->user_type_id == 4) {
            $projectTeams = DB::table('project_teams')->where('status_id',1)->where('project_id', $project->id)->get();
        }else {
            $projectBids = [];
        }


        // echo ($projectMilestones);
        $projectInvestments = DB::table('project_investments')->where('project_id', $project->id)->get();
        return view('projects.show')->withProject($project)->withProjectBids($projectBids)->withProjectTeams($projectTeams)->withProjectUpdates($projectUpdates)->withProjectMilestones($projectMilestones)->withProjectInvestments($projectInvestments);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProjectUpdate  $projectUpdate
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $projectUpdates = ProjectUpdate::find($project->id);
        return view('project_updates.index',compact('projectUpdates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProjectUpdate  $projectUpdate
     * @return \Illuminate\Http\Response
     */
    public function edit($project_id, ProjectUpdate $projectUpdate)
    {
        $project = Project::find($project_id);
        $projectUpdate = ProjectUpdate::find($projectUpdate->id);
        return view('project_updates.edit',compact('projectUpdate','project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProjectUpdate  $projectUpdate
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, ProjectUpdate $projectUpdate)
    {
        if($projectUpdate->status_id == 2){
            // Create record for project investment
        }
        $projectUpdate = ProjectUpdate::find($projectUpdate->id);
        $projectUpdate->update_amount = $request->update_amount;
        $projectUpdate->status_id = $request->status_id;
        $projectUpdate->save();
        return redirect()->route('project.index')->withID($id)->withStatus(__('Project update successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProjectUpdate  $projectUpdate
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectUpdate $projectUpdate)
    {
        //
    }
}
