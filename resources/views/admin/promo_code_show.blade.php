@extends('admin.layouts.app')

@section('title', 'Promo Code Create')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-5">
            <h2>Promo Codes</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li>
                    <strong>CRM</strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.promo.codes')}}">Promo Codes</a></strong>
                </li>
                <li class="active">
                    <strong>Promo Code Create</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-7">
            <div class="title-action">
                <a href="{{route('admin.promo.code.assign',$promoCode->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Assign </a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox">

                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{ route('admin.promo.code.update',$promoCode->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                        <input type="checkbox" name="is_percentage" class="js-switch_3" @if($promoCode->is_percentage == 1) checked @endif </>
                                        <i>is percentage</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <input type="number" id="limit" name="limit" required="required" value="{{$promoCode->limit}}" class="form-control input-lg">
                                        <i>limit</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <input type="number" id="assigned" name="assigned" required="required" value="{{$promoCode->assigned}}" class="form-control input-lg">
                                        <i>assigned</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <input type="number" id="used" name="used" required="required" value="{{$promoCode->used}}" class="form-control input-lg">
                                        <i>used</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <input type="number" id="discount" name="discount" required="required" value="{{$promoCode->discount}}" class="form-control input-lg">
                                        <i>discount</i>
                                    </div>
                                    <br>
                                    <div class="has-warning" id="data_1">
                                        <div class="input-group date">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            <input type="text" required="required" name="expiry_date" class="form-control input-lg" value="{{$promoCode->expiry_date}}">
                                        </div>
                                        <i>What is the start date of the event?</i>
                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <textarea rows="5" id="terms_and_conditions" name="terms_and_conditions" required="required" class="form-control input-lg">{{$promoCode->terms_and_conditions}}</textarea>
                                        <i>Give a the expected response</i>
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
                                <div class="col-lg-3">
                                    <div class="widget style1 navy-bg">
                                        <div class="row vertical-align">
                                            <div class="col-xs-3">
                                                <i class="fa fa-user fa-3x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <h3 class="font-bold">{{$promoCode->user->name}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="widget style1 {{$promoCode->status->label}}">
                                        <div class="row vertical-align">
                                            <div class="col-xs-3">
                                                <i class="fa fa-ellipsis-v fa-3x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <h3 class="font-bold">{{$promoCode->status->name}}</h3>
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
                                                <h3 class="font-bold">{{$promoCode->created_at}}</h3>
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
                                                <h3 class="font-bold">{{$promoCode->updated_at}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-sm">
                                <div class="col-lg-12">
                                <div class="panel blank-panel">
                                <div class="panel-heading">
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#uses" data-toggle="tab">Uses</a></li>
                                            <li class=""><a href="#assignments" data-toggle="tab">Assignments</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="uses">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                        <tr>
                                                            <th>Reference</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($promoCode->promo_code_uses as $promoCodeUse)
                                                            <tr class="gradeX">
                                                                <td>{{$promoCodeUse->reference}}</td>
                                                                <td>{{$promoCodeUse->user->name}}</td>
                                                                <td>
                                                                    <span class="label {{$promoCodeUse->status->label}}">{{$promoCodeeUs->status->name}}</span>
                                                                </td>
                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.order.show', $promoCodeUse->order_id) }}" class="btn-white btn btn-xs">View</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Reference</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="assignments">

                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                    <tr>
                                                        <th>Reference</th>
                                                        <th>Contact</th>
                                                        <th>Assigned</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($promoCode->promo_code_assignments as $promoCodeAssignment)
                                                        <tr class="gradeX">
                                                            <td>{{$promoCodeAssignment->reference}}</td>
                                                            <td>{{$promoCodeAssignment->contact->first_name}} {{$promoCodeAssignment->contact->last_name}}</td>
                                                            <td>{{$promoCodeAssignment->assigned}}</td>
                                                            <td>
                                                                <span class="label {{$promoCodeAssignment->status->label}}">{{$promoCodeAssignment->status->name}}</span>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                    <a href="{{ route('admin.contact.show', $promoCodeAssignment->contact_id) }}" class="btn-white btn btn-xs">View</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Reference</th>
                                                        <th>Contact</th>
                                                        <th>Assigned</th>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection