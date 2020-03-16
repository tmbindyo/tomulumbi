@extends('admin.layouts.app')

@section('title', 'Expense Account')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Expense Accounts</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.expense.accounts')}}">Expense Accounts</a></strong>
                </li>
                <li class="active">
                    <strong>Expense Account Create</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-3">
            <div class="title-action">
                <a href="{{route('admin.expense.create')}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Expense </a>
            </div>
        </div>
    </div>


    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <form method="post" action="{{ route('admin.expense.account.update',$expenseAccount->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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

                                    <div class="has-warning">
                                        <input type="name" name="name" value="{{$expenseAccount->name}}" class="form-control input-lg">
                                        <i>name</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <input type="text" id="code" name="code" required="required" value="{{$expenseAccount->code}}" class="form-control input-lg">
                                        <i>code</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <textarea id="description" rows="5" name="description" class="resizable_textarea form-control input-lg" required="required">{{$expenseAccount->description}}</textarea>
                                        <i>description</i>
                                    </div>
                                    <hr>
                                    <div>
                                        <button class="btn btn-lg btn-primary btn-block btn-outline m-t-n-xs" type="submit"><strong>UPDATE</strong></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>Recurring</th>
                                        <th>Type</th>
                                        <th>Expense #</th>
                                        <th>Date</th>
                                        <th>Created</th>
                                        <th>Expense Type</th>
                                        <th>Total</th>
                                        <th>Paid</th>
                                        <th>Status</th>
                                        <th class="text-right" width="35px" data-sort-ignore="true">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($expenseAccount->expenses as $expense)
                                        <tr class="gradeA">
                                            <td>
                                                @if($expense->is_recurring == 1)
                                                    <p><span class="badge badge-success">True</span></p>
                                                @else
                                                    <p><span class="badge badge-success">False</span></p>
                                                @endif
                                            </td>
                                            <td>
                                                @if($expense->is_order == 1)
                                                    <p><a href="{{route('admin.order.show',$expense->order_id)}}" class="badge badge-success">Order</a></p>
                                                @elseif($expense->is_album == 1)
                                                    <p>
                                                        <a
                                                        @if ($expense->album->album_type_id == '6fdf4858-01ce-43ff-bbe6-827f09fa1cef')
                                                            href="{{route('admin.personal.album.show',$expense->album->id)}}"
                                                        @elseif ($expense->album->album_type_id == 'ca64a5e0-d39b-4f2c-a136-9c523d935ea4')
                                                            href="{{route('admin.client.proof.show',$expense->album->id)}}"
                                                        @endif  class="badge badge-primary">Album {{$expense->album->name}}
                                                        </a>
                                                    </p>
                                                @elseif($expense->is_project == 1)
                                                    <p><a href="{{route('admin.project.show',$expense->project->id)}}" class="badge badge-primary">Project {{$expense->project->name}}</a></p>
                                                @elseif($expense->is_project == 1)
                                                    <p><a href="{{route('admin.project.show',$expense->project_id)}}" class="badge badge-primary">Design {{$expense->design->name}}</a></p>
                                                @elseif($expense->is_liability == 1)
                                                    <p><a href="{{route('admin.liability.show',$expense->liability_id)}}" class="badge badge-primary">Liability</a></p>
                                                @elseif($expense->is_transfer == 1)
                                                    <p><a href="{{route('admin.transfer.show',$expense->transfer_id)}}" class="badge badge-primary">Transfer</a></p>
                                                @elseif($expense->is_campaign == 1)
                                                    <p><a href="{{route('admin.campaign.show',$expense->campaign_id)}}" class="badge badge-primary">Campaign</a></p>
                                                @elseif($expense->is_asset == 1)
                                                    <p><a href="{{route('admin.asset.show',$expense->asset_id)}}" class="badge badge-primary">Asset</a></p>
                                                @else
                                                    <p><span class="badge badge-info">None</span></p>
                                                @endif
                                            </td>
                                            <td>{{$expense->reference}}</td>
                                            <td>{{$expense->date}}</td>
                                            <td>{{$expense->created_at}}</td>
                                            <td>{{$expense->expense_type->name}}</td>
                                            <td>{{$expense->total}}</td>
                                            <td>{{$expense->paid}}</td>
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
                                        <th>Type</th>
                                        <th>Expense #</th>
                                        <th>Date</th>
                                        <th>Created</th>
                                        <th>Expense Type</th>
                                        <th>Total</th>
                                        <th>Paid</th>
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
@endsection
