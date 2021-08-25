{{-- edit action type modal --}}
<div class="modal fade editTudemeIcon" tabindex="-1" role="dialog" aria-labelledby="editTudemeIcon" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTudemeIcon">Tudeme Icon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                @isset($tudeme->icon)
                    <div class="col-md-12">
                        <div class="center">
                            <img alt="image" width="440em" class="img-responsive" @isset($tudeme->icon) src="{{Minio::getAdminFileUrl( $tudeme->icon->pixels750 )}}" @endisset>
                        </div>
                    </div>
                @endisset

                <br>
                <hr>

                <form method="post" action="{{ route('admin.tudeme.icon.image',$tudeme->id) }}" autocomplete="off" enctype = "multipart/form-data">
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
                        <button type="submit" class="btn btn-block btn-success mt-4">{{ __('SAVE') }}</button>
                    </div>

                </form>

            </div>

            <div class="modal-footer">
            </div>

        </div>
    </div>
</div>
