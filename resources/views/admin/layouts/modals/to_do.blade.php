<div class="modal inmodal" id="toDoRegistration" tabindex="-1" role="dialog" aria-labelledby="tagRegistrationLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-laptop modal-icon"></i>
                <h4 class="modal-title">To Do Registration</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.to.do.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                            <div class="has-warning">
                                <input type="text" id="name" name="name" required="required" placeholder="Name" class="form-control input-lg">
                                <i>Give your to do a name</i>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="has-warning" id="data_1">
                                <div class="input-group date">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                    <input type="text" name="due_date" id="due_date" class="form-control input-lg">
                                </div>
                                <i>Due date.</i>
                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="has-warning">
                                <textarea id="notes" rows="6" name="notes" class="resizable_textarea form-control input-lg" required="required" placeholder="Notes..."></textarea>
                                <i>Due date.</i>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="has-warning">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input name="is_album" type="checkbox" class="js-switch_3" />
                                    <br>
                                    <i>Check if it belongs to an Album.</i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="has-warning">
                                <select name="album" class="select2_demo_2 form-control input-lg">
                                    <option>Select Album</option>
                                    @foreach($albums as $album)
                                        <option value="{{$album->id}}">{{$album->name}}</option>
                                    @endforeach
                                </select>
                                <i>What album does the to do belong to</i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="has-warning">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input name="is_design" type="checkbox" class="js-switch_4" />
                                    <br>
                                    <i>Check if it belongs to a design.</i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="has-warning">
                                <select name="design" class="select2_demo_2 form-control input-lg">
                                    <option>Select Design</option>
                                    @foreach($designs as $design)
                                        <option value="{{$design->id}}">{{$design->name}}</option>
                                    @endforeach
                                </select>
                                <i>What design does the to do belong to</i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="has-warning">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input name="is_journal" type="checkbox" class="js-switch_5" />
                                    <br>
                                    <i>Check if it belongs to a Journal.</i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="has-warning">
                                <select name="journal" class="select2_demo_2 form-control input-lg">
                                    <option>Select Journal</option>
                                    @foreach($journals as $journal)
                                        <option value="{{$journal->id}}">{{$journal->name}}</option>
                                    @endforeach
                                </select>
                                <i>What journal does the to do belong to</i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="has-warning">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input name="is_project" type="checkbox" class="js-switch_6" />
                                    <br>
                                    <i>Check if it belongs to a Project.</i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="has-warning">
                                <select name="project" class="select2_demo_2 form-control input-lg">
                                    <option>Select Project</option>
                                    @foreach($projects as $project)
                                        <option value="{{$project->id}}">{{$project->name}}</option>
                                    @endforeach
                                </select>
                                <i>What project does the to do belong to</i>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="ln_solid"></div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-block btn-outline btn-lg btn-success mt-4">{{ __('Save') }}</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
