{{-- add action type modal --}}
<div class="modal fade addAccountAdjustment" tabindex="-1" role="dialog" aria-labelledby="addAccountAdjustment" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAccount">Make Account Adjustment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('admin.account.adjustment.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                        <select required="required" style="width: 100%" {{ $errors->has('account') ? ' is-invalid' : '' }} name="account" id="account_account_adjustment" class="account-account-adjustment-select form-control input-lg">
                            <option value="{{$account->id}}">{{$account->name}}[{{$account->balance}}]</option>
                        </select>
                        <i>account</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="name" class="">
                            Adjustment Amount
                        </label>
                        <input name="amount" id="adjustment_amount" placeholder="amount" type="number" class="mb-2 form-control" {{ $errors->has('amount') ? ' is-invalid' : '' }} required="required">
                        <i>account adjustment amount</i>
                    </div>
                    <div class="position-relative form-group">
                        <label>
                            Adjustment Date
                        </label>
                        <input required name="date" id="adjustment_date" type="text" class="form-control" data-toggle="datepicker"/>
                        <i>adjustment date.</i>
                    </div>
                    <div class="position-relative form-group">
                        <label for="description" class="">
                            Notes
                        </label>
                        <textarea id="account_adjustment_notes" name="notes" class="mb-2 form-control {{ $errors->has('notes') ? ' is-invalid' : '' }}"></textarea>
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
