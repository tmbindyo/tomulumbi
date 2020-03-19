@extends('admin.layouts.app')

@section('title', 'Deal')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-3">
            <h2>Deals</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.deals')}}">Deals</a></strong>
                </li>
                <li class="active">
                    <strong>Deal</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-9">
            <div class="title-action">
                <a href="{{route('admin.deal.client.proof.create',$deal->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Client Proof </a>
                <a href="{{route('admin.deal.design.create',$deal->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Design </a>
                <a href="{{route('admin.deal.project.create',$deal->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Project </a>
                <a href="{{route('admin.deal.quote.create',$deal->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Quote </a>
                @if($deal->campaign_id)
                    <a href="{{route('admin.campaign.show',$deal->campaign_id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Campaign </a>
                @endif
                @if($deal->contact_id)
                    <a href="{{route('admin.contact.show',$deal->contact_id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Contact </a>
                @endif
                @if($deal->organization_id)
                    <a href="{{route('admin.organization.show',$deal->organization_id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Organization </a>
                @endif
            </div>
        </div>
    </div>


    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-12">
                <div>
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>
                                <button type="button" class="btn btn-warning m-r-sm">  </button>
                                Albums
                            </td>
                            <td>
                                <button type="button" class="btn btn-info m-r-sm">  </button>
                                Projects
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary m-r-sm">  </button>
                                Designs
                            </td>
                            <td>
                                <button type="button" class="btn btn-info m-r-sm">  </button>
                                Quotes
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div>

                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{ route('admin.deal.update',$deal->id) }}" autocomplete="off" class="form-horizontal form-label-left">
                                    @csrf

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12 input-lg" required="required" value="{{$deal->name}}">
                                                <i>name</i>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="number" id="amount" name="amount" required="required" class="form-control col-md-7 col-xs-12 input-lg" required="required" value="{{$deal->amount}}">
                                                <i>amount</i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="has-warning" id="data_1">
                                                <div class="input-group date">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                    <input type="text" name="starting_date" class="form-control input-lg" value="{{$deal->starting_date}}">
                                                </div>
                                                <i>start date for the deal.</i>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="has-warning" id="data_1">
                                                <div class="input-group date">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                    <input type="text" name="closing_date" class="form-control input-lg" value="{{$deal->closing_date}}">
                                                </div>
                                                <i>closing date for the deal.</i>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select name="deal_stage" class="select2_demo_deal_stage form-control input-lg">
                                                <option></option>
                                                @foreach($dealStages as $dealStage)
                                                    <option @if($dealStage->id == $deal->deal_stage_id) selected @endif value="{{$dealStage->id}}">{{$dealStage->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>deal stage</i>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="number" id="probability" name="probability" required="required" class="form-control col-md-7 col-xs-12 input-lg" required="required" value="{{$deal->probability}}">
                                                <i>probability</i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select name="organization" class="select2_demo_organization form-control input-lg">
                                                <option></option>
                                                @foreach($organizations as $organization)
                                                    <option @if($organization->id == $deal->organization_id) selected @endif value="{{$organization->id}}">{{$organization->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>organization</i>
                                        </div>
                                        <div class="col-md-6">
                                            <select name="contact" class="select2_demo_contact form-control input-lg">
                                                <option></option>
                                                @foreach($contacts as $contact)
                                                    <option @if($contact->id == $deal->contact_id) selected @endif value="{{$contact->id}}">{{$contact->first_name}} {{$contact->last_name}}</option>
                                                @endforeach
                                            </select>
                                            <i>contact</i>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select name="lead_source" class="select2_demo_lead_source form-control input-lg">
                                                <option></option>
                                                @foreach($leadSources as $leadSource)
                                                    <option @if($leadSource->id == $deal->lead_source_id) selected @endif value="{{$leadSource->id}}">{{$leadSource->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>lead source</i>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <select name="campaign" class="select2_demo_campaign form-control input-lg">
                                                    <option></option>
                                                    @foreach($campaigns as $campaign)
                                                        <option @if($campaign->id == $deal->campaign_id) selected @endif value="{{$campaign->id}}">{{$campaign->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i>campaign</i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="has-warning">
                                                <textarea id="about" rows="5" name="about" class="resizable_textarea form-control input-lg" required="required">{{$deal->about}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-block btn-lg btn-outline btn-success mt-4">{{ __('SAVE') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{--  details  --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row">

                                <div class="col-lg-3">
                                    <div class="widget style1 navy-bg">
                                        <div class="row vertical-align">
                                            <div class="col-xs-3">
                                                <i class="fa fa-user fa-3x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <h3 class="font-bold">{{$deal->user->name}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="widget style1 {{$deal->status->label}}">
                                        <div class="row vertical-align">
                                            <div class="col-xs-3">
                                                <i class="fa fa-ellipsis-v fa-3x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <h3 class="font-bold">{{$deal->status->name}}</h3>
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
                                                <h3 class="font-bold">{{$deal->created_at}}</h3>
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
                                                <h3 class="font-bold">{{$deal->updated_at}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-sm">
                                <div class="col-lg-12">
                                <div class="panel blank-panel">
                                <div class="panel-heading">
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#albums" data-toggle="tab">Albums</a></li>
                                            <li class=""><a href="#designs" data-toggle="tab">Design</a></li>
                                            <li class=""><a href="#projects" data-toggle="tab">Projects</a></li>
                                            <li class=""><a href="#quotes" data-toggle="tab">Quotes</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="albums">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Name</th>
                                                        <th>Views</th>
                                                        <th>User</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($albums as $album)
                                                        <tr class="gradeX">
                                                            <td>{{$album->date}}</td>
                                                            <td>{{$album->name}}</td>
                                                            <td>{{$album->views}}</td>
                                                            <td>{{$album->user->name}}</td>
                                                            <td>
                                                                <span class="label {{$album->status->label}}">{{$album->status->name}}</span>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                    @if($album->album_type_id == "6fdf4858-01ce-43ff-bbe6-827f09fa1cef")
                                                                        <a href="{{ route('admin.personal.album.show', $album->id) }}" class="btn-white btn btn-xs">View</a>
                                                                    @elseif($album->album_type_id == "ca64a5e0-d39b-4f2c-a136-9c523d935ea4")
                                                                        <a href="{{ route('admin.client.proof.show', $album->id) }}" class="btn-white btn btn-xs">View</a>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Name</th>
                                                        <th>Views</th>
                                                        <th>User</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="designs">

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
                                                    @foreach($designs as $design)
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
                                        <div class="tab-pane" id="projects">

                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Name</th>
                                                        <th>Views</th>
                                                        <th>User</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($projects as $project)
                                                        <tr class="gradeX">
                                                            <td>{{$project->date}}</td>
                                                            <td>{{$project->name}}</td>
                                                            <td>{{$project->views}}</td>
                                                            <td>{{$project->user->name}}</td>
                                                            <td>
                                                                <span class="label {{$project->status->label}}">{{$project->status->name}}</span>
                                                            </td>

                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                    <a href="{{ route('admin.project.show', $project->id) }}" class="btn-white btn btn-xs">View</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Name</th>
                                                        <th>Views</th>
                                                        <th>User</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="quotes">

                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                    <tr>
                                                        <th>Reference</th>
                                                        <th>Due Date</th>
                                                        <th>Total</th>
                                                        <th>Paid</th>
                                                        <th>Balance</th>
                                                        <th>Info</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($quotes as $quote)
                                                        <tr class="gradeX">
                                                            <td>{{$quote->reference}}</td>
                                                            <td>{{$quote->due_date}}</td>
                                                            <td>{{$quote->total}}</td>
                                                            <td>{{$quote->paid}}</td>
                                                            <td>{{$quote->balance}}</td>
                                                            <td>
                                                                @if ($quote->is_draft == True)
                                                                    <span class="label label-danger">Draft</span>
                                                                @else
                                                                    <span class="label label-warning">Live</span>
                                                                @endif
                                                                @if ($quote->is_accepted == True)
                                                                    <span class="label label-danger">Accepted</span>
                                                                @else
                                                                    <span class="label label-warning">Live</span>
                                                                @endif
                                                                @if ($quote->is_rejected == True)
                                                                    <span class="label label-danger">Rejected</span>
                                                                @endif
                                                                @if ($quote->is_cancelled == True)
                                                                    <span class="label label-danger">Cancelled</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <span class="label {{$quote->status->label}}">{{$quote->status->name}}</span>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                    <a href="{{ route('admin.quote.show', $quote->id) }}" class="btn-white btn btn-xs">View</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Reference</th>
                                                        <th>Due Date</th>
                                                        <th>Total</th>
                                                        <th>Paid</th>
                                                        <th>Balance</th>
                                                        <th>Info</th>
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
                        </div>
                    </div>
                </div>
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
                            @foreach($deal->pending_to_dos as $pendingToDo)
                                <li>
                                    <div>
                                        <small>{{$pendingToDo->due_date}}</small>
                                        <h4>{{$pendingToDo->name}}</h4>
                                        <p>{{$pendingToDo->notes}}.</p>
                                        @if($pendingToDo->is_design === 1)
                                            <p><span class="badge badge-primary">{{$pendingToDo->design->name}}</span></p>
                                        @endif
                                        <a href="{{route('admin.to.do.set.in.progress',$pendingToDo->id)}}"><i class="fa fa-arrow-circle-o-right "></i></a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <ul class="in-progress-to-do">
                            @foreach($deal->in_progress_to_dos as $inProgressToDo)
                                <li>
                                    <div>
                                        <small>{{$inProgressToDo->due_date}}</small>
                                        <h4>{{$inProgressToDo->name}}</h4>
                                        <p>{{$inProgressToDo->notes}}.</p>
                                        @if($inProgressToDo->is_design === 1)
                                            <p><span class="badge badge-primary">{{$inProgressToDo->design->name}}</span></p>
                                        @endif
                                        <a href="{{route('admin.to.do.set.completed',$inProgressToDo->id)}}"><i class="fa fa-check "></i></a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <ul class="overdue-to-do">
                            @foreach($deal->overdue_to_dos as $overdueToDo)
                                <li>
                                    <div>
                                        <small>{{$overdueToDo->due_date}}</small>
                                        <h4>{{$overdueToDo->name}}</h4>
                                        <p>{{$overdueToDo->notes}}.</p>
                                        @if($overdueToDo->is_design === 1)
                                            <p><span class="badge badge-primary">{{$overdueToDo->design->name}}</span></p>
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
                            @foreach($deal->completed_to_dos as $completedToDo)
                                <li>
                                    <div>
                                        <small>{{$completedToDo->due_date}}</small>
                                        <h4>{{$completedToDo->name}}</h4>
                                        <p>{{$completedToDo->notes}}.</p>
                                        @if($completedToDo->is_design === 1)
                                            <p><span class="badge badge-primary">{{$completedToDo->design->name}}</span></p>
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

@include('admin.layouts.modals.deal_to_do')

@section('js')



@endsection
