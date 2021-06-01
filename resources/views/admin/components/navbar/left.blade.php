<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Dashboards</li>

                <li>
                    <a href="{{ route('admin.calendar') }}">
                        <i class="metismenu-icon pe-7s-date"></i>
                        Calendar
                    </a>
                </li>

                <li class="app-sidebar__heading">CRM</li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-users"></i>
                        CRM
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route( 'admin.crm.dashboard')}}">
                                <i class="metismenu-icon"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{route( 'admin.campaigns')}}">
                                <i class="metismenu-icon"></i>
                                Campaign <span class="label label-warning pull-right">{{$navbarValues['campaignsCount']}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route( 'admin.leads')}}">
                                <i class="metismenu-icon">
                                </i>Leads <span class="label label-warning pull-right">{{$navbarValues['leadsCount']}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route( 'admin.contacts')}}">
                                <i class="metismenu-icon">
                                </i>Contacts <span class="label label-warning pull-right">{{$navbarValues['contacts']}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route( 'admin.organizations')}}">
                                <i class="metismenu-icon">
                                </i>Organizations <span class="label label-warning pull-right">{{$navbarValues['organizationsCount']}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route( 'admin.deals')}}">
                                <i class="metismenu-icon">
                                </i>Deals <span class="label label-warning pull-right">{{$navbarValues['dealsCount']}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route( 'admin.quotes')}}">
                                <i class="metismenu-icon">
                                </i>Quotes <span class="label label-warning pull-right">{{$navbarValues['quotesCount']}}</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="app-sidebar__heading">Work</li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-paint"></i>
                        Work
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route( 'admin.work.dashboard')}}">
                                <i class="metismenu-icon"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{route( 'admin.personal.albums')}}">
                                <i class="metismenu-icon">
                                </i>Personal Albums <span class="label label-warning pull-right">{{$navbarValues['personalAlbumsCount']}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route( 'admin.client.proofs')}}">
                                <i class="metismenu-icon">
                                </i>Client Proofs <span class="label label-warning pull-right">{{$navbarValues['clientProofsCount']}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route( 'admin.designs')}}">
                                <i class="metismenu-icon">
                                </i>Designs <span class="label label-warning pull-right">{{$navbarValues['designsCount']}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route( 'admin.projects')}}">
                                <i class="metismenu-icon">
                                </i>Projects <span class="label label-warning pull-right">{{$navbarValues['projectsCount']}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route( 'admin.journals')}}">
                                <i class="metismenu-icon">
                                </i>Journals <span class="label label-warning pull-right">{{$navbarValues['journalsCount']}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route( 'admin.tudeme')}}">
                                <i class="metismenu-icon">
                                </i>Tudeme <span class="label label-warning pull-right">{{$navbarValues['tudemeCount']}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route( 'admin.letters')}}">
                                <i class="metismenu-icon">
                                </i>Letters <span class="label label-warning pull-right">{{$navbarValues['letterCount']}}</span>
                            </a>
                        </li>

                    </ul>
                </li>



                <li class="app-sidebar__heading">Store</li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-cart"></i>
                        Store
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route( 'admin.store.dashboard')}}">
                                <i class="metismenu-icon"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{route( 'admin.orders')}}">
                                <i class="metismenu-icon">
                                </i>Orders <span class="label label-warning pull-right">{{$navbarValues['ordersCount']}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route( 'admin.products')}}">
                                <i class="metismenu-icon">
                                </i>Products <span class="label label-warning pull-right">{{$navbarValues['productsCount']}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route( 'admin.promo.codes')}}">
                                <i class="metismenu-icon">
                                </i>Promo Codes <span class="label label-warning pull-right">{{$navbarValues['promoCodesCount']}}</span>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="app-sidebar__heading">Accounting</li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-cash"></i>
                        Accounting
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route( 'admin.accounting.dashboard')}}">
                                <i class="metismenu-icon"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{route( 'admin.accounts')}}">
                                <i class="metismenu-icon pe-7s-graph2">
                                </i>Accounts <span class="label label-warning pull-right">{{$navbarValues['accountsCount']}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route( 'admin.expenses')}}">
                                <i class="metismenu-icon pe-7s-graph2">
                                </i>Expenses <span class="label label-warning pull-right">{{$navbarValues['expensesCount']}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route( 'admin.liabilities')}}">
                                <i class="metismenu-icon pe-7s-graph2">
                                </i>Liabilities <span class="label label-warning pull-right">{{$navbarValues['liabilitiesCount']}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route( 'admin.loans')}}">
                                <i class="metismenu-icon pe-7s-graph2">
                                </i>Loans <span class="label label-warning pull-right">{{$navbarValues['loansCount']}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route( 'admin.payments')}}">
                                <i class="metismenu-icon pe-7s-graph2">
                                </i>Payments <span class="label label-warning pull-right">{{$navbarValues['paymentsCount']}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route( 'admin.refunds')}}">
                                <i class="metismenu-icon pe-7s-graph2">
                                </i>Refunds <span class="label label-warning pull-right">{{$navbarValues['refundsCount']}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route( 'admin.transactions')}}">
                                <i class="metismenu-icon pe-7s-graph2">
                                </i>Transactions (Exp) <span class="label label-warning pull-right">{{$navbarValues['transactionsCount']}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route( 'admin.transfers')}}">
                                <i class="metismenu-icon pe-7s-graph2">
                                </i>Transfers <span class="label label-warning pull-right">{{$navbarValues['transfersCount']}}</span>
                            </a>
                        </li>


                    </ul>
                </li>



                <li class="app-sidebar__heading">Assets</li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-piggy"></i>
                        Assets
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route( 'admin.asset.dashboard')}}">
                                <i class="metismenu-icon"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{route( 'admin.assets')}}">
                                <i class="metismenu-icon pe-7s-graph2">
                                </i>Assets <span class="label label-warning pull-right">{{$navbarValues['assetsCount']}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route( 'admin.asset.actions')}}">
                                <i class="metismenu-icon pe-7s-graph2">
                                </i>Asset actions <span class="label label-warning pull-right">{{$navbarValues['assetActionsCount']}}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route( 'admin.kits')}}">
                                <i class="metismenu-icon pe-7s-graph2">
                                </i>Kits <span class="label label-warning pull-right">{{$navbarValues['kitsCount']}}</span>
                            </a>
                        </li>



                    </ul>
                </li>


                <li class="app-sidebar__heading">Settings</li>
                <li>
                    <a href="{{route( 'admin.settings')}}">
                        <i class="metismenu-icon pe-7s-settings">
                        </i>
                        Settings
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
