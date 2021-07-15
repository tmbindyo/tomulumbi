{{-- add action type modal --}}
<div class="modal fade editClientProof" tabindex="-1" role="dialog" aria-labelledby="addClientProof" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editClientProof">Edit Client Proof</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('admin.client.proof.update.collection.settings',$album->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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
                        <input name="name" id="name" value="{{$album->name}}" type="text" class="mb-2 form-control" {{ $errors->has('name') ? ' is-invalid' : '' }} required="required">
                        <i>name</i>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="date" class="">
                                    Date
                                </label>
                                <input required name="date" id="date" type="text" class="form-control" data-toggle="datepicker"/>
                                <i>date.</i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="expiry_date" class="">
                                    Expiry Date
                                </label>
                                <input required name="expiry_date" id="expiry_date" type="text" class="form-control" data-toggle="datepicker"/>
                                <i>expiry date.</i>
                            </div>
                        </div>
                    </div>

                    <div class="position-relative form-group">
                        <label for="tag" class="">
                            Tag
                        </label>
                        <select required="required" multiple="multiple" style="width: 100%" {{ $errors->has('tag') ? ' is-invalid' : '' }} name="tags[]" id="tag" class="tag-select form-control input-lg">
                            <option>Select Tag</option>
                            @foreach($tags as $tag)
                                <option @foreach($albumTags as $albumTag) @if($tag->id === $albumTag->tag->id) selected @endif @endforeach value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                        <i>tag</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="contact" class="">
                            Contact
                        </label>
                        <select required="required" multiple="multiple" style="width: 100%" {{ $errors->has('contact') ? ' is-invalid' : '' }} name="contacts[]" id="contact" class="contact-select form-control input-lg">
                            <option>Select Contact</option>
                            @foreach($contacts as $contact)
                                <option @foreach($albumContacts as $albumContact) @if($contact->id === $albumContact->contact->id) selected @endif @endforeach value="{{$contact->id}}">{{$contact->first_name}} {{$contact->last_name}} @if($contact->organization)[{{$contact->organization->name}}]@endif</option>
                            @endforeach
                        </select>
                        <i>contact</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="thumbnail_size" class="">
                            Thumbnail Size
                        </label>
                        <select required="required" multiple="multiple" style="width: 100%" {{ $errors->has('thumbnail_size') ? ' is-invalid' : '' }} name="thumbnail_size" id="thumbnail_size" class="thumbnail-size-select form-control input-lg">
                            <option>Select Thumbnail Size</option>
                            @foreach($thumbnailSizes as $thumbnailSize)
                                <option value="{{$thumbnailSize->id}}" @if($thumbnailSize->id === $album->thumbnail_size_id) selected @endif>{{$thumbnailSize->name}}</option>
                            @endforeach
                        </select>
                        <i>thumbnail size</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="location" class="">
                            Location
                        </label>
                        <input name="location" id="location" value="{{$album->location}}" type="text" class="mb-2 form-control" {{ $errors->has('location') ? ' is-invalid' : '' }} required="required">
                        <i>location</i>
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
