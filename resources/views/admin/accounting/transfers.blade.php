@extends('admin.components.main')

@section('title','Transfers')

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
                            Transfers
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
                    <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addTransfer"><i class="fa fa-plus"></i> Transfer</button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">

                    <div class="card-header">
                        <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                        Transfers ({{$transfers->count()}})
                        <div class="btn-actions-pane-right">
                            <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addTransfer"><i class="fa fa-plus"></i> Transfer</button>
                        </div>
                    </div>

                    <div class="card-body"><h5 class="card-title">Transfers</h5>
                        <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                            <thead>
                                <tr>
                                    <th>Reference</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Source Account</th>
                                    <th>Destination Account</th>
                                    <th>User</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transfers as $transfer)
                                    <tr>
                                        <td>
                                            {{$transfer->reference}}
                                            <span><i data-toggle="tooltip" data-placement="right" title="{{$transfer->notes}}." class="fa fa-facebook-messenger"></i></span>
                                        </td>
                                        <td>{{$transfer->amount}}</td>
                                        <td>{{$transfer->date}}</td>
                                        <td>

                                            <span class="label label-success"> {{$transfer->source_account->name}}</span>
                                            <span class="badge badge-success"> {{$transfer->source_initial_amount}} -> {{$transfer->source_subsequent_amount}}</span>
                                        </td>
                                        <td>

                                            <span class="label label-success"> {{$transfer->destination_account->name}}</span>
                                            <span class="badge badge-success"> {{$transfer->destination_initial_amount}} -> {{$transfer->destination_subsequent_amount}}</span>
                                        </td>
                                        <td>{{$transfer->user->name}}</td>
                                        <td>
                                            <span class="label {{$transfer->status->label}}">{{$transfer->status->name}}</span>
                                        </td>

                                        <td class="text-right">
                                            <div class="btn-group">
                                                <a href="{{ route('admin.transfer.show', $transfer->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                @if($transfer->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                    <a href="{{ route('admin.transfer.restore', $transfer->id) }}" class="mb-2 mr-2 btn btn-primary">Restore</a>
                                                @else
                                                    <a href="{{ route('admin.transfer.delete', $transfer->id) }}" class="mb-2 mr-2 btn btn-danger">Delete</a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Reference</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Source Account</th>
                                    <th>Destination Account</th>
                                    <th>User</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="card-footer">Footer</div>
                </div>
            </div>
        </div>
        {{-- action types --}}

    </div>

@endsection

@include('admin.components.modals.add_transfer')

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
            if(document.getElementById("date")){
                document.getElementById("date").value = date;
            }


        });

    </script>


@endsection
