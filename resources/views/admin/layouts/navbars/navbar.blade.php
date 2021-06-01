<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">

        <ul class="nav navbar-top-links navbar-right">
            <li>
                <span class="m-r-sm text-muted welcome-message">Welcome to tomulumbi.</span>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                    <i class="fa fa-envelope"></i>  <span class="label label-warning">{{$navbarValues['unreadEmailsCount']}}</span>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    @foreach($navbarValues['unreadEmails'] as $unreadEmail)
                        <li>
                            <a href="{{route('admin.email.show',$unreadEmail->id)}}">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> {{$unreadEmail->subject}}
                                    <span class="pull-right text-muted small">{{$unreadEmail->created_at}}</span>
                                </div>
                            </a>
                        </li>
                    @endforeach
                    <li class="divider"></li>
                        <li>
                            <a href="{{route('admin.emails')}}">
                                <div class="text-center">
                                    View Emails
                                </div>
                            </a>
                        </li>

                </ul>
            </li>


            <li>

                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> Log out
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>

            </li>
        </ul>

    </nav>
</div>
