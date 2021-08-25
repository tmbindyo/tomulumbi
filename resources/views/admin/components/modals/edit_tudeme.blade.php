{{-- add action type modal --}}
<div class="modal fade editTudeme" tabindex="-1" role="dialog" aria-labelledby="editTudeme" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTudeme">Edit Tudeme</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('admin.tudeme.update',$tudeme->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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
                        <input name="name" id="name" value="{{$tudeme->name}}" type="text" class="mb-2 form-control" {{ $errors->has('name') ? ' is-invalid' : '' }} required="required">
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
                        <label for="status" class="">
                            Status
                        </label>
                        <select required="required" multiple="multiple" style="width: 100%" {{ $errors->has('status') ? ' is-invalid' : '' }} name="status" id="status" class="status-select form-control input-lg">
                            <option>Select Status</option>
                            @foreach($tudemeStatuses as $tudemeStatus)
                                <option value="{{$tudemeStatus->id}}" @if($tudemeStatus->id == $tudeme->status_id) selected @endif>{{$tudemeStatus->name}}</option>
                            @endforeach
                        </select>
                        <i>status</i>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="prep_time" class="">
                                    Prep time
                                </label>
                                <input name="prep_time" id="prep_time" value="{{$tudeme->prep_time}}" type="number" class="mb-2 form-control" {{ $errors->has('prep_time') ? ' is-invalid' : '' }} required="required">
                                <i>prep time</i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="cook_time" class="">
                                    Cook Time
                                </label>
                                <input name="cook_time" id="cook_time" value="{{$tudeme->cook_time}}" type="number" class="mb-2 form-control" {{ $errors->has('cook_time') ? ' is-invalid' : '' }} required="required">
                                <i>cook time</i>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="yield" class="">
                                    Yield
                                </label>
                                <input name="yield" id="yield" value="{{$tudeme->yield}}" type="number" class="mb-2 form-control" {{ $errors->has('yield') ? ' is-invalid' : '' }} required="required">
                                <i>yield</i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="serves" class="">
                                    Serves
                                </label>
                                <input name="serves" id="serves" value="{{$tudeme->serves}}" type="number" class="mb-2 form-control" {{ $errors->has('serves') ? ' is-invalid' : '' }} required="required">
                                <i>serves</i>
                            </div>
                        </div>
                    </div>


                    <div class="position-relative form-group">
                        <label for="tudeme_types" class="">
                            Tudeme Type
                        </label>
                        <select required="required" multiple="multiple" style="width: 100%" {{ $errors->has('tudeme_types') ? ' is-invalid' : '' }} name="tudeme_types[]" id="tudeme_types" class="tudeme-type-select form-control input-lg">
                            <option>Select Tudeme Type</option>
                            @foreach($tudemeTypes as $tudemeType)
                                <option @foreach ($tudemeTudemeTypes as $tudemeTudemeType) @if($tudemeTudemeType->tudeme_type_id == $tudemeType->id) selected @endif @endforeach value="{{$tudemeType->id}}">{{$tudemeType->name}}</option>
                            @endforeach
                        </select>
                        <i>tudeme type</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="tudeme_tags" class="">
                            Tudeme Tag
                        </label>
                        <select required="required" multiple="multiple" style="width: 100%" {{ $errors->has('tudeme_tags') ? ' is-invalid' : '' }} name="tudeme_tags[]" id="tudeme_tags" class="tudeme-tags-select form-control input-lg">
                            <option>Select Tudeme Tag</option>
                            @foreach($tudemeTags as $tudemeTag)
                                <option @foreach ($tudemeTudemeTags as $tudemeTudemeTag) @if($tudemeTudemeTag->tudeme_tag_id == $tudemeTag->id) selected @endif @endforeach value="{{$tudemeTag->id}}">{{$tudemeTag->name}}</option>
                            @endforeach
                        </select>
                        <i>tudeme tag</i>
                    </div>


                    <div class="position-relative form-group">
                        <label for="description" class="">
                            Description
                        </label>
                        <textarea class="form-control" rows="4" name="description" id="description" value="{{$tudeme->description}}" type="text" class="mb-2 form-control" {{ $errors->has('description') ? ' is-invalid' : '' }} required="required"> </textarea>
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
