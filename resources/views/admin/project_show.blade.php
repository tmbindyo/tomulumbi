@extends('admin.layouts.app')

@section('title', $project->name)

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-6">
            <h2>Projects</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li>
                    <strong><a href="{{route('admin.projects')}}">Projects</a></strong>
                </li>
                <li class="active">
                    <strong>Project</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-6">
            <div class="title-action">
                <a href="{{route('admin.project.personal.album.create',$project->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Personal Album </a>
                <a href="{{route('admin.project.client.proof.create',$project->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Client Proof </a>
                <a href="{{route('admin.project.design.create',$project->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Design </a>
                <a href="{{route('admin.project.journal.create',$project->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Journal </a>
                @if($project->deal_id)
                    <a href="{{route('admin.deal.show',$project->deal_id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Deal </a>
                @endif
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeIn">

        {{--   project work view  --}}
        <div class="row">

            <div class="col-lg-12">
                <div>
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>
                                <button type="button" class="btn btn-primary m-r-sm">{{$projectArray['projectViews']}}</button>
                                Project Views
                            </td>
                            <td>
                                <button type="button" class="btn btn-success m-r-sm">{{$projectArray['projectGalleryViews']}}</button>
                                Gallery Views
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{--  view graphy  --}}
        <div class="row">
            <div class="">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>
                            Views x Gallery Views
                        </h5>
                    </div>
                    <div class="ibox-content">
                        <div>
                            <canvas id="lineChart" height="100"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <br>
        <div class="row">

            <div class="col-lg-3">
                <div class="widget style1 navy-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h3 class="font-bold">{{$project->user->name}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 {{$project->status->label}}">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            <i class="fa fa-ellipsis-v fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h3 class="font-bold">{{$project->status->name}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 navy-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            <i class="fa fa-plus-square fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h3 class="font-bold">{{$project->created_at}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 navy-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            <i class="fa fa-scissors fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h3 class="font-bold">{{$project->updated_at}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--    Client proof settings    --}}
        <div class="row m-t-lg">
            <div class="col-lg-12 col-md-12">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#collection_settings"> <i class="fa fa-cogs"></i> Collection Settings</a></li>
                        <li class=""><a data-toggle="tab" href="#album-image-project"><i class="fa fa-bookmark"></i> Album Image Project</a></li>
                        <li class=""><a data-toggle="tab" href="#cover-image"><i class="fa fa-bookmark"></i> Cover Image</a></li>
                        <li class=""><a data-toggle="tab" href="#expenses"><i class="fa fa-dollar"></i> Expenses</a></li>
                        <li class=""><a data-toggle="tab" href="#albums"><i class="fa fa-film"></i> Albums</a></li>
                        <li class=""><a data-toggle="tab" href="#designs"><i class="fa fa-paint-brush"></i> Design</a></li>
                        <li class=""><a data-toggle="tab" href="#journals"><i class="fa fa-pencil"></i> Journal</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="collection_settings" class="tab-pane active">
                            <div class="panel-body">
                                <div class="col-md-10 col-md-offset-1">

                                    <form method="post" action="{{ route('admin.project.update',$project->id) }}" autocomplete="off">
                                        @csrf

                                        @if (session('status'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{ session('status') }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                        <br>
                                        <div class="has-warning">
                                            <input name="name" type="text" value="{{$project->name}}" class="form-control input-lg">
                                            <i>Pick something short and sweet. Imagine choosing a title for a photo project cover.</i>
                                        </div>
                                        <br>
                                        <div class="has-warning">
                                            <div class="form-group" id="data_1">
                                                <div class="input-group date">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                    <input type="text" name="date" class="form-control input-lg" value="{{date("m/d/Y", strtotime($project->date))}}">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="has-warning">
                                            <select required="required" name="status" class="select2_demo_status form-control input-lg">
                                            {{--  <select class="form-control m-b input-lg" name="status">  --}}
                                                @foreach($projectStatuses as $projectStatus)
                                                    <option value="{{$projectStatus->id}}" @if($projectStatus->id == $project->status_id) selected @endif>{{$projectStatus->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>You can take the collection online/offline quickly. Hidden collections can only be seen by you.</i>
                                        </div>
                                        <br>
                                        <div class="has-warning">
                                            <select required="required" name="contacts[]" class="select2_demo_contact form-control input-lg">
                                            {{--  <select name="contacts[]" data-placeholder="Choose Contacts:" class="chosen-select form-control-lg" style="width:450px;" tabindex="4" multiple="multiple">  --}}
                                                @foreach($contacts as $contact)
                                                    <option value="{{$contact->id}}" @foreach($projectContacts as $projectContact) @if($projectContact->contact_id == $contact->id) selected @endif @endforeach >{{$contact->first_name}} {{$contact->last_name}}</option>
                                                @endforeach
                                            </select>
                                            <i>contacts</i>
                                        </div>
                                        <br>
                                        <div class="has-warning">
                                            <select required="required" name="project_type" class="select2_demo_project_types form-control input-lg">
                                                @foreach($projectTypes as $projectType)
                                                    <option @if($project->project_type_id == $projectType->id) selected @endif value="{{$projectType->id}}">{{$projectType->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>Project type: What kind of project is this?</i>
                                        </div>
                                        <br>
                                        <div class="has-warning">
                                            <div class="form-group">
                                                <textarea rows="5" id="description" name="description" required="required" class="form-control input-lg">{{$project->description}}</textarea>
                                                <i>description</i>
                                            </div>
                                        </div>

                                        <br>

                                        <textarea name="body"  class="summernote">
                                            @if($project->body)
                                                {{$project->body}}
                                            @else
                                                <h3>Lorem Ipsum is simply</h3>
                                                dummy text of the printing and typesetting industry. <strong>Lorem Ipsum has been the industrys</strong> standard dummy text ever since the 1500s,
                                                when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                                                typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
                                                <br/>
                                                <br/>
                                                <ul>
                                                    <li>Remaining essentially unchanged</li>
                                                    <li>Make a type specimen book</li>
                                                    <li>Unknown printer</li>
                                                </ul>
                                            @endif
                                        </textarea>

                                        <br>

                                        <hr>

                                        <div>
                                            <button class="btn btn-block btn-primary btn-outline btn-lg m-t-n-xs" type="submit"><strong>Update Collection Settings</strong></button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="album-image-project" class="tab-pane">
                            <div class="panel-body">
                                <div class="row m-t-lg">
                                    <div class="col-md-6 col-md-offset-3">
                                        <form method="post" action="{{ route('admin.project.update.design',$project->id) }}" autocomplete="off" enctype = "multipart/form-data">
                                            @csrf
                                            {{--  Project typography  --}}
                                            <div class="col-md-10 col-md-offset-1">
                                                <h3 class="text-center">Typography</h3>
                                                <div class="form-group">
                                                    <select class="form-control m-b input-lg" name="typography">
                                                        @foreach($typographies as $typography)
                                                            <option value="{{$typography->id}}" @if($typography->id === $project->typography_id) selected @endif>{{$typography->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i>Choose between different typography styles to best compliment the proof.</i>
                                                </div>
                                            </div>
                                            {{--  Project thumbnail size  --}}
                                            <div class="col-md-10 col-md-offset-1">
                                                <h4 class="text-center">Thumbnail Size</h4>
                                                <div class="form-group">
                                                    <select class="form-control m-b input-lg" name="thumbnail_size" required>
                                                        @foreach($thumbnailSizes as $thumbnailSize)
                                                            <option value="{{$thumbnailSize->id}}" @if($thumbnailSize->id === $project->thumbnail_size_id) selected @endif>{{$thumbnailSize->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i>Adjust the display size of photos in the gallery.</i>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-lg btn-primary btn-outline btn-block">Update Album Images Project Settings</button>
                                        </form>



                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="cover-image" class="tab-pane">
                            <div class="panel-body">
                                <div class="row m-t-lg">
                                    <div class="col-md-6 col-md-offset-3">
                                        {{--  Cover Image  --}}
                                        <div class="col-md-12">
                                            <button class="btn btn-primary btn-lg btn-outline btn-block" data-toggle="modal" data-target="#albumCoverImageRegistration" aria-expanded="false">Update Cover Image</button>
                                        </div>
                                        <br>
                                        <hr>
                                        <div class="col-md-12">

                                            <div class="center">
                                                <img alt="image" width="470em" class="img-responsive" @isset($project->cover_image) src="{{ asset('') }}{{ $project->cover_image->pixels750 }}" @endisset>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="expenses" class="tab-pane">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                                        <thead>
                                        <tr>
                                            <th>Recurring</th>
                                            <th>Expense #</th>
                                            <th>Date</th>
                                            <th>Expense Type</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th class="text-right" width="35px" data-sort-ignore="true">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($project->expenses as $expense)
                                            <tr class="gradeA">
                                                <td>
                                                    @if($expense->is_recurring == 1)
                                                        <p><span class="badge badge-success">True</span></p>
                                                    @else
                                                        <p><span class="badge badge-success">False</span></p>
                                                    @endif
                                                </td>
                                                <td>{{$expense->reference}}</td>
                                                <td>{{$expense->date}}</td>
                                                <td>{{$expense->expense_account->name}}</td>
                                                <td>{{$expense->total}}</td>
                                                <td>
                                                    <p><span class="label {{$expense->status->label}}">{{$expense->status->name}}</span></p>
                                                </td>
                                                <td class="text-right">
                                                    <div class="btn-group">
                                                        <a href="{{ route('admin.expense.show', $expense->id) }}" class="btn-success btn-outline btn btn-xs">View</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Recurring</th>
                                            <th>Expense #</th>
                                            <th>Date</th>
                                            <th>Expense Type</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th class="text-right" width="35px" data-sort-ignore="true">Action</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="albums" class="tab-pane">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>User</th>
                                                <th>Views</th>
                                                <th>Status</th>
                                                <th width="13em">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($projectAlbums as $projectAlbum)
                                                <tr class="gradeX">
                                                    <td>{{$projectAlbum->name}}</td>
                                                    <td>{{$projectAlbum->date}}</td>
                                                    <td>{{$projectAlbum->user->name}}</td>
                                                    <td>{{$projectAlbum->album_views_count}}</td>
                                                    <td>
                                                        <span class="label {{$projectAlbum->status->label}}">{{$projectAlbum->status->name}}</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <div class="btn-group">
                                                            @if($projectAlbum->album_type_id == "ca64a5e0-d39b-4f2c-a136-9c523d935ea4")
                                                                <a href="{{ route('admin.client.proof.show', $projectAlbum->id) }}" class="btn-white btn btn-xs">View</a>
                                                            @elseif($projectAlbum->album_type_id == "6fdf4858-01ce-43ff-bbe6-827f09fa1cef")
                                                                <a href="{{ route('admin.personal.album.show', $projectAlbum->id) }}" class="btn-white btn btn-xs">View</a>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>User</th>
                                                <th>Views</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="designs" class="tab-pane">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Views</th>
                                            <th>User</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($projectDesigns as $design)
                                            <tr class="gradeX">
                                                <td>{{$design->name}}</td>
                                                <td>{{$design->date}}</td>
                                                <td>{{$design->views}}</td>
                                                <td>{{$design->user->name}}</td>
                                                <td>
                                                    <span class="label {{$design->status->label}}">{{$design->status->name}}</span>
                                                </td>
                                                <td class="text-right">
                                                    <div class="btn-group">
                                                        <a href="{{ route('admin.design.show', $design->id) }}" class="btn-white btn btn-xs">View</a>
                                                        @if($design->status->name == "Deleted")
                                                            <a href="{{ route('admin.design.restore', $design->id) }}" class="btn-warning btn btn-xs">Restore</a>
                                                        @else
                                                            <a href="{{ route('admin.design.delete', $design->id) }}" class="btn-danger btn btn-xs">Delete</a>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Views</th>
                                            <th>User</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="journals" class="tab-pane">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Views</th>
                                            <th>User</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($projectJournals as $journal)
                                            <tr class="gradeX">
                                                <td>{{$journal->name}}</td>
                                                <td>{{$journal->date}}</td>
                                                <td>{{$journal->views}}</td>
                                                <td>{{$journal->user->name}}</td>
                                                <td>
                                                    <span class="label {{$journal->status->label}}">{{$journal->status->name}}</span>
                                                </td>
                                                <td class="text-right">
                                                    <div class="btn-group">
                                                        <a href="{{ route('admin.journal.show', $journal->id) }}" class="btn-white btn btn-xs">View</a>
                                                        @if($journal->status->name == "Deleted")
                                                            <a href="{{ route('admin.journal.restore', $journal->id) }}" class="btn-warning btn btn-xs">Restore</a>
                                                        @else
                                                            <a href="{{ route('admin.journal.delete', $journal->id) }}" class="btn-danger btn btn-xs">Delete</a>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Views</th>
                                            <th>User</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <br>
        {{--  to do Counts  --}}
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <tbody>
                    <tr>
                        <td>
                            <button type="button" class="btn btn-warning m-r-sm">{{$projectArray['pendingToDos']}}</button>
                            Pending
                        </td>
                        <td>
                            <button type="button" class="btn btn-info m-r-sm">{{$projectArray['inProgressToDos']}}</button>
                            In progress
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary m-r-sm">{{$projectArray['completedToDos']}}</button>
                            Completed
                        </td>
                        <td>
                            <button type="button" class="btn btn-success m-r-sm">{{$projectArray['overdueToDos']}}</button>
                            Overdue
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{--    To Dos    --}}
        <div class="row m-t-lg">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>To Dos</h5>
                        <div class="ibox-tools">
                            <a data-toggle="modal" data-target="#toDoRegistration" class="btn btn-success btn-round btn-outline"> <span class="fa fa-plus"></span> New</a>
                        </div>
                    </div>
                    <div class="">
                        <ul class="pending-to-do">
                            @foreach($project->pending_to_dos as $pendingToDo)
                                <li>
                                    <div>
                                        <small>{{$pendingToDo->due_date}}</small>
                                        <h4>{{$pendingToDo->name}}</h4>
                                        <p>{{$pendingToDo->notes}}.</p>
                                        @if($pendingToDo->is_project === 1)
                                            <p><span class="badge badge-primary">{{$pendingToDo->project->name}}</span></p>
                                        @endif
                                        <a href="{{route('admin.to.do.set.in.progress',$pendingToDo->id)}}"><i class="fa fa-arrow-circle-o-right "></i></a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <ul class="in-progress-to-do">
                            @foreach($project->in_progress_to_dos as $inProgressToDo)
                                <li>
                                    <div>
                                        <small>{{$inProgressToDo->due_date}}</small>
                                        <h4>{{$inProgressToDo->name}}</h4>
                                        <p>{{$inProgressToDo->notes}}.</p>
                                        @if($inProgressToDo->is_project === 1)
                                            <p><span class="badge badge-primary">{{$inProgressToDo->project->name}}</span></p>
                                        @endif
                                        <a href="{{route('admin.to.do.set.completed',$inProgressToDo->id)}}"><i class="fa fa-check "></i></a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <ul class="overdue-to-do">
                            @foreach($project->overdue_to_dos as $overdueToDo)
                                <li>
                                    <div>
                                        <small>{{$overdueToDo->due_date}}</small>
                                        <h4>{{$overdueToDo->name}}</h4>
                                        <p>{{$overdueToDo->notes}}.</p>
                                        @if($overdueToDo->is_project === 1)
                                            <p><span class="badge badge-primary">{{$overdueToDo->project->name}}</span></p>
                                        @endif
                                        @if($overdueToDo->status->name === "Pending")
                                            <a href="{{route('admin.to.do.set.completed',$overdueToDo->id)}}"><i class="fa fa-check-double "></i></a>
                                        @elseif($overdueToDo->status->name === "In progress")
                                            <a href="{{route('admin.to.do.set.completed',$overdueToDo->id)}}"><i class="fa fa-check-double "></i></a>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <ul class="completed-to-do">
                            @foreach($project->completed_to_dos as $completedToDo)
                                <li>
                                    <div>
                                        <small>{{$completedToDo->due_date}}</small>
                                        <h4>{{$completedToDo->name}}</h4>
                                        <p>{{$completedToDo->notes}}.</p>
                                        @if($completedToDo->is_project === 1)
                                            <p><span class="badge badge-primary">{{$completedToDo->project->name}}</span></p>
                                        @endif
                                        <a href="{{route('admin.to.do.delete',$completedToDo->id)}}"><i class="fa fa-trash-o "></i></a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection

@include('admin.layouts.modals.project_to_do')
@include('admin.layouts.modals.project_cover_image')

@section('js')

    {{-- download x views line chart  --}}
    <script>
        $(function () {
            var lineData = {
                labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
                datasets: [
                    {
                        label: "Example dataset",
                        fillColor: "rgba(220,220,220,0.5)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [
                            {{$projectViews['views']['1']}},
                            {{$projectViews['views']['2']}},
                            {{$projectViews['views']['3']}},
                            {{$projectViews['views']['4']}},
                            {{$projectViews['views']['5']}},
                            {{$projectViews['views']['6']}},
                            {{$projectViews['views']['7']}},
                            {{$projectViews['views']['8']}},
                            {{$projectViews['views']['9']}},
                            {{$projectViews['views']['10']}},
                            {{$projectViews['views']['11']}},
                            {{$projectViews['views']['12']}}
                        ]
                    },
                    {
                        label: "Example dataset",
                        fillColor: "rgba(26,179,148,0.5)",
                        strokeColor: "rgba(26,179,148,0.7)",
                        pointColor: "rgba(26,179,148,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(26,179,148,1)",
                        data: [
                            {{$projectViews['galleryViews']['1']}},
                            {{$projectViews['galleryViews']['2']}},
                            {{$projectViews['galleryViews']['3']}},
                            {{$projectViews['galleryViews']['4']}},
                            {{$projectViews['galleryViews']['5']}},
                            {{$projectViews['galleryViews']['6']}},
                            {{$projectViews['galleryViews']['7']}},
                            {{$projectViews['galleryViews']['8']}},
                            {{$projectViews['galleryViews']['9']}},
                            {{$projectViews['galleryViews']['10']}},
                            {{$projectViews['galleryViews']['11']}},
                            {{$projectViews['galleryViews']['12']}}
                        ]
                    }
                ]
            };

            var lineOptions = {
                scaleShowGridLines: true,
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleGridLineWidth: 1,
                bezierCurve: true,
                bezierCurveTension: 0.4,
                pointDot: true,
                pointDotRadius: 4,
                pointDotStrokeWidth: 1,
                pointHitDetectionRadius: 20,
                datasetStroke: true,
                datasetStrokeWidth: 2,
                datasetFill: true,
                responsive: true,
            };


            var ctx = document.getElementById("lineChart").getContext("2d");
            var myNewChart = new Chart(ctx).Line(lineData, lineOptions);
        });
    </script>

@endsection
