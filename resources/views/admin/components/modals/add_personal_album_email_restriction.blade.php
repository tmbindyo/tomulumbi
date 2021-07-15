{{-- edit product modal --}}
<div class="modal fade addPersonalAlbumEmailRestriction" tabindex="-1" role="dialog" aria-labelledby="addPersonalAlbumEmailRestriction" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPersonalAlbumEmailRestriction">Edit Personal Album Email Restriction {{$album->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('admin.client.proof.restrict.to.specific.email',$album->id) }}" autocomplete="off">
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
                        <label for="email" class="">
                            Restrict To Specific Emails
                        </label>
                        <div class="input-group">
                            <input name="email" id="email" placeholder="email" type="email" class="mb-2 form-control" {{ $errors->has('name') ? ' is-invalid' : '' }}>
                        </div>
                        <i>Restrict download to only emails you have entered here.</i>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-block btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-outline btn-block btn-success">{{ __('SAVE') }}</button>
                        </div>
                    </div>

                </form>




            </div>

            <div class="modal-footer">
            </div>

        </div>
    </div>
</div>
