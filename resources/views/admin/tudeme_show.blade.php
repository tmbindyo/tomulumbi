@extends('admin.layouts.app')

@section('title', $tudeme->name)

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>Tudemes</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('admin.dashboard')}}">Home</a>
                </li>
                <li>
                    <a href="{{route('admin.tudeme')}}">Tudeme</a>
                </li>
                <li class="active">
                    <strong>Tudeme</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-4">
            <div class="title-action">
                <a href="{{route('admin.tudeme.personal.album.create',$tudeme->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Personal Album </a>
                <a href="{{route('admin.tudeme.meal.create',$tudeme->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Tudeme Meal </a>
                @if($tudeme->project_id)
                    <a href="{{route('admin.project.show',$tudeme->project_id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Project </a>
                @endif
                @if($tudeme->design_id)
                    <a href="{{route('admin.design.show',$tudeme->design_id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Design </a>
                @endif
                @if($tudeme->album_id)
                    @if($tudeme->album->album_type_id == "ca64a5e0-d39b-4f2c-a136-9c523d935ea4")
                        <a href="{{ route('admin.client.proof.show', $tudeme->album_id) }}" class="btn-primary btn btn-outline"> <i class="fa fa-eye"></i> Album</a>
                    @elseif($tudeme->album->album_type_id == "6fdf4858-01ce-43ff-bbe6-827f09fa1cef")
                        <a href="{{ route('admin.personal.album.show', $tudeme->album_id) }}" class="btn-primary btn btn-outline"> <i class="fa fa-eye"></i> Album</a>
                    @endif
                @endif
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeIn">

        {{--   tudeme work view  --}}
        <div class="row">

            <div class="col-lg-12">
                <div>
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>
                                <button type="button" class="btn btn-primary m-r-sm">{{$tudemeArray['tudemeViews']}}</button>
                                Tudeme Views
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

        {{--    Client proof images    --}}
        <div class="row m-t-lg">
            <div class="col-lg-12 col-md-12">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-3"> <i class="fa fa-image"> Album Sets</i></a></li>
                        <li class=""><a data-toggle="tab" href="#{{$tudeme->id}}"><i class="fa fa-desktop"> Tudeme Gallery</i></a></li>
                        <li class=""><a  data-toggle="modal" data-target="#albumSetRegistration" aria-expanded="false"><i class="fa fa-plus"></i></a></li>
                    </ul>
                    <div class="row">
                        <div class="tab-content">
                            <div id="tab-3" class="tab-pane active">
                                <div class="panel-body">
                                    <strong>Album sets</strong>

                                    <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of
                                        existence in this spot, which was created for the bliss of souls like mine.</p>

                                    <p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at
                                        the present moment; and yet I feel that I never was a greater artist than now. When.</p>
                                </div>
                            </div>

                            <div id="{{$tudeme->id}}" class="tab-pane">
                                <div class="panel-body">

                                    <div class="lightBoxGallery">

                                        @isset($tudemeGallery)
                                            @foreach($tudemeGallery as $tudemeGalleryImage)
                                                <a href="{{ asset('') }}{{ $tudemeGalleryImage->upload->pixels500 }}" title="{{ $tudemeGalleryImage->upload->name }}" data-gallery=""><img src="{{ asset('') }}{{ $tudemeGalleryImage->upload->pixels100 }}"></a>
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
                                    <form id="my-awesome-dropzone" class="dropzone" action="{{route('admin.tudeme.gallery.image.upload',$tudeme->id)}}">
                                        @csrf
                                        <div class="dropzone-previews"></div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">



                    </div>
                </div>
            </div>
        </div>

        <br>
        {{--    Client proof settings    --}}
        <div class="row m-t-lg">
            <div class="col-lg-12 col-md-12">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#collection_settings"> <i class="fa fa-cogs"></i> Collection Settings</a></li>
                        <li class=""><a data-toggle="tab" href="#design"><i class="fa fa-bookmark"></i> Design</a></li>
                        <li class=""><a data-toggle="tab" href="#cover-image"><i class="fa fa-bookmark"></i> Cover Image</a></li>
                        <li class=""><a data-toggle="tab" href="#spread"><i class="fa fa-bookmark"></i> Spread</a></li>
                        <li class=""><a data-toggle="tab" href="#icon"><i class="fa fa-bookmark"></i> Icon</a></li>
                        <li class=""><a data-toggle="tab" href="#journals"><i class="fa fa-bookmark"></i> Journal</a></li>
                        <li class=""><a data-toggle="tab" href="#meals"><i class="fa fa-lemon-o"></i> Meals</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="collection_settings" class="tab-pane active">
                            <div class="panel-body">
                                <div class="col-md-10 col-md-offset-1">

                                    <form method="post" action="{{ route('admin.tudeme.update',$tudeme->id) }}" autocomplete="off">
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
                                                <input name="name" type="text" value="{{$tudeme->name}}" class="form-control input-lg">
                                                <i>Pick something short and sweet. Imagine choosing a title for a photo tudeme cover.</i>
                                            </div>
                                        </div>

                                        <div class="has-warning">
                                            <div class="form-group" id="data_1">
                                                <label>Event Date</label>
                                                <div class="input-group date">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                    <input type="text" name="date" class="form-control input-lg" value="{{date("m/d/Y", strtotime($tudeme->date))}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="has-warning">
                                            <label class="control-label">Status</label>
                                            <select class="form-control m-b input-lg" name="status">
                                                @foreach($tudemeStatuses as $tudemeStatus)
                                                    <option value="{{$tudemeStatus->id}}" @if($tudemeStatus->id == $tudeme->status_id) selected @endif>{{$tudemeStatus->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>You can take the collection online/offline quickly. Hidden collections can only be seen by you.</i>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="has-warning">
                                                    <input type="number" id="prep_time" name="prep_time" required="required" value="{{$tudeme->prep_time}}" class="form-control input-lg">
                                                    <i>prep time</i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="has-warning">
                                                    <input type="number" id="cook_time" name="cook_time" required="required" value="{{$tudeme->cook_time}}" class="form-control input-lg">
                                                    <i>cook time</i>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="has-warning">
                                                    <input type="number" id="yield" name="yield" required="required" value="{{$tudeme->yield}}" class="form-control input-lg">
                                                    <i>yield</i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="has-warning">
                                                    <input type="number" id="serves" name="serves" required="required" value="{{$tudeme->serves}}" class="form-control input-lg">
                                                    <i>serves</i>
                                                </div>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="has-warning">
                                            <div class="form-group">
                                                <textarea rows="5" id="description" name="description" required="required" class="form-control input-lg">{{$tudeme->description}}</textarea>
                                                <i>Give a brief description on what the tudeme is about</i>
                                            </div>
                                        </div>

                                        <br>

                                        <textarea name="body"  class="summernote">
                                            @if($tudeme->body)
                                                {{$tudeme->body}}
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
                        <div id="design" class="tab-pane">
                            <div class="panel-body">
                                <div class="row m-t-lg">
                                    <div class="col-md-6 col-md-offset-3">

                                        <form method="post" action="{{ route('admin.tudeme.update.design',$tudeme->id) }}" autocomplete="off" enctype = "multipart/form-data">
                                            @csrf
                                            {{--  Tudeme typography  --}}
                                            <div class="col-md-12">
                                                <h3 class="text-center">Typography</h3>
                                                <div class="form-group">
                                                    <select class="form-control m-b input-lg" name="typography">
                                                        {{--  @foreach($typographies as $typography)
                                                            <option value="{{$typography->id}}" @if($typography->id === $tudeme->typography_id) selected @endif>{{$typography->name}}</option>
                                                        @endforeach  --}}
                                                    </select>
                                                    <i>Choose between different typography styles to best compliment the proof.</i>
                                                </div>
                                            </div>
                                            {{--  Tudeme thumbnail size  --}}
                                            <div class="col-md-12">
                                                <h4 class="text-center">Thumbnail Size</h4>
                                                <div class="form-group">
                                                    <select class="form-control m-b input-lg" name="thumbnail_size" required>
                                                        {{--  @foreach($thumbnailSizes as $thumbnailSize)
                                                            <option value="{{$thumbnailSize->id}}" @if($thumbnailSize->id === $tudeme->thumbnail_size_id) selected @endif>{{$thumbnailSize->name}}</option>
                                                        @endforeach  --}}
                                                    </select>
                                                    <i>Adjust the display size of photos in the gallery.</i>
                                                </div>
                                            </div>
                                            <hr>
                                            <button type="submit" class="btn btn-lg btn-primary btn-outline btn-block">Update Album Images Tudeme Settings</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="cover-image" class="tab-pane">
                            <div class="panel-body">
                                <div class="row m-t-lg">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="">
                                            {{--  Cover Image  --}}
                                            <div class="col-md-12">
                                                <button class="btn btn-primary btn-lg btn-outline btn-block" data-toggle="modal" data-target="#tudemeCoverImageRegistration" aria-expanded="false">Update Cover Image</button>
                                                <hr>
                                            </div>
                                            <div class="col-md-12">

                                                <div class="center">
                                                    <img alt="image" width="470em" class="img-responsive" @isset($tudeme->cover_image) src="{{ asset('') }}{{ $tudeme->cover_image->pixels750 }}" @endisset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="spread" class="tab-pane">
                            <div class="panel-body">
                                <div class="row m-t-lg">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="">
                                            {{--  Cover Image  --}}
                                            <div class="col-md-12">
                                                <h2 class="text-center">Spread</h2>
                                                <button class="btn btn-primary btn-lg btn-outline btn-block" data-toggle="modal" data-target="#spreadImageRegistration" aria-expanded="false">Update Spread</button>
                                                <hr>
                                            </div>
                                            <div class="col-md-12">

                                                <div class="center">
                                                    <img alt="image" width="470em" class="img-responsive" @isset($tudeme->spread) src="{{ asset('') }}{{ $tudeme->spread->pixels750 }}" @endisset>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="icon" class="tab-pane">
                            <div class="panel-body">
                                <div class="row m-t-lg">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="row">
                                            {{--  Cover Image  --}}
                                            <div class="col-md-12">
                                                <button class="btn btn-primary btn-lg btn-outline btn-block" data-toggle="modal" data-target="#iconImageRegistration" aria-expanded="false">Update Icon</button>
                                                <hr>
                                            </div>
                                            <div class="col-md-12">

                                                <div class="center">
                                                    <img alt="image" width="470em" class="img-responsive" @isset($tudeme->icon) src="{{ asset('') }}{{ $tudeme->icon->pixels750 }}" @endisset>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="journals" class="tab-pane">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                                        <thead>
                                        <tr>
                                            <th>Number</th>
                                            <th>Name</th>
                                            <th>Cook Time</th>
                                            <th>Status</th>
                                            <th class="text-right" width="35px" data-sort-ignore="true">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($journals as $tudeme)
                                            <tr class="gradeA">
                                                <td>{{$tudeme->number}}</td>
                                                <td>{{$tudeme->name}}</td>
                                                <td>{{$tudeme->cook_time}}</td>
                                                <td>
                                                    <p><span class="label {{$tudeme->status->label}}">{{$tudeme->status->name}}</span></p>
                                                </td>
                                                <td class="text-right">
                                                    <div class="btn-group">
                                                        <a href="{{ route('admin.tudeme.tudeme.show', $tudeme->id) }}" class="btn-success btn-outline btn btn-xs">View</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Number</th>
                                            <th>Name</th>
                                            <th>Cook Time</th>
                                            <th>Status</th>
                                            <th class="text-right" width="35px" data-sort-ignore="true">Action</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="meals" class="tab-pane">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                                        <thead>
                                        <tr>
                                            <th>Number</th>
                                            <th>Name</th>
                                            <th>Cook Time</th>
                                            <th>Status</th>
                                            <th class="text-right" width="35px" data-sort-ignore="true">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($meals as $meal)
                                            <tr class="gradeA">
                                                <td>{{$meal->number}}</td>
                                                <td>{{$meal->name}}</td>
                                                <td>{{$meal->cook_time}}</td>
                                                <td>
                                                    <p><span class="label {{$meal->status->label}}">{{$meal->status->name}}</span></p>
                                                </td>
                                                <td class="text-right">
                                                    <div class="btn-group">
                                                        <a href="{{ route('admin.tudeme.meal.show', $meal->id) }}" class="btn-success btn-outline btn btn-xs">View</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Number</th>
                                            <th>Name</th>
                                            <th>Cook Time</th>
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
                <table class="table">
                    <tbody>
                    <tr>
                        <td>
                            <button type="button" class="btn btn-warning m-r-sm">{{$tudemeArray['pendingToDos']}}</button>
                            Pending
                        </td>
                        <td>
                            <button type="button" class="btn btn-info m-r-sm">{{$tudemeArray['inProgressToDos']}}</button>
                            In progress
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary m-r-sm">{{$tudemeArray['completedToDos']}}</button>
                            Completed
                        </td>
                        <td>
                            <button type="button" class="btn btn-success m-r-sm">{{$tudemeArray['overdueToDos']}}</button>
                            Overdue
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{--    To Do's    --}}
        <div class="row m-t-lg">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>To Do's</h5>
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
                                        @if($pendingToDo->is_tudeme === 1)
                                            <p><span class="badge badge-primary">{{$pendingToDo->tudeme->name}}</span></p>
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
                                        @if($inProgressToDo->is_tudeme === 1)
                                            <p><span class="badge badge-primary">{{$inProgressToDo->tudeme->name}}</span></p>
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
                                        @if($overdueToDo->is_tudeme === 1)
                                            <p><span class="badge badge-primary">{{$overdueToDo->tudeme->name}}</span></p>
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
                                        @if($completedToDo->is_tudeme === 1)
                                            <p><span class="badge badge-primary">{{$completedToDo->tudeme->name}}</span></p>
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

@include('admin.layouts.modals.tudeme_to_do')
@include('admin.layouts.modals.tudeme_cover_image')
@include('admin.layouts.modals.tudeme_spread')
@include('admin.layouts.modals.tudeme_icon')

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
                            {{$tudemeViews['views']['1']}},
                            {{$tudemeViews['views']['2']}},
                            {{$tudemeViews['views']['3']}},
                            {{$tudemeViews['views']['4']}},
                            {{$tudemeViews['views']['5']}},
                            {{$tudemeViews['views']['6']}},
                            {{$tudemeViews['views']['7']}},
                            {{$tudemeViews['views']['8']}},
                            {{$tudemeViews['views']['9']}},
                            {{$tudemeViews['views']['10']}},
                            {{$tudemeViews['views']['11']}},
                            {{$tudemeViews['views']['12']}}
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
                            {{$tudemeViews['galleryViews']['1']}},
                            {{$tudemeViews['galleryViews']['2']}},
                            {{$tudemeViews['galleryViews']['3']}},
                            {{$tudemeViews['galleryViews']['4']}},
                            {{$tudemeViews['galleryViews']['5']}},
                            {{$tudemeViews['galleryViews']['6']}},
                            {{$tudemeViews['galleryViews']['7']}},
                            {{$tudemeViews['galleryViews']['8']}},
                            {{$tudemeViews['galleryViews']['9']}},
                            {{$tudemeViews['galleryViews']['10']}},
                            {{$tudemeViews['galleryViews']['11']}},
                            {{$tudemeViews['galleryViews']['12']}}
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
