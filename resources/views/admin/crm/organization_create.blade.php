@extends('admin.layouts.app')

@section('title', 'Organization Create')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Organizations</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li>
                    <strong>CRM</strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.organizations')}}">Organizations</a></strong>
                </li>
                <li class="active">
                    <strong>Organization Create</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Organization Registration <small>Form</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>

                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{ route('admin.organization.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="text" id="name" name="name" required="required" placeholder="Name" class="form-control input-lg">
                                                <i>name</i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="text" id="phone_number" name="phone_number" required="required" placeholder="Phone Number" class="form-control input-lg">
                                                <i>phone number</i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="email" id="email" name="email" required="required" placeholder="Email" class="form-control input-lg">
                                                <i>email</i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="url" id="website" name="website" required="required" placeholder="Website" class="form-control input-lg">
                                                <i>website</i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <select name="organization_type" class="select2_demo_organization_type form-control input-lg" required>
                                                    <option></option>
                                                    @foreach ($organizationTypes as $organizationType)
                                                        <option value="{{$organizationType->id}}">{{$organizationType->name}}</option>
                                                    @endforeach

                                                </select>
                                                <i>organization type</i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <select name="parent_organization" class="select2_demo_parent_organization form-control input-lg">
                                                    <option></option>
                                                    @foreach ($organizations as $organization)
                                                        <option value="{{$organization->id}}">{{$organization->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i>parent organization</i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="text" id="street" name="street" required="required" placeholder="Street" class="form-control input-lg">
                                                <i>street</i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="text" id="city" name="city" required="required" placeholder="City" class="form-control input-lg">
                                                <i>city</i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <select name="campaign" class="select2_demo_campaign form-control input-lg">
                                            <option></option>
                                            @foreach ($campaigns as $campaign)
                                                <option value="{{$campaign->id}}">{{$campaign->name}}</option>
                                            @endforeach
                                        </select>
                                        <i>campaign</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <textarea rows="5" id="description" name="description" required="required" placeholder="Description" class="form-control input-lg"></textarea>
                                        <i>description</i>
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
