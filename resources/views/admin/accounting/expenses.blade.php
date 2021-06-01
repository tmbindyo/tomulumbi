@extends('admin.components.main')

@section('title','Expenses')

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
                            Expenses
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
                    <a href="{{route('admin.expense.create')}}" type="button" class="btn btn-success btn-lg" ><i class="fa fa-plus"></i> Expense</a>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">

                    <div class="card-header">
                        <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                        Expenses ({{$expenses->count()}})
                        <div class="btn-actions-pane-right">
                            <a href="{{route('admin.expense.create')}}" type="button" class="btn btn-success btn-lg" ><i class="fa fa-plus"></i> Expense</a>
                        </div>
                    </div>

                    <div class="card-body"><h5 class="card-title">Expenses</h5>
                        <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                            <thead>
                                <tr>
                                    <th>Recurring</th>
                                    <th>Type</th>
                                    <th>Expense #</th>
                                    <th>Date</th>
                                    <th>Created</th>
                                    <th>Expense Account</th>
                                    <th>Total</th>
                                    <th>Paid</th>
                                    <th>Status</th>
                                    <th class="text-right" width="35px" data-sort-ignore="true">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($expenses as $expense)
                                    <tr>
                                        <td>
                                            @if($expense->is_recurring == 1)
                                                <p><span class="badge badge-success">True</span></p>
                                            @else
                                                <p><span class="badge badge-success">False</span></p>
                                            @endif
                                        </td>
                                        <td>
                                            @if($expense->is_order == 1)
                                                <p><a href="{{route('admin.order.show',$expense->order_id)}}" class="badge badge-success">Order</a></p>
                                            @elseif($expense->is_album == 1)
                                                <p>
                                                    <a
                                                    @if ($expense->album->album_type_id == '6fdf4858-01ce-43ff-bbe6-827f09fa1cef')
                                                        href="{{route('admin.personal.album.show',$expense->album->id)}}"
                                                    @elseif ($expense->album->album_type_id == 'ca64a5e0-d39b-4f2c-a136-9c523d935ea4')
                                                        href="{{route('admin.client.proof.show',$expense->album->id)}}"
                                                        @endif  class="badge badge-primary">Album {{$expense->album->name}}
                                                    </a>
                                                </p>
                                            @elseif($expense->is_project == 1)
                                                <p><a href="{{route('admin.project.show',$expense->project->id)}}" class="badge badge-primary">Project {{$expense->project->name}}</a></p>
                                            @elseif($expense->is_project == 1)
                                                <p><a href="{{route('admin.project.show',$expense->project_id)}}" class="badge badge-primary">Design {{$expense->design->name}}</a></p>
                                            @elseif($expense->is_liability == 1)
                                                <p><a href="{{route('admin.liability.show',$expense->liability_id)}}" class="badge badge-primary">Liability</a></p>
                                            @elseif($expense->is_transfer == 1)
                                                <p><a href="{{route('admin.transfer.show',$expense->transfer_id)}}" class="badge badge-primary">Transfer</a></p>
                                            @elseif($expense->is_campaign == 1)
                                                <p><a href="{{route('admin.campaign.show',$expense->campaign_id)}}" class="badge badge-primary">Campaign</a></p>
                                            @elseif($expense->is_asset == 1)
                                                <p><a href="{{route('admin.asset.show',$expense->asset_id)}}" class="badge badge-primary">Asset</a></p>
                                            @else
                                                <p><span class="badge badge-info">None</span></p>
                                            @endif
                                        </td>
                                        <td>{{$expense->reference}}</td>
                                        <td>{{$expense->date}}</td>
                                        <td>{{$expense->created_at}}</td>
                                        <td>{{$expense->expense_account->name}}</td>
                                        <td>{{$expense->total}}</td>
                                        <td>{{$expense->paid}}</td>

                                        <td>
                                            <span class="label {{$expense->status->label}}">{{$expense->status->name}}</span>
                                        </td>

                                        <td class="text-right">
                                            <div class="btn-group">
                                                <a href="{{ route('admin.expense.show', $expense->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Recurring</th>
                                    <th>Type</th>
                                    <th>Expense #</th>
                                    <th>Date</th>
                                    <th>Created</th>
                                    <th>Expense Account</th>
                                    <th>Total</th>
                                    <th>Paid</th>
                                    <th>Status</th>
                                    <th class="text-right" width="35px" data-sort-ignore="true">Action</th>
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
