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

                <form method="post" action="{{ route('admin.client.proof.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                        <input name="name" id="client_proof_name" placeholder="name" type="text" class="mb-2 form-control" {{ $errors->has('name') ? ' is-invalid' : '' }} required="required">
                        <i>name</i>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="date" class="">
                                    Date
                                </label>
                                <input required name="date" id="client_proof_date" type="text" class="form-control" data-toggle="datepicker"/>
                                <i>date.</i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="expiry_date" class="">
                                    Expiry Date
                                </label>
                                <input required name="expiry_date" id="client_proof_expiry_date" type="text" class="form-control" data-toggle="datepicker"/>
                                <i>expiry date.</i>
                            </div>
                        </div>
                    </div>

                    <div class="position-relative form-group">
                        <label for="tag" class="">
                            Tag
                        </label>
                        <select required="required" multiple="multiple" style="width: 100%" {{ $errors->has('tag') ? ' is-invalid' : '' }} name="tags[]" id="client_proof_tag" class="client-proof-tag-select form-control input-lg">
                            <option>Select Tag</option>
                            @foreach($tags as $tag)
                                <option @isset($tagExists) @if($tagExists->id == $tag->id) selected @endif @endisset value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                        <i>tag</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="tag" class="">
                            Contact
                        </label>
                        <select required="required" multiple="multiple" style="width: 100%" {{ $errors->has('tag') ? ' is-invalid' : '' }} name="contacts[]" id="contact" class="contact-select form-control input-lg">
                            <option>Select Contact</option>
                            @foreach($contacts as $contact)
                                <option @isset($contactExists) @if($contactExists->id == $contact->id) selected @endif @endisset value="{{$contact->id}}">{{$contact->first_name}} {{$contact->last_name}} @if($contact->organization)[{{$contact->organization->name}}]@endif</option>
                            @endforeach
                        </select>
                        <i>tag</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="location" class="">
                            Location
                        </label>
                        <input name="location" id="client_proof_location" placeholder="location" type="text" class="mb-2 form-control" {{ $errors->has('location') ? ' is-invalid' : '' }} required="required">
                        <i>location</i>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            {{--  Customer  --}}
                            <div class="checkbox checkbox-info">
                                <input id="is_client_proof_project" name="is_project" @isset($projectExists) checked @endisset type="checkbox" data-on="Yes" data-off="No" {{ $errors->has('is_project') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal">
                                <label for="is_project">
                                    Project
                                </label>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="has-warning">
                                <select name="project" style="width: 100%" class="project-select form-control input-lg">
                                    <option selected disabled>Select Project</option>
                                    @foreach($projects as $project)
                                        <option @isset($projectExists) @if($projectExists->id == $project->id) selected @endif @endisset value="{{$project->id}}" >{{$project->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <i>project</i>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-2">
                            {{--  Customer  --}}
                            <div class="checkbox checkbox-info">
                                <input id="is_client_proof_design" name="is_design" @isset($designExists) checked @endisset type="checkbox" data-on="Yes" data-off="No" {{ $errors->has('is_design') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal">
                                <label for="is_design">
                                    Design
                                </label>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="has-warning">
                                <div class="has-warning">
                                    <select name="design" style="width: 100%" class="design-select form-control input-lg">
                                        <option selected disabled>Select Design</option>
                                        @foreach($designs as $design)
                                            <option @isset($designExists) @if($designExists->id == $design->id) selected @endif @endisset value="{{$design->id}}" >{{$design->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <i>design</i>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-2">
                            {{--  Customer  --}}
                            <div class="checkbox checkbox-info">
                                <input id="is_client_proof_tudeme" name="is_tudeme" @isset($tudemeExists) checked @endisset type="checkbox" data-on="Yes" data-off="No" {{ $errors->has('is_tudeme') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal">
                                <label for="is_tudeme">
                                    Tudeme
                                </label>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="has-warning">
                                <div class="has-warning">
                                    <select name="tudeme" style="width: 100%" class="tudeme-select form-control input-lg">
                                        <option selected disabled>Select Tudeme</option>
                                        @foreach($tudemes as $tudeme)
                                            <option @isset($tudemeExists) @if($tudemeExists->id == $tudeme->id) selected @endif @endisset value="{{$tudeme->id}}" >{{$tudeme->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <i>tudeme</i>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-2">
                            {{--  Customer  --}}
                            <div class="checkbox checkbox-info">
                                <input id="is_client_proof_deal" name="is_deal" @isset($dealExists) checked @endisset type="checkbox" data-on="Yes" data-off="No" {{ $errors->has('is_deal') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal">
                                <label for="is_deal">
                                    Deal
                                </label>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="has-warning">
                                <div class="has-warning">
                                    <select name="deal" style="width: 100%" class="deal-select form-control input-lg">
                                        <option selected disabled>Select Deal</option>
                                        @foreach($deals as $deal)
                                            <option @isset($dealExists) @if($dealExists->id == $deal->id) selected @endif @endisset value="{{$deal->id}}" >{{$deal->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <i>deal</i>
                            </div>
                        </div>
                    </div>

                    <hr>

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
