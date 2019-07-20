@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('css')

  <!-- Bootstrap -->
  <link href="{{ asset('gentelella') }}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{ asset('gentelella') }}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="{{ asset('gentelella') }}/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="{{ asset('gentelella') }}/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="{{ asset('gentelella') }}/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="{{ asset('gentelella') }}/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
  <!-- bootstrap-daterangepicker -->
  <link href="{{ asset('gentelella') }}/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="{{ asset('gentelella') }}/build/css/custom.min.css" rel="stylesheet">

@endsection




@section('content')
  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="row top_tiles">
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
            <div class="count">179</div>
            <h3>New Sign ups</h3>
            <p>Lorem ipsum psdea itgum rixt.</p>
          </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-comments-o"></i></div>
            <div class="count">179</div>
            <h3>New Sign ups</h3>
            <p>Lorem ipsum psdea itgum rixt.</p>
          </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
            <div class="count">179</div>
            <h3>New Sign ups</h3>
            <p>Lorem ipsum psdea itgum rixt.</p>
          </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="tile-stats">
            <div class="icon"><i class="fa fa-check-square-o"></i></div>
            <div class="count">179</div>
            <h3>New Sign ups</h3>
            <p>Lorem ipsum psdea itgum rixt.</p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Transaction Summary <small>Weekly progress</small></h2>
              <div class="filter">
                <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                  <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                  <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                </div>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="col-md-9 col-sm-12 col-xs-12">
                <div class="demo-container" style="height:280px">
                  <div id="chart_plot_02" class="demo-placeholder"></div>
                </div>
                <div class="tiles">
                  <div class="col-md-4 tile">
                    <span>Total Sessions</span>
                    <h2>231,809</h2>
                    <span class="sparkline11 graph" style="height: 160px;">
                               <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                  </div>
                  <div class="col-md-4 tile">
                    <span>Total Revenue</span>
                    <h2>$231,809</h2>
                    <span class="sparkline22 graph" style="height: 160px;">
                                <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                  </div>
                  <div class="col-md-4 tile">
                    <span>Total Sessions</span>
                    <h2>231,809</h2>
                    <span class="sparkline11 graph" style="height: 160px;">
                                 <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                  </div>
                </div>

              </div>

              <div class="col-md-3 col-sm-12 col-xs-12">
                <div>
                  <div class="x_title">
                    <h2>Top Profiles</h2>
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
                  <ul class="list-unstyled top_profiles scroll-view">
                    <li class="media event">
                      <a class="pull-left border-aero profile_thumb">
                        <i class="fa fa-user aero"></i>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Ms. Mary Jane</a>
                        <p><strong>$2300. </strong> Agent Avarage Sales </p>
                        <p> <small>12 Sales Today</small>
                        </p>
                      </div>
                    </li>
                    <li class="media event">
                      <a class="pull-left border-green profile_thumb">
                        <i class="fa fa-user green"></i>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Ms. Mary Jane</a>
                        <p><strong>$2300. </strong> Agent Avarage Sales </p>
                        <p> <small>12 Sales Today</small>
                        </p>
                      </div>
                    </li>
                    <li class="media event">
                      <a class="pull-left border-blue profile_thumb">
                        <i class="fa fa-user blue"></i>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Ms. Mary Jane</a>
                        <p><strong>$2300. </strong> Agent Avarage Sales </p>
                        <p> <small>12 Sales Today</small>
                        </p>
                      </div>
                    </li>
                    <li class="media event">
                      <a class="pull-left border-aero profile_thumb">
                        <i class="fa fa-user aero"></i>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Ms. Mary Jane</a>
                        <p><strong>$2300. </strong> Agent Avarage Sales </p>
                        <p> <small>12 Sales Today</small>
                        </p>
                      </div>
                    </li>
                    <li class="media event">
                      <a class="pull-left border-green profile_thumb">
                        <i class="fa fa-user green"></i>
                      </a>
                      <div class="media-body">
                        <a class="title" href="#">Ms. Mary Jane</a>
                        <p><strong>$2300. </strong> Agent Avarage Sales </p>
                        <p> <small>12 Sales Today</small>
                        </p>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>



      <div class="row">
        <div class="col-md-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Weekly Summary <small>Activity shares</small></h2>
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

              <div class="row" style="border-bottom: 1px solid #E0E0E0; padding-bottom: 5px; margin-bottom: 5px;">
                <div class="col-md-7" style="overflow:hidden;">
                        <span class="sparkline_one" style="height: 160px; padding: 10px 25px;">
                                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                  </span>
                  <h4 style="margin:18px">Weekly sales progress</h4>
                </div>

                <div class="col-md-5">
                  <div class="row" style="text-align: center;">
                    <div class="col-md-4">
                      <canvas class="canvasDoughnut" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                      <h4 style="margin:0">Bounce Rates</h4>
                    </div>
                    <div class="col-md-4">
                      <canvas class="canvasDoughnut" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                      <h4 style="margin:0">New Traffic</h4>
                    </div>
                    <div class="col-md-4">
                      <canvas class="canvasDoughnut" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                      <h4 style="margin:0">Device Share</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>



      <div class="row">
        <div class="col-md-4">
          <div class="x_panel">
            <div class="x_title">
              <h2>Top Profiles <small>Sessions</small></h2>
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
              <article class="media event">
                <a class="pull-left date">
                  <p class="month">April</p>
                  <p class="day">23</p>
                </a>
                <div class="media-body">
                  <a class="title" href="#">Item One Title</a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
              </article>
              <article class="media event">
                <a class="pull-left date">
                  <p class="month">April</p>
                  <p class="day">23</p>
                </a>
                <div class="media-body">
                  <a class="title" href="#">Item Two Title</a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
              </article>
              <article class="media event">
                <a class="pull-left date">
                  <p class="month">April</p>
                  <p class="day">23</p>
                </a>
                <div class="media-body">
                  <a class="title" href="#">Item Two Title</a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
              </article>
              <article class="media event">
                <a class="pull-left date">
                  <p class="month">April</p>
                  <p class="day">23</p>
                </a>
                <div class="media-body">
                  <a class="title" href="#">Item Two Title</a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
              </article>
              <article class="media event">
                <a class="pull-left date">
                  <p class="month">April</p>
                  <p class="day">23</p>
                </a>
                <div class="media-body">
                  <a class="title" href="#">Item Three Title</a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
              </article>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="x_panel">
            <div class="x_title">
              <h2>Top Profiles <small>Sessions</small></h2>
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
              <article class="media event">
                <a class="pull-left date">
                  <p class="month">April</p>
                  <p class="day">23</p>
                </a>
                <div class="media-body">
                  <a class="title" href="#">Item One Title</a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
              </article>
              <article class="media event">
                <a class="pull-left date">
                  <p class="month">April</p>
                  <p class="day">23</p>
                </a>
                <div class="media-body">
                  <a class="title" href="#">Item Two Title</a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
              </article>
              <article class="media event">
                <a class="pull-left date">
                  <p class="month">April</p>
                  <p class="day">23</p>
                </a>
                <div class="media-body">
                  <a class="title" href="#">Item Two Title</a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
              </article>
              <article class="media event">
                <a class="pull-left date">
                  <p class="month">April</p>
                  <p class="day">23</p>
                </a>
                <div class="media-body">
                  <a class="title" href="#">Item Two Title</a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
              </article>
              <article class="media event">
                <a class="pull-left date">
                  <p class="month">April</p>
                  <p class="day">23</p>
                </a>
                <div class="media-body">
                  <a class="title" href="#">Item Three Title</a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
              </article>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="x_panel">
            <div class="x_title">
              <h2>Top Profiles <small>Sessions</small></h2>
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
              <article class="media event">
                <a class="pull-left date">
                  <p class="month">April</p>
                  <p class="day">23</p>
                </a>
                <div class="media-body">
                  <a class="title" href="#">Item One Title</a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
              </article>
              <article class="media event">
                <a class="pull-left date">
                  <p class="month">April</p>
                  <p class="day">23</p>
                </a>
                <div class="media-body">
                  <a class="title" href="#">Item Two Title</a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
              </article>
              <article class="media event">
                <a class="pull-left date">
                  <p class="month">April</p>
                  <p class="day">23</p>
                </a>
                <div class="media-body">
                  <a class="title" href="#">Item Two Title</a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
              </article>
              <article class="media event">
                <a class="pull-left date">
                  <p class="month">April</p>
                  <p class="day">23</p>
                </a>
                <div class="media-body">
                  <a class="title" href="#">Item Two Title</a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
              </article>
              <article class="media event">
                <a class="pull-left date">
                  <p class="month">April</p>
                  <p class="day">23</p>
                </a>
                <div class="media-body">
                  <a class="title" href="#">Item Three Title</a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
              </article>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="">
      <div class="row top_tiles" style="margin: 10px 0;">
        <div class="col-md-3 col-sm-3 col-xs-6 tile">
          <span>Total Sessions</span>
          <h2>231,809</h2>
          <span class="sparkline_one" style="height: 160px;">
                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                  </span>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 tile">
          <span>Total Revenue</span>
          <h2>$ 231,809</h2>
          <span class="sparkline_one" style="height: 160px;">
                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                  </span>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 tile">
          <span>Total Sessions</span>
          <h2>231,809</h2>
          <span class="sparkline_three" style="height: 160px;">
                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                  </span>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6 tile">
          <span>Total Sessions</span>
          <h2>231,809</h2>
          <span class="sparkline_one" style="height: 160px;">
                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                  </span>
        </div>
      </div>
      <br />


      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="dashboard_graph x_panel">
            <div class="row x_title">
              <div class="col-md-6">
                <h3>Network Activities <small>Graph title sub-title</small></h3>
              </div>
              <div class="col-md-6">
                <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                  <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                  <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                </div>
              </div>
            </div>
            <div class="x_content">
              <div class="demo-container" style="height:250px">
                <div id="chart_plot_03" class="demo-placeholder"></div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="x_panel fixed_height_320">
            <div class="x_title">
              <h2>App Devices <small>Sessions</small></h2>
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
              <h4>App Versions</h4>
              <div class="widget_summary">
                <div class="w_left w_25">
                  <span>1.5.2</span>
                </div>
                <div class="w_center w_55">
                  <div class="progress">
                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 66%;">
                      <span class="sr-only">60% Complete</span>
                    </div>
                  </div>
                </div>
                <div class="w_right w_20">
                  <span>123k</span>
                </div>
                <div class="clearfix"></div>
              </div>

              <div class="widget_summary">
                <div class="w_left w_25">
                  <span>1.5.3</span>
                </div>
                <div class="w_center w_55">
                  <div class="progress">
                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                      <span class="sr-only">60% Complete</span>
                    </div>
                  </div>
                </div>
                <div class="w_right w_20">
                  <span>53k</span>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="widget_summary">
                <div class="w_left w_25">
                  <span>1.5.4</span>
                </div>
                <div class="w_center w_55">
                  <div class="progress">
                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                      <span class="sr-only">60% Complete</span>
                    </div>
                  </div>
                </div>
                <div class="w_right w_20">
                  <span>23k</span>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="widget_summary">
                <div class="w_left w_25">
                  <span>1.5.5</span>
                </div>
                <div class="w_center w_55">
                  <div class="progress">
                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
                      <span class="sr-only">60% Complete</span>
                    </div>
                  </div>
                </div>
                <div class="w_right w_20">
                  <span>3k</span>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="widget_summary">
                <div class="w_left w_25">
                  <span>0.1.5.6</span>
                </div>
                <div class="w_center w_55">
                  <div class="progress">
                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                      <span class="sr-only">60% Complete</span>
                    </div>
                  </div>
                </div>
                <div class="w_right w_20">
                  <span>1k</span>
                </div>
                <div class="clearfix"></div>
              </div>

            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="x_panel fixed_height_320">
            <div class="x_title">
              <h2>Daily users <small>Sessions</small></h2>
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
              <table class="" style="width:100%">
                <tr>
                  <th style="width:37%;">
                    <p>Top 5</p>
                  </th>
                  <th>
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                      <p class="">Device</p>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                      <p class="">Progress</p>
                    </div>
                  </th>
                </tr>
                <tr>
                  <td>
                    <canvas id="canvas1" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                  </td>
                  <td>
                    <table class="tile_info">
                      <tr>
                        <td>
                          <p><i class="fa fa-square blue"></i>IOS </p>
                        </td>
                        <td>30%</td>
                      </tr>
                      <tr>
                        <td>
                          <p><i class="fa fa-square green"></i>Android </p>
                        </td>
                        <td>10%</td>
                      </tr>
                      <tr>
                        <td>
                          <p><i class="fa fa-square purple"></i>Blackberry </p>
                        </td>
                        <td>20%</td>
                      </tr>
                      <tr>
                        <td>
                          <p><i class="fa fa-square aero"></i>Symbian </p>
                        </td>
                        <td>15%</td>
                      </tr>
                      <tr>
                        <td>
                          <p><i class="fa fa-square red"></i>Others </p>
                        </td>
                        <td>30%</td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="x_panel fixed_height_320">
            <div class="x_title">
              <h2>Profile Settings <small>Sessions</small></h2>
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
              <div class="dashboard-widget-content">
                <ul class="quick-list">
                  <li><i class="fa fa-line-chart"></i><a href="#">Achievements</a></li>
                  <li><i class="fa fa-thumbs-up"></i><a href="#">Favorites</a></li>
                  <li><i class="fa fa-calendar-o"></i><a href="#">Activities</a></li>
                  <li><i class="fa fa-cog"></i><a href="#">Settings</a></li>
                  <li><i class="fa fa-area-chart"></i><a href="#">Logout</a></li>
                </ul>

                <div class="sidebar-widget">
                  <h4>Profile Completion</h4>
                  <canvas width="150" height="80" id="chart_gauge_01" class="" style="width: 160px; height: 100px;"></canvas>
                  <div class="goal-wrapper">
                    <span id="gauge-text" class="gauge-value gauge-chart pull-left">0</span>
                    <span class="gauge-value pull-left">%</span>
                    <span id="goal-text" class="goal-value pull-right">100%</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12 widget_tally_box">
          <div class="x_panel">
            <div class="x_title">
              <h2>User Uptake</h2>
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

              <div id="graph_bar" style="width:100%; height:200px;"></div>

              <div class="col-xs-12 bg-white progress_summary">

                <div class="row">
                  <div class="progress_title">
                    <span class="left">Escudor Wireless 1.0</span>
                    <span class="right">This sis</span>
                    <div class="clearfix"></div>
                  </div>

                  <div class="col-xs-2">
                    <span>SSD</span>
                  </div>
                  <div class="col-xs-8">
                    <div class="progress progress_sm">
                      <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="89"></div>
                    </div>
                  </div>
                  <div class="col-xs-2 more_info">
                    <span>89%</span>
                  </div>
                </div>
                <div class="row">
                  <div class="progress_title">
                    <span class="left">Mobile Access</span>
                    <span class="right">Smart Phone</span>
                    <div class="clearfix"></div>
                  </div>

                  <div class="col-xs-2">
                    <span>App</span>
                  </div>
                  <div class="col-xs-8">
                    <div class="progress progress_sm">
                      <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="79"></div>
                    </div>
                  </div>
                  <div class="col-xs-2 more_info">
                    <span>79%</span>
                  </div>
                </div>
                <div class="row">
                  <div class="progress_title">
                    <span class="left">WAN access users</span>
                    <span class="right">Total 69%</span>
                    <div class="clearfix"></div>
                  </div>

                  <div class="col-xs-2">
                    <span>Usr</span>
                  </div>
                  <div class="col-xs-8">
                    <div class="progress progress_sm">
                      <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="69"></div>
                    </div>
                  </div>
                  <div class="col-xs-2 more_info">
                    <span>69%</span>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

        <!-- start of weather widget -->
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Today's Weather <small>Sessions</small></h2>
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
                <div class="col-sm-12">
                  <div class="temperature"><b>Monday</b>, 07:30 AM
                    <span>F</span>
                    <span><b>C</b>
                                          </span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="weather-icon">
                          <span>
                                              <canvas height="84" width="84" id="partly-cloudy-day"></canvas>
                                          </span>

                  </div>
                </div>
                <div class="col-sm-8">
                  <div class="weather-text">
                    <h2>Texas
                      <br><i>Partly Cloudy Day</i>
                    </h2>
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="weather-text pull-right">
                  <h3 class="degrees">23</h3>
                </div>
              </div>
              <div class="clearfix"></div>


              <div class="row weather-days">
                <div class="col-sm-2">
                  <div class="daily-weather">
                    <h2 class="day">Mon</h2>
                    <h3 class="degrees">25</h3>
                    <span>
                                                  <canvas id="clear-day" width="32" height="32">
                                                  </canvas>

                                          </span>
                    <h5>15
                      <i>km/h</i>
                    </h5>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="daily-weather">
                    <h2 class="day">Tue</h2>
                    <h3 class="degrees">25</h3>
                    <canvas height="32" width="32" id="rain"></canvas>
                    <h5>12
                      <i>km/h</i>
                    </h5>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="daily-weather">
                    <h2 class="day">Wed</h2>
                    <h3 class="degrees">27</h3>
                    <canvas height="32" width="32" id="snow"></canvas>
                    <h5>14
                      <i>km/h</i>
                    </h5>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="daily-weather">
                    <h2 class="day">Thu</h2>
                    <h3 class="degrees">28</h3>
                    <canvas height="32" width="32" id="sleet"></canvas>
                    <h5>15
                      <i>km/h</i>
                    </h5>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="daily-weather">
                    <h2 class="day">Fri</h2>
                    <h3 class="degrees">28</h3>
                    <canvas height="32" width="32" id="wind"></canvas>
                    <h5>11
                      <i>km/h</i>
                    </h5>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="daily-weather">
                    <h2 class="day">Sat</h2>
                    <h3 class="degrees">26</h3>
                    <canvas height="32" width="32" id="cloudy"></canvas>
                    <h5>10
                      <i>km/h</i>
                    </h5>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>

        </div>
        <!-- end of weather widget -->

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="x_panel fixed_height_320">
            <div class="x_title">
              <h2>Incomes <small>Sessions</small></h2>
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
              <div class="dashboard-widget-content">
                <ul class="quick-list">
                  <li><i class="fa fa-bars"></i><a href="#">Subscription</a></li>
                  <li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
                  <li><i class="fa fa-support"></i><a href="#">Help Desk</a> </li>
                  <li><i class="fa fa-heart"></i><a href="#">Donations</a> </li>
                </ul>

                <div class="sidebar-widget">
                  <h4>Goal</h4>
                  <canvas width="150" height="80" id="chart_gauge_02" class="" style="width: 160px; height: 100px;"></canvas>
                  <div class="goal-wrapper">
                    <span class="gauge-value pull-left">$</span>
                    <span id="gauge-text2" class="gauge-value pull-left">3,200</span>
                    <span id="goal-text2" class="goal-value pull-right">$5,000</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- top tiles -->
    <div class="row tile_count">
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
        <div class="count">2500</div>
        <span class="count_bottom"><i class="green">4% </i> From last Week</span>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-clock-o"></i> Average Time</span>
        <div class="count">123.50</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
        <div class="count green">2,500</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
        <div class="count">4,567</div>
        <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
        <div class="count">2,315</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
      </div>
      <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
        <div class="count">7,325</div>
        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
      </div>
    </div>
    <!-- /top tiles -->

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="dashboard_graph">

          <div class="row x_title">
            <div class="col-md-6">
              <h3>Network Activities <small>Graph title sub-title</small></h3>
            </div>
            <div class="col-md-6">
              <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
              </div>
            </div>
          </div>

          <div class="col-md-9 col-sm-9 col-xs-12">
            <div id="chart_plot_01" class="demo-placeholder"></div>
          </div>
          <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
            <div class="x_title">
              <h2>Top Campaign Performance</h2>
              <div class="clearfix"></div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-6">
              <div>
                <p>Facebook Campaign</p>
                <div class="">
                  <div class="progress progress_sm" style="width: 76%;">
                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80"></div>
                  </div>
                </div>
              </div>
              <div>
                <p>Twitter Campaign</p>
                <div class="">
                  <div class="progress progress_sm" style="width: 76%;">
                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-6">
              <div>
                <p>Conventional Media</p>
                <div class="">
                  <div class="progress progress_sm" style="width: 76%;">
                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="40"></div>
                  </div>
                </div>
              </div>
              <div>
                <p>Bill boards</p>
                <div class="">
                  <div class="progress progress_sm" style="width: 76%;">
                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50"></div>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <div class="clearfix"></div>
        </div>
      </div>

    </div>
    <br />

    <div class="row">


      <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="x_panel tile fixed_height_320">
          <div class="x_title">
            <h2>App Versions</h2>
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
            <h4>App Usage across versions</h4>
            <div class="widget_summary">
              <div class="w_left w_25">
                <span>0.1.5.2</span>
              </div>
              <div class="w_center w_55">
                <div class="progress">
                  <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 66%;">
                    <span class="sr-only">60% Complete</span>
                  </div>
                </div>
              </div>
              <div class="w_right w_20">
                <span>123k</span>
              </div>
              <div class="clearfix"></div>
            </div>

            <div class="widget_summary">
              <div class="w_left w_25">
                <span>0.1.5.3</span>
              </div>
              <div class="w_center w_55">
                <div class="progress">
                  <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                    <span class="sr-only">60% Complete</span>
                  </div>
                </div>
              </div>
              <div class="w_right w_20">
                <span>53k</span>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="widget_summary">
              <div class="w_left w_25">
                <span>0.1.5.4</span>
              </div>
              <div class="w_center w_55">
                <div class="progress">
                  <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                    <span class="sr-only">60% Complete</span>
                  </div>
                </div>
              </div>
              <div class="w_right w_20">
                <span>23k</span>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="widget_summary">
              <div class="w_left w_25">
                <span>0.1.5.5</span>
              </div>
              <div class="w_center w_55">
                <div class="progress">
                  <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
                    <span class="sr-only">60% Complete</span>
                  </div>
                </div>
              </div>
              <div class="w_right w_20">
                <span>3k</span>
              </div>
              <div class="clearfix"></div>
            </div>
            <div class="widget_summary">
              <div class="w_left w_25">
                <span>0.1.5.6</span>
              </div>
              <div class="w_center w_55">
                <div class="progress">
                  <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                    <span class="sr-only">60% Complete</span>
                  </div>
                </div>
              </div>
              <div class="w_right w_20">
                <span>1k</span>
              </div>
              <div class="clearfix"></div>
            </div>

          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="x_panel tile fixed_height_320 overflow_hidden">
          <div class="x_title">
            <h2>Device Usage</h2>
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
            <table class="" style="width:100%">
              <tr>
                <th style="width:37%;">
                  <p>Top 5</p>
                </th>
                <th>
                  <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                    <p class="">Device</p>
                  </div>
                  <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                    <p class="">Progress</p>
                  </div>
                </th>
              </tr>
              <tr>
                <td>
                  <canvas class="canvasDoughnut" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                </td>
                <td>
                  <table class="tile_info">
                    <tr>
                      <td>
                        <p><i class="fa fa-square blue"></i>IOS </p>
                      </td>
                      <td>30%</td>
                    </tr>
                    <tr>
                      <td>
                        <p><i class="fa fa-square green"></i>Android </p>
                      </td>
                      <td>10%</td>
                    </tr>
                    <tr>
                      <td>
                        <p><i class="fa fa-square purple"></i>Blackberry </p>
                      </td>
                      <td>20%</td>
                    </tr>
                    <tr>
                      <td>
                        <p><i class="fa fa-square aero"></i>Symbian </p>
                      </td>
                      <td>15%</td>
                    </tr>
                    <tr>
                      <td>
                        <p><i class="fa fa-square red"></i>Others </p>
                      </td>
                      <td>30%</td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>


      <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="x_panel tile fixed_height_320">
          <div class="x_title">
            <h2>Quick Settings</h2>
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
            <div class="dashboard-widget-content">
              <ul class="quick-list">
                <li><i class="fa fa-calendar-o"></i><a href="#">Settings</a>
                </li>
                <li><i class="fa fa-bars"></i><a href="#">Subscription</a>
                </li>
                <li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
                <li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>
                </li>
                <li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
                <li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>
                </li>
                <li><i class="fa fa-area-chart"></i><a href="#">Logout</a>
                </li>
              </ul>

              <div class="sidebar-widget">
                  <h4>Profile Completion</h4>
                  <canvas width="150" height="80" id="chart_gauge_01" class="" style="width: 160px; height: 100px;"></canvas>
                  <div class="goal-wrapper">
                    <span id="gauge-text" class="gauge-value pull-left">0</span>
                    <span class="gauge-value pull-left">%</span>
                    <span id="goal-text" class="goal-value pull-right">100%</span>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>


    <div class="row">
      <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Recent Activities <small>Sessions</small></h2>
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
            <div class="dashboard-widget-content">

              <ul class="list-unstyled timeline widget">
                <li>
                  <div class="block">
                    <div class="block_content">
                      <h2 class="title">
                                        <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                    </h2>
                      <div class="byline">
                        <span>13 hours ago</span> by <a>Jane Smith</a>
                      </div>
                      <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="block">
                    <div class="block_content">
                      <h2 class="title">
                                        <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                    </h2>
                      <div class="byline">
                        <span>13 hours ago</span> by <a>Jane Smith</a>
                      </div>
                      <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="block">
                    <div class="block_content">
                      <h2 class="title">
                                        <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                    </h2>
                      <div class="byline">
                        <span>13 hours ago</span> by <a>Jane Smith</a>
                      </div>
                      <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                      </p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="block">
                    <div class="block_content">
                      <h2 class="title">
                                        <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                    </h2>
                      <div class="byline">
                        <span>13 hours ago</span> by <a>Jane Smith</a>
                      </div>
                      <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                      </p>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>


      <div class="col-md-8 col-sm-8 col-xs-12">



        <div class="row">

          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Visitors location <small>geo-presentation</small></h2>
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
                <div class="dashboard-widget-content">
                  <div class="col-md-4 hidden-small">
                    <h2 class="line_30">125.7k Views from 60 countries</h2>

                    <table class="countries_list">
                      <tbody>
                        <tr>
                          <td>United States</td>
                          <td class="fs15 fw700 text-right">33%</td>
                        </tr>
                        <tr>
                          <td>France</td>
                          <td class="fs15 fw700 text-right">27%</td>
                        </tr>
                        <tr>
                          <td>Germany</td>
                          <td class="fs15 fw700 text-right">16%</td>
                        </tr>
                        <tr>
                          <td>Spain</td>
                          <td class="fs15 fw700 text-right">11%</td>
                        </tr>
                        <tr>
                          <td>Britain</td>
                          <td class="fs15 fw700 text-right">10%</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div id="world-map-gdp" class="col-md-8 col-sm-12 col-xs-12" style="height:230px;"></div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="row">


          <!-- Start to do list -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>To Do List <small>Sample tasks</small></h2>
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

                <div class="">
                  <ul class="to_do">
                    <li>
                      <p>
                        <input type="checkbox" class="flat"> Schedule meeting with new client </p>
                    </li>
                    <li>
                      <p>
                        <input type="checkbox" class="flat"> Create email address for new intern</p>
                    </li>
                    <li>
                      <p>
                        <input type="checkbox" class="flat"> Have IT fix the network printer</p>
                    </li>
                    <li>
                      <p>
                        <input type="checkbox" class="flat"> Copy backups to offsite location</p>
                    </li>
                    <li>
                      <p>
                        <input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney</p>
                    </li>
                    <li>
                      <p>
                        <input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney</p>
                    </li>
                    <li>
                      <p>
                        <input type="checkbox" class="flat"> Create email address for new intern</p>
                    </li>
                    <li>
                      <p>
                        <input type="checkbox" class="flat"> Have IT fix the network printer</p>
                    </li>
                    <li>
                      <p>
                        <input type="checkbox" class="flat"> Copy backups to offsite location</p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- End to do list -->

          <!-- start of weather widget -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Daily active users <small>Sessions</small></h2>
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
                  <div class="col-sm-12">
                    <div class="temperature"><b>Monday</b>, 07:30 AM
                      <span>F</span>
                      <span><b>C</b></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="weather-icon">
                      <canvas height="84" width="84" id="partly-cloudy-day"></canvas>
                    </div>
                  </div>
                  <div class="col-sm-8">
                    <div class="weather-text">
                      <h2>Texas <br><i>Partly Cloudy Day</i></h2>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="weather-text pull-right">
                    <h3 class="degrees">23</h3>
                  </div>
                </div>

                <div class="clearfix"></div>

                <div class="row weather-days">
                  <div class="col-sm-2">
                    <div class="daily-weather">
                      <h2 class="day">Mon</h2>
                      <h3 class="degrees">25</h3>
                      <canvas id="clear-day" width="32" height="32"></canvas>
                      <h5>15 <i>km/h</i></h5>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="daily-weather">
                      <h2 class="day">Tue</h2>
                      <h3 class="degrees">25</h3>
                      <canvas height="32" width="32" id="rain"></canvas>
                      <h5>12 <i>km/h</i></h5>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="daily-weather">
                      <h2 class="day">Wed</h2>
                      <h3 class="degrees">27</h3>
                      <canvas height="32" width="32" id="snow"></canvas>
                      <h5>14 <i>km/h</i></h5>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="daily-weather">
                      <h2 class="day">Thu</h2>
                      <h3 class="degrees">28</h3>
                      <canvas height="32" width="32" id="sleet"></canvas>
                      <h5>15 <i>km/h</i></h5>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="daily-weather">
                      <h2 class="day">Fri</h2>
                      <h3 class="degrees">28</h3>
                      <canvas height="32" width="32" id="wind"></canvas>
                      <h5>11 <i>km/h</i></h5>
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="daily-weather">
                      <h2 class="day">Sat</h2>
                      <h3 class="degrees">26</h3>
                      <canvas height="32" width="32" id="cloudy"></canvas>
                      <h5>10 <i>km/h</i></h5>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>

          </div>
          <!-- end of weather widget -->
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
  <!-- Chart.js -->
  <script src="{{ asset('gentelella') }}/vendors/Chart.js/dist/Chart.min.js"></script>
  <!-- jQuery Sparklines -->
  <script src="{{ asset('gentelella') }}/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- morris.js -->
  <script src="{{ asset('gentelella') }}/vendors/raphael/raphael.min.js"></script>
  <script src="{{ asset('gentelella') }}/vendors/morris.js/morris.min.js"></script>
  <!-- gauge.js -->
  <script src="{{ asset('gentelella') }}/vendors/gauge.js/dist/gauge.min.js"></script>
  <!-- bootstrap-progressbar -->
  <script src="{{ asset('gentelella') }}/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <!-- iCheck -->
  <script src="{{ asset('gentelella') }}/vendors/iCheck/icheck.min.js"></script>
  <!-- Skycons -->
  <script src="{{ asset('gentelella') }}/vendors/skycons/skycons.js"></script>
  <!-- Flot -->
  <script src="{{ asset('gentelella') }}/vendors/Flot/jquery.flot.js"></script>
  <script src="{{ asset('gentelella') }}/vendors/Flot/jquery.flot.pie.js"></script>
  <script src="{{ asset('gentelella') }}/vendors/Flot/jquery.flot.time.js"></script>
  <script src="{{ asset('gentelella') }}/vendors/Flot/jquery.flot.stack.js"></script>
  <script src="{{ asset('gentelella') }}/vendors/Flot/jquery.flot.resize.js"></script>
  <!-- Flot plugins -->
  <script src="{{ asset('gentelella') }}/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
  <script src="{{ asset('gentelella') }}/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
  <script src="{{ asset('gentelella') }}/vendors/flot.curvedlines/curvedLines.js"></script>
  <!-- DateJS -->
  <script src="{{ asset('gentelella') }}/vendors/DateJS/build/date.js"></script>
  <!-- JQVMap -->
  <script src="{{ asset('gentelella') }}/vendors/jqvmap/dist/jquery.vmap.js"></script>
  <script src="{{ asset('gentelella') }}/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="{{ asset('gentelella') }}/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="{{ asset('gentelella') }}/vendors/moment/min/moment.min.js"></script>
  <script src="{{ asset('gentelella') }}/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="{{ asset('gentelella') }}/build/js/custom.min.js"></script>

@endsection
