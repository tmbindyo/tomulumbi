{{-- edit action type modal --}}
<div class="modal fade editProjectCoverImage" tabindex="-1" role="dialog" aria-labelledby="editProjectCoverImage" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProjectCoverImage">Project Cover Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                @isset($project->cover_image)
                    <div class="col-md-12">
                        <div class="center">
                            <img alt="image" width="440em" class="img-responsive" @isset($project->cover_image) src="{{Minio::getAdminFileUrl( $project->cover_image->pixels750 )}}" @endisset>
                        </div>
                    </div>
                @endisset

                <br>
                <hr>

                <form method="post" action="{{ route('admin.project.cover.image',$project->id) }}" autocomplete="off" enctype = "multipart/form-data">
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
