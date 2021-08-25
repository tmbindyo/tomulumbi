{{-- edit action type modal --}}
<div class="modal fade editJournalSeries" tabindex="-1" role="dialog" aria-labelledby="editJournalSeries" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editJournalSeries">Add Journal Series</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('admin.journal.series.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                        <input name="name" id="journal_series_name" value="{{$journalSeries->name}}" type="text" class="mb-2 form-control" {{ $errors->has('name') ? ' is-invalid' : '' }} required="required">
                        <i>name</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="description" class="">
                            Description
                        </label>
                        <textarea id="description" name="description" class="mb-2 form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">{{$journalSeries->description}}</textarea>
                        <i>description</i>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-2">
                            {{--  Customer  --}}
                            <div class="checkbox checkbox-info">
                                <input id="is_journal_series_journal_series" name="is_journal_series" type="checkbox" data-on="Yes" data-off="No" {{ $errors->has('is_journal_series') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal" @if($journalSeries->is_journal_series == 1) checked @endif>
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
                                        @foreach($journalSerieses as $series)
                                            <option @if($series->id == $journalSeries->journal_series_id) selected @endif value="{{$series->id}}">{{$series->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <i>journal series</i>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-2">
                            {{--  Customer  --}}
                            <div class="checkbox checkbox-info">
                                <input id="is_journal_series_tudeme" name="is_tudeme" type="checkbox" data-on="Yes" data-off="No" {{ $errors->has('is_tudeme') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal" @if($journalSeries->is_tudeme == 1) checked @endif>
                                <label for="is_tudeme">
                                    Tudeme
                                </label>
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
