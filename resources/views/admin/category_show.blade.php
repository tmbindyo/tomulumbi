@extends('admin.layouts.app')

@section('title', 'Category')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>Categorys</h2>
        <ol class="breadcrumb">
            <li>
                <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
            </li>
            <li>
                <strong><a href="#">Settings</a></strong>
            </li>
            <li class="active">
                <strong><a href="{{route('admin.categories')}}">Categorys</a></strong>
            </li>
            <li class="active">
                <strong>Category</strong>
            </li>
        </ol>
    </div>
    <div class="col-md-3">
        <div class="title-action">
            <a href="{{route('admin.design.create')}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Design </a>
        </div>
    </div>
</div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form method="post" action="{{ route('admin.category.update',$category->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                            <input type="name" name="name" value="{{$category->name}}" class="form-control input-lg">
                                            <i>name</i>
                                        </div>

                                        <hr>
                                        <div>
                                            <button class="btn btn-lg btn-primary btn-block" type="submit"><strong>UPDATE</strong></button>
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
                                            <th>Description</th>
                                            <th>User</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($category->design_categories as $design)
                                            <tr class="gradeX">
                                                <td>{{$design->design->name}}</td>
                                                <td>{{$design->design->description}}</td>
                                                <td>{{$design->design->user->name}}</td>
                                                <td>
                                                    <span class="label {{$design->design->status->label}}">{{$design->design->status->name}}</span>
                                                </td>
                                                <td class="text-right">
                                                    <div class="btn-group">
                                                        {{-- todo check why route is album but id is album type--}}
                                                        <a href="{{ route('admin.design.show', $design->design->id) }}" class="btn-white btn btn-xs">View</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
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
