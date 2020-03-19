@extends('admin.layouts.app')

@section('title', $design->name)

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-6">
            <h2>Designs</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li>
                    <strong><a href="{{route('admin.designs')}}">Designs</a></strong>
                </li>
                <li class="active">
                    <strong>Design</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-6">
            <div class="title-action">
                <a href="{{route('admin.design.personal.album.create',$design->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Personal Album </a>
                <a href="{{route('admin.design.client.proof.create',$design->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Client Proof </a>
                <a href="{{route('admin.design.journal.create',$design->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Journal </a>
                @if($design->project_id)
                    <a href="{{route('admin.project.show',$design->project_id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Project </a>
                @endif
                @if($design->contact_id)
                    <a href="{{route('admin.contact.show',$design->contact_id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Contact </a>
                @endif
                @if($design->deal_id)
                    <a href="{{route('admin.deal.show',$design->deal_id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Deal </a>
                @endif
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeIn">

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

        {{--   design work view  --}}
        <div class="row">
            <div class="col-lg-2">
                <div class="widget style1 yellow-bg">
                    <div class="row">
                        <div class="text-center">
                            <span> Design Views </span>
                            <h2 class="font-bold">{{$designArray['designViews']}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="widget style1 blue-bg">
                    <div class="row">
                        <div class="text-center">
                            <span> Gallery Views </span>
                            <h2 class="font-bold">{{$designArray['designGalleryViews']}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            @foreach($designArray['designWorkViewCount'] as $designWorkView)
                <div class="col-lg-2">
                    <div class="widget style1 navy-bg">
                        <div class="row">
                            <div class="text-center">
                                <span> {{$designWorkView["name"]}} </span>
                                <h2 class="font-bold">{{$designWorkView["views"]}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{--    Client proof images    --}}
        <div class="row m-t-lg">
            <div class="col-lg-12 col-md-12">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#{{$design->id}}"><i class="fa fa-desktop"> Design Gallery</i></a></li>

                        @foreach($designWork as $work)
                            <li class=""><a data-toggle="tab" href="#{{$work->id}}"><i class="fa fa-desktop"> {{$work->name}}</i></a></li>
                        @endforeach

                        <li class=""><a  data-toggle="modal" data-target="#designWorkRegistration" aria-expanded="false"><i class="fa fa-plus"></i></a></li>
                    </ul>
                    <div class="row">
                        <div class="tab-content">
                            <div id="{{$design->id}}" class="tab-pane active">
                                <div class="panel-body">

                                    <div class="lightBoxGallery">

                                        @isset($designGallery)
                                            @foreach($designGallery as $designGalleryImage)
                                                <a href="{{ asset('') }}{{ $designGalleryImage->upload->pixels500 }}" title="{{ $designGalleryImage->upload->name }}" data-gallery=""><img src="{{ asset('') }}{{ $designGalleryImage->upload->pixels100 }}"></a>
                                            @endforeach
                                        @endisset
                                        <!-- The Gallery as lightbox dialog, should be a child element of the document body -->
                                        <div id="blueimp-gallery" class="blueimp-gallery">
                                            <div class="slides"></div>
                                            <h3 class="title"></h3>
                                            <a class="prev">‹</a>
                                            <a class="next">›</a>
                                            <a class="close">×</a>
                                            <a class="play-pause"></a>
                                            <ol class="indicator"></ol>
                                        </div>

                                    </div>

                                    <br>
                                    <form id="my-awesome-dropzone" class="dropzone" action="{{route('admin.design.gallery.image.upload',$design->id)}}">
                                        @csrf
                                        <div class="dropzone-previews"></div>
                                    </form>

                                </div>
                            </div>

                            @foreach($designWork as $work)
                                <div id="{{$work->id}}" class="tab-pane">
                                    <div class="panel-body">

                                        <div class="row">
                                            <form method="post" action="{{ route('admin.design.work.update', $work->id) }}" autocomplete="off" class="form-horizontal form-label-left" enctype = "multipart/form-data">
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
                                                <div class="col-md-4">
                                                    <div class="">
                                                        <div class="has-success">
                                                            <input type="text" placeholder="Set Name" id="name" name="name" value="{{$work->name}}" required="required" class="form-control col-md-7 col-xs-12 input-lg">
                                                            <i>Give your design work a name</i>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="">
                                                        <div class="has-success">
                                                            <textarea class="form-control col-md-7 col-xs-12 input-lg" id="description" name="description" rows="5">{{$work->description}}</textarea>
                                                            <i>Give your design work a description</i>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="">
                                                        <div class="input-group">
                                                            <input type="file" name="design_work" class="form-control col-md-12 col-xs-12 input-lg">
                                                        </div>
                                                    </div>

                                                    <br />

                                                    <div class="ln_solid"></div>

                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-block btn-outline btn-lg btn-warning mt-4">{{ __('UPDATE') }}</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="col-md-8">
                                                <img class="img-fluid" src="{{ asset('') }}{{ $work->upload->pixels500 }}">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <div class="row">



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
                            <h3 class="font-bold">{{$design->user->name}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 {{$design->status->label}}">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            <i class="fa fa-ellipsis-v fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h3 class="font-bold">{{$design->status->name}}</h3>
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
                            <h3 class="font-bold">{{$design->created_at}}</h3>
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
                            <h3 class="font-bold">{{$design->updated_at}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--  <br>  --}}
        {{--    Client proof settings    --}}
        <div class="row m-t-lg">
            <div class="col-lg-12 col-md-12">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#collection_settings"> <i class="fa fa-cogs"></i> Collection Settings</a></li>
                        <li class=""><a data-toggle="tab" href="#album-image-design"><i class="fa fa-bookmark"></i> Album Image Design</a></li>
                        <li class=""><a data-toggle="tab" href="#cover-image"><i class="fa fa-bookmark"></i> Cover Image</a></li>
                        <li class=""><a data-toggle="tab" href="#expenses"><i class="fa fa-dollar"></i> Expenses</a></li>
                        <li class=""><a data-toggle="tab" href="#albums"><i class="fa fa-dollar"></i> Albums</a></li>
                        <li class=""><a data-toggle="tab" href="#journals"><i class="fa fa-dollar"></i> Journals</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="collection_settings" class="tab-pane active">
                            <div class="panel-body">
                                <div class="col-md-10 col-md-offset-1">

                                    <form method="post" action="{{ route('admin.design.update',$design->id) }}" autocomplete="off">
                                        @csrf

                                        @if (session('status'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{ session('status') }}
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif

                                        <div class="has-warning">
                                            <div class="form-group">
                                                <label>Collection Name</label>
                                                <input name="name" type="text" value="{{$design->name}}" class="form-control input-lg">
                                                <i>Pick something short and sweet. Imagine choosing a title for a photo design cover.</i>
                                            </div>
                                        </div>

                                        <div class="has-warning">
                                            <div class="form-group" id="data_1">
                                                <label>Event Date</label>
                                                <div class="input-group date">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                    <input type="text" name="date" class="form-control input-lg" value="{{date("m/d/Y", strtotime($design->date))}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="has-warning">
                                            <label class="control-label">Status</label>
                                            <select class="form-control m-b input-lg" name="status">
                                                @foreach($designStatuses as $designStatus)
                                                    <option value="{{$designStatus->id}}" @if($designStatus->id === $design->status_id) selected @endif>{{$designStatus->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>You can take the collection online/offline quickly. Hidden collections can only be seen by you.</i>
                                        </div>

                                        <div class="form-group">
                                            <label>Clients</label>
                                            <div class="input-group">
                                                <select name="contacts[]" data-placeholder="Choose Contacts:" class="chosen-select form-control-lg" style="width:450px;" tabindex="4" multiple="multiple">
                                                    @foreach($contacts as $contact)
                                                        <option value="{{$contact->id}}" @foreach ($designContacts as $designContact)  @if($contact->id == $designContact->contact_id) selected @endif @endforeach >{{$contact->first_name}} {{$contact->last_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Category</label>
                                            <div class="input-group">
                                                <select name="categories[]" data-placeholder="Choose Categories:" class="chosen-select input-lg" multiple="multiple" style="width:450px;" tabindex="4">
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}" @foreach($design->design_categories as $designCategory) @if($category->id == $designCategory->category_id) selected @endif @endforeach >{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="has-warning">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea rows="5" id="description" name="description" required="required" class="form-control input-lg">{{$design->description}}</textarea>
                                                <i>Give a brief description on what the project is about</i>
                                            </div>
                                        </div>

                                        <hr>

                                        <div>
                                            <button class="btn btn-block btn-primary btn-outline btn-lg m-t-n-xs" type="submit"><strong>Update Collection Settings</strong></button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="album-image-design" class="tab-pane">
                            <div class="panel-body">
                                <div class="row m-t-lg">
                                    <div class="col-md-8 col-md-offset-2">
                                        <form method="post" action="{{ route('admin.design.update.design',$design->id) }}" autocomplete="off" enctype = "multipart/form-data">
                                            @csrf
                                            {{--  Album typography  --}}
                                            <div class="col-md-10 col-md-offset-1">
                                                <h3 class="text-center">Typography</h3>
                                                <div class="form-group">
                                                    <select class="form-control m-b input-lg" name="typography">
                                                        @foreach($typographies as $typography)
                                                            <option value="{{$typography->id}}" @if($typography->id === $design->typography_id) selected @endif>{{$typography->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i>Choose between different typography styles to best compliment the proof.</i>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-lg btn-primary btn-outline btn-block">Update Album Images Design Settings</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="cover-image" class="tab-pane">
                            <div class="panel-body">
                                <div class="row m-t-lg">
                                    <div class="col-md-8 col-md-offset-2">
                                        {{--  Cover Image  --}}
                                        <div class="col-md-12">
                                            <h2 class="text-center">Cover Image</h2>
                                            <button class="btn btn-primary btn-lg btn-outline btn-block" data-toggle="modal" data-target="#albumCoverImageRegistration" aria-expanded="false">Update Cover Image</button>
                                            <hr>
                                        </div>
                                        <div class="col-md-10 col-md-offset-1">

                                            <div class="center">
                                                <img alt="image" width="450em" class="img-responsive" @isset($design->cover_image) src="{{ asset('') }}{{ $design->cover_image->pixels750 }}" @endisset>
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
                                        @foreach($design->expenses as $expense)
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
                                                <td>{{$expense->expense_type->name}}</td>
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
                                            @foreach($designAlbums as $designAlbum)
                                                <tr class="gradeX">
                                                    <td>{{$designAlbum->name}}</td>
                                                    <td>{{$designAlbum->date}}</td>
                                                    <td>{{$designAlbum->user->name}}</td>
                                                    <td>{{$designAlbum->album_views_count}}</td>
                                                    <td>
                                                        <span class="label {{$designAlbum->status->label}}">{{$designAlbum->status->name}}</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <div class="btn-group">
                                                            @if($designAlbum->album_type_id == "ca64a5e0-d39b-4f2c-a136-9c523d935ea4")
                                                                <a href="{{ route('admin.client.proof.show', $designAlbum->id) }}" class="btn-white btn btn-xs">View</a>
                                                            @elseif($designAlbum->album_type_id == "6fdf4858-01ce-43ff-bbe6-827f09fa1cef")
                                                                <a href="{{ route('admin.personal.album.show', $designAlbum->id) }}" class="btn-white btn btn-xs">View</a>
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
                                            @foreach($designJournals as $journal)
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
                            <button type="button" class="btn btn-warning m-r-sm">{{$designArray['pendingToDos']}}</button>
                            Pending
                        </td>
                        <td>
                            <button type="button" class="btn btn-info m-r-sm">{{$designArray['inProgressToDos']}}</button>
                            In progress
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary m-r-sm">{{$designArray['completedToDos']}}</button>
                            Completed
                        </td>
                        <td>
                            <button type="button" class="btn btn-success m-r-sm">{{$designArray['overdueToDos']}}</button>
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
                            @foreach($design->pending_to_dos as $pendingToDo)
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
                            @foreach($design->in_progress_to_dos as $inProgressToDo)
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
                            @foreach($design->overdue_to_dos as $overdueToDo)
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
                            @foreach($design->completed_to_dos as $completedToDo)
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

@include('admin.layouts.modals.design_work')
@include('admin.layouts.modals.design_to_do')
@include('admin.layouts.modals.design_cover_image')

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
                            {{$designViews['views']['1']}},
                            {{$designViews['views']['2']}},
                            {{$designViews['views']['3']}},
                            {{$designViews['views']['4']}},
                            {{$designViews['views']['5']}},
                            {{$designViews['views']['6']}},
                            {{$designViews['views']['7']}},
                            {{$designViews['views']['8']}},
                            {{$designViews['views']['9']}},
                            {{$designViews['views']['10']}},
                            {{$designViews['views']['11']}},
                            {{$designViews['views']['12']}}
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
                            {{$designViews['galleryViews']['1']}},
                            {{$designViews['galleryViews']['2']}},
                            {{$designViews['galleryViews']['3']}},
                            {{$designViews['galleryViews']['4']}},
                            {{$designViews['galleryViews']['5']}},
                            {{$designViews['galleryViews']['6']}},
                            {{$designViews['galleryViews']['7']}},
                            {{$designViews['galleryViews']['8']}},
                            {{$designViews['galleryViews']['9']}},
                            {{$designViews['galleryViews']['10']}},
                            {{$designViews['galleryViews']['11']}},
                            {{$designViews['galleryViews']['12']}}
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
