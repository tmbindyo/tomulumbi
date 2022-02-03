{{-- add action type modal --}}
<div class="modal fade addPromoCode" tabindex="-1" role="dialog" aria-labelledby="addPromoCode" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPromoCode">Add Promo Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('admin.promo.code.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                        <label for="is_percentage">
                            Percentage
                         </label>
                         <br>
                        <input id="is_percentage" name="is_percentage" type="checkbox"  data-on="Yes" data-off="No" {{ $errors->has('is_percentage') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal">
                        <br>
                        <i>percentage</i>
                        <br>
                        <br>
                    </div>

                    <div class="position-relative form-group">
                        <label for="limit" class="">
                            Limit
                        </label>
                        <input name="limit" id="limit" placeholder="limit" type="number" class="mb-2 form-control" {{ $errors->has('limit') ? ' is-invalid' : '' }} required="required">
                        <i>limit</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="discount" class="">
                            Discount
                        </label>
                        <input name="discount" id="discount" placeholder="discount" type="number" class="mb-2 form-control" {{ $errors->has('discount') ? ' is-invalid' : '' }} required="required">
                        <i>discount</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="expiry_date" class="">
                            Expiry Date
                        </label>
                        <input required name="expiry_date" id="promo_code_expiry_date" type="text" class="form-control" data-toggle="datepicker"/>
                        <i>expiry date.</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="terms_and_conditions" class="">
                            Terms and Conditions
                        </label>
                        <textarea id="terms_and_conditions" name="terms_and_conditions" class="mb-2 form-control {{ $errors->has('terms_and_conditions') ? ' is-invalid' : '' }}"></textarea>
                        <i>terms and conditions</i>
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
