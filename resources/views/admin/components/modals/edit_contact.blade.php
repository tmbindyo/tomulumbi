{{-- edit action type modal --}}
<div class="modal fade editContact" tabindex="-1" role="dialog" aria-labelledby="editContact" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editContact">Edit Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('admin.contact.update', $contact->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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
                            <div class="position-relative form-group">
                                <label for="first_name" class="">
                                    First Name
                                </label>
                                <input name="first_name" id="first_name" value="{{$contact->first_name}}" type="text" class="mb-2 form-control" {{ $errors->has('first_name') ? ' is-invalid' : '' }} required="required">
                                <i>first name</i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="last_name" class="">
                                    Last Name
                                </label>
                                <input name="last_name" id="last_name" value="{{$contact->last_name}}" type="text" class="mb-2 form-control" {{ $errors->has('last_name') ? ' is-invalid' : '' }} required="required">
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
                                <input name="phone_number" id="phone_number" value="{{$contact->phone_number}}" type="text" class="mb-2 form-control" {{ $errors->has('phone_number') ? ' is-invalid' : '' }} required="required">
                                <i>phone number</i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="email" class="">
                                    Email
                                </label>
                                <input name="email" id="email" value="{{$contact->email}}" type="email" class="mb-2 form-control" {{ $errors->has('email') ? ' is-invalid' : '' }} required="required">
                                <i>email</i>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">

                            <div class="position-relative form-group">
                                <div class="checkbox checkbox-info">
                                    <label for="is_lead">
                                        Lead
                                    </label><br>
                                    <input id="is_lead" name="is_lead" type="checkbox"  data-on="Yes" @if($contact->is_lead) checked @endif data-off="No" {{ $errors->has('is_lead') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal"><br>
                                    <i>lead</i>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="position-relative form-group">
                                <label for="title" class="">
                                    Title
                                </label>
                                <select required="required" style="width: 100%" {{ $errors->has('title') ? ' is-invalid' : '' }} name="title" id="title" class="title-select form-control input-lg">
                                    <option>Select Title</option>
                                    @foreach ($titles as $title)
                                    <option @if($contact->title_id == $title->id) selected @endif value="{{$title->id}}">{{$title->name}}</option>
                                    @endforeach
                                </select>
                                <i>title</i>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">

                            <div class="position-relative form-group">
                                <label for="organization" class="">
                                    Organization
                                </label>
                                <select required="required" style="width: 100%" {{ $errors->has('organization') ? ' is-invalid' : '' }} name="organization" id="contact_organization" class="contact-organization-select form-control input-lg">
                                    <option>Select Organization</option>
                                    @foreach ($organizations as $organization)
                                    <option @if($contact->organization_id == $organization->id) selected @endif value="{{$organization->id}}">{{$organization->name}}</option>
                                    @endforeach
                                </select>
                                <i>organization</i>
                            </div>

                        </div>
                        <div class="col-md-6">

                            <div class="position-relative form-group">
                                <label for="type" class="">
                                    Contact Type
                                </label>
                                <select required="required" multiple="multiple" style="width: 100%" {{ $errors->has('type') ? ' is-invalid' : '' }} name="type" id="letter_tag" class="type-select form-control input-lg">
                                    <option>Select Contact Type</option>
                                    @foreach ($contactTypes as $contactType)
                                        <option @foreach($contactContactTypes as $contactContactType) @if($contactContactType->contact_type_id == $contactType->id) selected @endif @endforeach value="{{$contactType->id}}">{{$contactType->name}}</option>
                                    @endforeach
                                </select>
                                <i>contact type</i>
                            </div>

                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">

                            <div class="position-relative form-group">
                                <label for="organization" class="">
                                    Lead Source
                                </label>
                                <select required="required" style="width: 100%" {{ $errors->has('lead_source') ? ' is-invalid' : '' }} name="organization" id="organization" class="lead-source-select form-control input-lg">
                                    <option>Select Lead Source</option>
                                    @foreach ($leadSources as $leadSource)
                                    <option @if($contact->lead_source_id == $leadSource->id) selected @endif value="{{$leadSource->id}}">{{$leadSource->name}}</option>
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
                                    @foreach ($campaigns as $campaign)
                                    <option @if($contact->campaign_id == $campaign->id) selected @endif value="{{$campaign->id}}">{{$campaign->name}}</option>
                                    @endforeach
                                </select>
                                <i>campaign</i>
                            </div>

                        </div>
                    </div>



                    <div class="position-relative form-group">
                        <label for="about" class="">
                            About
                        </label>
                        <textarea id="about" name="about" class="mb-2 form-control {{ $errors->has('about') ? ' is-invalid' : '' }}">{{$contact->about}}</textarea>
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
