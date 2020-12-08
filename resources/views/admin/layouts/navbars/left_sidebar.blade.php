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

            <li class="nav-item {{ Route::currentRouteNamed( 'admin.calendar' ) ?  'active' : '' }}">
                <a href="{{ route('admin.calendar') }}"><i class="fa fa-calendar"></i> <span class="nav-label">Calendar</span></a>
            </li>

            <li class="nav-item {{ Route::currentRouteNamed( 'admin.to.dos' ) ?  'active' : '' }}">
                <a href="{{ route('admin.to.dos') }}"><i class="fa fa-list"></i> <span class="nav-label">To Dos</span></a>
            </li>

            <li>
                <a href="#"><i class="fa fa-users"></i> <span class="nav-label">CRM</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.campaigns' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.campaigns')}}">
                            Campaign <span class="label label-warning pull-right">{{$navbarValues['campaignsCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.leads' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.leads')}}">
                            Leads <span class="label label-warning pull-right">{{$navbarValues['leadsCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.contacts' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.contacts')}}">
                            Contacts <span class="label label-warning pull-right">{{$navbarValues['contacts']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.organizations' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.organizations')}}">
                            Organizations <span class="label label-warning pull-right">{{$navbarValues['organizationsCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.deals' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.deals')}}">
                            Deals <span class="label label-warning pull-right">{{$navbarValues['dealsCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.quotes' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.quotes')}}">
                            Quotes <span class="label label-warning pull-right">{{$navbarValues['quotesCount']}}</span>
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
                            Designs <span class="label label-warning pull-right">{{$navbarValues['designsCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.projects' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.projects')}}">
                            Projects <span class="label label-warning pull-right">{{$navbarValues['projectsCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.journals' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.journals')}}">
                            Journals <span class="label label-warning pull-right">{{$navbarValues['journalsCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.tudeme' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.tudeme')}}">
                            Tudeme <span class="label label-warning pull-right">{{$navbarValues['tudemeCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.letters' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.letters')}}">
                            Letters <span class="label label-warning pull-right">{{$navbarValues['letterCount']}}</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Store</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.orders' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.orders')}}">
                            Orders <span class="label label-warning pull-right">{{$navbarValues['ordersCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.products' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.products')}}">
                            Products <span class="label label-warning pull-right">{{$navbarValues['productsCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.promo.codes' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.promo.codes')}}">
                            Promo Codes <span class="label label-warning pull-right">{{$navbarValues['promoCodesCount']}}</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-dollar"></i> <span class="nav-label">Accounting</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.accounts' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.accounts')}}">
                            Accounts <span class="label label-warning pull-right">{{$navbarValues['accountsCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.expenses' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.expenses')}}">
                            Expenses <span class="label label-warning pull-right">{{$navbarValues['expensesCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.liabilities' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.liabilities')}}">
                            Liabilities <span class="label label-warning pull-right">{{$navbarValues['liabilitiesCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.loans' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.loans')}}">
                            Loans <span class="label label-warning pull-right">{{$navbarValues['loansCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.payments' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.payments')}}">
                            Payments <span class="label label-warning pull-right">{{$navbarValues['paymentsCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.refunds' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.refunds')}}">
                            Refunds <span class="label label-warning pull-right">{{$navbarValues['refundsCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.transactions' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.transactions')}}">
                            Transactions(Exp) <span class="label label-warning pull-right">{{$navbarValues['transactionsCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.transfers' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.transfers')}}">
                            Transfers <span class="label label-warning pull-right">{{$navbarValues['transfersCount']}}</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-camera"></i> <span class="nav-label">Assets</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.assets' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.assets')}}">
                            Assets <span class="label label-warning pull-right">{{$navbarValues['assetsCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.asset.actions' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.asset.actions')}}">
                            Asset actions <span class="label label-warning pull-right">{{$navbarValues['assetActionsCount']}}</span>
                        </a>
                    </li>

                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.kits' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.kits')}}">
                            Kits <span class="label label-warning pull-right">{{$navbarValues['kitsCount']}}</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-cogs"></i> <span class="nav-label">Settings</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="#"> Album <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li class="nav-item {{ Route::currentRouteNamed( 'admin.album.types' ) ?  'active' : '' }}">
                                <a itemprop="url" class="nav-link" href="{{route( 'admin.album.types')}}">
                                    Album Types <span class="label label-warning pull-right">{{$navbarValues['albumTypesCount']}}</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteNamed( 'admin.tags' ) ?  'active' : '' }}">
                                <a itemprop="url" class="nav-link" href="{{route( 'admin.tags')}}">
                                    Tags <span class="label label-warning pull-right">{{$navbarValues['tagsCount']}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"> Asset <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li class="nav-item {{ Route::currentRouteNamed( 'admin.action.types' ) ?  'active' : '' }}">
                                <a itemprop="url" class="nav-link" href="{{route( 'admin.action.types')}}">
                                    Action Types <span class="label label-warning pull-right">{{$navbarValues['actionTypesCount']}}</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteNamed( 'admin.asset.categories' ) ?  'active' : '' }}">
                                <a itemprop="url" class="nav-link" href="{{route( 'admin.asset.categories')}}">
                                    Asset Categories <span class="label label-warning pull-right">{{$navbarValues['assetCategoriesCount']}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"> Design <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li class="nav-item {{ Route::currentRouteNamed( 'admin.categories' ) ?  'active' : '' }}">
                                <a itemprop="url" class="nav-link" href="{{route( 'admin.categories')}}">
                                    Categories <span class="label label-warning pull-right">{{$navbarValues['categoriesCount']}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"> CRM <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li class="nav-item {{ Route::currentRouteNamed( 'admin.contact.types' ) ?  'active' : '' }}">
                                <a itemprop="url" class="nav-link" href="{{route( 'admin.contact.types')}}">
                                    Contact Types <span class="label label-warning pull-right">{{$navbarValues['contactTypesCount']}}</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteNamed( 'admin.lead.sources' ) ?  'active' : '' }}">
                                <a itemprop="url" class="nav-link" href="{{route( 'admin.lead.sources')}}">
                                    Lead Source <span class="label label-warning pull-right">{{$navbarValues['leadSourcseCount']}}</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteNamed( 'admin.campaign.types' ) ?  'active' : '' }}">
                                <a itemprop="url" class="nav-link" href="{{route( 'admin.campaign.types')}}">
                                    Campaign Types <span class="label label-warning pull-right">{{$navbarValues['campaignTypesCount']}}</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteNamed( 'admin.organization.types' ) ?  'active' : '' }}">
                                <a itemprop="url" class="nav-link" href="{{route( 'admin.organization.types')}}">
                                    Organization Types <span class="label label-warning pull-right">{{$navbarValues['organizationTypesCount']}}</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteNamed( 'admin.titles' ) ?  'active' : '' }}">
                                <a itemprop="url" class="nav-link" href="{{route( 'admin.titles')}}">
                                    Title <span class="label label-warning pull-right">{{$navbarValues['titlesCount']}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"> Accounting <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li class="nav-item {{ Route::currentRouteNamed( 'admin.expense.accounts' ) ?  'active' : '' }}">
                                <a itemprop="url" class="nav-link" href="{{route( 'admin.expense.accounts')}}">
                                    Expense Accounts <span class="label label-warning pull-right">{{$navbarValues['expenseAccountsCount']}}</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteNamed( 'admin.frequencies' ) ?  'active' : '' }}">
                                <a itemprop="url" class="nav-link" href="{{route( 'admin.frequencies')}}">
                                    Frequencies <span class="label label-warning pull-right">{{$navbarValues['frequenciesCount']}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"> Letter <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li class="nav-item {{ Route::currentRouteNamed( 'admin.letter.tags' ) ?  'active' : '' }}">
                                <a itemprop="url" class="nav-link" href="{{route( 'admin.letter.tags')}}">
                                    Letter Tags <span class="label label-warning pull-right">{{$navbarValues['letterTagCount']}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"> Journal <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li class="nav-item {{ Route::currentRouteNamed( 'admin.labels' ) ?  'active' : '' }}">
                                <a itemprop="url" class="nav-link" href="{{route( 'admin.labels')}}">
                                    Label <span class="label label-warning pull-right">{{$navbarValues['labelsCount']}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"> Project <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li class="nav-item {{ Route::currentRouteNamed( 'admin.project.types' ) ?  'active' : '' }}">
                                <a itemprop="url" class="nav-link" href="{{route( 'admin.project.types')}}">
                                    Project Types <span class="label label-warning pull-right">{{$navbarValues['projectTypesCount']}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"> Store <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li class="nav-item {{ Route::currentRouteNamed( 'admin.sizes' ) ?  'active' : '' }}">
                                <a itemprop="url" class="nav-link" href="{{route( 'admin.sizes')}}">
                                    Sizes <span class="label label-warning pull-right">{{$navbarValues['sizesCount']}}</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteNamed( 'admin.sub.types' ) ?  'active' : '' }}">
                                <a itemprop="url" class="nav-link" href="{{route( 'admin.sub.types')}}">
                                    Sub Types <span class="label label-warning pull-right">{{$navbarValues['subTypesCount']}}</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteNamed( 'admin.types' ) ?  'active' : '' }}">
                                <a itemprop="url" class="nav-link" href="{{route( 'admin.types')}}">
                                    Types <span class="label label-warning pull-right">{{$navbarValues['typesCount']}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="#"> Tudeme <span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li class="nav-item {{ Route::currentRouteNamed( 'admin.dietary.preferences' ) ?  'active' : '' }}">
                                <a itemprop="url" class="nav-link" href="{{route( 'admin.dietary.preferences')}}">
                                    Dietary Pref <span class="label label-warning pull-right">{{$navbarValues['dietaryPreferenceCount']}}</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteNamed( 'admin.dish.types' ) ?  'active' : '' }}">
                                <a itemprop="url" class="nav-link" href="{{route( 'admin.dish.types')}}">
                                    Dish Type <span class="label label-warning pull-right">{{$navbarValues['dishTypeCount']}}</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteNamed( 'admin.cooking.skills' ) ?  'active' : '' }}">
                                <a itemprop="url" class="nav-link" href="{{route( 'admin.cooking.skills')}}">
                                    Cooking Skill <span class="label label-warning pull-right">{{$navbarValues['cookingSkillCount']}}</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteNamed( 'admin.cooking.styles' ) ?  'active' : '' }}">
                                <a itemprop="url" class="nav-link" href="{{route( 'admin.cooking.styles')}}">
                                    Cooking Style <span class="label label-warning pull-right">{{$navbarValues['cookingStyleCount']}}</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteNamed( 'admin.courses' ) ?  'active' : '' }}">
                                <a itemprop="url" class="nav-link" href="{{route( 'admin.courses')}}">
                                    Course <span class="label label-warning pull-right">{{$navbarValues['courseCount']}}</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteNamed( 'admin.cuisines' ) ?  'active' : '' }}">
                                <a itemprop="url" class="nav-link" href="{{route( 'admin.cuisines')}}">
                                    Cuisine <span class="label label-warning pull-right">{{$navbarValues['cuisineCount']}}</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteNamed( 'admin.tudeme.types' ) ?  'active' : '' }}">
                                <a itemprop="url" class="nav-link" href="{{route( 'admin.tudeme.types')}}">
                                    Tudeme Types <span class="label label-warning pull-right">{{$navbarValues['tudemeTypeCount']}}</span>
                                </a>
                            </li>
                            <li class="nav-item {{ Route::currentRouteNamed( 'admin.tudeme.tags' ) ?  'active' : '' }}">
                                <a itemprop="url" class="nav-link" href="{{route( 'admin.tudeme.tags')}}">
                                    Tudeme Tags <span class="label label-warning pull-right">{{$navbarValues['tudemeTagCount']}}</span>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item {{ Route::currentRouteNamed( 'admin.typographies' ) ?  'active' : '' }}">
                        <a itemprop="url" class="nav-link" href="{{route( 'admin.typographies')}}">
                            Typographies <span class="label label-warning pull-right">{{$navbarValues['typographiesCount']}}</span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>

    </div>
</nav>
