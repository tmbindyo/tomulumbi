@extends('admin.layouts.app')

@section('title', 'Asset Action Create')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Asset Actions</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.asset.actions')}}">Asset Actions</a></strong>
                </li>
                <li class="active">
                    <strong>Asset Action Create</strong>
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
                                <form method="post" action="{{ route('admin.asset.action.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                        <input type="number" id="amount" name="amount" required="required" placeholder="Amount" class="form-control input-lg">
                                        <i>amount</i>
                                    </div>
                                    <br>
                                    <div class="has-warning" id="data_1">
                                        <div class="input-group date">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            <input type="text" required="required" name="date" id="date" class="form-control input-lg">
                                        </div>
                                        <i>date</i>
                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                    </div>
                                    <br>
                                    <div class="has-warning" id="data_1">
                                        <div class="input-group date">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            <input type="text" required="required" name="due_date" id="due_date" class="form-control input-lg">
                                        </div>
                                        <i>due date</i>
                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <textarea id="notes" rows="5" name="notes" class="resizable_textarea form-control input-lg" required="required" placeholder="Notes..."></textarea>
                                        <i>notes</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <select required="required" name="action_type" class="select2_demo_tag form-control input-lg">
                                            <option>Select Action Type</option>
                                            @foreach($actionTypes as $actionType)
                                                <option value="{{$actionType->id}}">{{$actionType->name}}</option>
                                            @endforeach()
                                        </select>
                                        <i>action type</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <select required="required" name="contact" class="select2_demo_tag form-control input-lg">
                                            <option>Select Contact</option>
                                            @foreach($contacts as $contact)
                                                <option value="{{$contact->id}}">{{$contact->first_name}} {{$contact->last_name}}</option>
                                            @endforeach()
                                        </select>
                                        <i>contact</i>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="checkbox" name="is_asset" class="js-switch_3"/>
                                            <i>is asset</i>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="has-warning">
                                                <select required="required" name="asset" class="select2_demo_tag form-control input-lg">
                                                    <option>Select Asset</option>
                                                    @foreach($assets as $asset)
                                                        <option value="{{$asset->id}}">{{$asset->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i>asset</i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="checkbox" name="is_kit" class="js-switch_2"/>
                                            <i>is kit</i>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="has-warning">
                                                <select required="required" name="kit" class="select2_demo_tag form-control input-lg">
                                                    <option>Select Kit</option>
                                                    @foreach($kits as $kit)
                                                        <option value="{{$kit->id}}">{{$kit->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i>kit</i>
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



    </div>

@endsection
