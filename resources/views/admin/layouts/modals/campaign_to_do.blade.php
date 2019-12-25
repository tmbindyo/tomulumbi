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
                                    <input name="is_campaign" type="checkbox" class="js-switch_2" checked />
                                    <br>
                                    <i>Check if it belongs to a Campaign.</i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="has-warning">
                                <select name="campaign" class="select2_demo_2 form-control input-lg">
                                    <option>Select Campaign</option>

                                    <option value="{{$campaign->id}}" selected>{{$campaign->name}}</option>
                                </select>
                                <i>What campaign does the to do belong to</i>
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