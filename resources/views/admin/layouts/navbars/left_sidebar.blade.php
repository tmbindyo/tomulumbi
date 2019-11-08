<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span>
                        <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                     </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <strong class="font-bold">{{$user->name}}</strong>
                            </span>
                        </span>
                    </a>
                </div>
                <div class="logo-element">
                    tomulumbi
                </div>
            </li>
            <li class="">
                <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.dashboard' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.dashboard')}}">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.client.dashboard' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.client.dashboard')}}">
                            Client Dashboard
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.design.dashboard' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.design.dashboard')}}">
                            Design Dashboard
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.project.dashboard' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.project.dashboard')}}">
                            Project Dashboard
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.album.dashboard' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.album.dashboard')}}">
                            Album Dashboard
                        </a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-cogs"></i> <span class="nav-label">Settings</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.album.types' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.album.types')}}">
                            Album Types
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.tags' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.tags')}}">
                            Tags
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.categories' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.categories')}}">
                            Categories
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.typographies' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.typographies')}}">
                            Typographies
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ Route::currentRouteNamed( 'admin.calendar' ) ?  'active' : '' }}">
                <a href="{{ route('admin.calendar') }}"><i class="fa fa-calendar"></i> <span class="nav-label">Calendar</span></a>
            </li>

            <li class="nav-item {{ Route::currentRouteNamed( 'admin.to.dos' ) ?  'active' : '' }}">
                <a href="{{ route('admin.to.dos') }}"><i class="fa fa-list"></i> <span class="nav-label">To Do's</span></a>
            </li>

            <li class="nav-item {{ Route::currentRouteNamed( 'admin.contacts' ) ?  'active' : '' }}">
                <a href="{{ route('admin.contacts') }}"><i class="fa fa-email"></i> <span class="nav-label">Contact's</span></a>
            </li>

            <li class="nav-item {{ Route::currentRouteNamed( 'admin.client.proofs' ) ?  'active' : '' }}">
                <a href="{{ route('admin.client.proofs') }}"><i class="fa fa-users"></i> <span class="nav-label">Client Proof's</span><span class="label label-warning pull-right">24</span></a>
            </li>

            <li class="nav-item {{ Route::currentRouteNamed( 'admin.personal.albums' ) ?  'active' : '' }}">
                <a href="{{ route('admin.personal.albums') }}"><i class="fa fa-image"></i> <span class="nav-label">Personal Album's</span><span class="label label-warning pull-right">24</span></a>
            </li>

            <li class="nav-item {{ Route::currentRouteNamed( 'admin.designs' ) ?  'active' : '' }}">
                <a href="{{ route('admin.designs') }}"><i class="fa fa-pencil"></i> <span class="nav-label">Design Work</span><span class="label label-warning pull-right">24</span></a>
            </li>

            <li class="nav-item {{ Route::currentRouteNamed( 'admin.diy' ) ?  'active' : '' }}">
                <a href="{{ route('admin.diy') }}"><i class="fa fa-folder-o"></i> <span class="nav-label">DIY</span><span class="label label-warning pull-right">24</span></a>
            </li>

            <li class="nav-item {{ Route::currentRouteNamed( 'admin.store' ) ?  'active' : '' }}">
                <a href="{{ route('admin.store') }}"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Store</span><span class="label label-warning pull-right">24</span></a>
            </li>

        </ul>

    </div>
</nav>
