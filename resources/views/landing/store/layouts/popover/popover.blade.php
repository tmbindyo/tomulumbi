
@if (session('success'))
    <div class="popup-wrapper section-padding-100">
        <div class="popup-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="popup-content">
                        <strong>Success!</strong> {{ session('success') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if (session('info'))
    <div class="popover-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <strong>Success!</strong> {{ session('info') }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif


@if (session('warning'))
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <strong>Success!</strong> {{ session('warning') }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<div class="x_content bs-example-popovers">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>Danger!</strong> {{ session('danger') }}
            </div>
        @endforeach
    @endif

</div>
