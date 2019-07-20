@extends('admin.layouts.app')

@section('title', 'Settings')

@section('css')
  <!-- Bootstrap -->
  <link href="{{ asset('gentelella') }}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{ asset('gentelella') }}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="{{ asset('gentelella') }}/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="{{ asset('gentelella') }}/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- Datatables -->
  <link href="{{ asset('gentelella') }}/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('gentelella') }}/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('gentelella') }}/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('gentelella') }}/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('gentelella') }}/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="{{ asset('gentelella') }}/build/css/custom.min.css" rel="stylesheet">
@endsection

@include('admin.layouts.modals.tag')

@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>
            <small>
              Settings->Tags
            </small>
          </h3>
        </div>

        <div class="title_right">
          <div class="col-md-3 col-sm-3 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tagRegistration">
                Add tag
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="clearfix"></div>

      @include('admin.layouts.popover.popover')

      <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Tags</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a>
                    </li>
                    <li><a href="#">Settings 2</a>
                    </li>
                  </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <table id="datatable-buttons" class="table table-striped table-bordered">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>User</th>
                  <th>Status</th>
                  <th style="width: 20%">Action</th>
                </tr>
                </thead>


                <tbody>
                @foreach($tags as $tag)
                  <tr>
                    <td>{{$tag->name}}</td>
                    <td>{{$tag->user->name}}</td>
                    <td>{{$tag->status->name}}</td>
                    <td>
                      <a href="{{ route('admin.tag', $tag->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                      <a href="{{ route('admin.tag', $tag->id) }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                      <a href="{{ route('admin.tag.delete', $tag->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                    </td>
                  </tr>
                @endforeach

                </tbody>

                <tfoot>
                <tr>
                  <th>Name</th>
                  <th>User</th>
                  <th>Status</th>
                  <th style="width: 20%">Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- /page content -->
@endsection

@section('js')
<!-- jQuery -->
<script src="{{ asset('gentelella') }}/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{ asset('gentelella') }}/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="{{ asset('gentelella') }}/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="{{ asset('gentelella') }}/vendors/nprogress/nprogress.js"></script>
<!-- iCheck -->
<script src="{{ asset('gentelella') }}/vendors/iCheck/icheck.min.js"></script>
<!-- Datatables -->
<script src="{{ asset('gentelella') }}/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('gentelella') }}/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="{{ asset('gentelella') }}/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('gentelella') }}/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="{{ asset('gentelella') }}/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{ asset('gentelella') }}/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('gentelella') }}/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('gentelella') }}/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="{{ asset('gentelella') }}/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="{{ asset('gentelella') }}/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('gentelella') }}/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="{{ asset('gentelella') }}/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="{{ asset('gentelella') }}/vendors/jszip/dist/jszip.min.js"></script>
<script src="{{ asset('gentelella') }}/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="{{ asset('gentelella') }}/vendors/pdfmake/build/vfs_fonts.js"></script>
<!-- Custom Theme Scripts -->
<script src="{{ asset('gentelella') }}/build/js/custom.min.js"></script>

@endsection