<?php

namespace App\Http\Controllers;

use Auth;
use App\Project;
use App\ProjectMilestone;
use App\Requisition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ProjectMilestoneRequest;

class ProjectMilestoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProjectMilestone $model)
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
        return view("project_milestones.create", ["project"=>$project]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, ProjectMilestoneRequest $request, ProjectMilestone $model)
    {
        if (Input::file("image")){

        $image = Input::file("image");
        $image_name = $image->getClientOriginalName();
        $image->move(public_path()."/projects/", $image_name);
        }
        else {
            $image_name = '';
        }

        $project = Project::find($id);

        $projectMilestone = new ProjectMilestone;
        $projectMilestone->name = $request->name;
        $projectMilestone->description = $request->description;
        $projectMilestone->image = "/projects/.$image_name";
        $projectMilestone->priority = $request->priority;
        $projectMilestone->project_id = $project->id;
        $projectMilestone->total_budget = $request->total_budget;
        $projectMilestone->used_budget = 0;
        $projectMilestone->remaining_budget = $request->total_budget;
        $projectMilestone->start_date = date('Y-m-d', strtotime($request->start_date));
        $projectMilestone->end_date = date('Y-m-d', strtotime($request->end_date));
        $projectMilestone->user_id = Auth::user()->id;
        $projectMilestone->assignee_id = 0;
        $projectMilestone->status_id = 1;
        $projectMilestone->save();


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
     * @param  \App\ProjectMilestone  $projectMilestone
     * @return \Illuminate\Http\Response
     */
    public function show($project_id, ProjectMilestone $projectMilestone)
    {
        $project = Project::find($project_id);
        $projectMilestone = ProjectMilestone::find($projectMilestone->id);
        $requisitions = DB::table('requisitions')->where('project_milestones_id', $projectMilestone->id)->get();
        return view('project_milestones.show')->withProject($project)->withProjectMilestone($projectMilestone)->withRequisitions($requisitions);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProjectMilestone  $projectMilestone
     * @return \Illuminate\Http\Response
     */
    public function edit($project_id, ProjectMilestone $projectMilestone)
    {
        $project = Project::find($project_id);
        $projectMilestone = ProjectMilestone::find($projectMilestone->id);
        $requisitions = DB::table('requisitions')->where('project_milestones_id', $projectMilestone->id)->get();
        return view('project_milestones.edit')->withProject($project)->withProjectMilestone($projectMilestone)->withRequisitions($requisitions);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProjectMilestone  $projectMilestone
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, ProjectMilestone $projectMilestone)
    {
        $projectMilestone = ProjectMilestone::find($projectMilestone->id);
        $projectMilestone->name = $request->name;
        $projectMilestone->description = $request->description;
        $projectMilestone->priority = $request->priority;
        $projectMilestone->save();
        return redirect()->route('project.index')->withID($id)->withStatus(__('Project milestone successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProjectMilestone  $projectMilestone
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectMilestone $projectMilestone)
    {
        $projectMilestone->delete();
        return redirect()->route('project_milestones.index')->withStatus(__('Project milestone successfully deleted.'));
    }
}
