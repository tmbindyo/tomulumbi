{{-- add action type modal --}}
<div class="modal fade addAssetAction" tabindex="-1" role="dialog" aria-labelledby="addAssetAction" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="addAssetAction">Add Asset Action</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('admin.asset.action.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                        <input name="name" id="asset_action_name" placeholder="name" type="text" class="mb-2 form-control input-lg" {{ $errors->has('name') ? ' is-invalid' : '' }} required="required">
                        <i>name</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="amount" class="">
                            Amount
                        </label>
                        <input name="amount" id="amount" value="0" placeholder="amount" type="number" class="mb-2 form-control input-lg" {{ $errors->has('amount') ? ' is-invalid' : '' }} required="required">
                        <i>amount</i>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="date" class="">
                                    Date
                                </label>
                                <input required name="date" id="asset_action_date" type="text" class="form-control" data-toggle="datepicker"/>
                                <i>date.</i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="due_date" class="">
                                    Due Date
                                </label>
                                <input required name="due_date" id="asset_action_due_date" type="text" class="form-control" data-toggle="datepicker"/>
                                <i>due date.</i>
                            </div>
                        </div>
                    </div>

                    <div class="position-relative form-group">
                        <label for="action_type" class="">
                            Action Type
                        </label>
                        <select required="required" style="width: 100%" {{ $errors->has('action_type') ? ' is-invalid' : '' }} name="action_type" id="action_type" class="account-liability-select form-control input-lg">
                            <option>Select Action Type</option>
                            @foreach($actionTypes as $actionType)
                                <option @isset($actionTypeExists) @if($actionTypeExists->id == $actionType->id) selected @endif @endisset value="{{$actionType->id}}">{{$actionType->name}}</option>
                            @endforeach()
                        </select>
                        <i>action type</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="contact" class="">
                            Contact
                        </label>
                        <select required="required" style="width: 100%" {{ $errors->has('contact') ? ' is-invalid' : '' }} name="contact" id="contact_liability" class="contact-liability-select form-control input-lg">
                            <option>Select Contact</option>
                            @foreach($contacts as $contact)
                                <option @isset($contactExists) @if($contactExists->id == $contact->id) selected @endif @endisset value="{{$contact->id}}">{{$contact->first_name}} {{$contact->last_name}}</option>
                            @endforeach()
                        </select>
                        <i>contact</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="about" class="">
                            About
                        </label>
                        <textarea id="about" name="about" class="mb-2 form-control {{ $errors->has('about') ? ' is-invalid' : '' }}"></textarea>
                        <i>about</i>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="checkbox checkbox-info">
                                <label for="is_asset">
                                    Asset
                                </label><br>
                                <input id="is_asset" name="is_asset" checked type="checkbox"  data-on="Yes" data-off="No" {{ $errors->has('is_recurring') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal"><br>
                                <i>asset</i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="has-warning">
                                <select required="required" style="width: 100%" {{ $errors->has('asset') ? ' is-invalid' : '' }} name="asset" id="asset" class="asset-select form-control input-lg">
                                    <option>Select Asset</option>
                                    @foreach($assets as $asset)
                                        <option @isset($assetExists) @if($assetExists->id == $asset->id) selected @endif @endisset value="{{$asset->id}}">{{$asset->name}}</option>
                                    @endforeach()
                                </select>
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
