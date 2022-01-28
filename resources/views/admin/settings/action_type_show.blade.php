@extends('admin.components.main')

@section('title', $actionType->name.' Action Type')

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
                            Action Types
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



        {{-- action types --}}
        <div class="row">
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Action Type</h5>
                        <form method="post" action="{{ route('admin.action.type.update',$actionType->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                <input name="name" id="name" value="{{$actionType->name}}" type="text" class="form-control">
                                <i>name</i>
                            </div>

                            <div class="position-relative form-group">
                                <label for="exampleText" class="">Description</label>
                                <textarea name="description" id="description" class="form-control">{{$actionType->description}}</textarea>
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
                                    <div class="widget-subheading">{{$actionType->user->name}}</div>
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
                                    <div class="widget-subheading">{{$actionType->status->name}}</div>
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
                                    <div class="widget-subheading">{{$actionType->created_at}}</div>
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
                                    <div class="widget-subheading">{{$actionType->updated_at}}</div>
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
                        Asset Actions ({{$actionTypeAssetActions->count()}})
                        <div class="btn-actions-pane-right">
                            <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addAssetAction"><i class="fa fa-plus"></i> Asset Action</button>
                        </div>
                    </div>

                        <div class="card-body"><h5 class="card-title">Asset Actions</h5>
                            <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>Reference</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Due Date</th>
                                        <th>Contact</th>
                                        <th>Item</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($actionTypeAssetActions as $assetAction)
                                        <tr>
                                            <td>{{$assetAction->reference}}</td>
                                            <td>{{$assetAction->amount}}</td>
                                            <td>{{$assetAction->date}}</td>
                                            <td>{{$assetAction->due_date}}</td>
                                            <td>{{$assetAction->contact->first_name}}</td>
                                            <td>{{$assetAction->user->name}}</td>

                                            <td>
                                                @if($assetAction->is_asset == 1)
                                                    <span class="label label-primary">{{$assetAction->asset->name}}</span>
                                                @elseif($assetAction->is_kit == 1)
                                                    <span class="label label-primary">{{$assetAction->kit->name}}</span>
                                                @endif
                                            </td>

                                            <td>
                                                <span class="label {{$assetAction->status->label}}">{{$assetAction->status->name}}</span>
                                            </td>

                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.asset.action.show', $assetAction->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
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
                                        <th>Due Date</th>
                                        <th>Contact</th>
                                        <th>Item</th>
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

@include('admin.components.modals.add_asset_action')

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
            if(document.getElementById("asset_action_date")){
                document.getElementById("asset_action_date").value = date;
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
        });

    </script>

@endsection
