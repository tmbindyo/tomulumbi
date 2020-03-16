@extends('admin.layouts.app')

@section('title', "To Do's")

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>To Dos</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('admin.dashboard')}}">Home</a>
                </li>
                <li class="active">
                    <strong>To Dos</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-3">
            <div class="title-action">
                <a href="#" data-toggle="modal" data-target="#toDoRegistration" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> To Do </a>
            </div>
        </div>
    </div>


    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="row">

            <div class="col-lg-12">
                <div>
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>
                                <button type="button" class="btn btn-warning m-r-sm">{{$toDoStatusCount['pendingToDos']}}</button>
                                Pending
                            </td>
                            <td>
                                <button type="button" class="btn btn-info m-r-sm">{{$toDoStatusCount['inProgressToDos']}}</button>
                                In progress
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary m-r-sm">{{$toDoStatusCount['completedToDos']}}</button>
                                Completed
                            </td>
                            <td>
                                <button type="button" class="btn btn-success m-r-sm">{{$toDoStatusCount['overdueToDos']}}</button>
                                Overdue
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div>

                </div>
            </div>

        </div>

        <ul class="pending-to-do">
            @foreach($pendingToDos as $pendingToDo)
                <li>
                    <div>
                        <small>{{$pendingToDo->due_date}}</small>
                        <h4>{{$pendingToDo->name}}</h4>
                        <p>{{$pendingToDo->notes}}.</p>
                        @if($pendingToDo->is_album === 1)
                            <p><span class="badge badge-primary">Album:{{$pendingToDo->album->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_design === 1)
                            <p><span class="badge badge-primary">Design:{{$pendingToDo->design->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_journal === 1)
                            <p><span class="badge badge-primary">Journal:{{$pendingToDo->journal->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_project === 1)
                            <p><span class="badge badge-primary">Project:{{$pendingToDo->project->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_product === 1)
                            <p><span class="badge badge-primary">Product:{{$pendingToDo->product->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_order === 1)
                            <p><span class="badge badge-primary">Order:{{$pendingToDo->order->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_email === 1)
                            <p><span class="badge badge-primary">Email:{{$pendingToDo->email->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_contact === 1)
                            <p><span class="badge badge-primary">Contact:{{$pendingToDo->contact->first_name}} {{$pendingToDo->contact->last_name}}</span></p>
                        @endif
                        @if($pendingToDo->is_organization === 1)
                            <p><span class="badge badge-primary">Organization:{{$pendingToDo->organization->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_deal === 1)
                            <p><span class="badge badge-primary">Deal:{{$pendingToDo->deal->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_campaign === 1)
                            <p><span class="badge badge-primary">Campaign:{{$pendingToDo->campaign->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_asset === 1)
                            <p><span class="badge badge-primary">Campaign:{{$pendingToDo->asset->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_kit === 1)
                            <p><span class="badge badge-primary">Campaign:{{$pendingToDo->kit->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_asset_action === 1)
                            <p><span class="badge badge-primary">Campaign:{{$pendingToDo->asset_action->name}}</span></p>
                        @endif
                        <a href="{{route('admin.to.do.set.in.progress',$pendingToDo->id)}}"><i class="fa fa-arrow-circle-o-right "></i></a>
                    </div>
                </li>
            @endforeach
        </ul>
        <ul class="in-progress-to-do">
            @foreach($inProgressToDos as $inProgressToDo)
                <li>
                    <div>
                        <small>{{$inProgressToDo->due_date}}</small>
                        <h4>{{$inProgressToDo->name}}</h4>
                        <p>{{$inProgressToDo->notes}}.</p>
                        @if($inProgressToDo->is_album === 1)
                            <p><span class="badge badge-primary">Album:{{$inProgressToDo->album->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_design === 1)
                            <p><span class="badge badge-primary">Design:{{$inProgressToDo->design->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_journal === 1)
                            <p><span class="badge badge-primary">Journal:{{$inProgressToDo->journal->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_project === 1)
                            <p><span class="badge badge-primary">Project:{{$inProgressToDo->project->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_product === 1)
                            <p><span class="badge badge-primary">Product:{{$inProgressToDo->product->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_order === 1)
                            <p><span class="badge badge-primary">Order:{{$inProgressToDo->order->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_email === 1)
                            <p><span class="badge badge-primary">Email:{{$inProgressToDo->email->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_contact === 1)
                            <p><span class="badge badge-primary">Contact:{{$inProgressToDo->contact->first_name}} {{$inProgressToDo->contact->last_name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_organization === 1)
                            <p><span class="badge badge-primary">Organization:{{$inProgressToDo->organization->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_deal === 1)
                            <p><span class="badge badge-primary">Deal:{{$inProgressToDo->deal->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_campaign === 1)
                            <p><span class="badge badge-primary">Campaign:{{$inProgressToDo->campaign->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_asset === 1)
                            <p><span class="badge badge-primary">Campaign:{{$inProgressToDo->asset->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_kit === 1)
                            <p><span class="badge badge-primary">Campaign:{{$inProgressToDo->kit->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_asset_action === 1)
                            <p><span class="badge badge-primary">Campaign:{{$inProgressToDo->asset_action->name}}</span></p>
                        @endif
                        <a href="{{route('admin.to.do.set.completed',$inProgressToDo->id)}}"><i class="fa fa-check "></i></a>
                    </div>
                </li>
            @endforeach
        </ul>
        <ul class="overdue-to-do">
            @foreach($overdueToDos as $overdueToDo)
                <li>
                    <div>
                        <small>{{$overdueToDo->due_date}}</small>
                        <h4>{{$overdueToDo->name}}</h4>
                        <p>{{$overdueToDo->notes}}.</p>
                        @if($overdueToDo->is_album === 1)
                            <p><span class="badge badge-primary">Album:{{$overdueToDo->album->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_design === 1)
                            <p><span class="badge badge-primary">Design:{{$overdueToDo->design->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_journal === 1)
                            <p><span class="badge badge-primary">Journal:{{$overdueToDo->journal->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_project === 1)
                            <p><span class="badge badge-primary">Project:{{$overdueToDo->project->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_product === 1)
                            <p><span class="badge badge-primary">Product:{{$overdueToDo->product->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_order === 1)
                            <p><span class="badge badge-primary">Order:{{$overdueToDo->order->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_email === 1)
                            <p><span class="badge badge-primary">Email:{{$overdueToDo->email->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_contact === 1)
                            <p><span class="badge badge-primary">Contact:{{$overdueToDo->contact->first_name}} {{$overdueToDo->contact->last_name}}</span></p>
                        @endif
                        @if($overdueToDo->is_organization === 1)
                            <p><span class="badge badge-primary">Organization:{{$overdueToDo->organization->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_deal === 1)
                            <p><span class="badge badge-primary">Deal:{{$overdueToDo->deal->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_campaign === 1)
                            <p><span class="badge badge-primary">Campaign:{{$overdueToDo->campaign->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_asset === 1)
                            <p><span class="badge badge-primary">Campaign:{{$overdueToDo->asset->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_kit === 1)
                            <p><span class="badge badge-primary">Campaign:{{$overdueToDo->kit->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_asset_action === 1)
                            <p><span class="badge badge-primary">Campaign:{{$overdueToDo->asset_action->name}}</span></p>
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
            @foreach($completedToDos as $completedToDo)
                <li>
                    <div>
                        <small>{{$completedToDo->due_date}}</small>
                        <h4>{{$completedToDo->name}}</h4>
                        <p>{{$completedToDo->notes}}.</p>
                        @if($completedToDo->is_album === 1)
                            <p><span class="badge badge-primary">Album:{{$completedToDo->album->name}}</span></p>
                        @endif
                        @if($completedToDo->is_design === 1)
                            <p><span class="badge badge-primary">Design:{{$completedToDo->design->name}}</span></p>
                        @endif
                        @if($completedToDo->is_journal === 1)
                            <p><span class="badge badge-primary">Journal:{{$completedToDo->journal->name}}</span></p>
                        @endif
                        @if($completedToDo->is_project === 1)
                            <p><span class="badge badge-primary">Project:{{$completedToDo->project->name}}</span></p>
                        @endif
                        @if($completedToDo->is_product === 1)
                            <p><span class="badge badge-primary">Product:{{$completedToDo->product->name}}</span></p>
                        @endif
                        @if($completedToDo->is_order === 1)
                            <p><span class="badge badge-primary">Order:{{$completedToDo->order->name}}</span></p>
                        @endif
                        @if($completedToDo->is_email === 1)
                            <p><span class="badge badge-primary">Email:{{$completedToDo->email->name}}</span></p>
                        @endif
                        @if($completedToDo->is_contact === 1)
                            <p><span class="badge badge-primary">Contact:{{$completedToDo->contact->first_name}} {{$completedToDo->contact->last_name}}</span></p>
                        @endif
                        @if($completedToDo->is_organization === 1)
                            <p><span class="badge badge-primary">Organization:{{$completedToDo->organization->name}}</span></p>
                        @endif
                        @if($completedToDo->is_deal === 1)
                            <p><span class="badge badge-primary">Deal:{{$completedToDo->deal->name}}</span></p>
                        @endif
                        @if($completedToDo->is_campaign === 1)
                            <p><span class="badge badge-primary">Campaign:{{$completedToDo->campaign->name}}</span></p>
                        @endif
                        @if($completedToDo->is_asset === 1)
                            <p><span class="badge badge-primary">Campaign:{{$completedToDo->asset->name}}</span></p>
                        @endif
                        @if($completedToDo->is_kit === 1)
                            <p><span class="badge badge-primary">Campaign:{{$completedToDo->kit->name}}</span></p>
                        @endif
                        @if($completedToDo->is_asset_action === 1)
                            <p><span class="badge badge-primary">Campaign:{{$completedToDo->asset_action->name}}</span></p>
                        @endif
                        <a href="{{route('admin.to.do.delete',$completedToDo->id)}}"><i class="fa fa-trash-o "></i></a>
                    </div>
                </li>
            @endforeach
        </ul>

    </div>

@endsection

@include('admin.layouts.modals.to_do')
