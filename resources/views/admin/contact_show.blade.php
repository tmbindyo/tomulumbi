@extends('admin.layouts.app')

@section('title', 'Contact')

@section('css')

    <link href="{{ asset('inspinia') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/iCheck/custom.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/chosen/chosen.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/cropper/cropper.min.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/switchery/switchery.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/select2/select2.min.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/animate.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/css/style.css" rel="stylesheet">

@endsection



@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-3">
            <h2>Contact's</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('admin.dashboard')}}">Home</a>
                </li>
                <li class="active">
                    <a href="{{route('admin.contacts')}}">Contact's</a>
                </li>
                <li class="active">
                    <strong>Contact</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-9">
            <div class="title-action">
                <a href="{{route('admin.contact.asset.action.create',$contact->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Asset Action </a>
                <a href="{{route('admin.contact.promo.code.assign',$contact->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Assign Promo Code </a>
                <a href="{{route('admin.contact.client.proof.create',$contact->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Client Proof </a>
                <a href="{{route('admin.contact.deal.create',$contact->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Deal </a>
                <a href="{{route('admin.contact.design.create',$contact->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Design </a>
                <a href="{{route('admin.contact.liability.create',$contact->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Liability </a>
                <a href="{{route('admin.contact.loan.create',$contact->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Loan </a>
                <a href="{{route('admin.contact.order.create',$contact->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Order </a>
                <a href="{{route('admin.contact.project.create',$contact->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Project </a>
                @if($contact->campaign_id)
                    <a href="{{route('admin.campaign.show',$contact->campaign_id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Campaign </a>
                @endif
                @if($contact->organization_id)
                    <a href="{{route('admin.organization.show',$contact->organization_id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Organization </a>
                @endif
            </div>
        </div>
    </div>


    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-12">
                <div>
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>
                                <button type="button" class="btn btn-warning m-r-sm">{{$contactWorkCount['contactAlbums']}}</button>
                                Albums
                            </td>
                            <td>
                                <button type="button" class="btn btn-info m-r-sm">{{$contactWorkCount['contactProjects']}}</button>
                                Projects
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary m-r-sm">{{$contactWorkCount['contactDesigns']}}</button>
                                Designs
                            </td>
                            <td>
                                <button type="button" class="btn btn-success m-r-sm">{{$contactWorkCount['contactOrder']}}</button>
                                Orders
                            </td>
                            <td>
                                <button type="button" class="btn btn-success m-r-sm">{{$contactWorkCount['contactLiabilities']}}</button>
                                Liabilities
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary m-r-sm">{{$contactWorkCount['contactAssignedPromoCodes']}}</button>
                                Promo Codes
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary m-r-sm">{{$contactWorkCount['contactDeals']}}</button>
                                Deals
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div>

                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Contact <small>edit</small></h5>
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
                                <form method="post" action="{{ route('admin.contact.update',$contact->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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

                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="checkbox" name="is_lead" class="js-switch_3" @if($contact->is_lead == True) checked @endif/>
                                            <i>lead</i>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select required="required" name="title" class="select2_demo_title form-control input-lg">
                                                <option></option>
                                                @foreach($titles as $title)
                                                    <option @if($contact->title_id == $title->id) selected @endif value="{{$title->id}}">{{$title->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>title</i>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="text" id="first_name" name="first_name" required="required" class="form-control col-md-7 col-xs-12 input-lg" required="required" value="{{$contact->first_name}}">
                                                <i>first name</i>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="text" id="last_name" name="last_name" required="required" class="form-control col-md-7 col-xs-12 input-lg" required="required" value="{{$contact->last_name}}">
                                                <i>last name</i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="text" id="phone_number" name="phone_number" required="required" class="form-control col-md-7 col-xs-12 input-lg" required="required" value="{{$contact->phone_number}}">
                                                <i>phone number</i>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12 input-lg" required="required" value="{{$contact->email}}">
                                                <i>email</i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select required="required" name="organization" class="select2_demo_organization form-control input-lg">
                                                <option></option>
                                                @foreach($organizations as $organization)
                                                    <option @if($contact->organization_id == $organization->id) selected @endif value="{{$organization->id}}">{{$organization->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>organization</i>
                                        </div>
                                        <div class="col-md-6">
                                            <select required="required" name="contact_types[]" class="select2_demo_contact_type form-control input-lg" multiple>
                                                <option></option>
                                                @foreach($contactTypes as $contactType)
                                                    <option @foreach($contactContactTypes as $contactContactType) @if($contactType->id === $contactContactType->contact_type->id) selected @endif @endforeach value="{{$contactType->id}}">{{$contactType->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>contact types</i>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select required="required" name="lead_source" class="select2_demo_lead_source form-control input-lg">
                                                <option></option>
                                                @foreach($leadSources as $leadSource)
                                                    <option @if($contact->lead_source_id == $leadSource->id) selected @endif value="{{$leadSource->id}}">{{$leadSource->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>lead source</i>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <select required="required" name="campaign" class="select2_demo_campaign form-control input-lg">
                                                    <option></option>
                                                    @foreach($campaigns as $campaign)
                                                        <option @if($contact->campaign_id == $campaign->id) selected @endif value="{{$campaign->id}}">{{$campaign->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i>campaign</i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="has-warning">
                                                <textarea id="about" rows="5" name="about" class="resizable_textarea form-control input-lg" required="required">{{$contact->about}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        <br>
                                        <hr>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-block btn-lg btn-outline btn-success mt-4">{{ __('Save') }}</button>
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
                                <div class="col-lg-12">
                                    <div class="m-b-md">
                                    </div>
                                    <dl class="dl-horizontal">
                                        <dt>Status:</dt> <dd><span class="label {{$contact->status->label}}">{{$contact->status->name}}</span></dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <dl class="dl-horizontal">

                                        <dt>Created by:</dt> <dd>{{$contact->user->name}}</dd>
                                    </dl>
                                </div>
                                <div class="col-lg-7" id="cluster_info">
                                    <dl class="dl-horizontal" >

                                        <dt>Last Updated:</dt> <dd>{{$contact->updated_at}}</dd>
                                        <dt>Created:</dt> <dd> {{$contact->created_at}} </dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row m-t-sm">
                                <div class="col-lg-12">
                                <div class="panel blank-panel">
                                <div class="panel-heading">
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#asset_actions" data-toggle="tab">Asset Actions</a></li>
                                            <li class=""><a href="#assigned_promo_codes" data-toggle="tab">Assigned Promo Codes</a></li>
                                            <li class=""><a href="#client-proofs" data-toggle="tab">Client Proofs</a></li>
                                            <li class=""><a href="#deals" data-toggle="tab">Deal</a></li>
                                            <li class=""><a href="#designs" data-toggle="tab">Design</a></li>
                                            <li class=""><a href="#liabilities" data-toggle="tab">Liability</a></li>
                                            <li class=""><a href="#loans" data-toggle="tab">Loan</a></li>
                                            <li class=""><a href="#orders" data-toggle="tab">Orders</a></li>
                                            <li class=""><a href="#projects" data-toggle="tab">Projects</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <div class="tab-content">
                                        <div class="tab-pane" id="client-proofs">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Name</th>
                                                        <th>Views</th>
                                                        <th>User</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($albumContacts as $albumContact)
                                                        <tr class="gradeX">
                                                            <td>{{$albumContact->album->date}}</td>
                                                            <td>{{$albumContact->album->name}}</td>
                                                            <td>{{$albumContact->album->views}}</td>
                                                            <td>{{$albumContact->album->user->name}}</td>
                                                            <td>
                                                                <span class="label {{$albumContact->album->status->label}}">{{$albumContact->album->status->name}}</span>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                    @if($albumContact->album->album_type_id == "6fdf4858-01ce-43ff-bbe6-827f09fa1cef")
                                                                        <a href="{{ route('admin.personal.album.show', $albumContact->album->id) }}" class="btn-white btn btn-xs">View</a>
                                                                    @elseif($albumContact->album->album_type_id == "ca64a5e0-d39b-4f2c-a136-9c523d935ea4")
                                                                        <a href="{{ route('admin.client.proof.show', $albumContact->album->id) }}" class="btn-white btn btn-xs">View</a>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Name</th>
                                                        <th>Views</th>
                                                        <th>User</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="tab-pane active" id="asset_actions">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                        <tr>
                                                            <th>Reference</th>
                                                            <th>Amount</th>
                                                            <th>Paid</th>
                                                            <th>Date</th>
                                                            <th>Due Date</th>
                                                            <th>Action Type</th>
                                                            <th>Contact</th>
                                                            <th>Item</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($assetActions as $assetAction)
                                                            <tr class="gradeX">
                                                                <td>{{$assetAction->reference}}</td>
                                                                <td>{{$assetAction->amount}}</td>
                                                                <td>{{$assetAction->paid}}</td>
                                                                <td>{{$assetAction->date}}</td>
                                                                <td>{{$assetAction->due_date}}</td>
                                                                <td>{{$assetAction->action_type->name}}</td>
                                                                <td>{{$assetAction->contact->first_name}} {{$assetAction->contact->last_name}}</td>
                                                                <td>{{$assetAction->user->name}}</td>
                                                                <td>
                                                                    @if($assetAction->is_asset == 1)
                                                                        <span class="label label-primary">{{$assetAction->asset->name}}</span>
                                                                    @elseif($assetAction->is_kit == 1)
                                                                        <span class="label label-primary">{{$assetAction->kit->name}}</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <span class="label {{$assetAction->status->label}}">{{$assetAction->status->name}}</span>
                                                                </td>

                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.asset.action.show', $assetAction->id) }}" class="btn-white btn btn-xs">View</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Reference</th>
                                                            <th>Amount</th>
                                                            <th>Paid</th>
                                                            <th>Date</th>
                                                            <th>Due Date</th>
                                                            <th>Action Type</th>
                                                            <th>Contact</th>
                                                            <th>Item</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="designs">

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
                                                    @foreach($designContacts as $designContact)
                                                        <tr class="gradeX">
                                                            <td>{{$designContact->design->name}}</td>
                                                            <td>{{$designContact->design->date}}</td>
                                                            <td>{{$designContact->design->views}}</td>
                                                            <td>{{$designContact->design->user->name}}</td>
                                                            <td>
                                                                <span class="label {{$designContact->design->status->label}}">{{$designContact->design->status->name}}</span>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                    <a href="{{ route('admin.design.show', $designContact->design->id) }}" class="btn-white btn btn-xs">View</a>
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
                                        <div class="tab-pane" id="projects">

                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Name</th>
                                                        <th>Views</th>
                                                        <th>User</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($projectContacts as $projectContact)
                                                        <tr class="gradeX">
                                                            <td>{{$projectContact->project->date}}</td>
                                                            <td>{{$projectContact->project->name}}</td>
                                                            <td>{{$projectContact->project->views}}</td>
                                                            <td>{{$projectContact->project->user->name}}</td>
                                                            <td>
                                                                <span class="label {{$projectContact->project->status->label}}">{{$projectContact->project->status->name}}</span>
                                                            </td>

                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                    <a href="{{ route('admin.project.show', $projectContact->project->id) }}" class="btn-white btn btn-xs">View</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Name</th>
                                                        <th>Views</th>
                                                        <th>User</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="orders">

                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                    <tr>
                                                        <th>Reference</th>
                                                        <th>Created</th>
                                                        <th>Total</th>
                                                        <th>Discount</th>
                                                        <th>Refunded</th>
                                                        <th>Products</th>
                                                        <th>State</th>
                                                        <th>Client</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($orders as $order)
                                                        <tr class="gradeX">
                                                            <td>
                                                                {{$order->order_number}}
                                                                <span><i data-toggle="tooltip" data-placement="right" title="{{$order->notes}}." class="fa fa-facebook-messenger"></i></span>
                                                            </td>
                                                            <td>{{$order->created_at}}</td>
                                                            <td>{{$order->total}}</td>
                                                            <td>{{$order->discount}}</td>
                                                            <td>{{$order->refund}}</td>
                                                            <td>{{$order->order_products_count}}</td>

                                                            <td>
                                                                @if($order->is_returned == 1 )
                                                                    <span class="label label-warning">Returned</span>
                                                                @endif
                                                                @if($order->is_refunded == 1 )
                                                                    <span class="label label-danger">Refunded</span>
                                                                @endif
                                                                @if($order->is_delivery == 1 )
                                                                    <span class="label label-success">Delivered</span>
                                                                @endif
                                                                @if($order->is_paid == 1 )
                                                                    <span class="label label-success">Paid</span>
                                                                @endif
                                                                @if($order->is_client == 1 )
                                                                    <span class="label label-primary">Client</span>
                                                                @else
                                                                    <span class="label label-primary">User</span>
                                                                @endif
                                                                @if($order->is_draft == 1 )
                                                                    <span class="label label-info">Draft</span>
                                                                @endif
                                                            </td>

                                                            <td>{{$order->contact->first_name}} {{$order->contact->last_name}} @if($order->contact->organization) [{{$order->contact->organization->name}}]@endif</td>
                                                            <td>
                                                                <span class="label {{$order->status->label}}">{{$order->status->name}}</span>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                    <a href="{{ route('admin.order.show', $order->id) }}" class="btn-white btn btn-xs">View</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Reference</th>
                                                        <th>Created</th>
                                                        <th>Total</th>
                                                        <th>Discount</th>
                                                        <th>Refunded</th>
                                                        <th>Products</th>
                                                        <th>State</th>
                                                        <th>Client</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="liabilities">

                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                    <tr>
                                                        <th>Reference</th>
                                                        <th>Amount</th>
                                                        <th>Paid</th>
                                                        <th>Date</th>
                                                        <th>Due Date</th>
                                                        <th>Account</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($liabilities as $liability)
                                                        <tr class="gradeX">
                                                            <td>{{$liability->reference}}</td>
                                                            <td>{{$liability->amount}}</td>
                                                            <td>{{$liability->paid}}</td>
                                                            <td>{{$liability->date}}</td>
                                                            <td>{{$liability->due_date}}</td>
                                                            <td>{{$liability->account->name}}</td>
                                                            <td>
                                                                <span class="label {{$liability->status->label}}">{{$liability->status->name}}</span>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                    <a href="{{ route('admin.liability.show', $liability->id) }}" class="btn-white btn btn-xs">View</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Reference</th>
                                                        <th>Amount</th>
                                                        <th>Paid</th>
                                                        <th>Date</th>
                                                        <th>Due Date</th>
                                                        <th>Account</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="assigned_promo_codes">

                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                    <tr>
                                                        <th>Reference</th>
                                                        <th>Assigned</th>
                                                        <th>Discount</th>
                                                        <th>Expiry</th>
                                                        <th>Used</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($assignedPromoCodes as $promoCode)
                                                        <tr class="gradeX">
                                                            <td>{{$promoCode->reference}}</td>
                                                            <td>{{$promoCode->assigned}}</td>
                                                            <td>{{$promoCode->promo_code->discount}}</td>
                                                            <td>{{$promoCode->promo_code->expiry_date}}</td>
                                                            <td>
                                                                @if ($promoCode->is_used == True)
                                                                    <span class="label label-danger">Used</span>
                                                                @else
                                                                    <span class="label label-warning">Pending</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <span class="label {{$promoCode->status->label}}">{{$promoCode->status->name}}</span>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                    <a href="{{ route('admin.promo.code.show', $promoCode->id) }}" class="btn-white btn btn-xs">View</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Reference</th>
                                                        <th>Assigned</th>
                                                        <th>Discount</th>
                                                        <th>Expiry</th>
                                                        <th>Used</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="deals">

                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Probability</th>
                                                        <th>Amount</th>
                                                        <th>Start</th>
                                                        <th>End</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($deals as $deal)
                                                        <tr class="gradeX">
                                                            <td>{{$deal->name}}</td>
                                                            <td>{{$deal->probability}}</td>
                                                            <td>{{$deal->amount}}</td>
                                                            <td>{{$deal->start_date}}</td>
                                                            <td>{{$deal->end_date}}</td>
                                                            <td>
                                                                <span class="label {{$deal->status->label}}">{{$deal->status->name}}</span>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                    <a href="{{ route('admin.deal.show', $deal->id) }}" class="btn-white btn btn-xs">View</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Probability</th>
                                                        <th>Amount</th>
                                                        <th>Start</th>
                                                        <th>End</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="loans">

                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                        <tr>
                                                            <th>Reference</th>
                                                            <th>Amount</th>
                                                            <th>Paid</th>
                                                            <th>Date</th>
                                                            <th>Due Date</th>
                                                            <th>User</th>
                                                            <th>Account</th>
                                                            <th>Contact</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($loans as $loan)
                                                            <tr class="gradeX">
                                                                <td>
                                                                    {{$loan->reference}}
                                                                    <span><i data-toggle="tooltip" data-placement="right" title="{{$loan->notes}}." class="fa fa-facebook-messenger"></i></span>
                                                                </td>
                                                                <td>{{$loan->amount}}</td>
                                                                <td>{{$loan->paid}}</td>
                                                                <td>{{$loan->date}}</td>
                                                                <td>{{$loan->due_date}}</td>
                                                                <td>{{$loan->user->name}}</td>
                                                                <td>{{$loan->account->name}}</td>
                                                                <td>{{$loan->contact->first_name}} {{$loan->contact->last_name}}</td>
                                                                <td>{{$loan->user->name}}</td>
                                                                <td>
                                                                    <span class="label {{$loan->status->label}}">{{$loan->status->name}}</span>
                                                                </td>

                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.loan.show', $loan->id) }}" class="btn-white btn btn-xs">View</a>
                                                                        @if($loan->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                            <a href="{{ route('admin.loan.restore', $loan->id) }}" class="btn-warning btn btn-xs">Restore</a>
                                                                        @else
                                                                            <a href="{{ route('admin.loan.delete', $loan->id) }}" class="btn-danger btn btn-xs">Delete</a>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Reference</th>
                                                            <th>Amount</th>
                                                            <th>Paid</th>
                                                            <th>Date</th>
                                                            <th>Due Date</th>
                                                            <th>User</th>
                                                            <th>Account</th>
                                                            <th>Contact</th>
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
                        </div>
                    </div>
                </div>
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
                                        @if($pendingToDo->is_design === 1)
                                            <p><span class="badge badge-primary">{{$pendingToDo->design->name}}</span></p>
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
                                        @if($inProgressToDo->is_design === 1)
                                            <p><span class="badge badge-primary">{{$inProgressToDo->design->name}}</span></p>
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
                            @foreach($completedToDos as $completedToDo)
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

@include('admin.layouts.modals.contact_to_do')

@section('js')


    <!-- Mainly scripts -->
    <script src="{{ asset('inspinia') }}/js/jquery-2.1.1.js"></script>
    <script src="{{ asset('inspinia') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/jeditable/jquery.jeditable.js"></script>

    <script src="{{ asset('inspinia') }}/js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('inspinia') }}/js/inspinia.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/pace/pace.min.js"></script>

    <!-- Chosen -->
<script src="{{ asset('inspinia') }}/js/plugins/chosen/chosen.jquery.js"></script>

<!-- Input Mask-->
<script src="{{ asset('inspinia') }}/js/plugins/jasny/jasny-bootstrap.min.js"></script>

<!-- Data picker -->
<script src="{{ asset('inspinia') }}/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- Switchery -->
<script src="{{ asset('inspinia') }}/js/plugins/switchery/switchery.js"></script>

<!-- iCheck -->
<script src="{{ asset('inspinia') }}/js/plugins/iCheck/icheck.min.js"></script>

<!-- MENU -->
<script src="{{ asset('inspinia') }}/js/plugins/metisMenu/jquery.metisMenu.js"></script>

<!-- Color picker -->
<script src="{{ asset('inspinia') }}/js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

<!-- Clock picker -->
<script src="{{ asset('inspinia') }}/js/plugins/clockpicker/clockpicker.js"></script>

<!-- Image cropper -->
<script src="{{ asset('inspinia') }}/js/plugins/cropper/cropper.min.js"></script>

<!-- Date range use moment.js same as full calendar plugin -->
<script src="{{ asset('inspinia') }}/js/plugins/fullcalendar/moment.min.js"></script>

<!-- Date range picker -->
<script src="{{ asset('inspinia') }}/js/plugins/daterangepicker/daterangepicker.js"></script>

<!-- Select2 -->
<script src="{{ asset('inspinia') }}/js/plugins/select2/select2.full.min.js"></script>

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
        $(".select2_demo_title").select2({
            placeholder: "Select Title",
            allowClear: true
        });
        $(".select2_demo_organization").select2({
            placeholder: "Select Organization",
            allowClear: true
        });
        $(".select2_demo_contact_type").select2({
            placeholder: "Select Contact Type",
            allowClear: true
        });
        $(".select2_demo_lead_source").select2({
            placeholder: "Select Lead Source",
            allowClear: true
        });
        $(".select2_demo_campaign").select2({
            placeholder: "Select Campaign",
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


@endsection
