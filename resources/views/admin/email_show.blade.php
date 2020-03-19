@extends('admin.layouts.app')

@section('title', $email->name.' Album')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Emails</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.emails')}}">Emails</a></strong>
                </li>
                <li class="active">
                    <strong>Email</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeIn">

        <div class="row">
            <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <form method="post" action="{{ route('admin.email.update',$email->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                    <div class="has-warning">
                                        <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12 input-lg" required="required" value="{{$email->name}}" disabled>
                                        <i>name.</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12 input-lg" required="required" value="{{$email->email}}" disabled>
                                        <i>email.</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <input type="text" id="subject" name="subject" required="required" class="form-control col-md-7 col-xs-12 input-lg" required="required" value="{{$email->subject}}" disabled>
                                        <i>subject.</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <select name="deal_stage" class="select2_demo_status form-control input-lg">
                                            @foreach($emailStatuses as $emailStatus)
                                                <option value="{{$emailStatus->id}}" @if($emailStatus->id === $email->status_id) selected @endif>{{$emailStatus->name}}</option>
                                            @endforeach
                                        </select>
                                        <i>status.</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <textarea id="about" disabled rows="5" name="about" class="resizable_textarea form-control input-lg" required="required" placeholder="About...">{{$email->message}}</textarea>
                                        <i>about.</i>
                                    </div>
                                    <hr>
                                    <div>
                                        <button class="btn btn-lg btn-block btn-primary pull-right m-t-n-xs" type="submit"><strong>UPDATE</strong></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-lg-3">
                <div class="widget style1 {{$email->status->label}}">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            <i class="fa fa-ellipsis-v fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h3 class="font-bold">{{$email->status->name}}</h3>
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
                            <h3 class="font-bold">{{$email->created_at}}</h3>
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
                            <h3 class="font-bold">{{$email->updated_at}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
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
                            @foreach($pendingToDos as $pendingToDo)
                                <li>
                                    <div>
                                        <small>{{$pendingToDo->due_date}}</small>
                                        <h4>{{$pendingToDo->name}}</h4>
                                        <p>{{$pendingToDo->notes}}.</p>
                                        @if($pendingToDo->is_album === 1)
                                            <p><span class="badge badge-primary">{{$pendingToDo->album->name}}</span></p>
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
                                            <p><span class="badge badge-primary">{{$inProgressToDo->album->name}}</span></p>
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
                                            <p><span class="badge badge-primary">{{$overdueToDo->album->name}}</span></p>
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
                                            <p><span class="badge badge-primary">{{$completedToDo->album->name}}</span></p>
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

@include('admin.layouts.modals.email_to_do')
