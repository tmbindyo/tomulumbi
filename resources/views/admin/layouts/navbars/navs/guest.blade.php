<nav id="navbar-main" class="navbar navbar-horizontal fixed-top navbar-main navbar-expand-lg navbar-white bg-secondary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('landing') }}">
        <img src="{{ asset('argon') }}/img/brand/blue.png" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <div class="navbar-collapse-header">
            <div class="row">
            <div class="col-6 collapse-brand">
                <a href="./pages/dashboards/dashboard.html">
                <img src="./assets/img/brand/blue.png">
                </a>
            </div>
            <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                </button>
            </div>
            </div>
        </div>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link nav-link-icon" href="{{ route('register') }}">
                    <i class="ni ni-circle-08"></i>
                    <span class="nav-link-inner--text">{{ __('Register') }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-link-icon" href="{{ route('login') }}">
                    <i class="ni ni-key-25"></i>
                    <span class="nav-link-inner--text">{{ __('Login') }}</span>
                </a>
            </li>
        </ul>
        <hr class="d-lg-none">
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
            <li class="nav-item d-none d-lg-block ml-lg-4">
            <a href="{{ route('register') }}" class="btn btn-neutral btn-icon">
                <span class="btn-inner--icon">
                <i class="fas fa-credit-card mr-2"></i>
                </span>
                <span class="nav-link-inner--text">{{ __('Raise Capital') }}</span>
            </a>
            </li>
        </ul>
        </div>
    </div>
</nav>