{{-- add action type modal --}}
<div class="modal fade addDeposit" tabindex="-1" role="dialog" aria-labelledby="addDeposit" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="addAccount">Make Deposit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('admin.deposit.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                        <label for="name" class="">
                            Amount
                        </label>
                        <input name="amount" id="deposit_amount" placeholder="amount" type="number" class="mb-2 form-control input-lg" {{ $errors->has('amount') ? ' is-invalid' : '' }} required="required">
                        <i>amount</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="account" class="">
                            Account
                        </label>
                        <select required="required" style="width: 100%" {{ $errors->has('account') ? ' is-invalid' : '' }} name="account" id="account_deposit" class="account-deposit-select form-control input-lg">
                            <option value="{{$account->id}}">{{$account->name}}[{{$account->balance}}]</option>
                        </select>
                        <i>account</i>
                    </div>

                    <div class="position-relative form-group">
                        <label>
                            Date
                        </label>
                        <input required name="deposit_date" id="deposit_date" type="text" class="form-control" data-toggle="datepicker"/>
                        <i>deposit date.</i>
                    </div>
                    <div class="position-relative form-group">
                        <label for="about" class="">
                            About
                        </label>
                        <textarea id="about_deposit" name="about" class="mb-2 form-control {{ $errors->has('about') ? ' is-invalid' : '' }}"></textarea>
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
