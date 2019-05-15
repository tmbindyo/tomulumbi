<?php

namespace App\Http\Controllers;

use Auth;
use App\Project;
use App\ProjectMilestone;
use App\Requisition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $project = Project::find($id);

        $projectMilestone = new ProjectMilestone;
        $projectMilestone->name = $request->name;
        $projectMilestone->description = $request->description;
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
        return redirect()->route('project.index')->withID($id)->withStatus(__('Project milestone successfully created.'));
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
