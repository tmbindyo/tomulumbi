@auth()
    @include('ira.layouts.navbars.navs.auth')
@endauth
    
@guest()
    @include('ira.layouts.navbars.navs.guest')
@endguest