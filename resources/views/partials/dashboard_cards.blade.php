@if (Auth::user()->findUserType(0))
    @include('layouts.headers.admin_cards')
@endif

@if (Auth::user()->findUserType(2))
    @include('layouts.headers.investor_cards')
@endif

@if (Auth::user()->findUserType(3))
    @include('layouts.headers.project_manager_cards')
@endif
