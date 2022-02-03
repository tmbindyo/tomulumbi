{{-- add action type modal --}}
<div class="modal fade addDeal" tabindex="-1" role="dialog" aria-labelledby="addDeal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDeal">Add Deeal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('admin.deal.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                        <input name="name" id="name" placeholder="Name" type="text" class="mb-2 form-control" {{ $errors->has('name') ? ' is-invalid' : '' }} required="required">
                        <i>name</i>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="amount" class="">
                                    Amount
                                </label>
                                <input name="amount" id="amount" placeholder="Amount" type="number" class="mb-2 form-control" {{ $errors->has('amount') ? ' is-invalid' : '' }} required="required">
                                <i>amount</i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="probability" class="">
                                    Probability
                                </label>
                                <input name="probability" id="probability" placeholder="Probability" type="number" class="mb-2 form-control" {{ $errors->has('probability') ? ' is-invalid' : '' }} required="required">
                                <i>probability</i>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="date" class="">
                                    Date
                                </label>
                                <input required name="date" id="deal_date" type="text" class="form-control" data-toggle="datepicker"/>
                                <i>date.</i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="expiry_date" class="">
                                    Expiry Date
                                </label>
                                <input required name="expiry_date" id="deal_expiry_date" type="text" class="form-control" data-toggle="datepicker"/>
                                <i>expiry date.</i>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="organization" class="">
                                    Organization
                                </label>
                                <select required="required" style="width: 100%" {{ $errors->has('organization') ? ' is-invalid' : '' }} name="organization" id="deal_organization" class="deal-organization-select form-control input-lg">
                                    <option>Select Organization</option>
                                    @foreach ($organizations as $organization)
                                        <option @isset($organizationExists) @if($organizationExists->id == $organization->id) selected @endif @endisset value="{{$organization->id}}">{{$organization->name}}</option>
                                    @endforeach
                                </select>
                                <i>campaign</i>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="contact" class="">
                                    Contact
                                </label>
                                <select required="required" style="width: 100%" {{ $errors->has('contact') ? ' is-invalid' : '' }} name="contact" id="deal_contact" class="deal-contact-select form-control input-lg">
                                    <option>Select Contact</option>
                                    @foreach($contacts as $contact)
                                        <option @isset($contactExists) @if($contactExists->id == $contact->id) selected @endif @endisset value="{{$contact->id}}">{{$contact->first_name}} {{$contact->last_name}} @if($contact->organization)[{{$contact->organization->name}}]@endif</option>
                                    @endforeach
                                </select>
                                <i>contact</i>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="campaign" class="">
                                    Campaign
                                </label>
                                <select required="required" style="width: 100%" {{ $errors->has('campaign') ? ' is-invalid' : '' }} name="campaign" id="campaign" class="campaign-select form-control input-lg">
                                    <option>Select Campaign</option>
                                    @foreach ($campaigns as $campaign)
                                        <option @isset($campaignExists) @if($campaignExists->id == $campaign->id) selected @endif @endisset value="{{$campaign->id}}">{{$campaign->name}}</option>
                                    @endforeach
                                </select>
                                <i>campaign</i>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="type" class="">
                                    Lead Source
                                </label>
                                <select required="required" style="width: 100%" {{ $errors->has('type') ? ' is-invalid' : '' }} name="type" id="letter_tag" class="type-select form-control input-lg">
                                    <option>Select Lead Source</option>
                                    @foreach ($leadSources as $leadSource)
                                        <option @isset($leadSourceExists) @if($leadSourceExists->id == $leadSource->id) selected @endif @endisset value="{{$leadSource->id}}">{{$leadSource->name}}</option>
                                    @endforeach
                                </select>
                                <i>lead source</i>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="status" class="">
                                    Status
                                </label>
                                <select required="required" style="width: 100%" {{ $errors->has('status') ? ' is-invalid' : '' }} name="status" id="status" class="status-select form-control input-lg">
                                    <option>Select Status</option>
                                    @foreach ($dealStatus as $status)
                                        <option @isset($statusExists) @if($statusExists->id == $status->id) selected @endif @endisset value="{{$status->id}}">{{$status->name}}</option>
                                    @endforeach
                                </select>
                                <i>status</i>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="type" class="">
                                    Deal Stage
                                </label>
                                <select required="required" style="width: 100%" {{ $errors->has('type') ? ' is-invalid' : '' }} name="deal_stage" id="deal_stage" class="deal-stage-select form-control input-lg">
                                    <option>Select Deal Stage</option>
                                    @foreach ($dealStages as $dealStage)
                                        <option @isset($dealStageExists) @if($dealStageExists->id == $dealStage->id) selected @endif @endisset value="{{$dealStage->id}}">{{$dealStage->name}}</option>
                                    @endforeach
                                </select>
                                <i>deal stage</i>
                            </div>
                        </div>
                    </div>

                    <div class="position-relative form-group">
                        <label for="about" class="">
                            About
                        </label>
                        <textarea id="about" name="about" rows='5' class="mb-2 form-control {{ $errors->has('about') ? ' is-invalid' : '' }}"></textarea>
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
