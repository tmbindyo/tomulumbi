{{-- add action type modal --}}
<div class="modal fade addJournal" tabindex="-1" role="dialog" aria-labelledby="addJournal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addJournal">Add Journal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('admin.journal.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                        <input name="name" id="journal_name" placeholder="name" type="text" class="mb-2 form-control" {{ $errors->has('name') ? ' is-invalid' : '' }} required="required">
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
                        <label for="color" class="">
                            Color
                        </label>
                        <input type="color" name="color" class="form-control demo1  input-lg" value="#fffef4" />
                        <i>color</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="label" class="">
                            Label
                        </label>
                        <select name="labels[]" style="width: 100%" class="label-select form-control input-lg" multiple="multiple">
                            <option selected disabled>Select Label</option>
                            @foreach($labels as $label)
                                <option value="{{$label->id}}">{{$label->name}}</option>
                            @endforeach
                        </select>
                        <i>label</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="description" class="">
                            Description
                        </label>
                        <textarea id="description" name="description" class="mb-2 form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"></textarea>
                        <i>description</i>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            {{--  Customer  --}}
                            <div class="checkbox checkbox-info">
                                <input id="is_journal_project" name="is_project" @isset($projectExists) checked @endisset type="checkbox" data-on="Yes" data-off="No" {{ $errors->has('is_project') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal">
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
                                <input id="is_journal_design" name="is_design" @isset($designExists) checked @endisset type="checkbox" data-on="Yes" data-off="No" {{ $errors->has('is_design') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal">
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
                                <input id="is_journal_album" name="is_album" @isset($albumExists) checked @endisset type="checkbox" data-on="Yes" data-off="No" {{ $errors->has('is_album') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal">
                                <label for="is_album">
                                    Album
                                </label>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="has-warning">
                                <div class="has-warning">
                                    <select name="album" style="width: 100%" class="album-select form-control input-lg">
                                        <option selected disabled>Select Design</option>
                                        @foreach($albums as $album)
                                            <option @isset($albumExists) @if($albumExists->id == $album->id) selected @endif @endisset value="{{$album->id}}" >{{$album->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <i>album</i>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-2">
                            {{--  Customer  --}}
                            <div class="checkbox checkbox-info">
                                <input id="is_journal_tudeme" name="is_tudeme" @isset($tudemeExists) checked @endisset type="checkbox" data-on="Yes" data-off="No" {{ $errors->has('is_tudeme') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal">
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
                                <input id="is_journal_series_journal_series" name="is_journal_series" type="checkbox" data-on="Yes" data-off="No" {{ $errors->has('is_journal_series') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal">
                                <label for="is_journal_series">
                                    Journal Series
                                </label>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="has-warning">
                                <div class="has-warning">
                                    <select name="deal" style="width: 100%" class="journal-series-select form-control input-lg">
                                        <option selected disabled>Select Journal Series</option>
                                        @foreach($journalSeries as $journal)
                                            <option value="{{$journal->id}}" >{{$journal->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <i>journal series</i>
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
