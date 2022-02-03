{{-- add action type modal --}}
<div class="modal fade addOrganization" tabindex="-1" role="dialog" aria-labelledby="addOrganization" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addOrganization">Add Organization</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('admin.organization.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                <label for="name" class="">
                                    Name
                                </label>
                                <input name="name" id="name" placeholder="Name" type="text" class="mb-2 form-control" {{ $errors->has('name') ? ' is-invalid' : '' }} required="required">
                                <i>name</i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="email" class="">
                                    Email
                                </label>
                                <input name="email" id="email" placeholder="Email" type="text" class="mb-2 form-control" {{ $errors->has('email') ? ' is-invalid' : '' }} required="required">
                                <i>email</i>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="phone_number" class="">
                                    Phone Number
                                </label>
                                <input name="phone_number" id="phone_number" placeholder="Phone Number" type="text" class="mb-2 form-control" {{ $errors->has('phone_number') ? ' is-invalid' : '' }} required="required">
                                <i>phone number</i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="website" class="">
                                    Website
                                </label>
                                <input name="website" id="website" placeholder="Email" type="text" class="mb-2 form-control" {{ $errors->has('website') ? ' is-invalid' : '' }} required="required">
                                <i>website</i>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="organization" class="">
                                    Organization
                                </label>
                                <select required="required" style="width: 100%" {{ $errors->has('organization') ? ' is-invalid' : '' }} name="organization" id="organization" class="organization-select form-control input-lg">
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
                                <label for="organization_type" class="">
                                    Organization Type
                                </label>
                                <select required="required" style="width: 100%" {{ $errors->has('organization_type') ? ' is-invalid' : '' }} name="organization_type" id="organization_type" class="organization-type-select form-control input-lg">
                                    <option>Select Organization Type</option>
                                    @foreach ($organizationTypes as $organizationType)
                                        <option @isset($organizationTypeExists) @if($organizationTypeExists->id == $organizationType->id) selected @endif @endisset value="{{$organizationType->id}}">{{$organizationType->name}}</option>
                                    @endforeach
                                </select>
                                <i>organization type</i>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="street" class="">
                                    Street
                                </label>
                                <input name="street" id="street" placeholder="Street" type="text" class="mb-2 form-control" {{ $errors->has('street') ? ' is-invalid' : '' }} required="required">
                                <i>street</i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="city" class="">
                                    City
                                </label>
                                <input name="city" id="city" placeholder="City" type="text" class="mb-2 form-control" {{ $errors->has('city') ? ' is-invalid' : '' }} required="required">
                                <i>city</i>
                            </div>
                        </div>
                    </div>

                    <div class="position-relative form-group">
                        <label for="description" class="">
                            Description
                        </label>
                        <textarea id="description" name="description" rows='5' class="mb-2 form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"></textarea>
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
