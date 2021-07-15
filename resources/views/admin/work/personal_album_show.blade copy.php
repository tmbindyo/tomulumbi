@extends('admin.layouts.app')

@section('title', $album->name.' Album')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-6">
            <h2>Personal Album</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.personal.albums')}}">Personal Albums</a></strong>
                </li>
                <li class="active">
                    <strong>Personal Album</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-6">
            <div class="title-action">
                <a href="{{route('admin.personal.album.show.images',$album->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Images </a>
                <a href="{{route('admin.personal.album.create.journal',$album->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Journal </a>
                @if($album->project_id)
                    <a href="{{route('admin.project.show',$album->project_id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> View Project </a>
                @endif
                @if($album->tudeme_id)
                    <a href="{{route('admin.tudeme.show',$album->tudeme_id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> View Tudeme </a>
                @endif
                @if($album->design_id)
                    <a href="{{route('admin.design.show',$album->design_id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> View Design </a>
                @endif
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>
                                <button type="button" class="btn btn-primary m-r-sm">{{$albumArray['albumImages']}}</button>
                                Album Images
                            </td>
                            <td>
                                <button type="button" class="btn btn-success m-r-sm">{{$albumArray['albumSets']}}</button>
                                Album Set's
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning m-r-sm">{{$albumArray['downloads']}}</button>
                                Album Download's
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger m-r-sm">{{$albumArray['downloadLimit']}}</button>
                                Album Download Limit
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>
                            Views x Downloads
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
                            <h3 class="font-bold">{{$album->user->name}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 {{$album->status->label}}">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            <i class="fa fa-ellipsis-v fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h3 class="font-bold">{{$album->status->name}}</h3>
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
                            <h3 class="font-bold">{{$album->created_at}}</h3>
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
                            <h3 class="font-bold">{{$album->updated_at}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--    Personal album settings    --}}
        <div class="row m-t-lg">
            <div class="col-lg-12 col-md-12">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#collection_settings"> <i class="fa fa-cogs"></i> Collection Settings</a></li>
                        <li class=""><a data-toggle="tab" href="#download-status"><i class="fa fa-download"></i> Download</a></li>
                        <li class=""><a data-toggle="tab" href="#restrict"><i class="fa fa-download"></i> Restrict</a></li>
                        <li class=""><a data-toggle="tab" href="#expenses"><i class="fa fa-dollar"></i> Expenses</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="collection_settings" class="tab-pane active">
                            <div class="panel-body">
                                <div class="col-md-6">

                                    <form method="post" action="{{ route('admin.personal.album.update.collection.settings',$album->id) }}" autocomplete="off">
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
                                            <input name="name" type="text" value="{{$album->name}}" class="form-control input-lg">
                                            <i>Collection Name</i>
                                        </div>
                                        <br>
                                        <div class="has-warning">
                                            <div id="data_1">
                                                <div class="input-group date">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                    <input type="text" name="date" class="form-control input-lg" value="{{date("m/d/Y", strtotime($album->date))}}">
                                                </div>
                                                <i>Event Date</i>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="has-warning">
                                            <select required="required" name="status" class="select2_demo_status form-control input-lg">
                                                @foreach($albumStatuses as $albumStatus)
                                                    <option value="{{$albumStatus->id}}" @if($albumStatus->id === $album->status_id) selected @endif>{{$albumStatus->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>status.</i>
                                        </div>
                                        <br>
                                        <div class="has-warning">
                                                <select required="required" name="tags[]" class="select2_demo_tag form-control input-lg" multiple="multiple">
                                                    @foreach($tags as $tag)
                                                        <option value="{{$tag->id}}" @foreach($albumTags as $albumTag) @if($tag->id === $albumTag->tag->id) selected @endif @endforeach >{{$tag->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i>Tags</i>
                                        </div>
                                        <br>
                                        <div class="has-warning">
                                            <input type="text" id="location" name="location" required="required" value="{{$album->location}}" class="form-control input-lg">
                                            <i>Give the location that the collection took place</i>
                                        </div>

                                        <br>
                                        <div class="form-group" id="data_1">

                                            <div class="input-group date">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                <input type="text" name="expiry_date" class="form-control input-lg" value="{{date("m/d/Y", strtotime($album->expiry_date))}}">
                                            </div>
                                            <i>Expiry Date</i>
                                        </div>

                                        <hr>

                                        <div>
                                            <button class="btn btn-block btn-primary btn-outline btn-lg m-t-n-xs" type="submit"><strong>Update Collection Settings</strong></button>
                                        </div>

                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <form method="post" action="{{ route('admin.personal.album.update.design',$album->id) }}" autocomplete="off" enctype = "multipart/form-data">
                                            @csrf
                                            {{--  Album thumbnail size  --}}
                                            <div class="col-md-12">
                                                <select required="required" name="thumbnail_size" class="select2_demo_thumbnail_size form-control input-lg">
                                                    @foreach($thumbnailSizes as $thumbnailSize)
                                                        <option value="{{$thumbnailSize->id}}" @if($thumbnailSize->id === $album->thumbnail_size_id) selected @endif>{{$thumbnailSize->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i>Adjust the display size of photos in the gallery.</i>
                                            </div>

                                            <br>
                                            <hr>
                                            <br>

                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-lg btn-primary btn-outline btn-block">Update Album Images Design Settings</button>
                                            </div>
                                        </form>
                                    </div>
                                    {{-- <h2 class="text-center">Cover Image</h2> --}}
                                    <hr>
                                    <div class="row">
                                        {{--  Cover Image  --}}
                                        <form method="post" action="{{ route('admin.personal.album.set.cover.image',$album->id) }}" autocomplete="off" enctype = "multipart/form-data">
                                            @csrf
                                            <div class="col-md-5">
                                                <input type="file" required name="cover_image" class="custom-file-input btn" id="inputGroupFile04">
                                                {{-- <div class="input-group">
                                                    <input type="file" name="cover_image" class="form-control btn col-md-12 col-xs-12 input-lg">
                                                </div> --}}
                                            </div>
                                            <div class="col-md-7">

                                                <button type="submit" class="btn btn-primary btn-lg btn-outline btn-block">Update</button>

                                            </div>
                                        </form>
                                    </div>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="center">
{{--                                                <img alt="image" width="550em" class="img-responsive" @isset($album->cover_image) src="{{\App\Http\Controllers\MinioController::getFileUrl( $album->cover_image->pixels750 )}}" @endisset>--}}
                                                <img alt="image" width="550em" class="img-responsive" @isset($album->cover_image) src="{{Minio::getAdminFileUrl( $album->cover_image->pixels750 )}}" @endisset>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div id="download-status" class="tab-pane">
                            <div class="panel-body">
                                <form method="post" action="{{ route('admin.client.proof.update.download',$album->id) }}" autocomplete="off">
                                    @csrf
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="container-fluid">

                                            <div class="row">
                                                <div class="form-group">
                                                    <p>
                                                        Download Status
                                                    </p>
                                                    <input type="checkbox" name="is_download" class="js-switch" @if($album->is_download === 1) checked @endif />
                                                    <br>
                                                    <i>Turn on to allow your clients to download photos from this Collection.</i>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <div class="input-group m-b">
                                                        <input name="album_password" id="album_password" type="text" value="{{$album->password}}" class="form-control input-lg">
                                                        <div class="input-group-btn">
                                                            <button tabindex="-1" class="btn btn-lg btn-primary btn-outline generateAlbumPassword" data-fid="{{$album->id}}" type="button">Generate Password</button>
                                                        </div>
                                                    </div>
                                                    <i>Leave blank to make this collection public. Setting a password will require all guests to use this password in order to see the collection.</i>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group">
                                                    <label>Download Pin</label>
                                                    <div class="input-group m-b">
                                                        <input name="download_pin" id="download_pin" type="number" value="{{$album->download_pin}}" class="form-control input-lg">
                                                        <div class="input-group-btn">
                                                            <button tabindex="-1" class="btn btn-lg btn-primary btn-outline generateAlbumPin" data-fid="{{$album->id}}" type="button">Generate Pin</button>
                                                        </div>
                                                    </div>
                                                    <i>Your clients will be required to input this download pin to download photos.</i>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group">
                                                    <label>Limit Total Number of Gallery Downloads</label>
                                                    <input type="number" name="download_restriction_limit" value="{{$album->download_restriction_limit}}" class="form-control input-lg">
                                                    <i>Limit the number of times this PIN can be used for Gallery Download. This does not apply to Single Photo download. If Email Restriction is on, each email can use the PIN up to the Download Limit.</i>
                                                </div>
                                            </div>

                                            <br>
                                            <div class="row">
                                                <div class="form-group">
                                                    <p>
                                                        Check If Album Sets are exclusive
                                                    </p>
                                                    <input type="checkbox" name="is_album_set_exclusive" class="js-switch_2" @if($album->is_album_set_exclusive === 1) checked @endif />
                                                    <br>
                                                    <i>Check this option if album sets are client exclusive i.e each client set should only be seen by a specific person.</i>
                                                </div>
                                            </div>
                                            <hr>
                                            <div>
                                                <button class="btn btn-block btn-primary btn-outline btn-lg m-t-n-xs" type="submit"><strong>Update Download Settings</strong></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="restrict" class="tab-pane">
                            <div class="panel-body">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="container-fluid">
                                        <br>
                                        <div class="row">
                                            <div class="form-group">
                                                <label>Restrict To Specific Emails</label>
                                                <div class="input-group m-b">
                                                    <input id="email_restriction" type="email" class="form-control input-lg">
                                                    <div class="input-group-btn">
                                                        <button tabindex="-1" class="btn btn-lg btn-primary btn-outline restrictToEmail" data-fid="{{$album->id}}" type="button">Restrict To Email</button>
                                                    </div>
                                                </div>
                                                <i>Restrict download to only emails you have entered here.</i>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="ibox-content">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                        <thead>
                                                        <tr>
                                                            <th>Email</th>
                                                            <th class="text-right" data-sort-ignore="true">Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($albumViewRestrictionEmails as $albumDownloadRestrictionEmail)
                                                            <tr class="gradeX">
                                                                <td>{{$albumDownloadRestrictionEmail->email}}</td>
                                                                <td class="text-center">
                                                                    <div class="btn-group">
                                                                        <a href="{{route('admin.client.proof.restrict.to.specific.email.delete',$albumDownloadRestrictionEmail->id)}}" class="btn-danger btn btn-block btn-xs">Delete</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <th>Email</th>
                                                            <th class="text-right" data-sort-ignore="true">Action</th>
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
                                        @foreach($album->expenses as $expense)
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
                    </div>
                </div>
            </div>
        </div>

        <br>
        {{--  to do Counts  --}}
        <div class="row">

            <div class="col-lg-12">
                <div>
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>
                                <button type="button" class="btn btn-warning m-r-sm">{{$albumArray['pendingToDos']}}</button>
                                Pending
                            </td>
                            <td>
                                <button type="button" class="btn btn-info m-r-sm">{{$albumArray['inProgressToDos']}}</button>
                                In progress
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary m-r-sm">{{$albumArray['completedToDos']}}</button>
                                Completed
                            </td>
                            <td>
                                <button type="button" class="btn btn-success m-r-sm">{{$albumArray['overdueToDos']}}</button>
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
                            @foreach($album->pending_to_dos as $pendingToDo)
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
                            @foreach($album->in_progress_to_dos as $inProgressToDo)
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
                            @foreach($album->overdue_to_dos as $overdueToDo)
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
                            @foreach($album->completed_to_dos as $completedToDo)
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

@include('admin.layouts.modals.client_proof_set')
@include('admin.layouts.modals.album_to_do')
@include('admin.layouts.modals.personal_album_cover_image')

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
                            {{$albumViewsAndDownloads['views']['1']}},
                            {{$albumViewsAndDownloads['views']['2']}},
                            {{$albumViewsAndDownloads['views']['3']}},
                            {{$albumViewsAndDownloads['views']['4']}},
                            {{$albumViewsAndDownloads['views']['5']}},
                            {{$albumViewsAndDownloads['views']['6']}},
                            {{$albumViewsAndDownloads['views']['7']}},
                            {{$albumViewsAndDownloads['views']['8']}},
                            {{$albumViewsAndDownloads['views']['9']}},
                            {{$albumViewsAndDownloads['views']['10']}},
                            {{$albumViewsAndDownloads['views']['11']}},
                            {{$albumViewsAndDownloads['views']['12']}}
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
                            {{$albumViewsAndDownloads['downloads']['1']}},
                            {{$albumViewsAndDownloads['downloads']['2']}},
                            {{$albumViewsAndDownloads['downloads']['3']}},
                            {{$albumViewsAndDownloads['downloads']['4']}},
                            {{$albumViewsAndDownloads['downloads']['5']}},
                            {{$albumViewsAndDownloads['downloads']['6']}},
                            {{$albumViewsAndDownloads['downloads']['7']}},
                            {{$albumViewsAndDownloads['downloads']['8']}},
                            {{$albumViewsAndDownloads['downloads']['9']}},
                            {{$albumViewsAndDownloads['downloads']['10']}},
                            {{$albumViewsAndDownloads['downloads']['11']}},
                            {{$albumViewsAndDownloads['downloads']['12']}}
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


    <script>
        $('.updateAlbumSetVisibility').on('click',function(){
            var id = $(this).data('fid')

            //send value by ajax to server
            var xhr = new XMLHttpRequest();
            xhr.open("GET", '{{url('admin/client/proof/set/status/')}}'+'/'+id);
            xhr.setRequestHeader('Content-Type', '');
            xhr.send();
            xhr.onload = function() {
                alert(this.responseText);
            }
        });

    </script>

    <script>
        $('.updateAlbumSetDownload').on('click',function(){
            var id = $(this).data('fid')

            //send value by ajax to server
            var xhr = new XMLHttpRequest();
            xhr.open("GET", '{{url('admin/client/proof/set/download/status/')}}'+'/'+id);
            xhr.setRequestHeader('Content-Type', '');
            xhr.send();
            xhr.onload = function() {
                alert(this.responseText);
            }
        });

    </script>


    <script>
        $('.generateAlbumPassword').on('click',function(){
            var id = $(this).data('fid')

            //send value by ajax to server
            var xhr = new XMLHttpRequest();
            xhr.open("GET", '{{url('admin/client/proof/generate/password')}}'+'/'+id);
            xhr.setRequestHeader('Content-Type', '');
            xhr.send();
            xhr.onload = function() {
                document.getElementById("album_password").value = this.responseText;
                alert("Album Password Generated");
            }
        });

    </script>

    <script>
        $('.generateAlbumPin').on('click',function(){
            var id = $(this).data('fid')

            //send value by ajax to server
            var xhr = new XMLHttpRequest();
            xhr.open("GET", '{{url('admin/client/proof/generate/pin')}}'+'/'+id);
            xhr.setRequestHeader('Content-Type', '');
            xhr.send();
            xhr.onload = function() {
                document.getElementById("download_pin").value = this.responseText;
                alert("Album Pin Generated");
            }
        });

    </script>

    <script>
        $('.restrictToEmail').on('click',function(){
            var id = $(this).data('fid')
            var email = document.getElementById("email_restriction").value

            //send value by ajax to server
            var xhr = new XMLHttpRequest();
            xhr.open("GET", '{{url('admin/client/proof/restrict/to/specific')}}'+'/'+id +'/email/'+email);
            xhr.setRequestHeader('Content-Type', '');
            xhr.send();
            xhr.onload = function() {
                alert(this.responseText);
            }
            location.reload();
        });

    </script>

    <script>
        $('.generateClientExclusiveAccessPassword').on('click',function(){
            var id = $(this).data('fid')

            //send value by ajax to server
            var xhr = new XMLHttpRequest();
            xhr.open("GET", '{{url('admin/client/proof/generate/password')}}'+'/'+id);
            xhr.setRequestHeader('Content-Type', '');
            xhr.send();
            xhr.onload = function() {
                document.getElementById("client_exclusive_access_password").value = this.responseText;
                alert("Client Exclusive Access Password Generated");
            }
        });

    </script>

@endsection
