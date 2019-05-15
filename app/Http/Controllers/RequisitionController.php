<?php

namespace App\Http\Controllers;

use Auth;
use App\Project;
use App\ProjectMilestone;
use App\Requisition;
use Illuminate\Http\Request;
use App\Http\Requests\RequisitionRequest;

class RequisitionController extends Controller
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
        $projectMilestone = ProjectMilestone::find($id);
        return $id;
        return view("requisitions.create", ["projectMilestone"=>$projectMilestone]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, RequisitionRequest $request, Requisition $model)
    {
        $projectMilestone = ProjectMilestone::find($id);
        $projectMilestone->used_budget = (int)$projectMilestone->used_budget+$request->amount;
        $projectMilestone->remaining_budget = (int)$projectMilestone->total_budget-($projectMilestone->used_budget+$request->amount);
        $projectMilestone->save();

        $project = Project::find($projectMilestone->id);
        $project->used_budget = (int)$project->used_budget+$request->amount;
        $project->remaining_budget = (int)$project->contributed_budget-($project->used_budget+$request->amount);
        $project->save();

        $requsitition = new Requisition;
        $requsitition->item_name = $request->item_name;
        $requsitition->description = $request->description;
        $requsitition->reason = $request->reason;
        $requsitition->project_milestones_id = $projectMilestone->id;
        $requsitition->number = $request->number;
        $requsitition->amount = $request->amount;
        $requsitition->user_id = Auth::user()->id;
        $requsitition->status_id = 1;
        $requsitition->save();
        return redirect()->route('project.index')->withID($id)->withStatus(__('Project milestone successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function show(Requisition $requisition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Requisition  $requisition
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
     * @param  \App\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requisition $requisition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requisition $requisition)
    {
        //
    }
}
