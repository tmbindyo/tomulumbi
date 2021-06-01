@extends('admin.components.main')

@section('title','Transactions')

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
                            Transactions
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
                    <a type="button" href="{{route('admin.expenses')}}" class="btn btn-success btn-lg" ><i class="fa fa-eye"></i> Expenses</a>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">

                    <div class="card-header">
                        <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                        Transactions ({{$transactions->count()}})
                    </div>

                    <div class="card-body"><h5 class="card-title">Transactions</h5>
                        <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Transaction #</th>
                                    <th>Date</th>
                                    <th>Created</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td>
                                            @if($transaction->is_transfer == 1)
                                                <p><span class="badge badge-success">Transfer</span> {{$transaction->source_account->name}} -> {{$transaction->destination_account->name}}</p>
                                            @else
                                                <p><span class="badge badge-success">Payment</span></p>
                                            @endif
                                        </td>

                                        <td>{{$transaction->reference}}</td>
                                        <td>{{$transaction->date}}</td>
                                        <td>{{$transaction->created_at}}</td>
                                        <td>{{$transaction->amount}}</td>
                                        <td>
                                            <p><span class="label {{$transaction->status->label}}">{{$transaction->status->name}}</span></p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Type</th>
                                    <th>Transaction #</th>
                                    <th>Date</th>
                                    <th>Created</th>
                                    <th>Amount</th>
                                    <th>Status</th>
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
