<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span>
                        <img alt="image" class="img-circle" src="{{ asset('inspinia') }}/img/profile_small.jpg" />
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

            <li class="nav-item {{ Route::currentRouteNamed( 'admin.dashboard' ) ?  'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
            </li>

            <li>
                <a href="#"><i class="fa fa-cogs"></i> <span class="nav-label">Settings</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.album.type.shows' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.album.types')}}">
                            Album Types
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.contact.types' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.contact.types')}}">
                            Contact Types
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.project.types' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.project.types')}}">
                            Project Types
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
                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.types' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.types')}}">
                            Types
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.sub.types' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.sub.types')}}">
                            Sub Types
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.sizes' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.sizes')}}">
                            Sizes
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.typographies' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.typographies')}}">
                            Typographies
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.accounts' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.accounts')}}">
                            Accounts
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

            <li>
                <a href="#"><i class="fa fa-users"></i> <span class="nav-label">CRM</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.contacts' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.contacts')}}">
                            Feed <span class="label label-warning pull-right">{{$navbarValues['expensesCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.contacts' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.contacts')}}">
                            Transactions <span class="label label-warning pull-right">{{$navbarValues['transactionsCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.contacts' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.contacts')}}">
                            Leads <span class="label label-warning pull-right">{{$navbarValues['transactionsCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.contacts' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.contacts')}}">
                            Contacts <span class="label label-warning pull-right">{{$navbarValues['transactionsCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.contacts' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.contacts')}}">
                            Deals <span class="label label-warning pull-right">{{$navbarValues['transactionsCount']}}</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item {{ Route::currentRouteNamed( 'admin.client.proofs' ) ?  'active' : '' }}">
                <a href="{{ route('admin.client.proofs') }}"><i class="fa fa-download"></i> <span class="nav-label">Client Proof's</span><span class="label label-warning pull-right">{{$navbarValues['clientProofsCount']}}</span></a>
            </li>

            <li class="nav-item {{ Route::currentRouteNamed( 'admin.personal.albums' ) ?  'active' : '' }}">
                <a href="{{ route('admin.personal.albums') }}"><i class="fa fa-camera"></i> <span class="nav-label">Personal Albums</span><span class="label label-warning pull-right">{{$navbarValues['personalAlbumsCount']}}</span></a>
            </li>

            <li class="nav-item {{ Route::currentRouteNamed( 'admin.designs' ) ?  'active' : '' }}">
                <a href="{{ route('admin.designs') }}"><i class="fa fa-paint-brush"></i> <span class="nav-label">Designs</span><span class="label label-warning pull-right">{{$navbarValues['designsCount']}}</span></a>
            </li>

            <li class="nav-item {{ Route::currentRouteNamed( 'admin.projects' ) ?  'active' : '' }}">
                <a href="{{ route('admin.projects') }}"><i class="fa fa-trello"></i> <span class="nav-label">Projects</span><span class="label label-warning pull-right">{{$navbarValues['projectsCount']}}</span></a>
            </li>

            <li class="nav-item {{ Route::currentRouteNamed( 'admin.journals' ) ?  'active' : '' }}">
                <a href="{{ route('admin.journals') }}"><i class="fa fa-film"></i> <span class="nav-label">Journals</span><span class="label label-warning pull-right">{{$navbarValues['journalsCount']}}</span></a>
            </li>

            <li class="nav-item {{ Route::currentRouteNamed( 'admin.products' ) ?  'active' : '' }}">
                <a href="{{ route('admin.products') }}"><i class="fa fa-tags"></i> <span class="nav-label">Products</span><span class="label label-warning pull-right">{{$navbarValues['productsCount']}}</span></a>
            </li>

            <li class="nav-item {{ Route::currentRouteNamed( 'admin.orders' ) ?  'active' : '' }}">
                <a href="{{ route('admin.orders') }}"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Orders</span><span class="label label-warning pull-right">{{$navbarValues['ordersCount']}}</span></a>
            </li>


            <li>
                <a href="#"><i class="fa fa-dollar"></i> <span class="nav-label">Expenses</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.expenses' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.expenses')}}">
                            Expenses <span class="label label-warning pull-right">{{$navbarValues['expensesCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.transactions' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.transactions')}}">
                            Transactions <span class="label label-warning pull-right">{{$navbarValues['transactionsCount']}}</span>
                        </a>
                    </li>

                </ul>
            </li>

        </ul>

    </div>
</nav>
