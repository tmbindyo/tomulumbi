<div class="modal inmodal" id="secondaryProductCoverImageRegistration" tabindex="-1" role="dialog" aria-labelledby="tagRegistrationLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-laptop modal-icon"></i>
                <h4 class="modal-title">Product Second Cover Image</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.product.cover.image.second',$product->id) }}" autocomplete="off" enctype = "multipart/form-data">
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


                    <div class="input-group">
                        <input type="file" name="cover_image" class="form-control col-md-12 col-xs-12 input-lg" required>
                    </div>

                    <div class="ln_solid"></div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">{{ __('SAVE') }}</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
