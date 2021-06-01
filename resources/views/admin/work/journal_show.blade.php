@extends('admin.layouts.app')

@section('title', $journal->name)

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Journals</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li>
                    <strong><a href="{{route('admin.journals')}}">Journals</a></strong>
                </li>
                <li class="active">
                    <strong>Journal</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-3">
            <div class="title-action">
                @if($journal->is_tudeme)
                    @if($journal->tudeme_id)
                        <a href="{{route('admin.tudeme.show',$journal->tudeme_id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Tudeme </a>
                    @else($journal->is_tudeme)
                        <a href="#" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Tudeme </a>
                    @endif
                @endif
                @if($journal->project_id)
                    <a href="{{route('admin.project.show',$journal->project_id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Project </a>
                @endif
                @if($journal->journal_series_id)
                    <a href="{{route('admin.journal.series.show',$journal->journal_series_id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Journal Series </a>
                @endif
                @if($journal->design_id)
                    <a href="{{route('admin.design.show',$journal->design_id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Design </a>
                @endif
                @if($journal->album_id)
                    @if($journal->album->album_type_id == "ca64a5e0-d39b-4f2c-a136-9c523d935ea4")
                        <a href="{{ route('admin.client.proof.show', $journal->album_id) }}" class="btn-primary btn btn-outline"> <i class="fa fa-eye"></i> Album</a>
                    @elseif($journal->album->album_type_id == "6fdf4858-01ce-43ff-bbe6-827f09fa1cef")
                        <a href="{{ route('admin.personal.album.show', $journal->album_id) }}" class="btn-primary btn btn-outline"> <i class="fa fa-eye"></i> Album</a>
                    @endif
                @endif
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeIn">

        {{--   journal work view  --}}
        <div class="row">

            <div class="col-lg-12">
                <div>
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>
                                <button type="button" class="btn btn-primary m-r-sm">{{$journalArray['journalViews']}}</button>
                                Journal Views
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
                            Views
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
                            <h3 class="font-bold">{{$journal->user->name}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 {{$journal->status->label}}">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            <i class="fa fa-ellipsis-v fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h3 class="font-bold">{{$journal->status->name}}</h3>
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
                            <h3 class="font-bold">{{$journal->created_at}}</h3>
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
                            <h3 class="font-bold">{{$journal->updated_at}}</h3>
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
                        <li class=""><a data-toggle="tab" href="#cover-image"><i class="fa fa-image"></i> Cover Image</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="collection_settings" class="tab-pane active">
                            <div class="panel-body">
                                <div class="col-md-12">

                                    <form method="post" action="{{ route('admin.journal.update',$journal->id) }}" autocomplete="off">
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
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <div class="form-group">
                                                    <input name="name" type="text" value="{{$journal->name}}" class="form-control input-lg">
                                                    <i>name.</i>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="has-warning">
                                                <div class="form-group" id="data_1">
                                                    <div class="input-group date">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </span>
                                                        <input type="text" name="date" class="form-control input-lg" value="{{date("m/d/Y", strtotime($journal->date))}}">
                                                    </div>
                                                    <i>date.</i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <select required="required" name="status" class="select2_demo_status form-control input-lg" >
                                                    @foreach($journalStatuses as $journalStatus)
                                                        <option value="{{$journalStatus->id}}" @if($journalStatus->id == $journal->status_id) selected @endif>{{$journalStatus->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i>status.</i>
                                            </div>
                                            <br>
                                            <div class="has-warning">
                                                <input type="text" name="color" class="form-control demo1  input-lg" value="{{$journal->color}}" />
                                                <i>Background color of text</i>
                                            </div>
                                        </div>





                                        <br>
                                        <div class="has-warning">
                                            <select required="required" name="labels[]" class="select2_demo_label form-control input-lg" multiple="multiple">
                                                <option>Select Label</option>
                                                @foreach($labels as $label)
                                                    <option @foreach($journalLabels as $journalLabel) @if($label->id === $journalLabel->label->id) selected @endif @endforeach  value="{{$label->id}}">{{$label->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>Labels: What kind of collection is this? Separate your tags with a comma. e.g. wedding, outdoor, summer</i>
                                        </div>
                                        <br>

                                        <div class="has-warning">
                                            <div class="form-group">
                                                <textarea rows="5" id="description" name="description" required="required" class="form-control input-lg">{{$journal->description}}</textarea>
                                                <i>Give a brief description on what the journal is about</i>
                                            </div>
                                        </div>

                                        <br>

                                        <textarea name="body"  class="summernote">
                                            @if($journal->body)
                                                {{$journal->body}}
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
                                            <button class="btn btn-block btn-primary btn-outline btn-lg m-t-n-xs" type="submit"><strong>Update Journal</strong></button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="gallery-image-design" class="tab-pane">
                            <div class="panel-body">
                                <div class="row m-t-lg">
                                    <div class="col-md-6 col-md-offset-3">
                                        <form method="post" action="{{ route('admin.journal.update.design',$journal->id) }}" autocomplete="off" enctype = "multipart/form-data">
                                            @csrf
                                            {{--  Journal thumbnail size  --}}
                                            <div class="col-md-10 col-md-offset-1">
                                                <h4 class="text-center">Thumbnail Size</h4>
                                                <div class="form-group">
                                                    <select class="form-control m-b input-lg" name="thumbnail_size" required>
                                                        @foreach($thumbnailSizes as $thumbnailSize)
                                                            <option value="{{$thumbnailSize->id}}" @if($thumbnailSize->id === $journal->thumbnail_size_id) selected @endif>{{$thumbnailSize->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i>Adjust the display size of photos in the gallery.</i>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-lg btn-primary btn-outline btn-block">Update Album Images Journal Settings</button>
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
                                            <hr>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="center">
                                                <img alt="image" width="480em" class="img-responsive" @isset($journal->cover_image) src="{{Minio::getAdminFileUrl( $journal->cover_image->pixels750 )}}" @endisset>
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

        <br>
        {{--  to do Counts  --}}
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <tbody>
                    <tr>
                        <td>
                            <button type="button" class="btn btn-warning m-r-sm">{{$journalArray['pendingToDos']}}</button>
                            Pending
                        </td>
                        <td>
                            <button type="button" class="btn btn-info m-r-sm">{{$journalArray['inProgressToDos']}}</button>
                            In progress
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary m-r-sm">{{$journalArray['completedToDos']}}</button>
                            Completed
                        </td>
                        <td>
                            <button type="button" class="btn btn-success m-r-sm">{{$journalArray['overdueToDos']}}</button>
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
                            @foreach($journal->pending_to_dos as $pendingToDo)
                                <li>
                                    <div>
                                        <small>{{$pendingToDo->due_date}}</small>
                                        <h4>{{$pendingToDo->name}}</h4>
                                        <p>{{$pendingToDo->notes}}.</p>
                                        @if($pendingToDo->is_journal === 1)
                                            <p><span class="badge badge-primary">{{$pendingToDo->journal->name}}</span></p>
                                        @endif
                                        <a href="{{route('admin.to.do.set.in.progress',$pendingToDo->id)}}"><i class="fa fa-arrow-circle-o-right "></i></a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <ul class="in-progress-to-do">
                            @foreach($journal->in_progress_to_dos as $inProgressToDo)
                                <li>
                                    <div>
                                        <small>{{$inProgressToDo->due_date}}</small>
                                        <h4>{{$inProgressToDo->name}}</h4>
                                        <p>{{$inProgressToDo->notes}}.</p>
                                        @if($inProgressToDo->is_journal === 1)
                                            <p><span class="badge badge-primary">{{$inProgressToDo->journal->name}}</span></p>
                                        @endif
                                        <a href="{{route('admin.to.do.set.completed',$inProgressToDo->id)}}"><i class="fa fa-check "></i></a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <ul class="overdue-to-do">
                            @foreach($journal->overdue_to_dos as $overdueToDo)
                                <li>
                                    <div>
                                        <small>{{$overdueToDo->due_date}}</small>
                                        <h4>{{$overdueToDo->name}}</h4>
                                        <p>{{$overdueToDo->notes}}.</p>
                                        @if($overdueToDo->is_journal === 1)
                                            <p><span class="badge badge-primary">{{$overdueToDo->journal->name}}</span></p>
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
                            @foreach($journal->completed_to_dos as $completedToDo)
                                <li>
                                    <div>
                                        <small>{{$completedToDo->due_date}}</small>
                                        <h4>{{$completedToDo->name}}</h4>
                                        <p>{{$completedToDo->notes}}.</p>
                                        @if($completedToDo->is_journal === 1)
                                            <p><span class="badge badge-primary">{{$completedToDo->journal->name}}</span></p>
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

@include('admin.layouts.modals.journal_to_do')
@include('admin.layouts.modals.journal_cover_image')

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
                            {{$journalViews['views']['1']}},
                            {{$journalViews['views']['2']}},
                            {{$journalViews['views']['3']}},
                            {{$journalViews['views']['4']}},
                            {{$journalViews['views']['5']}},
                            {{$journalViews['views']['6']}},
                            {{$journalViews['views']['7']}},
                            {{$journalViews['views']['8']}},
                            {{$journalViews['views']['9']}},
                            {{$journalViews['views']['10']}},
                            {{$journalViews['views']['11']}},
                            {{$journalViews['views']['12']}}
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