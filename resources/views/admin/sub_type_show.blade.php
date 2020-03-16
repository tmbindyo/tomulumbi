@extends('admin.layouts.app')

@section('title', 'Sub Type')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Sub Type</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li class="active">
                    <strong>Settingss</strong>
                </li>
                <li class="active">
                   <strong><a href="{{route('admin.types')}}">Sub Types</a></strong>
                </li>
                <li class="active">
                    <strong>Sub Type</strong>
                </li>
            </ol>
        </div>
    </div>


    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <form method="post" action="{{ route('admin.sub.type.update',$subType->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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


                                    <div class="">
                                        <div class="has-warning">
                                            <input type="name" name="name" value="{{$subType->name}}" class="form-control input-lg">
                                        </div>
                                        <i>type name</i>
                                    </div>
                                    <br>
                                    <div class="">
                                        <div class="has-warning">
                                            <select required="required" name="type" class="select2_demo_type form-control input-lg">
                                                <option></option>
                                                @foreach($types as $type)
                                                    <option @if($type->id == $subType->type_id) selected @endif value="{{$type->id}}">{{$type->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>Type: What type does this sub type belong to?</i>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="">
                                        <div class="has-warning">
                                            <textarea id="description" rows="5" name="description" class="resizable_textarea form-control input-lg" required="required">{{$subType->description}}</textarea>
                                        </div>
                                        <i>type description</i>
                                    </div>

                                    <hr>

                                    <div>
                                        <button class="btn btn-primary btn-block btn-lg m-t-n-xs" type="submit"><strong>UPDATE</strong></button>
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
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Product</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th width="13em">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subType->price_lists as $priceList)
                                        <tr class="gradeX">
                                            <td>{{$priceList->name}}</td>
                                            <td>{{$priceList->price}}</td>
                                            <td>{{$priceList->product->name}}</td>
                                            <td>{{$priceList->user->name}}</td>
                                            <td>
                                                <span class="label {{$priceList->status->label}}">{{$priceList->status->name}}</span>
                                            </td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.price.list.show', $priceList->id) }}" class="btn-white btn btn-xs">View</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Product</th>
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
@endsection
