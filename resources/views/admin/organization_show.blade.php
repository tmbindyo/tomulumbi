@extends('admin.layouts.app')

@section('title', 'Organization Create')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-6">
            <h2>Organizations</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li>
                    <strong>CRM</strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.organizations')}}">Organizations</a></strong>
                </li>
                <li class="active">
                    <strong>Organization Create</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-6">
            <div class="title-action">
                @if($organization->campaign_id)
                    <a href="{{route('admin.campaign.show',$organization->campaign_id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Campaign </a>
                @endif
                <a href="{{route('admin.organization.contact.create',$organization->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Contact </a>
                <a href="{{route('admin.organization.deal.create',$organization->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Deal </a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-10">
                <div class="ibox">
                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{ route('admin.organization.update',$organization->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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

                                <div class="col-md-12">
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="text" id="name" name="name" required="required" value="{{$organization->name}}" class="form-control input-lg">
                                                <i>name</i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <select name="parent_organization" class="select2_demo_parent_organization form-control input-lg">
                                                <option></option>
                                                @foreach ($organizations as $parent_organization)
                                                    <option @if($parent_organization->parent_organization_id ==$parent_organization->id)selected @endif @if($organization->id ==$parent_organization->id)disabled @endif value="{{$parent_organization->id}}">{{$parent_organization->name}}</option>
                                                @endforeach

                                            </select>
                                            <i>parent organization</i>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="text" id="phone_number" name="phone_number" required="required" value="{{$organization->phone_number}}" class="form-control input-lg">
                                                <i>phone number</i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="email" id="email" name="email" required="required" value="{{$organization->email}}" class="form-control input-lg">
                                                <i>email</i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="text" id="website" name="website" required="required" value="{{$organization->website}}" class="form-control input-lg">
                                                <i>website</i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <select name="organization_type" class="select2_demo_organization_type form-control input-lg">
                                                    <option></option>
                                                    @foreach ($organizationTypes as $organizationType)
                                                        <option @if($organizationType->id == $organization->organization_type_id)selected @endif value="{{$organizationType->id}}">{{$organizationType->name}}</option>
                                                    @endforeach

                                                </select>
                                                <i>organization type</i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="text" id="street" name="street" required="required" value="{{$organization->street}}" class="form-control input-lg">
                                                <i>street</i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="text" id="city" name="city" required="required" value="{{$organization->city}}" class="form-control input-lg">
                                                <i>city</i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="has-warning">
                                                <textarea rows="5" id="description" name="description" required="required" class="form-control input-lg">{{$organization->description}}</textarea>
                                                <i>description</i>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-block btn-lg btn-outline btn-success mt-4">{{ __('SAVE') }}</button>
                                    </div>
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
                                <div class="col-lg-12">
                                    <div class="m-b-md">
                                    </div>
                                    <dl class="dl-horizontal">
                                        <dt>Status:</dt> <dd><span class="label {{$organization->status->label}}">{{$organization->status->name}}</span></dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <dl class="dl-horizontal">

                                        <dt>Created by:</dt> <dd>{{$organization->user->name}}</dd>
                                    </dl>
                                </div>
                                <div class="col-lg-7" id="cluster_info">
                                    <dl class="dl-horizontal" >

                                        <dt>Last Updated:</dt> <dd>{{$organization->updated_at}}</dd>
                                        <dt>Created:</dt> <dd> {{$organization->created_at}} </dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row m-t-sm">
                                <div class="col-lg-12">
                                <div class="panel blank-panel">
                                <div class="panel-heading">
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#contacts" data-toggle="tab">Contacts</a></li>
                                            <li class=""><a href="#deals" data-toggle="tab">Deals</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="contacts">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone Number</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($organization->contacts as $contact)
                                                            <tr class="gradeX">
                                                                <td>{{$contact->first_name}} {{$contact->last_name}}</td>
                                                                <td>{{$contact->email}}</td>
                                                                <td>{{$contact->phone_number}}</td>
                                                                <td>{{$contact->user->name}}</td>
                                                                <td>
                                                                    <span class="label {{$contact->status->label}}">{{$contact->status->name}}</span>
                                                                </td>
                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.contact.show', $contact->id) }}" class="btn-white btn btn-xs">View</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone Number</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="deals">

                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Amount</th>
                                                        <th>Starting Date</th>
                                                        <th>Closing Date</th>
                                                        <th>Created</th>
                                                        <th>Probability</th>
                                                        <th>Status</th>
                                                        <th class="text-right" width="35px" data-sort-ignore="true">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($organization->deals as $deal)
                                                        <tr class="gradeA">
                                                            <td>{{$deal->name}}</td>
                                                            <td>{{$deal->amount}}</td>
                                                            <td>{{$deal->starting_date}}</td>
                                                            <td>{{$deal->closing_date}}</td>
                                                            <td>{{$deal->created_at}}</td>
                                                            <td>{{$deal->probability}}</td>
                                                            <td>
                                                                <p><span class="label {{$deal->status->label}}">{{$deal->status->name}}</span></p>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                    <a href="{{ route('admin.deal.show', $deal->id) }}" class="btn-success btn-outline btn btn-xs">View</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Amount</th>
                                                        <th>Starting Date</th>
                                                        <th>Closing Date</th>
                                                        <th>Created</th>
                                                        <th>Probability</th>
                                                        <th>Status</th>
                                                        <th class="text-right" width="35px" data-sort-ignore="true">Action</th>
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
                            @foreach($organization->pending_to_dos as $pendingToDo)
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
                            @foreach($organization->in_progress_to_dos as $inProgressToDo)
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
                            @foreach($organization->overdue_to_dos as $overdueToDo)
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
                            @foreach($organization->completed_to_dos as $completedToDo)
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

@include('admin.layouts.modals.organization_to_do')
