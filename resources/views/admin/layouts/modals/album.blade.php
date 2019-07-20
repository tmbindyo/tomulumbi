<div class="modal fade" id="albumRegistration" tabindex="-1" role="dialog" aria-labelledby="albumRegistrationLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="albumRegistrationLabel">Album Registration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.album.save') }}" autocomplete="off" class="form-horizontal form-label-left">
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

                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type="text" placeholder="Collection Name" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12" required="required">
                            <i>Give your collection a name</i>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                            Collection Date <span class="required">*</span>
                        </label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input name="date" type="text" class="form-control has-feedback-left" id="single_cal4" placeholder="First Name" aria-describedby="inputSuccess2Status4">
                            <i>What is the date of the event?</i>
                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                                    Tags <span class="required">*</span>
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input id="tags_1" name="tags" type="text" class="tags form-control" />
                                    <i>What kind of collection is this? Separate your tags with a comma. e.g. wedding, outdoor, summer</i>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                    AutoExpiry*
                                </label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                <div class="col-md-12 xdisplay_inputx form-group has-feedback">
                                                    <input name="expiry_date" type="text" class="form-control has-feedback-left" id="single_cal3" placeholder="Auto Expiry" aria-describedby="inputSuccess2Status4">
                                                    <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                                    <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                    <i>Collection will become Hidden when it reaches 11:59pm on the expiry date.</i>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <label>
                                        <input name="is_homepage_visible" type="checkbox" class="js-switch" checked /> Homepage Visibility

                                    </label>
                                    <i>Show or hide your collection in your Homepage area.</i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <label>
                                        <input name="is_auto_expiry" type="checkbox" class="js-switch" checked /> Auto Expiry

                                    </label>
                                    <i>Auto expiry.</i>
                                </div>
                            </div>
                        </div>


                    </div>
                    <br />

                    <div class="ln_solid"></div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>