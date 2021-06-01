{{-- add action type modal --}}
<div class="modal fade addTransaction" tabindex="-1" role="dialog" aria-labelledby="addTransaction" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTransaction">Add Transaction</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('admin.transaction.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                        <select required="required" style="width: 100%" {{ $errors->has('account') ? ' is-invalid' : '' }} name="account" id="account" class="account-transaction-select form-control input-lg">
                            <option value="{{$account->id}}">{{$account->name}}[{{$account->balance}}]</option>
                        </select>
                        <i>account</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="status" class="">
                            Status
                        </label>
                        <select required="required" style="width: 100%" {{ $errors->has('status') ? ' is-invalid' : '' }} name="status" id="status" class="account-status-select form-control input-lg">
                            <option selected disabled>Select Status</option>
                            @foreach($transactionStatuses as $status)
                                <option value="{{$status->id}}" >{{$status->name}}</option>
                            @endforeach
                        </select>
                        <i>status</i>
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
                        <input required name="date" id="transaction_date" type="text" class="form-control" data-toggle="datepicker"/>
                        <i>date.</i>
                    </div>
                    <div class="position-relative form-group">
                        <label for="description" class="">
                            Notes
                        </label>
                        <textarea id="transaction_notes" name="notes" class="mb-2 form-control {{ $errors->has('notes') ? ' is-invalid' : '' }}"></textarea>
                        <i>notes</i>
                    </div>
                    <div class="position-relative form-group">
                        <label for="expense" class="">
                            Expense
                        </label>
                        <select required="required" style="width: 100%" {{ $errors->has('expense') ? ' is-invalid' : '' }} name="expense" id="expense" class="account-expense-select form-control input-lg">
                            <option>Select Expense</option>
                            @foreach ($expenses as $expense)
                                <option value="{{$expense->id}}" >{{$expense->reference}} | Ksh. {{$expense->total}} | Paid: [{{$expense->paid}}]</option>
                            @endforeach
                        </select>
                        <i>expense</i>
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
