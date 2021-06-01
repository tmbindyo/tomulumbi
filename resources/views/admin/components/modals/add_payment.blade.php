{{-- add action type modal --}}
<div class="modal fade addPayment" tabindex="-1" role="dialog" aria-labelledby="addPayment" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAccount">Add Payment</h5>
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
                        <label for="account" class="">
                            Account
                        </label>
                        <select required="required" style="width: 100%" {{ $errors->has('account') ? ' is-invalid' : '' }} name="account" id="account" class="account-payment-select form-control input-lg">
                            <option>Select Account</option>
                            @foreach($accounts as $account)
                                <option @isset($accountExists) @if($accountExists->id == $account->id) selected @endif @endisset value="{{$account->id}}">{{$account->name}}[{{$account->balance}}]</option>
                            @endforeach
                        </select>
                        <i>account</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="name" class="">
                            Amount
                        </label>
                        <input name="amount" id="amount" placeholder="amount" type="number" class="mb-2 form-control" {{ $errors->has('amount') ? ' is-invalid' : '' }} value='0' required="required">
                        <i>amount</i>
                    </div>
                    <div class="position-relative form-group">
                        <label>
                            Date
                        </label>
                        <input required name="date" id="quote_date" type="text" class="form-control" data-toggle="datepicker"/>
                        <i>date.</i>
                    </div>
                    <div class="position-relative form-group">
                        <label for="description" class="">
                            Notes
                        </label>
                        <textarea id="notes" name="notes" class="mb-2 form-control {{ $errors->has('notes') ? ' is-invalid' : '' }}"></textarea>
                        <i>notes</i>
                    </div>


                    <div class="row">
                        <div class="col-md-2">
                            <label for="is_asset_action" class="">
                                Asset Action
                            </label>
                            <input name="is_asset_action" type="checkbox" data-on="Yes" data-off="No" {{ $errors->has('is_asset_action') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal">
                            <br>
                            <i>check if asset action</i>
                        </div>
                        <div class="col-md-4">
                            <label for="asset_action" class="">
                                Asset Action
                            </label>
                            <select required="required" style="width: 100%" {{ $errors->has('asset_action') ? ' is-invalid' : '' }} name="asset_action" id="asset_action" class="account-asset-action-select form-control input-lg">
                                <option>Select Asset Action</option>
                                @foreach ($assetActions as $assetAction)
                                    <option value="{{$assetAction->id}}">{{$assetAction->reference}} [{{$assetAction->amount}}]</option>
                                @endforeach
                            </select>
                            <i>asset action</i>
                        </div>
                        <div class="col-md-2">
                            <label for="name" class="">
                                Loan
                            </label>
                            <br>
                            <input name="is_loan" type="checkbox" data-on="Yes" data-off="No" {{ $errors->has('is_loan') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal">
                            <br>
                            <i>check if loan</i>
                        </div>
                        <div class="col-md-4">
                            <label for="loan" class="">
                                Loan
                            </label>
                            <select required="required" style="width: 100%" {{ $errors->has('loan') ? ' is-invalid' : '' }} name="loan" id="payment_loan" class="account-payment-loan-select form-control input-lg">
                                <option>Select Loan</option>
                                @foreach ($loans as $loan)
                                    <option value="{{$loan->id}}">{{$loan->reference}} [{{$loan->amount}}]</option>
                                @endforeach
                            </select>
                            <i>loan</i>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-2">
                            <label for="order" class="">
                                Order
                            </label>
                            <br>
                            <input name="is_order" type="checkbox" data-on="Yes" data-off="No" {{ $errors->has('is_order') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal">
                            <br>
                            <i>check if order</i>
                        </div>
                        <div class="col-md-4">
                            <label for="asset_action" class="">
                                Order
                            </label>
                            <select required="required" style="width: 100%" {{ $errors->has('order') ? ' is-invalid' : '' }} name="order" id="order" class="account-order-select form-control input-lg">
                                <option>Select Order</option>
                                @foreach ($orders as $order)
                                    <option value="{{$order->id}}">{{$order->order_number}} [{{$order->total}}]</option>
                                @endforeach
                            </select>
                            <i>order</i>
                        </div>
                        <div class="col-md-2">
                            <label for="is_quote" class="">
                                Quote
                            </label>
                            <br>
                            <input name="is_quote" type="checkbox" data-on="Yes" data-off="No" {{ $errors->has('is_quote') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal">
                            <br>
                            <i>check if quote</i>
                        </div>
                        <div class="col-md-4">
                            <label for="loan" class="">
                                Quote
                            </label>
                            <select required="required" style="width: 100%" {{ $errors->has('quote') ? ' is-invalid' : '' }} name="quote" id="quote" class="account-quote-select form-control input-lg">
                                <option>Select Quote</option>
                                @foreach ($quotes as $quote)
                                    <option value="{{$quote->id}}">{{$quote->reference}} [{{$quote->total}}]</option>
                                @endforeach
                            </select>
                            <i>quote</i>
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
