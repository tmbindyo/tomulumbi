@extends('admin.layouts.app')

@section('title', 'Tudeme Homepage')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-5">
            <h2>Tudeme Homepage</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.tudeme')}}">Tudeme</a></strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        {{--  top section  --}}
        <div class="row">
            <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5> Tudeme Top Section  </h5>
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
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>Tudeme</th>
                                        <th>Location</th>
                                        <th>User</th>
                                        <th>Created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tudemeTopSections as $tudemeTopSection)
                                        <tr>
                                            <td>{{$tudemeTopSection->tudeme->name}}</td>
                                            <td>{{$tudemeTopSection->tudeme_top_location->location}}</td>
                                            <td class="text-warning">{{$tudemeTopSection->user->name}}</td>
                                            <td class="text-navy">{{$tudemeTopSection->created_at}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Tudeme</th>
                                        <th>Location</th>
                                        <th>User</th>
                                        <th>Created</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5> Tudeme Top Section </h5>
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
                        <form method="post" action="{{ route('admin.tudeme.top.section.store') }}" autocomplete="off">
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
                                <select name="tudeme_top_location" class="select2_demo_tudeme_top_location form-control input-lg">
                                    <option> </option>
                                    @foreach($tudemeTopLocations as $tudemeTopLocation)
                                    <option value="{{$tudemeTopLocation->id}}">{{$tudemeTopLocation->location}} @if($tudemeTopLocation->active_tudeme_top_section) [{{$tudemeTopLocation->active_tudeme_top_section->tudeme->name}}]  @endif</option>
                                    @endforeach
                                </select>
                                <i class="control-label">top locations</i>
                            </div>
                            <br>
                            <div class="has-warning">
                                <select name="tudeme" class="select2_demo_tudeme form-control input-lg">
                                    <option> </option>
                                    @foreach($tudemes as $tudeme)
                                    <option value="{{$tudeme->id}}">{{$tudeme->name}} @if($tudeme->active_tudeme_top_section) [{{$tudeme->active_tudeme_top_section->tudeme_top_location->location}}]  @endif </option>
                                    @endforeach
                                </select>
                                <i class="control-label">tudeme</i>
                            </div>


                            <hr>

                            <div>
                                <button class="btn btn-block btn-primary btn-outline btn-lg m-t-n-xs" type="submit"><strong>Assign Top Location</strong></button>
                            </div>

                        </form>
                    </div>
                </div>


            </div>
        </div>
        {{--  top recipies  --}}
        <div class="row">
            <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="text-center"><h5> Tudeme Top Recipie  </h5></span>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>Tudeme</th>
                                        <th>Featured</th>
                                        <th>User</th>
                                        <th>Created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tudemeTopRecipies as $tudemeTopRecipie)
                                        <tr>
                                            <td>{{$tudemeTopRecipie->tudeme->name}}</td>
                                            <td>
                                                @if($tudemeTopRecipie->is_featured == True)
                                                    <span class="badge badge-primary">True</span>
                                                @else
                                                    <span class="badge badge-warning">False</span>
                                                @endif
                                            </td>

                                            <td class="text-warning">{{$tudemeTopRecipie->user->name}}</td>
                                            <td class="text-navy">{{$tudemeTopRecipie->created_at}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Tudeme</th>
                                        <th>Featured</th>
                                        <th>User</th>
                                        <th>Created</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5> Tudeme Top Recipie  </h5>
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
                        <form method="post" action="{{ route('admin.tudeme.top.recipie.store') }}" autocomplete="off">
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
                                <select name="tudeme" class="select2_demo_tudeme form-control input-lg">
                                    <option> </option>
                                    @foreach($unassignedTopRecipieTudeme as $tudeme)
                                    <option value="{{$tudeme->id}}">{{$tudeme->name}}</option>
                                    @endforeach
                                </select>
                                <i class="control-label">tudeme</i>
                            </div>
                            <br>
                            <div class="">
                                <div class="has-warning">
                                    <input type="checkbox" name="is_featured" class="js-switch" />
                                    <br>
                                    <i>featured.</i>
                                </div>
                            </div>


                            <hr>

                            <div>
                                <button class="btn btn-block btn-primary btn-outline btn-lg m-t-n-xs" type="submit"><strong>Assign Top Recipie</strong></button>
                            </div>

                        </form>
                    </div>
                </div>


            </div>
        </div>
        {{--  featured recipies  --}}
        <div class="row">
            <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="text-center"><h5> Tudeme Featured Recipie  </h5></span>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>Tudeme</th>
                                        <th>User</th>
                                        <th>Created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tudemeFeaturedRecipies as $tudemeFeaturedRecipie)
                                        <tr>
                                            <td>{{$tudemeFeaturedRecipie->tudeme->name}}</td>
                                            <td class="text-warning">{{$tudemeFeaturedRecipie->user->name}}</td>
                                            <td class="text-navy">{{$tudemeFeaturedRecipie->created_at}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Tudeme</th>
                                        <th>User</th>
                                        <th>Created</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5> Tudeme Featured Recipie  </h5>
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
                        <form method="post" action="{{ route('admin.tudeme.featured.recipie.store') }}" autocomplete="off">
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
                                <select name="tudeme" class="select2_demo_tudeme form-control input-lg">
                                    <option> </option>
                                    @foreach($unassignedFeaturedRecipieTudeme as $tudeme)
                                    <option value="{{$tudeme->id}}">{{$tudeme->name}}</option>
                                    @endforeach
                                </select>
                                <i class="control-label">tudeme</i>
                            </div>



                            <hr>

                            <div>
                                <button class="btn btn-block btn-primary btn-outline btn-lg m-t-n-xs" type="submit"><strong>Assign Featured Recipie</strong></button>
                            </div>

                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>


@endsection
