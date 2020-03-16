@extends('admin.layouts.app')

@section('title', 'Promo Codes')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Promo Codes</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('admin.dashboard')}}">Home</a>
                </li>
                <li class="active">
                    <strong>Promo Codes</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-3">
            <div class="title-action">
                <a href="{{route('admin.promo.code.create')}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Promo Code </a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Reference</th>
                                    <th>Limit</th>
                                    <th>Assigned</th>
                                    <th>Used</th>
                                    <th>Expiry Date</th>
                                    <th>Discount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($promoCodes as $promoCode)
                                    <tr class="gradeX">
                                        <td>{{$promoCode->reference}}</td>
                                        <td>{{$promoCode->limit}}</td>
                                        <td>{{$promoCode->assigned}}</td>
                                        <td>{{$promoCode->used}}</td>
                                        <td>{{$promoCode->expiry_date}}</td>
                                        <td>{{$promoCode->discount}} @if($promoCode->is_percentage == 1) % @endif</td>
                                        <td>
                                            <span class="label {{$promoCode->status->label}}">{{$promoCode->status->name}}</span>
                                        </td>
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <a href="{{ route('admin.promo.code.show', $promoCode->id) }}" class="btn-white btn btn-xs">View</a>
                                                @if($promoCode->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                    <a href="{{ route('admin.promo.code.restore', $promoCode->id) }}" class="btn-warning btn btn-xs">Restore</a>
                                                @else
                                                    <a href="{{ route('admin.promo.code.delete', $promoCode->id) }}" class="btn-danger btn btn-xs">Delete</a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Reference</th>
                                    <th>Limit</th>
                                    <th>Assigned</th>
                                    <th>Used</th>
                                    <th>Expiry Date</th>
                                    <th>Discount</th>
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
@endsection
