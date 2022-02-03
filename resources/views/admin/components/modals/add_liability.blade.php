{{-- add action type modal --}}
<div class="modal fade addLiability" tabindex="-1" role="dialog" aria-labelledby="addLiability" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="addAccount">Add Liability</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('admin.liability.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                        <label for="principal" class="">
                            Principal
                        </label>
                        <input name="principal" id="liability_principal" value="0" oninput="liabilityGetPercentAmount();" placeholder="principal" type="number" class="mb-2 form-control input-lg" {{ $errors->has('amount') ? ' is-invalid' : '' }} required="required">
                        <i>principal</i>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="interest" class="">
                                    Interest percentage
                                </label>
                                <input name="interest" id="liability_interest" value="0" oninput="liabilityGetPercentAmount();" placeholder="interest" type="number" class="mb-2 form-control input-lg" {{ $errors->has('interest') ? ' is-invalid' : '' }} required="required">
                                <i>key in interest in percentage</i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="interest_amount" class="">
                                    Interest Amount
                                </label>
                                <input name="interest_amount" id="liability_interest_amount" value="0" oninput="liabilityGetPercentFromAmount();" placeholder="interest amount" type="number" class="mb-2 form-control input-lg" {{ $errors->has('interest_amount') ? ' is-invalid' : '' }} required="required">
                                <i>key in interest amount</i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="total" class="">
                                    Total
                                </label>
                                <input name="total" id="liability_total" value="0" placeholder="total" type="number" class="mb-2 form-control input-lg" {{ $errors->has('total') ? ' is-invalid' : '' }} required="required">
                                <i>total</i>
                            </div>
                        </div>
                    </div>

                    <div class="position-relative form-group">
                        <label for="account" class="">
                            Account
                        </label>
                        <select required="required" style="width: 100%" {{ $errors->has('account') ? ' is-invalid' : '' }} name="account" id="account_liability" class="account-liability-select form-control input-lg">
                            <option>Select Account</option>
                            @foreach($accounts as $account)
                                <option @isset($accountExists) @if($accountExists->id == $account->id) selected @endif @endisset value="{{$account->id}}">{{$account->name}}[{{$account->balance}}]</option>
                            @endforeach
                        </select>
                        <i>account</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="contact" class="">
                            Contact
                        </label>
                        <select required="required" style="width: 100%" {{ $errors->has('contact') ? ' is-invalid' : '' }} name="contact" id="contact_liability" class="contact-liability-select form-control input-lg">
                            <option>Select Contact</option>
                            @foreach($contacts as $contact)
                                <option @isset($contactExists) @if($contactExists->id == $contact->id) selected @endif @endisset value="{{$contact->id}}">{{$contact->first_name}} {{$contact->last_name}} @if($contact->organization)[{{$contact->organization->name}}]@endif</option>
                            @endforeach
                        </select>
                        <i>contact</i>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="date" class="">
                                    Date
                                </label>
                                <input required name="date" id="liability_date" type="text" class="form-control" data-toggle="datepicker"/>
                                <i>date.</i>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label for="due_date" class="">
                                    Due Date
                                </label>
                                <input required name="due_date" id="liability_due_date" type="text" class="form-control" data-toggle="datepicker"/>
                                <i>due date.</i>
                            </div>
                        </div>
                    </div>

                    <div class="position-relative form-group">
                        <label for="about" class="">
                            About
                        </label>
                        <textarea id="about" name="about" class="mb-2 form-control {{ $errors->has('about') ? ' is-invalid' : '' }}"></textarea>
                        <i>about</i>
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
