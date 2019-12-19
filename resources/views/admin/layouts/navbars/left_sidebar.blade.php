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
                            Action Types
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.album.type.shows' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.album.types')}}">
                            Album Types
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.categories' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.categories')}}">
                            Categories
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.categories' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.categories')}}">
                            Campaign Types
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.contact.types' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.contact.types')}}">
                            Contact Types
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.contact.types' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.contact.types')}}">
                            Expense Accounts
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.contact.types' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.contact.types')}}">
                            Frequencies
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.contact.types' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.contact.types')}}">
                            Label
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.contact.types' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.contact.types')}}">
                            Lead Source
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.project.types' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.project.types')}}">
                            Organization Types
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.project.types' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.project.types')}}">
                            Project Types
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.sizes' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.sizes')}}">
                            Sizes
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.sub.types' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.sub.types')}}">
                            Sub Types
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.tags' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.tags')}}">
                            Tags
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.tags' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.tags')}}">
                            Title
                        </a>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.types' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.types')}}">
                            Types
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
                <a href="{{ route('admin.to.dos') }}"><i class="fa fa-list"></i> <span class="nav-label">To Dos</span></a>
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
                            Campaign <span class="label label-warning pull-right">{{$navbarValues['transactionsCount']}}</span>
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
                            Organizations <span class="label label-warning pull-right">{{$navbarValues['transactionsCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.contacts' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.contacts')}}">
                            Deals <span class="label label-warning pull-right">{{$navbarValues['transactionsCount']}}</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-paint-brush"></i> <span class="nav-label">Work</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.personal.albums' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.personal.albums')}}">
                            Personal Albums <span class="label label-warning pull-right">{{$navbarValues['personalAlbumsCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.client.proofs' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.client.proofs')}}">
                            Client Proofs <span class="label label-warning pull-right">{{$navbarValues['clientProofsCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.designs' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.designs')}}">
                            Designs <span class="label label-warning pull-right">{{$navbarValues['clientProofsCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.projects' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.projects')}}">
                            Projects <span class="label label-warning pull-right">{{$navbarValues['clientProofsCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.journals' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.journals')}}">
                            Journals <span class="label label-warning pull-right">{{$navbarValues['clientProofsCount']}}</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Store</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.orders' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.orders')}}">
                            Orders <span class="label label-warning pull-right">{{$navbarValues['expensesCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.orders' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.products')}}">
                            Products <span class="label label-warning pull-right">{{$navbarValues['productsCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.orders' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.products')}}">
                            Promo Codes <span class="label label-warning pull-right">{{$navbarValues['productsCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.transactions' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.transactions')}}">
                            Quotes <span class="label label-warning pull-right">{{$navbarValues['transactionsCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.transactions' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.transactions')}}">
                            Transactions <span class="label label-warning pull-right">{{$navbarValues['transactionsCount']}}</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-dollar"></i> <span class="nav-label">Accounting</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.accounts' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.accounts')}}">
                            Accounts <span class="label label-warning pull-right">{{$navbarValues['expensesCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.expenses' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.expenses')}}">
                            Expenses <span class="label label-warning pull-right">{{$navbarValues['expensesCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.expenses' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.expenses')}}">
                            Liabilities <span class="label label-warning pull-right">{{$navbarValues['expensesCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.expenses' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.expenses')}}">
                            Payments <span class="label label-warning pull-right">{{$navbarValues['expensesCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.expenses' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.expenses')}}">
                            Refunds <span class="label label-warning pull-right">{{$navbarValues['expensesCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.expenses' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.expenses')}}">
                            Transactions <span class="label label-warning pull-right">{{$navbarValues['expensesCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.expenses' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.expenses')}}">
                            Transfer <span class="label label-warning pull-right">{{$navbarValues['expensesCount']}}</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item {{ Route::currentRouteNamed( 'admin.to.dos' ) ?  'active' : '' }}">
                <a href="{{ route('admin.to.dos') }}"><i class="fa fa-archive"></i> <span class="nav-label">Assets</span></a>
            </li>

        </ul>

    </div>
</nav>
