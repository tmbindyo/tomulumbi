{{-- add action type modal --}}
<div class="modal fade addRefund" tabindex="-1" role="dialog" aria-labelledby="addRefund" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRefund">Add Refund</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('admin.refund.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                        <label for="account" class="">
                            Account
                        </label>
                        <select required="required" style="width: 100%" {{ $errors->has('account') ? ' is-invalid' : '' }} name="account" id="refund-account" class="account-refund-select form-control input-lg">
                            <option selected disabled >Select Account</option>
                            @foreach ($accounts as $account)
                                <option value="{{$account->id}}">{{$account->name}}[{{$account->balance}}]</option>
                            @endforeach
                        </select>
                        <i>account</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="name" class="">
                            Amount
                        </label>
                        <input name="amount" id="amount" placeholder="amount" type="number" class="mb-2 form-control" {{ $errors->has('amount') ? ' is-invalid' : '' }} required="required">
                        <i>amount</i>
                    </div>
                    <div class="position-relative form-group">
                        <label>
                            Date
                        </label>
                        <input required name="date" id="refund_date" type="text" class="form-control" data-toggle="datepicker"/>
                        <i>date.</i>
                    </div>
                    <div class="position-relative form-group">
                        <label for="description" class="">
                            Notes
                        </label>
                        <textarea id="refund_notes" name="notes" class="mb-2 form-control {{ $errors->has('notes') ? ' is-invalid' : '' }}"></textarea>
                        <i>notes</i>
                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <label for="is_payment" class="">
                                Payment
                            </label>
                            <br>
                            <input name="is_payment" type="checkbox" data-on="Yes" data-off="No" {{ $errors->has('is_payment') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal" checked>
                            <br>
                            <i>check if payment</i>
                        </div>
                        <div class="col-md-8">
                            <label for="asset_action" class="">
                                Payment
                            </label>
                            <select required="required" style="width: 100%" {{ $errors->has('payment') ? ' is-invalid' : '' }} name="payment" id="payment" class="account-payment-select form-control input-lg">
                                <option>Select Payment</option>
                                @foreach ($payments as $payment)
                                    <option @isset($paymentExists) @if($paymentExists->id == $payment->id) selected @endif @endisset value="{{$payment->id}}">{{$payment->reference}} [{{$payment->amount}}]</option>
                                @endforeach
                            </select>
                            <i>payment</i>
                        </div>
                    </div>

                    <br>

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
