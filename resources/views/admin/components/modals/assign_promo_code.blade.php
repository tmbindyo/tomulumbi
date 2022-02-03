{{-- add action type modal --}}
<div class="modal fade assignPromoCode" tabindex="-1" role="dialog" aria-labelledby="assignPromoCode" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assignPromoCode">Assign Promo Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('admin.promo.code.assignment') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                        <label for="date" class="">
                            Date
                        </label>
                        <input required name="date" id="assign_promo_code_date" type="text" class="form-control" data-toggle="datepicker"/>
                        <i>date.</i>
                    </div>




                    <div class="position-relative form-group">
                        <label for="promo_code" class="">
                            Promo Code
                        </label>
                        <select required="required" style="width: 100%" {{ $errors->has('promo_code') ? ' is-invalid' : '' }} name="promo_code" id="promo_code" class="promo-code-select form-control input-lg">
                            <option selected="selected" inavtive >Select Promo Code</option>
                            @foreach($promoCodes as $promoCode)
                                <option @isset($promoCodeExists) @if($promoCodeExists->id == $promoCode->id) selected @endif @endisset value="{{$promoCode->id}}">{{$promoCode->reference}} [{{$promoCode->discount}}@if($promoCode->is_percentage == 1)%@endif]</option>
                            @endforeach
                        </select>
                        <i>promo code</i>
                    </div>


                    <div class="position-relative form-group">
                        <label for="contact" class="">
                            Contact
                        </label>
                        <select required="required" style="width: 100%" {{ $errors->has('contact') ? ' is-invalid' : '' }} name="contact" id="promo_code_contact" class="promo-code-contact-select form-control input-lg">
                            <option>Select Contact</option>
                            @foreach($contacts as $contact)
                                <option @isset($contactExists) @if($contactExists->id == $contact->id) selected @endif @endisset value="{{$contact->id}}">{{$contact->first_name}} {{$contact->last_name}} @if($contact->organization)[{{$contact->organization->name}}]@endif</option>
                            @endforeach
                        </select>
                        <i>contact</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="assigned" class="">
                            Assigned
                        </label>
                        <input name="assigned" id="assigned" placeholder="assigned" type="number" class="mb-2 form-control" {{ $errors->has('assigned') ? ' is-invalid' : '' }} required="required">
                        <i>assigned</i>
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
