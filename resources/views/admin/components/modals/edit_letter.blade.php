{{-- edit action type modal --}}
<div class="modal fade editLetter" tabindex="-1" role="dialog" aria-labelledby="editLetter" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLetter">Add Letter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('admin.letter.update',$letter->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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
                        <input name="name" id="name" value="{{$letter->name}}" type="text" class="mb-2 form-control" {{ $errors->has('name') ? ' is-invalid' : '' }} required="required">
                        <i>name</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="date" class="">
                            Date
                        </label>
                        <input required name="date" id="date" type="text" class="form-control" data-toggle="datepicker"/>
                        <i>date.</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="letter_status" class="">
                            Letter Status
                        </label>
                        <select required="required" style="width: 100%" {{ $errors->has('letter_status') ? ' is-invalid' : '' }} name="letter_status" id="letter_status" class="status-select form-control input-lg">
                            <option>Select Letter Status</option>
                            @foreach($letterStatuses as $letterStatus)
                                <option value="{{$letterStatus->id}}" @if($letterStatus->id == $letter->status_id) selected @endif>{{$letterStatus->name}}</option>
                            @endforeach
                        </select>
                        <i>letter status</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="letter_tag" class="">
                            Letter Tag
                        </label>
                        <select required="required" style="width: 100%" {{ $errors->has('letter_tag') ? ' is-invalid' : '' }} name="letter_tags[]" id="letter_tag" class="letter-tag-select form-control input-lg">
                            <option>Select Letter Tag</option>
                            @foreach($letterTags as $letterTag)
                                <option @foreach($letter->letterLettertags as $letterLettertag) @if($letterLettertag->letter_tag_id == $letterTag->id) selected @endif @endforeach value="{{$letterTag->id}}">{{$letterTag->name}}</option>
                            @endforeach
                        </select>
                        <i>letter type</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="description" class="">
                            Description
                        </label>
                        <textarea id="description" name="description" class="mb-2 form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">{{$letter->description}}</textarea>
                        <i>description</i>
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
