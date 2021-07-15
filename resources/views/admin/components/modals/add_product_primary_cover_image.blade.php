{{-- add action type modal --}}
<div class="modal fade addProductPrimaryCoverImage" tabindex="-1" role="dialog" aria-labelledby="addProductPrimaryCoverImage" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductPrimaryCoverImage">Product Primary Cover Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                @isset($product->cover_image)
                    <div class="col-md-12">
                        <div class="center">
                            <img alt="image" width="440em" class="img-responsive" @isset($product->cover_image) src="{{ asset('') }}{{ $product->cover_image->pixels750 }}" @endisset>
                        </div>
                    </div>
                @endisset

                <br>
                <hr>

                <form method="post" action="{{ route('admin.product.cover.image',$product->id) }}" autocomplete="off" enctype = "multipart/form-data">
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


                    <div class="custom-file">
                        <input type="file" name="cover_image" class="custom-file-input" id="validatedCustomFile" required>
                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                      </div>

                    <div class="ln_solid"></div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">{{ __('SAVE') }}</button>
                    </div>

                </form>

            </div>

            <div class="modal-footer">
            </div>

        </div>
    </div>
</div>
