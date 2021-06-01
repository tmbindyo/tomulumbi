@extends('admin.components.main')

@section('title', $expenseAccount->name.' Expense Account')

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
                            Expense Accounts
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
                </div>
            </div>
        </div>



        {{-- contact types --}}
        <div class="row">
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Expense Account</h5>
                        <form method="post" action="{{ route('admin.expense.account.update',$expenseAccount->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                <label for="name" class="">Name</label>
                                <input name="name" id="name" value="{{$expenseAccount->name}}" type="text" class="form-control">
                                <i>name</i>
                            </div>


                            <div class="position-relative form-group">
                                <label for="code" class="">Code</label>
                                <input name="code" id="code" value="{{$expenseAccount->code}}" type="text" class="form-control">
                                <i>code</i>
                            </div>

                            <div class="position-relative form-group">
                                <label for="code" class="">Description</label>
                                <textarea id="description" rows="5" name="description" class="form-control" required="required">{{$expenseAccount->description}}</textarea>
                                <i>description</i>
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
                                    <div class="widget-subheading">{{$expenseAccount->user->name}}</div>
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
                                    <div class="widget-subheading">{{$expenseAccount->status->name}}</div>
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
                                    <div class="widget-subheading">{{$expenseAccount->created_at}}</div>
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
                                    <div class="widget-subheading">{{$expenseAccount->updated_at}}</div>
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
                        Expsense ({{$expenseAccount->expenses->count()}})
                        <div class="btn-actions-pane-right">
                            <a href="{{route('admin.expense.create')}}" type="button" class="btn btn-primary btn-lg" ><i class="fa fa-plus"></i> Expense</a>
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
                                        <th>Total</th>
                                        <th>Paid</th>
                                        <th>Status</th>
                                        <th class="text-right" width="35px" data-sort-ignore="true">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($expenseAccount->expenses as $expense)
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
                                            <td>{{$expense->total}}</td>
                                            <td>{{$expense->paid}}</td>
                                            <td>
                                                <p><span class="label {{$expense->status->label}}">{{$expense->status->name}}</span></p>
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
