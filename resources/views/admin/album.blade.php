@extends('admin.layouts.app')

@section('title', 'Settings')

@section('css')
  <!-- Bootstrap -->
  <link href="{{ asset('gentelella') }}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{ asset('gentelella') }}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Dropzone.js -->
  <link href="{{ asset('gentelella') }}/vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="{{ asset('gentelella') }}/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- bootstrap-daterangepicker -->
  <link href="{{ asset('gentelella') }}/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="{{ asset('gentelella') }}/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- Switchery -->
  <link href="{{ asset('gentelella') }}/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
  <!-- Datatables -->
  <link href="{{ asset('gentelella') }}/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('gentelella') }}/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('gentelella') }}/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('gentelella') }}/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('gentelella') }}/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="{{ asset('gentelella') }}/build/css/custom.min.css" rel="stylesheet">
@endsection

@include('admin.layouts.modals.album')

@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>
            <small>
              Settings->Album
            </small>
          </h3>
        </div>

        </div>
      </div>

      <div class="clearfix"></div>

      @include('admin.layouts.popover.popover')
      @include('admin.layouts.modals.albumSet')

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                  <div class="x_title">
                      <h2><i class="fa fa-picture-o"></i> Album Sets </h2>
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


                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                          <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">


                              @foreach($albumSets as $albumSet)
                                  <li role="presentation" ><a href="#{{$albumSet->name}}" id="{{$albumSet->id}}" role="tab" data-toggle="tab" aria-expanded="true"> <i class="fa fa-cogs"></i>  {{$albumSet->name}} ({{$albumSet->album_images_count}}) </a>
                                  </li>
                              @endforeach

                              <li role="presentation" class=""><a data-toggle="modal" data-target="#albumSetRegistration" aria-expanded="false"> <i class="fa fa-plus"></i> Add Set</a>
                              </li>
                          </ul>
                          <div id="myTabContent" class="tab-content">
                              <div role="tabpanel" class="tab-pane fade active in" id="active_" aria-labelledby="active">
                                  <p>Rar.</p>
                              </div>
                              @foreach($albumSets as $albumSet)

                                  <div role="tabpanel" class="tab-pane fade" id="{{$albumSet->name}}" aria-labelledby="{{$albumSet->id}}">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="x_panel">
                                          <div class="x_title">
                                            <h2>{{$albumSet->name}} </h2>
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

                                            <div class="row">

                                              @isset($albumSet->album_images)
                                                @foreach($albumSet->album_images as $albumSetImage)

                                                  <div class="col-md-55">
                                                    <div class="thumbnail">
                                                      <div class="image view view-first">
                                                        <img style="width: 100%; display: block;" src="{{ asset('') }}{{ $albumSetImage->thumbnail }}" />
                                                        <div class="mask">
                                                          <p>Position</p>
                                                          <div class="tools tools-bottom">
                                                            <a href="#"><i class="fa fa-link"></i></a>
                                                            <a href="#"><i class="fa fa-pencil"></i></a>
                                                            <a href="#"><i class="fa fa-times"></i></a>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="caption">
                                                        <p>Snow and Ice Incoming for the South</p>
                                                      </div>
                                                    </div>
                                                  </div>

                                                @endforeach
                                              @endisset
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                      <div class="row">
                                          <div class="col-md-12 col-sm-12 col-xs-12">
                                              <div class="x_panel">
                                                  <div class="x_content">
                                                      <p>Upload album set files.</p>
                                                      <form method="post" action="{{route('admin.album.set.image.upload',$albumSet->id)}}" class="dropzone">
                                                          @csrf
                                                      </form>

                                                      <br />
                                                      <br />
                                                      <br />
                                                      <br />
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>

                              @endforeach
                          </div>
                      </div>

                  </div>
              </div>
            </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2><i class="fa fa-cog"></i> Setting</h2>
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


              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#collection_settings" id="collection-settings" role="tab" data-toggle="tab" aria-expanded="true"> <i class="fa fa-cogs"></i> Collection Settings</a>
                  </li>
                  <li role="presentation" class=""><a href="#design_tab" role="tab" id="design" data-toggle="tab" aria-expanded="false"> <i class="fa fa-bookmark"></i> Design</a>
                  </li>
                  <li role="presentation" class=""><a href="#download_tab" role="tab" id="download" data-toggle="tab" aria-expanded="false"> <i class="fa fa-download"></i> Download</a>
                  </li>
                  <li role="presentation" class=""><a href="#favourite_tab" role="tab" id="favourite" data-toggle="tab" aria-expanded="false"> <i class="fa fa-heart"></i> Favourite</a>
                  </li>
                  <li role="presentation" class=""><a href="#sharing_tab" role="tab" id="sharing" data-toggle="tab" aria-expanded="false"> <i class="fa fa-share"></i> Sharing</a>
                  </li>
                  <li role="presentation" class=""><a href="#store_tab" role="tab" id="store" data-toggle="tab" aria-expanded="false"> <i class="fa fa-shopping-cart"></i> Store</a>
                  </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active in" id="collection_settings" aria-labelledby="collection-settings">
                    <div class="row">
                      <div class="col-md-12">
                        <form method="post" action="{{ route('admin.album.update',$album->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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

                        <div class="form-group">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type="text" placeholder="Collection Name" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12" value="{{$album->name}}">
                            <i>Give your collection a name</i>
                          </div>
                        </div>


                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                            Collection Date <span class="required">*</span>
                          </label>
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <input name="date" type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="First Name" aria-describedby="inputSuccess2Status4">
                            <i>What is the date of the event?</i>
                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                          </div>

                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                Tags <span class="required">*</span>
                              </label>
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                <input id="tags_1" name="tags" type="text" class="tags form-control" />
                                <i>What kind of collection is this? Separate your tags with a comma. e.g. wedding, outdoor, summer</i>
                              </div>

                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                AutoExpiry*
                              </label>
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                <fieldset>
                                  <div class="control-group">
                                    <div class="controls">
                                      <div class="col-md-12 xdisplay_inputx form-group has-feedback">
                                        <input name="expiry_date" type="text" class="form-control has-feedback-left" id="single_cal3" placeholder="Auto Expiry" aria-describedby="inputSuccess2Status4">
                                        <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                        <i>Collection will become Hidden when it reaches 11:59pm on the expiry date.</i>
                                      </div>
                                    </div>
                                  </div>
                                </fieldset>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                <label>
                                  <input name="is_homepage_visible" type="checkbox" class="js-switch" checked /> Homepage Visibility

                                </label>
                                <i>Show or hide your collection in your Homepage area.</i>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                <label>
                                  <input name="is_auto_expiry" type="checkbox" class="js-switch" checked /> Auto Expiry

                                </label>
                                <i>Auto expiry.</i>
                              </div>
                            </div>
                          </div>


                        </div>
                        <br />

                        <div class="ln_solid"></div>

                        <div class="text-center">
                          <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                        </div>

                      </form>
                      </div>
                    </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="design_tab" aria-labelledby="design">
                    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                      booth letterpress, commodo enim craft beer mlkshk aliquip</p>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="download_tab" aria-labelledby="download">
                    <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                      booth letterpress, commodo enim craft beer mlkshk </p>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="favourite_tab" aria-labelledby="favourite">
                    <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                      booth letterpress, commodo enim craft beer mlkshk </p>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="sharing_tab" aria-labelledby="sharing">
                    <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                      booth letterpress, commodo enim craft beer mlkshk </p>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="store_tab" aria-labelledby="store">
                    <p>Store </p>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2><i class="fa fa-rss"></i> Activities </h2>
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


              <div class="" role="tabpanel" data-example-id="togglable-tabs">
                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#download_activity" id="download-activity" role="tab" data-toggle="tab" aria-expanded="true"> <i class="fa fa-download"></i> Download Activity</a>
                  </li>
                  <li role="presentation" class=""><a href="#favourite_activity" role="tab" id="favourite-activity" data-toggle="tab" aria-expanded="false"> <i class="fa fa-heart"></i> Favourite Activity</a>
                  </li>
                  <li role="presentation" class=""><a href="#private_photo_activity" role="tab" id="private-photo-activity" data-toggle="tab" aria-expanded="false"> <i class="fa fa-eye-slash"></i> Private Photo Activity</a>
                  </li>
                  <li role="presentation" class=""><a href="#email_registration" role="tab" id="email-registration" data-toggle="tab" aria-expanded="false"> <i class="fa fa-envelope"></i> Email Registrations</a>
                  </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                  <div role="tabpanel" class="tab-pane fade active in" id="download_activity" aria-labelledby="download-activity">
                    <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher
                      synth. Cosby sweater eu banh mi, qui irure terr.</p>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="favourite_activity" aria-labelledby="favourite-activity">
                    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                      booth letterpress, commodo enim craft beer mlkshk aliquip</p>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="private_photo_activity" aria-labelledby="private-photo-activity">
                    <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                      booth letterpress, commodo enim craft beer mlkshk </p>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="email_registration" aria-labelledby="email-registration">
                    <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                      booth letterpress, commodo enim craft beer mlkshk </p>
                  </div>
                </div>
              </div>

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
<!-- bootstrap-daterangepicker -->
<script src="{{ asset('gentelella') }}/vendors/moment/min/moment.min.js"></script>
<script src="{{ asset('gentelella') }}/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- jQuery Tags Input -->
<script src="{{ asset('gentelella') }}/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
<!-- iCheck -->
<script src="{{ asset('gentelella') }}/vendors/iCheck/icheck.min.js"></script>
<!-- Switchery -->
<script src="{{ asset('gentelella') }}/vendors/switchery/dist/switchery.min.js"></script>
<!-- Dropzone.js -->
<script src="{{ asset('gentelella') }}/vendors/dropzone/dist/min/dropzone.min.js"></script>
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