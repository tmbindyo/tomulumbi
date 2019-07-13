<nav id="navbar-main" class="navbar navbar-horizontal fixed-top navbar-main navbar-expand-lg navbar-white bg-secondary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
        <img src="{{ asset('argon') }}/img/brand/tomulumbi_photography.png" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <div class="navbar-collapse-header">
            <div class="row">
            <div class="col-6 collapse-brand">
                <a href="{{ route('index') }}">
                <img src="{{ asset('argon') }}/img/brand/tomulumbi_photography.png" >
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
                <a class="nav-link nav-link-icon" href="{{ route('login') }}">
                    <i class="ni ni-key-25"></i>
                    <span class="nav-link-inner--text">{{ __('Login') }}</span>
                </a>
            </li>
        </ul>

        </div>
    </div>
</nav>