{{-- edit product modal --}}
<div class="modal fade editPersonalAlbumDownloadSettings" tabindex="-1" role="dialog" aria-labelledby="editPersonalAlbumDownloadSettings" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPersonalAlbumDownloadSettings">Edit Personal Album Download Settings {{$album->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('admin.client.proof.update.download',$album->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="checkbox checkbox-info">
                                <label for="is_download">
                                    Download
                                </label><br>
                                <input id="is_download" name="is_download" @if($album->is_download === 1) checked @endif type="checkbox"  data-on="Yes" data-off="No" {{ $errors->has('is_download') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal"><br>
                                <i>Turn on to allow your clients to download photos from this Collection.</i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="checkbox checkbox-info">
                                <label for="is_album_set_exclusive">
                                    Check If Album Sets are exclusive
                                </label><br>
                                <input id="is_album_set_exclusive" name="is_album_set_exclusive" @if($album->is_album_set_exclusive === 1) checked @endif type="checkbox"  data-on="Yes" data-off="No" {{ $errors->has('is_album_set_exclusive') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal"><br>
                                <i>Check this option if album sets are client exclusive i.e each client set should only be seen by a specific person.</i>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="position-relative form-group">
                        <label for="album_password" class="">
                            Album Password
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button tabindex="-1" data-fid="{{$album->id}}" type="button" class="mb-2 btn btn-secondary generateAlbumPassword">Generate Password</button>
                            </div>
                            <input name="album_password" id="album_password" value="{{$album->password}}" type="text" class="mb-2 form-control" {{ $errors->has('name') ? ' is-invalid' : '' }} data-fid="{{$album->id}}">
                        </div>
                        <i>Leave blank to make this collection public. Setting a password will require all guests to use this password in order to see the collection.</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="download_pin" class="">
                            Download Pin
                        </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button tabindex="-1" data-fid="{{$album->id}}" type="button" class="mb-2 btn btn-secondary generateAlbumPin">Generate Pin</button>
                            </div>
                            <input name="download_pin" id="download_pin" value="{{$album->download_pin}}" type="number" class="mb-2 form-control" {{ $errors->has('name') ? ' is-invalid' : '' }} data-fid="{{$album->id}}">
                        </div>
                        <i>Your clients will be required to input this download pin to download photos.</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="download_restriction_limit" class="">
                            Limit Total Number of Gallery Downloads
                        </label>
                        <input name="download_restriction_limit" id="download_restriction_limit" value="{{$album->download_restriction_limit}}" type="number" class="mb-2 form-control" {{ $errors->has('name') ? ' is-invalid' : '' }} required="required">
                        <i>Limit the number of times this PIN can be used for Gallery Download. This does not apply to Single Photo download. If Email Restriction is on, each email can use the PIN up to the Download Limit.</i>
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
