@extends('admin.layouts.app')

@section('title', 'Journal Series Create')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Journal Seriess</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.journals')}}">Journal Series</a></strong>
                </li>
                <li class="active">
                    <strong>Journal Series Create</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="ibox">
                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{ route('admin.journal.series.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                    <div class="has-warning">
                                        <input type="text" id="name" name="name" required="required" placeholder="Name" class="form-control input-lg">
                                        <i>name</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <textarea id="description" rows="5" name="description" class="resizable_textarea form-control input-lg" required="required" placeholder="Description..."></textarea>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="checkbox" name="is_journal_series" class="js-switch_3"/>
                                            <i>is journal series</i>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="has-warning">
                                                <select required="required" name="journal_series" class="select2_demo_tag form-control input-lg">
                                                    <option>Select Journal Series</option>
                                                    @foreach($journalSeries as $series)
                                                        <option value="{{$series->id}}">{{$series->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i>journal series</i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="checkbox" name="is_tudeme" class="js-switch_4"/>
                                            <i>is tudeme</i>
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



    </div>

@endsection
