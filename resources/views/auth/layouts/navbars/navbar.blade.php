@auth()
    @include('auth.layouts.navbars.navs.auth')
@endauth
    
@guest()
    @include('auth.layouts.navbars.navs.guest')
@endguest