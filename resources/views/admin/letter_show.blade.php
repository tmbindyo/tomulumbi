@extends('admin.layouts.app')

@section('title', $letter->name)

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-6">
            <h2>Letters</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li>
                    <strong><a href="{{route('admin.letters')}}">Letters</a></strong>
                </li>
                <li class="active">
                    <strong>Letter</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-6">
            <div class="title-action">

            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeIn">



        <br>
        <div class="row">

            <div class="col-lg-3">
                <div class="widget style1 navy-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h3 class="font-bold">{{$letter->user->name}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 {{$letter->status->label}}">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            <i class="fa fa-ellipsis-v fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h3 class="font-bold">{{$letter->status->name}}</h3>
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
                            <h3 class="font-bold">{{$letter->created_at}}</h3>
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
                            <h3 class="font-bold">{{$letter->updated_at}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--    Client proof settings    --}}
        <div class="row m-t-lg">
            <div class="col-lg-12 col-md-12">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#collection_settings"> <i class="fa fa-cogs"></i> Collection Settings</a></li>
                        <li class=""><a data-toggle="tab" href="#album-image-letter"><i class="fa fa-bookmark"></i> Album Image Letter</a></li>
                        <li class=""><a data-toggle="tab" href="#cover-image"><i class="fa fa-bookmark"></i> Cover Image</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="collection_settings" class="tab-pane active">
                            <div class="panel-body">
                                <div class="col-md-10 col-md-offset-1">

                                    <form method="post" action="{{ route('admin.letter.update',$letter->id) }}" autocomplete="off">
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
                                            <input name="name" type="text" value="{{$letter->name}}" class="form-control input-lg">
                                            <i>Pick something short and sweet. Imagine choosing a title for a photo letter cover.</i>
                                        </div>
                                        <br>
                                        <div class="has-warning">
                                            <div class="form-group" id="data_1">
                                                <div class="input-group date">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                    <input type="text" name="date" class="form-control input-lg" value="{{date("m/d/Y", strtotime($letter->date))}}">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="has-warning">
                                            <select required="required" name="status" class="select2_demo_status form-control input-lg">
                                                @foreach($letterStatuses as $letterStatus)
                                                    <option value="{{$letterStatus->id}}" @if($letterStatus->id == $letter->status_id) selected @endif>{{$letterStatus->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>You can take the collection online/offline quickly. Hidden collections can only be seen by you.</i>
                                        </div>
                                        <br>
                                        <div class="has-warning">
                                            <select required="required" name="letter_tags[]" class="select2_demo_letter_tags form-control input-lg" multiple>
                                                @foreach($letterTags as $letterTag)
                                                    <option @foreach($letter->letterLettertags as $letterLettertag) @if($letterLettertag->letter_tag_id == $letterTag->id) selected @endif @endforeach value="{{$letterTag->id}}">{{$letterTag->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>Letter tag: What kind of letter is this?</i>
                                        </div>
                                        <br>
                                        <div class="has-warning">
                                            <div class="form-group">
                                                <textarea rows="5" id="description" name="description" required="required" class="form-control input-lg">{{$letter->description}}</textarea>
                                                <i>description</i>
                                            </div>
                                        </div>

                                        <br>

                                        <textarea name="body"  class="summernote">
                                            @if($letter->body)
                                                {{$letter->body}}
                                            @else
                                                <p>Now when I had mastered the language of this water and had come to know every trifling feature that bordered the great river as familiarly as I knew the letters of the alphabet, I had made a valuable acquisition.</p>
                                                <p>&nbsp;</p>
                                                <p>I still keep in mind a certain wonderful sunset which I witnessed when and steamboating was new to me. A broad expanse of the river was turned too blood in the middle distance the red hue brightened into gold, through which a solitary log came floating, black and conspicuous in one place a long calm slanting mark lay sparkling upon the water in another the surface was broken by boiling, tumbling rings, that were as many-tinted as an opal where the ruddy flush was faintest, was a smooth spot that was covered with graceful circles and radiating lines.</p>
                                                <p>&nbsp;</p>
                                                <p>Ever so delicately traced the shore on our left was densely wooded, and the som ber shadow that fell from this forest was broken in one place by a long, ruffled trail that shone like silver and high above the forest wall.</p>

                                                <blockquote class="inline-blockquote">
                                                <p>There were graceful curves, reflected images, woody on the heights, soft distances and over the whole scene, far and near, the dissolving lights drifted steadily now dissolving lights. There were graceful curves, reflected images. It suddenly struck me that that tiny pea, pretty and blue, was the Earth.</p>
                                                </blockquote>

                                                <p>But as I have said, a day came when I began to cease from noting the glories and the charms which the moon and the sun and the twilight wrought upon the river’s face another day came when I ceased altogether to note them. Then, if that sunset scene had been repeated, I should have looked upon it without rapture, and should have commented upon it, inwardly, after this fashion. But as I have said, a day came when I began to cease from noting the glories and the charms which the moon and the sun and the twilight wrought upon the one graceful curves, reflected images, woody heights, soft distances and over the whole sun scene, far and near, the dissolving lights drifted steadily, enriching it, every passing the moment, with new marvels of coloring. The world was new to me, and I had never seen anything like this at home. But as I have said, a day came when I began to cease from noting the glories and the charms which the moon and the sun and the twilight wrought upon the river’s face another day came when I ceased altogether to note them. Then, if that sunset scene had been repeated, I should have looked upon it without rapture, and should have commented upon it, inwardly, after this fashion.</p>
                                                <p>&nbsp;</p>
                                                <p>&nbsp;</p>
                                                <div class="clear"></div>

                                                <p>&nbsp;</p>
                                                <p>&nbsp;</p>
                                                <p>Duis iaculis mattis rutrum. Sed iaculis magna sit amet suscipit ornare. Nulla ornare leo a tortor aliquam, quis interdum ex tempor. Quisque ultricies consequat suscipit. Donec tincidunt tempor ornare. Praesent a enim vel augue suscipit auctor in gravida augue. Suspendisse ut libero sit amet augue molestie fringilla. Fusce molestie, velit a finibus eleifend, nibh odio sagittis est, id aliquet turpis orci quis nibh.</p>
                                                <p>&nbsp;</p>
                                                <p>Duis iaculis mattis rutrum. Sed iaculis magna sit amet suscipit ornare. Nulla ornare leo a tortor aliquam, quis interdum ex tempor. Quisque ultricies consequat suscipit. Donec tincidunt tempor ornare. Praesent a enim vel augue suscipit auctor in gravida augue. Suspendisse ut libero sit amet augue molestie fringilla. Fusce molestie, velit a finibus eleifend, nibh odio sagittis est, id aliquet turpis orci quis nibh.</p>
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
                        <div id="album-image-letter" class="tab-pane">

                        </div>
                        <div id="cover-image" class="tab-pane">
                            <div class="panel-body">
                                <div class="row m-t-lg">
                                    <div class="col-md-6 col-md-offset-3">
                                        {{--  Cover Image  --}}
                                        <div class="col-md-12">
                                            <button class="btn btn-primary btn-lg btn-outline btn-block" data-toggle="modal" data-target="#albumCoverImageRegistration" aria-expanded="false">Update Cover Image</button>
                                        </div>
                                        <br>
                                        <hr>
                                        <div class="col-md-12">

                                            <div class="center">
                                                <img alt="image" width="470em" class="img-responsive" @isset($letter->cover_image) src="{{ asset('') }}{{ $letter->cover_image->pixels750 }}" @endisset>
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
                            <button type="button" class="btn btn-warning m-r-sm">{{$letterArray['pendingToDos']}}</button>
                            Pending
                        </td>
                        <td>
                            <button type="button" class="btn btn-info m-r-sm">{{$letterArray['inProgressToDos']}}</button>
                            In progress
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary m-r-sm">{{$letterArray['completedToDos']}}</button>
                            Completed
                        </td>
                        <td>
                            <button type="button" class="btn btn-success m-r-sm">{{$letterArray['overdueToDos']}}</button>
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
                            @foreach($letter->pending_to_dos as $pendingToDo)
                                <li>
                                    <div>
                                        <small>{{$pendingToDo->due_date}}</small>
                                        <h4>{{$pendingToDo->name}}</h4>
                                        <p>{{$pendingToDo->notes}}.</p>
                                        @if($pendingToDo->is_letter === 1)
                                            <p><span class="badge badge-primary">{{$pendingToDo->letter->name}}</span></p>
                                        @endif
                                        <a href="{{route('admin.to.do.set.in.progress',$pendingToDo->id)}}"><i class="fa fa-arrow-circle-o-right "></i></a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <ul class="in-progress-to-do">
                            @foreach($letter->in_progress_to_dos as $inProgressToDo)
                                <li>
                                    <div>
                                        <small>{{$inProgressToDo->due_date}}</small>
                                        <h4>{{$inProgressToDo->name}}</h4>
                                        <p>{{$inProgressToDo->notes}}.</p>
                                        @if($inProgressToDo->is_letter === 1)
                                            <p><span class="badge badge-primary">{{$inProgressToDo->letter->name}}</span></p>
                                        @endif
                                        <a href="{{route('admin.to.do.set.completed',$inProgressToDo->id)}}"><i class="fa fa-check "></i></a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <ul class="overdue-to-do">
                            @foreach($letter->overdue_to_dos as $overdueToDo)
                                <li>
                                    <div>
                                        <small>{{$overdueToDo->due_date}}</small>
                                        <h4>{{$overdueToDo->name}}</h4>
                                        <p>{{$overdueToDo->notes}}.</p>
                                        @if($overdueToDo->is_letter === 1)
                                            <p><span class="badge badge-primary">{{$overdueToDo->letter->name}}</span></p>
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
                            @foreach($letter->completed_to_dos as $completedToDo)
                                <li>
                                    <div>
                                        <small>{{$completedToDo->due_date}}</small>
                                        <h4>{{$completedToDo->name}}</h4>
                                        <p>{{$completedToDo->notes}}.</p>
                                        @if($completedToDo->is_letter === 1)
                                            <p><span class="badge badge-primary">{{$completedToDo->letter->name}}</span></p>
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

@include('admin.layouts.modals.letter_to_do')
@include('admin.layouts.modals.letter_cover_image')

@section('js')


@endsection
