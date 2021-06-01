<br>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                <span aria-hidden="true">×</span>
            </button>
            <strong>Success!</strong> {{ session('success') }}
        </div>
    @endif


    @if (session('info'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                <span aria-hidden="true">×</span>
            </button>
            <strong>Info!</strong> {{ session('info') }}
        </div>
    @endif


    @if (session('info'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                <span aria-hidden="true">×</span>
            </button>
            <strong>Warning!</strong> {{ session('warning') }}
        </div>
    @endif


    @if (session('danger'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                <span aria-hidden="true">×</span>
            </button>
            <strong>Danger!</strong> {{ session('danger') }}
        </div>
    @endif
