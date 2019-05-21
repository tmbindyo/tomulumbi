<?php

namespace App\Http\Controllers;

use Auth;
use App\Project;
use App\ProjectUpdate;
use Illuminate\Http\Request;
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
        
        $image = Input::file("image");
        $image_name = $image->getClientOriginalName();
        $image->move(public_path()."/images/projects/", $image_name);
 

        $projectUpdate = new ProjectUpdate;
        $projectUpdate->name = $request->name;
        $projectUpdate->image = $image;
        $projectUpdate->description = $request->description;
        $projectUpdate->project_id = $project->id;
        $projectUpdate->user_id = Auth::user()->id;
        $projectUpdate->status_id = 1;
        $projectUpdate->save();

        $projectUpdates = ProjectUpdate::find($project->id);
        return redirect()->route('project.index')->withID($id)->withStatus(__('Project update successfully created.'));
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
