{{-- add action type modal --}}
<div class="modal fade addAccount" tabindex="-1" role="dialog" aria-labelledby="addAccount" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAccount">Add Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('admin.account.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                            Name
                        </label>
                        <input name="name" id="name" placeholder="name" type="text" class="mb-2 form-control" {{ $errors->has('name') ? ' is-invalid' : '' }} required="required">
                        <i>name</i>
                    </div>
                    <div class="position-relative form-group">
                        <label for="balance" class="">
                            Account Balance
                        </label>
                        <input name="balance" id="balance" placeholder="account balance" type="number" class="mb-2 form-control" {{ $errors->has('balance') ? ' is-invalid' : '' }} required="required">
                        <i>account balance</i>
                    </div>
                    <div class="position-relative form-group">
                        <label for="description" class="">
                            Description
                        </label>
                        <textarea id="notes" name="notes" class="mb-2 form-control {{ $errors->has('notes') ? ' is-invalid' : '' }}"></textarea>
                        <i>description</i>
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
