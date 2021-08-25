{{-- add action type modal --}}
<div class="modal fade addDesignGallery" tabindex="-1" role="dialog" aria-labelledby="addDesignGallery" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDesignGallery">Design Gallery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('admin.design.work.store',$design->id) }}" autocomplete="off" enctype = "multipart/form-data">
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
                        <input name="name" id="design_galery_name" placeholder="name" type="text" class="form-control" {{ $errors->has('name') ? ' is-invalid' : '' }} required="required">
                        <i>name</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="description" class="">
                            Description
                        </label>
                        <textarea id="design_galery_description" name="description" class="mb-2 form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"></textarea>
                        <i>description</i>
                    </div>

                    <div class="custom-file">
                        <input type="file" name="design_work" class="custom-file-input" id="add_design_gallery" required>
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
