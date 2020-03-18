@extends('admin.layouts.app')

@section('title', "To Dos")

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>To Dos</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
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
                            <p><span style="color:#C2F970;" class="badge">Album:{{$pendingToDo->album->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_design === 1)
                            <p><span style="color:#2D0320;" class="badge">Design:{{$pendingToDo->design->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_journal === 1)
                            <p><span style="color:#564D80;" class="badge">Journal:{{$pendingToDo->journal->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_journal_series === 1)
                            <p><span style="color:#6C969D;" class="badge">Journal Series:{{$pendingToDo->journal_series->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_project === 1)
                            <p><span style="color:#D3FCD5;" class="badge">Project:{{$pendingToDo->project->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_product === 1)
                            <p><span style="color:#D8CFAF;" class="badge">Product:{{$pendingToDo->product->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_order === 1)
                            <p><span style="color:#E6B89C;" class="badge">Order:{{$pendingToDo->order->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_email === 1)
                            <p><span style="color:#ED9390;" class="badge">Email:{{$pendingToDo->email->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_contact === 1)
                            <p><span style="color:#F374AE;" class="badge">Contact:{{$pendingToDo->contact->first_name}} {{$pendingToDo->contact->last_name}}</span></p>
                        @endif
                        @if($pendingToDo->is_organization === 1)
                            <p><span style="color:#32533D;" class="badge">Organization:{{$pendingToDo->organization->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_deal === 1)
                            <p><span style="color:#31231E;" class="badge">Deal:{{$pendingToDo->deal->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_campaign === 1)
                            <p><span style="color:#5A3A31;" class="badge">Campaign:{{$pendingToDo->campaign->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_asset === 1)
                            <p><span style="color:#84714F;" class="badge">Asset:{{$pendingToDo->asset->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_kit === 1)
                            <p><span style="color:#E3D888;" class="badge">Kit:{{$pendingToDo->kit->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_asset_action === 1)
                            <p><span style="color:#E2F1AF;" class="badge">Asset Action:{{$pendingToDo->asset_action->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_tudeme === 1)
                            <p><span style="color:#C2F970;" class="badge">Tudeme:{{$pendingToDo->tudeme->name}}</span></p>
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
                            <p><span style="color:#C2F970;" class="badge">Album:{{$inProgressToDo->album->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_design === 1)
                            <p><span style="color:#2D0320;" class="badge">Design:{{$inProgressToDo->design->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_journal === 1)
                            <p><span style="color:#564D80;" class="badge">Journal:{{$inProgressToDo->journal->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_journal_series === 1)
                            <p><span style="color:#6C969D;" class="badge">Journal Series:{{$inProgressToDo->journal_series->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_project === 1)
                            <p><span style="color:#D3FCD5;" class="badge">Project:{{$inProgressToDo->project->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_product === 1)
                            <p><span style="color:#D8CFAF;" class="badge">Product:{{$inProgressToDo->product->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_order === 1)
                            <p><span style="color:#E6B89C;" class="badge">Order:{{$inProgressToDo->order->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_email === 1)
                            <p><span style="color:#ED9390;" class="badge">Email:{{$inProgressToDo->email->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_contact === 1)
                            <p><span style="color:#F374AE;" class="badge">Contact:{{$inProgressToDo->contact->first_name}} {{$inProgressToDo->contact->last_name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_organization === 1)
                            <p><span style="color:#32533D;" class="badge">Organization:{{$inProgressToDo->organization->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_deal === 1)
                            <p><span style="color:#31231E;" class="badge">Deal:{{$inProgressToDo->deal->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_campaign === 1)
                            <p><span style="color:#5A3A31;" class="badge">Campaign:{{$inProgressToDo->campaign->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_asset === 1)
                            <p><span style="color:#84714F;" class="badge">Asset:{{$inProgressToDo->asset->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_kit === 1)
                            <p><span style="color:#E3D888;" class="badge">Kit:{{$inProgressToDo->kit->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_asset_action === 1)
                            <p><span style="color:#E2F1AF;" class="badge">Asset Action:{{$inProgressToDo->asset_action->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_tudeme === 1)
                            <p><span style="color:#C2F970;" class="badge">Tudeme:{{$inProgressToDo->tudeme->name}}</span></p>
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
                            <p><span style="color:#C2F970;" class="badge">Album:{{$overdueToDo->album->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_design === 1)
                            <p><span style="color:#2D0320;" class="badge">Design:{{$overdueToDo->design->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_journal === 1)
                            <p><span style="color:#564D80;" class="badge">Journal:{{$overdueToDo->journal->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_journal_series === 1)
                            <p><span style="color:#6C969D;" class="badge">Journal Series:{{$overdueToDo->journal_series->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_project === 1)
                            <p><span style="color:#D3FCD5;" class="badge">Project:{{$overdueToDo->project->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_product === 1)
                            <p><span style="color:#D8CFAF;" class="badge">Product:{{$overdueToDo->product->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_order === 1)
                            <p><span style="color:#E6B89C;" class="badge">Order:{{$overdueToDo->order->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_email === 1)
                            <p><span style="color:#ED9390;" class="badge">Email:{{$overdueToDo->email->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_contact === 1)
                            <p><span style="color:#F374AE;" class="badge">Contact:{{$overdueToDo->contact->first_name}} {{$overdueToDo->contact->last_name}}</span></p>
                        @endif
                        @if($overdueToDo->is_organization === 1)
                            <p><span style="color:#32533D;" class="badge">Organization:{{$overdueToDo->organization->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_deal === 1)
                            <p><span style="color:#31231E;" class="badge">Deal:{{$overdueToDo->deal->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_campaign === 1)
                            <p><span style="color:#5A3A31;" class="badge">Campaign:{{$overdueToDo->campaign->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_asset === 1)
                            <p><span style="color:#84714F;" class="badge">Asset:{{$overdueToDo->asset->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_kit === 1)
                            <p><span style="color:#E3D888;" class="badge">Kit:{{$overdueToDo->kit->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_asset_action === 1)
                            <p><span style="color:#E2F1AF;" class="badge">Asset Action:{{$overdueToDo->asset_action->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_tudeme === 1)
                            <p><span style="color:#C2F970;" class="badge">Tudeme:{{$overdueToDo->tudeme->name}}</span></p>
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
                            <p><span style="color:#C2F970;" class="badge">Album:{{$completedToDo->album->name}}</span></p>
                        @endif
                        @if($completedToDo->is_design === 1)
                            <p><span style="color:#2D0320;" class="badge">Design:{{$completedToDo->design->name}}</span></p>
                        @endif
                        @if($completedToDo->is_journal === 1)
                            <p><span style="color:#564D80;" class="badge">Journal:{{$completedToDo->journal->name}}</span></p>
                        @endif
                        @if($completedToDo->is_journal_series === 1)
                            <p><span style="color:#6C969D;" class="badge">Journal Series:{{$completedToDo->journal_series->name}}</span></p>
                        @endif
                        @if($completedToDo->is_project === 1)
                            <p><span style="color:#D3FCD5;" class="badge">Project:{{$completedToDo->project->name}}</span></p>
                        @endif
                        @if($completedToDo->is_product === 1)
                            <p><span style="color:#D8CFAF;" class="badge">Product:{{$completedToDo->product->name}}</span></p>
                        @endif
                        @if($completedToDo->is_order === 1)
                            <p><span style="color:#E6B89C;" class="badge">Order:{{$completedToDo->order->name}}</span></p>
                        @endif
                        @if($completedToDo->is_email === 1)
                            <p><span style="color:#ED9390;" class="badge">Email:{{$completedToDo->email->name}}</span></p>
                        @endif
                        @if($completedToDo->is_contact === 1)
                            <p><span style="color:#F374AE;" class="badge">Contact:{{$completedToDo->contact->first_name}} {{$completedToDo->contact->last_name}}</span></p>
                        @endif
                        @if($completedToDo->is_organization === 1)
                            <p><span style="color:#32533D;" class="badge">Organization:{{$completedToDo->organization->name}}</span></p>
                        @endif
                        @if($completedToDo->is_deal === 1)
                            <p><span style="color:#31231E;" class="badge">Deal:{{$completedToDo->deal->name}}</span></p>
                        @endif
                        @if($completedToDo->is_campaign === 1)
                            <p><span style="color:#5A3A31;" class="badge">Campaign:{{$completedToDo->campaign->name}}</span></p>
                        @endif
                        @if($completedToDo->is_asset === 1)
                            <p><span style="color:#84714F;" class="badge">Asset:{{$completedToDo->asset->name}}</span></p>
                        @endif
                        @if($completedToDo->is_kit === 1)
                            <p><span style="color:#E3D888;" class="badge">Kit:{{$completedToDo->kit->name}}</span></p>
                        @endif
                        @if($completedToDo->is_asset_action === 1)
                            <p><span style="color:#E2F1AF;" class="badge">Asset Action:{{$completedToDo->asset_action->name}}</span></p>
                        @endif
                        @if($completedToDo->is_tudeme === 1)
                            <p><span style="color:#C2F970;" class="badge">Tudeme:{{$completedToDo->tudeme->name}}</span></p>
                        @endif
                        <a href="{{route('admin.to.do.delete',$completedToDo->id)}}"><i class="fa fa-trash-o "></i></a>
                    </div>
                </li>
            @endforeach
        </ul>

    </div>

@endsection

@include('admin.layouts.modals.to_do')
