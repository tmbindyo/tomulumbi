{{-- add action type modal --}}
<div class="modal fade addLead" tabindex="-1" role="dialog" aria-labelledby="addLead" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addLead">Add Lead</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('admin.contact.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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

                    <div class="checkbox checkbox-info">
                        <label for="is_lead">
                            Lead
                        </label><br>
                        <input id="is_lead" name="is_lead" @isset($lead_source) checked @endisset type="checkbox"  data-on="Yes" data-off="No" {{ $errors->has('is_lead') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal"><br>
                        <i>lead</i>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="first_name" class="">
                                    First Name
                                </label>
                                <input name="first_name" id="first_name" placeholder="name" type="text" class="mb-2 form-control" {{ $errors->has('first_name') ? ' is-invalid' : '' }} required="required">
                                <i>first name</i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="last_name" class="">
                                    Last Name
                                </label>
                                <input name="last_name" id="last_name" placeholder="name" type="text" class="mb-2 form-control" {{ $errors->has('last_name') ? ' is-invalid' : '' }} required="required">
                                <i>last name</i>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="phone_number" class="">
                                    Phone Number
                                </label>
                                <input name="phone_number" id="phone_number" type="text" class="mb-2 form-control" {{ $errors->has('phone_number') ? ' is-invalid' : '' }} required="required">
                                <i>phone number</i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="email" class="">
                                    Email
                                </label>
                                <input name="email" id="email" type="email" class="mb-2 form-control" {{ $errors->has('email') ? ' is-invalid' : '' }} required="required">
                                <i>email</i>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="organization" class="">
                                    organization
                                </label>
                                <select required="required" style="width: 100%" {{ $errors->has('organization') ? ' is-invalid' : '' }} name="organization" id="organization" class="organization-select form-control input-lg">
                                    <option>Select Organization</option>
                                    @foreach($organizations as $organization)
                                        <option value="{{$organization->id}}">{{$organization->name}}</option>
                                    @endforeach
                                </select>
                                <i>organization</i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="contact_type" class="">
                                    contact type
                                </label>
                                <select required="required" style="width: 100%" {{ $errors->has('contact_type') ? ' is-invalid' : '' }} name="contact_type" id="contact_type" class="contact-type-select form-control input-lg">
                                    <option>Select Contact Type</option>
                                    @foreach($contactTypes as $contactType)
                                        <option value="{{$contactType->id}}">{{$contactType->name}}</option>
                                    @endforeach
                                </select>
                                <i>contact type</i>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="lead_source" class="">
                                    Lead Source
                                </label>
                                <select required="required" style="width: 100%" {{ $errors->has('lead_source') ? ' is-invalid' : '' }} name="lead_source" id="lead_source" class="lead-source-select form-control input-lg">
                                    <option>Select Lead Source</option>
                                    @foreach($leadSources as $leadSource)
                                        <option value="{{$leadSource->id}}">{{$leadSource->name}}</option>
                                    @endforeach
                                </select>
                                <i>lead source</i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="campaign" class="">
                                    Campaign
                                </label>
                                <select required="required" style="width: 100%" {{ $errors->has('campaign') ? ' is-invalid' : '' }} name="campaign" id="campaign" class="campaign-select form-control input-lg">
                                    <option>Select Campaign</option>
                                    @foreach($campaigns as $campaign)
                                        <option value="{{$campaign->id}}">{{$campaign->name}}</option>
                                    @endforeach
                                </select>
                                <i>campaign</i>
                            </div>
                        </div>
                    </div>


                    <div class="position-relative form-group">
                        <label for="about" class="">
                            Description
                        </label>
                        <textarea id="about" name="about" class="mb-2 form-control {{ $errors->has('about') ? ' is-invalid' : '' }}"></textarea>
                        <i>about</i>
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
