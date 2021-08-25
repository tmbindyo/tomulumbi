{{-- edit action type modal --}}
<div class="modal fade editDesignGallery" tabindex="-1" role="dialog" aria-labelledby="editDesignGallery" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDesignGallery">Design Gallery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                @isset($design->cover_image)
                    <div class="col-md-12">
                        <div class="center">
                            <img alt="image" width="440em" class="img-responsive" @isset($design->cover_image) src="{{Minio::getAdminFileUrl( $design->cover_image->pixels750 )}}" @endisset>
                        </div>
                    </div>
                @endisset

                <br>
                <hr>

                <form method="post" action="{{ route('admin.design.work.update',$design->id) }}" autocomplete="off" enctype = "multipart/form-data">
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

                    <div class="position-relative form-group">
                        <label for="name" class="">
                            Name
                        </label>
                        <input name="name" id="name" placeholder="name" type="text" class="form-control" {{ $errors->has('name') ? ' is-invalid' : '' }} required="required">
                        <i>name</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="description" class="">
                            Description
                        </label>
                        <textarea id="description" name="description" class="mb-2 form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"></textarea>
                        <i>description</i>
                    </div>

                    <div class="custom-file">
                        <input type="file" name="cover_image" class="custom-file-input" id="validatedCustomFile" required>
                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                      </div>

                    <div class="ln_solid"></div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-block btn-success mt-4">{{ __('SAVE') }}</button>
                    </div>

                </form>

            </div>

            <div class="modal-footer">
            </div>

        </div>
    </div>
</div>
