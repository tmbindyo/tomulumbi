@extends('admin.layouts.app')

@section('title', $journal->name)

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Journal's</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('admin.dashboard')}}">Home</a>
                </li>
                <li>
                    <a href="{{route('admin.journals')}}">Journals</a>
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
                            <td>
                                <button type="button" class="btn btn-success m-r-sm">{{$journalArray['journalGalleryViews']}}</button>
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

        {{--    Client proof images    --}}
        <div class="row m-t-lg">
            <div class="col-lg-12 col-md-12">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-3"> <i class="fa fa-image"> Album Sets</i></a></li>
                        <li class=""><a data-toggle="tab" href="#{{$journal->id}}"><i class="fa fa-desktop"> Journal Gallery</i></a></li>
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

                            <div id="{{$journal->id}}" class="tab-pane">
                                <div class="panel-body">

                                    <div class="lightBoxGallery">

                                        @isset($journalGallery)
                                            @foreach($journalGallery as $journalGalleryImage)
                                                <a href="{{ asset('') }}{{ $journalGalleryImage->upload->pixels500 }}" title="{{ $journalGalleryImage->upload->name }}" data-gallery=""><img src="{{ asset('') }}{{ $journalGalleryImage->upload->pixels100 }}"></a>
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
                                    <form id="my-awesome-dropzone" class="dropzone" action="{{route('admin.journal.gallery.image.upload',$journal->id)}}">
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
                        <li class=""><a data-toggle="tab" href="#design"><i class="fa fa-bookmark"></i> Journal</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="collection_settings" class="tab-pane active">
                            <div class="panel-body">
                                <div class="col-md-10 col-md-offset-1">

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

                                        <div class="has-warning">
                                            <div class="form-group">
                                                <label>Journal Name</label>
                                                <input name="name" type="text" value="{{$journal->name}}" class="form-control input-lg">
                                                <i>Pick something short and sweet. Imagine choosing a title for a photo journal cover.</i>
                                            </div>
                                        </div>

                                        <div class="has-warning">
                                            <div class="form-group" id="data_1">
                                                <label>Event Date</label>
                                                <div class="input-group date">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                    <input type="text" name="date" class="form-control input-lg" value="{{date("m/d/Y", strtotime($journal->date))}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="has-warning">
                                            <label class="control-label">Status</label>
                                            <select class="form-control m-b input-lg" name="status">
                                                @foreach($journalStatuses as $journalStatus)
                                                    <option value="{{$journalStatus->id}}" @if($journalStatus->id == $journal->status_id) selected @endif>{{$journalStatus->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>You can take the collection online/offline quickly. Hidden collections can only be seen by you.</i>
                                        </div>
                                        <br>
                                        <div class="has-warning">
                                            <input type="text" name="color" class="form-control demo1  input-lg" value="{{$journal->color}}" />
                                            <i>Background color of text</i>
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
                                                dummy text of the printing and typesetting industry. <strong>Lorem Ipsum has been the industry's</strong> standard dummy text ever since the 1500s,
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
                        <div id="design" class="tab-pane">
                            <div class="panel-body">
                                <div class="row m-t-lg">
                                    <div class="col-md-6">
                                        <h2 class="text-center">Album Images Journal</h2>
                                        <hr>
                                        <form method="post" action="{{ route('admin.journal.update.design',$journal->id) }}" autocomplete="off" enctype = "multipart/form-data">
                                            @csrf
                                            {{--  Journal typography  --}}
                                            <div class="col-md-10 col-md-offset-1">
                                                <h3 class="text-center">Typography</h3>
                                                <div class="form-group">
                                                    <select class="form-control m-b input-lg" name="typography">
                                                        @foreach($typographies as $typography)
                                                            <option value="{{$typography->id}}" @if($typography->id === $journal->typography_id) selected @endif>{{$typography->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i>Choose between different typography styles to best compliment the proof.</i>
                                                </div>
                                            </div>
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
                                    <div class="col-md-6">
                                        {{--  Cover Image  --}}
                                        <div class="col-md-12">
                                            <h2 class="text-center">Cover Image</h2>
                                            <button class="btn btn-primary btn-lg btn-outline btn-block" data-toggle="modal" data-target="#albumCoverImageRegistration" aria-expanded="false">Update Cover Image</button>
                                            <hr>
                                        </div>
                                        <div class="col-md-10 col-md-offset-1">

                                            <div class="center">
                                                <img alt="image" class="img-responsive" @isset($journal->cover_image) src="{{ asset('') }}{{ $journal->cover_image->pixels750 }}" @endisset>
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
                                        @if($pendingToDo->is_journal === 1)
                                            <p><span class="badge badge-primary">{{$pendingToDo->journal->name}}</span></p>
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
                                        @if($inProgressToDo->is_journal === 1)
                                            <p><span class="badge badge-primary">{{$inProgressToDo->journal->name}}</span></p>
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
                            @foreach($completedToDos as $completedToDo)
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

    <!-- Mainly scripts -->
    <script src="{{ asset('inspinia') }}/js/jquery-2.1.1.js"></script>
    <script src="{{ asset('inspinia') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('inspinia') }}/js/inspinia.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/pace/pace.min.js"></script>

    <!-- ChartJS-->
    <script src="{{ asset('inspinia') }}/js/plugins/chartJs/Chart.min.js"></script>

    <!-- SUMMERNOTE -->
    <script src="{{ asset('inspinia') }}/js/plugins/summernote/summernote.min.js"></script>

    <!-- Chosen -->
    <script src="{{ asset('inspinia') }}/js/plugins/chosen/chosen.jquery.js"></script>

    <!-- blueimp gallery -->
    <script src="{{ asset('inspinia') }}/js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>

    <!-- DROPZONE -->
    <script src="{{ asset('inspinia') }}/js/plugins/dropzone/dropzone.js"></script>

    <!-- Switchery -->
    <script src="{{ asset('inspinia') }}/js/plugins/switchery/switchery.js"></script>

    <!-- Image cropper -->
    <script src="{{ asset('inspinia') }}/js/plugins/cropper/cropper.min.js"></script>

    <!-- Data picker -->
    <script src="{{ asset('inspinia') }}/js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="{{ asset('inspinia') }}/js/plugins/fullcalendar/moment.min.js"></script>

    <!-- Date range picker -->
    <script src="{{ asset('inspinia') }}/js/plugins/daterangepicker/daterangepicker.js"></script>

    <script src="{{ asset('inspinia') }}/js/plugins/jeditable/jquery.jeditable.js"></script>

    <script src="{{ asset('inspinia') }}/js/plugins/dataTables/datatables.min.js"></script>

    <!-- JSKnob -->
    <script src="{{ asset('inspinia') }}/js/plugins/jsKnob/jquery.knob.js"></script>

    <!-- Input Mask-->
    <script src="{{ asset('inspinia') }}/js/plugins/jasny/jasny-bootstrap.min.js"></script>

    <!-- NouSlider -->
    <script src="{{ asset('inspinia') }}/js/plugins/nouslider/jquery.nouislider.min.js"></script>

    <!-- Color picker -->
    <script src="{{ asset('inspinia') }}/js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

    <!-- IonRangeSlider -->
    <script src="{{ asset('inspinia') }}/js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>

    <!-- iCheck -->
    <script src="{{ asset('inspinia') }}/js/plugins/iCheck/icheck.min.js"></script>

    <!-- MENU -->
    <script src="{{ asset('inspinia') }}/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Clock picker -->
    <script src="{{ asset('inspinia') }}/js/plugins/clockpicker/clockpicker.js"></script>

    <!-- Select2 -->
    <script src="{{ asset('inspinia') }}/js/plugins/select2/select2.full.min.js"></script>

    <!-- TouchSpin -->
    <script src="{{ asset('inspinia') }}/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>

    <!-- Masonry -->
    <script src="{{ asset('inspinia') }}/js/plugins/masonary/masonry.pkgd.min.js"></script>

    {{--  Get due date to populate   --}}
    <script>
        $(document).ready(function() {
            // Set date
            console.log('var');
            var today = new Date();
            console.log(today);
            var dd = today.getDate();
            var mm = today.getMonth();
            var yyyy = today.getFullYear();
            var h = today.getHours();
            var m = today.getMinutes();
            mm ++;
            if (dd < 10){
                dd = '0'+dd;
            }
            if (mm < 10){
                mm = '0'+mm;
            }
            var date_today = mm + '/' + dd + '/' + yyyy;
            var time_curr = h + ':' + m;
            console.log(time_curr);
            document.getElementById("start_date").value = date_today;
            document.getElementById("end_date").value = date_today;
            document.getElementById("start_time").value = time_curr;
            document.getElementById("end_time").value = time_curr;

            // Set time
        });

    </script>

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
                            {{$journalViews['galleryViews']['1']}},
                            {{$journalViews['galleryViews']['2']}},
                            {{$journalViews['galleryViews']['3']}},
                            {{$journalViews['galleryViews']['4']}},
                            {{$journalViews['galleryViews']['5']}},
                            {{$journalViews['galleryViews']['6']}},
                            {{$journalViews['galleryViews']['7']}},
                            {{$journalViews['galleryViews']['8']}},
                            {{$journalViews['galleryViews']['9']}},
                            {{$journalViews['galleryViews']['10']}},
                            {{$journalViews['galleryViews']['11']}},
                            {{$journalViews['galleryViews']['12']}}
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
        $(document).ready(function(){

            $('.summernote').summernote();

        });
        var edit = function() {
            $('.click2edit').summernote({focus: true});
        };
        var save = function() {
            var aHTML = $('.click2edit').code(); //save HTML If you need(aHTML: array).
            $('.click2edit').destroy();
        };
    </script>

    <style>

        .grid .ibox {
            margin-bottom: 0;
        }

        .grid-item {
            margin-bottom: 25px;
            width: 300px;
        }
    </style>


    <script>
        $(window).load(function() {

            $('.grid').masonry({
                // options
                itemSelector: '.grid-item',
                columnWidth: 300,
                gutter: 25
            });

        });
    </script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                        customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]

            });

            /* Init DataTables */
            var oTable = $('#editable').DataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( '../example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
    </script>

    <script>
        $(document).ready(function(){

            var $image = $(".image-crop > img")
            $($image).cropper({
                aspectRatio: 1.618,
                preview: ".img-preview",
                done: function(data) {
                    // Output the result data for cropping image.
                }
            });

            var $inputImage = $("#inputImage");
            if (window.FileReader) {
                $inputImage.change(function() {
                    var fileReader = new FileReader(),
                        files = this.files,
                        file;

                    if (!files.length) {
                        return;
                    }

                    file = files[0];

                    if (/^image\/\w+$/.test(file.type)) {
                        fileReader.readAsDataURL(file);
                        fileReader.onload = function () {
                            $inputImage.val("");
                            $image.cropper("reset", true).cropper("replace", this.result);
                        };
                    } else {
                        showMessage("Please choose an image file.");
                    }
                });
            } else {
                $inputImage.addClass("hide");
            }

            $("#download").click(function() {
                window.open($image.cropper("getDataURL"));
            });

            $("#zoomIn").click(function() {
                $image.cropper("zoom", 0.1);
            });

            $("#zoomOut").click(function() {
                $image.cropper("zoom", -0.1);
            });

            $("#rotateLeft").click(function() {
                $image.cropper("rotate", 45);
            });

            $("#rotateRight").click(function() {
                $image.cropper("rotate", -45);
            });

            $("#setDrag").click(function() {
                $image.cropper("setDragMode", "crop");
            });

            $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            $('#data_2 .input-group.date').datepicker({
                startView: 1,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                format: "dd/mm/yyyy"
            });

            $('#data_3 .input-group.date').datepicker({
                startView: 2,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });

            $('#data_4 .input-group.date').datepicker({
                minViewMode: 1,
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                todayHighlight: true
            });

            $('#data_5 .input-daterange').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });

            var elem = document.querySelector('.js-switch');
            var switchery = new Switchery(elem, { color: '#1AB394' });

            var elem_2 = document.querySelector('.js-switch_2');
            var switchery_2 = new Switchery(elem_2, { color: '#ED5565' });

            var elem_3 = document.querySelector('.js-switch_3');
            var switchery_3 = new Switchery(elem_3, { color: '#1AB394' });

            var elem_18 = document.querySelector('.js-switch_18');
            var switchery_18 = new Switchery(elem_18, { color: '#1AB394' });

            var elem_19 = document.querySelector('.js-switch_19');
            var switchery_19 = new Switchery(elem_19, { color: '#1AB394' });

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });

            $('.demo1').colorpicker();


            $('.clockpicker').clockpicker();

            $('input[name="daterange"]').daterangepicker();

            $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

            $('#reportrange').daterangepicker({
                format: 'MM/DD/YYYY',
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                minDate: '01/01/2012',
                maxDate: '12/31/2015',
                dateLimit: { days: 60 },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'right',
                drops: 'down',
                buttonClasses: ['btn', 'btn-sm'],
                applyClass: 'btn-primary',
                cancelClass: 'btn-default',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Cancel',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            }, function(start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            });

            $(".select2_demo_1").select2();
            $(".select2_demo_2").select2();
            $(".select2_demo_label").select2({
                placeholder: "Select Label",
                allowClear: true
            });
            $(".select2_demo_category").select2({
                placeholder: "Select Categories",
                allowClear: true
            });


        });
        var config = {
            '.chosen-select'           : {},
            '.chosen-select-deselect'  : {allow_single_deselect:true},
            '.chosen-select-no-single' : {disable_search_threshold:10},
            '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
            '.chosen-select-width'     : {width:"95%"}
        }
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }

        $(".dial").knob();

        $("#basic_slider").noUiSlider({
            start: 40,
            behaviour: 'tap',
            connect: 'upper',
            range: {
                'min':  20,
                'max':  80
            }
        });

        $("#range_slider").noUiSlider({
            start: [ 40, 60 ],
            behaviour: 'drag',
            connect: true,
            range: {
                'min':  20,
                'max':  80
            }
        });

        $("#drag-fixed").noUiSlider({
            start: [ 40, 60 ],
            behaviour: 'drag-fixed',
            connect: true,
            range: {
                'min':  20,
                'max':  80
            }
        });


    </script>

    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>


    <script>
        $(document).ready(function(){

            Dropzone.options.dropzone =
                {
                    maxFilesize: 12,
                    renameFile: function(file) {
                        var dt = new Date();
                        var time = dt.getTime();
                        return time+file.name;
                    },
                    acceptedFiles: ".jpeg,.jpg,.png,.gif",
                    addRemoveLinks: true,
                    timeout: 50000,
                    removedfile: function(file)
                    {
                        var name = file.upload.filename;
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                            type: 'POST',
                            url: '{{ url("image/delete") }}',
                            data: {filename: name},
                            success: function (data){
                                console.log("File has been successfully removed!!");
                            },
                            error: function(e) {
                                console.log(e);
                            }});
                        var fileRef;
                        return (fileRef = file.previewElement) != null ?
                            fileRef.parentNode.removeChild(file.previewElement) : void 0;
                    },

                    success: function(file, response)
                    {
                        console.log(response);
                    },
                    error: function(file, response)
                    {
                        return false;
                    }
                };
        });
    </script>

@endsection
