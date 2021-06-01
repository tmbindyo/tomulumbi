{{-- add action type modal --}}
<div class="modal fade addLoanPayment" tabindex="-1" role="dialog" aria-labelledby="addLoanPayment" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addLoanPayment">Add Loan Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('admin.payment.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                        <label for="amount" class="">
                            Amount
                        </label>
                        <input name="amount" id="amount" value="0" type="text" class="mb-2 form-control" {{ $errors->has('amount') ? ' is-invalid' : '' }} required="required">
                        <i>amount</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="date" class="">
                            Date
                        </label>
                        <input required name="date" id="loan_payment_date" type="text" class="form-control" data-toggle="datepicker"/>
                        <i>date.</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="account" class="">
                            Account
                        </label>
                        <select required="required" style="width: 100%" {{ $errors->has('account') ? ' is-invalid' : '' }} name="account" id="loan-account" class="account-loan-payment-select form-control input-lg">
                            <option selected disabled>Select Account</option>
                            @foreach ($accounts as $account)
                                <option value="{{$account->id}}">{{$account->name}} [{{$account->balance}}]</option>
                            @endforeach
                        </select>
                        <i>account</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="notes" class="">
                            Notes
                        </label>
                        <textarea id="notes" name="notes" class="mb-2 form-control {{ $errors->has('notes') ? ' is-invalid' : '' }}"></textarea>
                        <i>notes</i>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            {{--  Customer  --}}
                            <div class="checkbox checkbox-info">
                                <label for="is_loan">
                                    Loan
                                </label><br>
                                <input id="is_loan" name="is_loan" type="checkbox" checked data-on="Yes" data-off="No" {{ $errors->has('is_loan') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal"><br>
                                <i>loan</i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="position-relative form-group">
                                <label for="loan" class="">
                                    Loan
                                </label>
                                <select required="required" style="width: 100%" {{ $errors->has('loan') ? ' is-invalid' : '' }} name="loan" id="loan" class="loan-select form-control input-lg">
                                    <option selected value="{{$loan->id}}">{{$loan->reference}} T[{{$loan->total}}] | P[{{$loan->paid}}]</option>
                                </select>
                                <i>loan</i>
                            </div>
                        </div>

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
