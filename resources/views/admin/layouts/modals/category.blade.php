<div class="modal inmodal" id="categoryRegistration" tabindex="-1" role="dialog" aria-labelledby="categoryRegistrationLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-cog modal-icon"></i>
                <h4 class="modal-title">Category Registration</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.category.store') }}" autocomplete="off" class="form-horizontal form-label-left">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <div class="form-group">
                        <div class="has-warning">
                            <input type="text" id="name" name="name" required="required" class="form-control input-lg" required="required" placeholder="Name">
                        </div>
                    </div>

                    <div class="ln_solid"></div>

                    <div class="row text-center">
                        <button type="submit" class="btn btn-success btn-block btn-outline btn-lg mt-4">{{ __('SAVE') }}</button>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
