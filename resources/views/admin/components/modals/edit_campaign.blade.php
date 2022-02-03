{{-- edit action type modal --}}
<div class="modal fade editCampaign" tabindex="-1" role="dialog" aria-labelledby="editCampaign" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCampaign">Add Campaign</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('admin.campaign.update', $campaign->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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
                        <input name="name" id="name" value="{{$campaign->name}}" type="text" class="mb-2 form-control" {{ $errors->has('name') ? ' is-invalid' : '' }} required="required">
                        <i>name</i>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="start_date" class="">
                                    Date
                                </label>
                                <input required name="start_date" id="start_date" type="text" {{ $errors->has('start_date') ? ' is-invalid' : '' }} class="form-control" data-toggle="datepicker"/>
                                <i>start date.</i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="end_date" class="">
                                    End Date
                                </label>
                                <input required name="end_date" id="end_date" type="text" class="form-control" {{ $errors->has('end_date') ? ' is-invalid' : '' }} data-toggle="datepicker"/>
                                <i>end date.</i>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="expected_revenue" class="">
                                    Expected Revenue
                                </label>
                                <input name="expected_revenue" id="expected_revenue" value="{{$campaign->expected_revenue}}" type="text" class="mb-2 form-control" {{ $errors->has('expected_revenue') ? ' is-invalid' : '' }} required="required">
                                <i>expected revenue</i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="budgeted_cost" class="">
                                    Budgeted Cost
                                </label>
                                <input name="budgeted_cost" id="budgeted_cost" value="{{$campaign->budgeted_cost}}" type="text" class="mb-2 form-control" {{ $errors->has('budgeted_cost') ? ' is-invalid' : '' }} required="required">
                                <i>budgeted cost</i>
                            </div>
                        </div>
                    </div>

                    <div class="position-relative form-group">
                        <label for="expected_response" class="">
                            Expected Response
                        </label>
                        <input name="expected_response" id="expected_response" value="{{$campaign->expected_response}}" type="text" class="mb-2 form-control" {{ $errors->has('expected_response') ? ' is-invalid' : '' }} required="required">
                        <i>expected response</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="campaign" class="">
                            Campaign
                        </label>
                        <select required="required" style="width: 100%" {{ $errors->has('campaign') ? ' is-invalid' : '' }} name="campaign" id="campaign" class="campaign-select form-control input-lg">
                            <option>Select Campaign</option>
                            @foreach ($campaigns as $campaignValue)
                            <option @if($campaign->campaign_id == $campaignValue->id) selected @endif value="{{$campaignValue->id}}">{{$campaignValue->name}}</option>
                            @endforeach
                        </select>
                        <i>campaign</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="type" class="">
                            Campaign Type
                        </label>
                        <select required="required" style="width: 100%" {{ $errors->has('type') ? ' is-invalid' : '' }} name="type" id="letter_tag" class="type-select form-control input-lg">
                            <option>Select Campaign Type</option>
                            @foreach ($campaignTypes as $campaignType)
                                <option @if($campaign->campaign_type_id == $campaignType->id) selected @endif value="{{$campaignType->id}}">{{$campaignType->name}}</option>
                            @endforeach
                        </select>
                        <i>campaign type</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="status" class="">
                            Status
                        </label>
                        <select required="required" style="width: 100%" {{ $errors->has('status') ? ' is-invalid' : '' }} name="status" id="status" class="status-select form-control input-lg">
                            <option>Select Status</option>
                            @foreach ($campaignStatus as $status)
                                <option @if($campaign->status_id == $status->id) selected @endif value="{{$status->id}}">{{$status->name}}</option>
                            @endforeach
                        </select>
                        <i>status</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="description" class="">
                            Description
                        </label>
                        <textarea id="description" name="description" class="mb-2 form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"></textarea>
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
