{{-- add action type modal --}}
<div class="modal fade addTransfer" tabindex="-1" role="dialog" aria-labelledby="addTransfer" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAccount">Add Transfer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('admin.transfer.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                            Source Account
                        </label>
                        <select required="required" style="width: 100%" {{ $errors->has('account') ? ' is-invalid' : '' }} name="source_account" id="source_account" class="transfer-destination-account-select form-control input-lg">
                            <option>Select Account</option>
                            @foreach ($accounts as $sourceAccount)
                                <option value="{{$sourceAccount->id}}">{{$sourceAccount->name}} [{{$sourceAccount->balance}}]</option>
                            @endforeach
                        </select>
                        <i>source account</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="account" class="">
                            Destination Account
                        </label>
                        <select required="required" style="width: 100%" {{ $errors->has('account') ? ' is-invalid' : '' }} name="destination_account" id="destination_account" class="transfer-source-account-select form-control input-lg">
                            <option>Select Account</option>
                            @foreach ($accounts as $destinationAccount)
                                <option value="{{$destinationAccount->id}}">{{$destinationAccount->name}} [{{$destinationAccount->balance}}]</option>
                            @endforeach
                        </select>
                        <i>destination account</i>
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
                        <input required name="date" id="date" type="text" class="form-control" data-toggle="datepicker"/>
                        <i>date.</i>
                    </div>
                    <div class="position-relative form-group">
                        <label for="description" class="">
                            Notes
                        </label>
                        <textarea id="notes" name="notes" class="mb-2 form-control {{ $errors->has('notes') ? ' is-invalid' : '' }}"></textarea>
                        <i>notes</i>
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
