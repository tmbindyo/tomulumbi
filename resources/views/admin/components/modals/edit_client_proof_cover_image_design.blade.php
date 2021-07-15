{{-- add action type modal --}}
<div class="modal fade addClientProof" tabindex="-1" role="dialog" aria-labelledby="addClientProof" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addClientProof">Add Client Proof</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('admin.client.proof.update.cover.image.design',$album->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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
                        <label for="cover_design" class="">
                            Cover Design
                        </label>
                        <select required="required" style="width: 100%" {{ $errors->has('cover_design') ? ' is-invalid' : '' }} name="cover_design" id="cover_design" class="cover-design-select form-control input-lg">
                            <option>Select Cover Design</option>
                            @foreach($coverDesigns as $coverDesign)
                                <option value="{{$coverDesign->id}}" @if($coverDesign->id === $album->cover_design_id) selected @endif>{{$coverDesign->name}}</option>
                            @endforeach
                        </select>
                        <i>Choose cover design.</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="scheme" class="">
                            Scheme
                        </label>
                        <select required="required" style="width: 100%" {{ $errors->has('scheme') ? ' is-invalid' : '' }} name="scheme" id="scheme" class="scheme-select form-control input-lg">
                            <option>Select Scheme</option>
                            @foreach($schemes as $scheme)
                                <option value="{{$scheme->id}}" @if($scheme->id === $album->scheme_id) selected @endif>{{$scheme->name}}</option>
                            @endforeach
                        </select>
                        <i>Choose scheme.</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="color" class="">
                            Color
                        </label>
                        <select required="required" style="width: 100%" {{ $errors->has('color') ? ' is-invalid' : '' }} name="color" id="color" class="color-select form-control input-lg">
                            <option>Select Color</option>
                            @foreach($colors as $color)
                                <option value="{{$color->id}}" @if($color->id === $album->color_id) selected @endif>{{$color->name}}</option>
                            @endforeach
                        </select>
                        <i>Choose color.</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="orientation" class="">
                            Orientation
                        </label>
                        <select required="required" style="width: 100%" {{ $errors->has('orientation') ? ' is-invalid' : '' }} name="orientation" id="orientation" class="orientation-select form-control input-lg">
                            <option>Select Color</option>
                            @foreach($orientations as $orientation)
                                <option value="{{$orientation->id}}" @if($orientation->id === $album->orientation_id) selected @endif>{{$orientation->name}}</option>
                            @endforeach
                        </select>
                        <i>Choose orientation.</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="content_align" class="">
                            Content Align
                        </label>
                        <select required="required" style="width: 100%" {{ $errors->has('content_align') ? ' is-invalid' : '' }} name="content_align" id="content_align" class="content-align-select form-control input-lg">
                            <option>Select Content Align</option>
                            @foreach($contentAligns as $contentAlign)
                                <option value="{{$orientation->id}}" @if($orientation->id === $album->orientation_id) selected @endif>{{$orientation->name}}</option>
                            @endforeach
                        </select>
                        <i>Choose content align.</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="image_position" class="">
                            Content Align
                        </label>
                        <select required="required" style="width: 100%" {{ $errors->has('image_position') ? ' is-invalid' : '' }} name="image_position" id="image_position" class="image-position-select form-control input-lg">
                            <option>Select Image Position</option>
                            @foreach($imagePositions as $imagePosition)
                                <option value="{{$imagePosition->id}}" @if($imagePosition->id === $album->image_position_id) selected @endif>{{$imagePosition->name}}</option>
                            @endforeach
                        </select>
                        <i>Choose image position.</i>
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
