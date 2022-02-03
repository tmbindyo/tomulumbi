@extends('admin.components.main')

@section('title', 'Asset Action '.$assetAction->reference)

@section('content')

    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                        </i>
                    </div>
                    <div>
                        <a href="#">
                            Asset Actions
                        </a>
                    </div>
                </div>
                <div class="page-title-actions">
                    <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                        <i class="fa fa-star"></i>
                    </button>
                    <div class="d-inline-block dropdown">
                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                <i class="fa fa-business-time fa-w-20"></i>
                            </span>
                            Buttons
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-inbox"></i>
                                        <span>
                                            Inbox
                                        </span>
                                        <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-book"></i>
                                        <span>
                                            Book
                                        </span>
                                        <div class="ml-auto badge badge-pill badge-danger">5</div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-picture"></i>
                                        <span>
                                            Picture
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a disabled href="javascript:void(0);" class="nav-link disabled">
                                        <i class="nav-link-icon lnr-file-empty"></i>
                                        <span>
                                            File Disabled
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @if($assetAction->is_asset == 1)
                        <a type="button" class="btn btn-success btn-lg" href="{{route('admin.asset.show',$assetAction->asset_id)}}"><i class="fa fa-eye"></i> Asset</a>
                    @elseif($assetAction->is_kit == 1)
                        <a type="button" class="btn btn-success btn-lg" href="{{route('admin.kit.show',$assetAction->kit_id)}}"><i class="fa fa-eye"></i> Kit</a>
                    @endif

                    <a type="button" class="btn btn-success btn-lg" href="{{route('admin.contact.show',$assetAction->contact_id)}}"><i class="fa fa-eye"></i> Contact</a>
                    <a type="button" class="btn btn-success btn-lg" href="{{route('admin.action.type.show',$assetAction->action_type_id)}}"><i class="fa fa-eye"></i> Action Type</a>

                </div>
            </div>
        </div>



        {{-- action types --}}
        <div class="row">
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Asset Action</h5>
                        <form method="post" action="{{ route('admin.asset.action.update',$assetAction->id) }}" autocomplete="off" class="form-horizontal form-label-left">

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

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="amount" class="">
                                            Amount
                                        </label>
                                        <input required name="amount" id="amount" type="number" class="form-control" required="required" value="{{$assetAction->amount}}"/>
                                        <i>amount.</i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    @if($assetAction->is_asset == 1)
                                        <div class="position-relative form-group">
                                            <label for="asset" class="">
                                                Asset
                                            </label>
                                            <select required="required" style="width: 100%" {{ $errors->has('asset') ? ' is-invalid' : '' }} name="asset" id="asset" class="asset-select form-control input-lg">
                                                <option value="{{$assetAction->asset->id}}">{{$assetAction->asset->name}}</option>
                                            </select>
                                            <i>asset.</i>
                                        </div>
                                    @elseif($assetAction->is_kit == 1)
                                    <div class="position-relative form-group">
                                        <label for="kit" class="">
                                            Kit
                                        </label>
                                        <select required="required" style="width: 100%" {{ $errors->has('kit') ? ' is-invalid' : '' }} name="kit" id="kit" class="kit-select form-control input-lg">
                                            <option value="{{$assetAction->kit->id}}">{{$assetAction->kit->name}}</option>
                                        </select>
                                        <i>kit.</i>
                                    </div>
                                    @endif
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="date" class="">
                                            Date
                                        </label>
                                        <input required name="date" id="date" type="text" class="form-control" data-toggle="datepicker"/>
                                        <i>date.</i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="due_date" class="">
                                            Due Date
                                        </label>
                                        <input required name="due_date" id="due_date" type="text" class="form-control" data-toggle="datepicker"/>
                                        <i>due date.</i>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="account" class="">
                                            Account
                                        </label>
                                        <select required="required" style="width: 100%" {{ $errors->has('account') ? ' is-invalid' : '' }} name="account" id="account" class="liability-account-select form-control input-lg">
                                            <option selected value="{{$assetAction->action_type->id}}">{{$assetAction->action_type->name}}</option>
                                        </select>
                                        <i>account</i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="contact" class="">
                                            Contact
                                        </label>
                                        <select required="required" style="width: 100%" {{ $errors->has('contact') ? ' is-invalid' : '' }} name="contact" id="contact" class="liability-contact-select form-control input-lg">
                                            @if($assetAction->contact)
                                                <option selected value="{{$assetAction->contact->id}}">{{$assetAction->contact->first_name}} {{$assetAction->contact->last_name}}</option>
                                            @endif
                                        </select>
                                        <i>contact</i>
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative form-group">
                                <label for="about" class="">
                                    About
                                </label>
                                <textarea name="about" id="about" class="form-control" required="required">{{$assetAction->notes}}</textarea>
                                <i>about.</i>
                            </div>

                            <hr>
                            <button type="submit" class="mt-1 btn btn-success btn-lg btn-block">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 col-xl-6">
                        <div class="card mb-3 widget-content bg-midnight-bloom">
                            <div class="widget-content-wrapper text-white">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Creator</div>
                                    <div class="widget-subheading">{{$assetAction->user->name}}</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-white"><span><i class="fa fa-user fa-3x"></i></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-6">
                        <div class="card mb-3 widget-content bg-arielle-smile">
                            <div class="widget-content-wrapper text-white">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Status</div>
                                    <div class="widget-subheading">{{$assetAction->status->name}}</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-white"><span><i class="fa fa-ellipsis-v fa-3x"></i></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-6">
                        <div class="card mb-3 widget-content bg-grow-early">
                            <div class="widget-content-wrapper text-white">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Created</div>
                                    <div class="widget-subheading">{{$assetAction->created_at}}</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-white"><span><i class="fa fa-plus-square fa-3x"></i></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-6">
                        <div class="card mb-3 widget-content bg-premium-dark">
                            <div class="widget-content-wrapper text-white">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Last Updated</div>
                                    <div class="widget-subheading">{{$assetAction->updated_at}}</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-warning"><span><i class="fa fa-edit fa-3x"></i></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">

                    <div class="card-header">
                        <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                        Children Records
                    </div>

                        <div class="card-body">
                            {{-- <h5 class="card-title">Records</h5> --}}
                            <ul class="tabs-animated-shadow tabs-animated nav">
                                <li class="nav-item">
                                    <a role="tab" class="nav-link active" id="tab-c-0" data-toggle="tab" href="#payments">
                                        <span>Payments ({{$assetAction->payments->count()}})</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">

                                <div class="tab-pane active" id="payments" role="tabpanel">
                                    <div class="card-hover-shadow card-border mb-3 card">
                                        <div class="card-header">
                                            <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                            Payments
                                            <div class="btn-actions-pane-right">
                                                <a type="button" class="btn btn-success btn-lg" href="#" data-toggle="modal" data-target=".addPayment"><i class="fa fa-plus"></i> Payment</a>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="col-lg-12">
                                                <div class="main-card mb-3 card">
                                                    <div class="card-body"><h5 class="card-title">Table striped</h5>
                                                        <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                            <thead>
                                                                <tr>
                                                                    <th>Reference #</th>
                                                                    <th>Initial Balance</th>
                                                                    <th>Paid</th>
                                                                    <th>Current Balance</th>
                                                                    <th>Account</th>
                                                                    <th>Created</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($assetAction->payments as $payment)
                                                                    <tr>
                                                                        <td>{{$payment->reference}}</td>
                                                                        <td>{{$payment->initial_balance}}</td>
                                                                        <td>{{$payment->amount}}</td>
                                                                        <td>{{$payment->current_balance}}</td>
                                                                        <td>{{$payment->account->name}}</td>
                                                                        <td>{{$payment->created_at}}</td>
                                                                        <td>
                                                                            <p><span class="label {{$payment->status->label}}">{{$payment->status->name}}</span></p>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th>Reference #</th>
                                                                    <th>Initial Balance</th>
                                                                    <th>Paid</th>
                                                                    <th>Current Balance</th>
                                                                    <th>Account</th>
                                                                    <th>Created</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>


                        </div>

                    <div class="card-footer">Footer</div>
                </div>
            </div>
        </div>
        {{-- action types --}}

    </div>

@endsection

@include('admin.components.modals.add_payment')

@section('js')

    <script>
        $(document).ready(function() {
            // Set date
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1;
            var yyyy = today.getFullYear();
            if (dd < 10){
                dd = '0'+dd;
            }
            if (mm < 10){
                mm = '0'+mm;
            }
            var date = mm + '/' + dd + '/' + yyyy;

            // {!! json_encode($assetAction->date) !!};
            let date_set = {!! json_encode($assetAction->date) !!};
            let substrings = date_set.split('-');
            var set_date = substrings[1] + '/' + substrings[2] + '/' + substrings[0];

            if(document.getElementById("date")){
                document.getElementById("date").value = set_date;
            }

            // Set due date
            var due = new Date();
            due.setDate(due.getDate() + 14);
            var due_dd = due.getDate();
            var due_mm = due.getMonth()+1;
            var due_yyyy = due.getFullYear();
            if (dd < 10){
                due_dd = '0'+due_dd;
            }
            if (due_mm < 10){
                due_mm = '0'+due_mm;
            }
            var due_date = due_mm + '/' + due_dd + '/' + due_yyyy;
            if(document.getElementById("due_date")){
                document.getElementById("due_date").value = due_date;
            }


            let due_date_set = {!! json_encode($assetAction->due_date) !!};
            let start_repeat_substrings = due_date_set.split('-');
            var set_due_date = start_repeat_substrings[1] + '/' + start_repeat_substrings[2] + '/' + start_repeat_substrings[0];
            if(set_due_date){
                document.getElementById("due_date").value = set_due_date;
            }else{
                if(document.getElementById("due_date")){
                    document.getElementById("due_date").value = due_date;
                }
            }




        });

    </script>
@endsection
