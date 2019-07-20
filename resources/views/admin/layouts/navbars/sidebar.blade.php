<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('admin.dashboard') }}" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ asset('gentelella') }}/production/images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{$user->name}}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('admin.client.dashboard') }}">Client Dashboard</a></li>
                            <li><a href="{{ route('admin.design.dashboard') }}">Design Dashboard</a></li>
                            <li><a href="{{ route('admin.project.dashboard') }}">Project Dashboard</a></li>
                            <li><a href="{{ route('admin.album.dashboard') }}">Album Dashboard</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-calendar-o"></i> Calendar <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('admin.calendar') }}">Calendar</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-cogs"></i> Settings <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('admin.album.types') }}">Album Type</a></li>
                            <li><a href="{{ route('admin.tags') }}">Tag</a></li>
                            <li><a href="{{ route('admin.categories') }}">Category</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-users"></i> Client <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('admin.album.types') }}">Client Settings</a></li>
                            <li><a href="{{ route('admin.albums') }}">Client Albums</a></li>
                            </li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-image"></i> Album <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#album1_1">Level One</a>
                            <li><a>Level Two<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li class="sub_menu"><a href="level2.html">Level Two.One</a>
                                    </li>
                                    <li><a href="#level2_1">Level Two.Two</a>
                                    </li>
                                    <li><a href="#level2_2">Level Two.Three</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#album1_2">Level Three</a>
                            </li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-pencil"></i> Design <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#album1_1">Level One</a>
                            <li><a>Level Two<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li class="sub_menu"><a href="level2.html">Level Two.One</a>
                                    </li>
                                    <li><a href="#level2_1">Level Two.Two</a>
                                    </li>
                                    <li><a href="#level2_2">Level Two.Three</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#album1_2">Level Three</a>
                            </li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-folder-o"></i> Project <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#album1_1">Level One</a>
                            <li><a>Level Two<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li class="sub_menu"><a href="level2.html">Level Two.One</a>
                                    </li>
                                    <li><a href="#level2_1">Level Two.Two</a>
                                    </li>
                                    <li><a href="#level2_2">Level Two.Three</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#album1_2">Level Three</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>