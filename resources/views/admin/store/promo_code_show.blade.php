@extends('admin.components.main')

@section('title', 'Promo Code '.$promoCode->reference)

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
                            Promo Codes
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
                        <h5 class="card-title">Promo Code</h5>
                        <form method="post" action="{{ route('admin.promo.code.update',$promoCode->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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

                            <div class="checkbox checkbox-info">
                                <label for="is_percentage">
                                    Percentage
                                 </label>
                                 <br>
                                <input id="is_percentage" name="is_percentage" type="checkbox"  data-on="Yes" data-off="No" {{ $errors->has('is_percentage') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal" @if($promoCode->is_percentage == 1) checked @endif>
                                <br>
                                <i>percentage</i>
                                <br>
                                <br>
                            </div>

                            <div class="position-relative form-group">
                                <label for="limit" class="">
                                    Limit
                                </label>
                                <input name="limit" id="limit" value="{{$promoCode->limit}}" type="number" class="mb-2 form-control" {{ $errors->has('limit') ? ' is-invalid' : '' }} required="required">
                                <i>limit</i>
                            </div>

                            <div class="position-relative form-group">
                                <label for="discount" class="">
                                    Discount
                                </label>
                                <input name="discount" id="discount" value="{{$promoCode->discount}}" type="number" class="mb-2 form-control" {{ $errors->has('discount') ? ' is-invalid' : '' }} required="required">
                                <i>discount</i>
                            </div>

                            <div class="position-relative form-group">
                                <label for="expiry_date" class="">
                                    Expiry Date
                                </label>
                                <input required name="expiry_date" id="expiry_date" type="text" class="form-control" data-toggle="datepicker"/>
                                <i>expiry date.</i>
                            </div>

                            <div class="position-relative form-group">
                                <label for="terms_and_conditions" class="">
                                    Terms and Conditions
                                </label>
                                <textarea id="terms_and_conditions" name="terms_and_conditions" class="mb-2 form-control {{ $errors->has('terms_and_conditions') ? ' is-invalid' : '' }}">{{$promoCode->terms_and_conditions}}</textarea>
                                <i>terms and conditions</i>
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
                                    <div class="widget-subheading">{{$promoCode->user->name}}</div>
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
                                    <div class="widget-subheading">{{$promoCode->status->name}}</div>
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
                                    <div class="widget-subheading">{{$promoCode->created_at}}</div>
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
                                    <div class="widget-subheading">{{$promoCode->updated_at}}</div>
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
                                    <a role="tab" class="nav-link active" id="tab-c-0" data-toggle="tab" href="#uses">
                                        <span>Uses ({{$promoCode->promo_code_uses->count()}})</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a role="tab" class="nav-link" id="tab-c-1" data-toggle="tab" href="#assignments">
                                        <span>Assignments ({{$promoCode->promo_code_assignments->count()}})</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">

                                <div class="tab-pane active" id="uses" role="tabpanel">
                                    <div class="card-hover-shadow card-border mb-3 card">
                                        <div class="card-header">
                                            <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                            Uses
                                            <div class="btn-actions-pane-right">
                                                {{-- <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addAssetAction"><i class="fa fa-plus"></i> Asset Action</button> --}}
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="col-lg-12">
                                                <div class="main-card mb-3 card">
                                                    <div class="card-body"><h5 class="card-title">Table striped</h5>
                                                        <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                            <thead>
                                                                <tr>
                                                                    <th>Reference</th>
                                                                    <th>User</th>
                                                                    <th>Status</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($promoCode->promo_code_uses as $promoCodeUse)
                                                                    <tr>
                                                                        <td>{{$promoCodeUse->reference}}</td>
                                                                        <td>{{$promoCodeUse->user->name}}</td>
                                                                        <td>
                                                                            <span class="label {{$promoCodeUse->status->label}}">{{$promoCodeeUs->status->name}}</span>
                                                                        </td>

                                                                        <td class="text-right">
                                                                            <div class="btn-group">
                                                                                <a href="{{ route('admin.order.show', $promoCodeUse->order_id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th>Reference</th>
                                                                    <th>User</th>
                                                                    <th>Status</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="tab-pane" id="assignments" role="tabpanel">
                                    <div class="card-hover-shadow card-border mb-3 card">
                                        <div class="card-header">
                                            <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                            Assignments
                                            <div class="btn-actions-pane-right">
                                                {{-- <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addKitAsset"><i class="fa fa-plus"></i> Kits</button> --}}

                                                {{-- <a href="{{route('admin.asset.assign.kit',$asset->id)}}" type="button" class="btn btn-success btn-lg" ><i class="fa fa-plus"></i> Kits</a> --}}
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="col-lg-12">
                                                <div class="main-card mb-3 card">
                                                    <div class="card-body"><h5 class="card-title">Table striped</h5>
                                                        <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                            <thead>
                                                                <tr>
                                                                    <th>Reference</th>
                                                                    <th>Contact</th>
                                                                    <th>Assigned</th>
                                                                    <th>Status</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($promoCode->promo_code_assignments as $promoCodeAssignment)
                                                                    <tr>
                                                                        <td>{{$promoCodeAssignment->reference}}</td>
                                                                        <td>{{$promoCodeAssignment->contact->first_name}} {{$promoCodeAssignment->contact->last_name}}</td>
                                                                        <td>{{$promoCodeAssignment->assigned}}</td>
                                                                        <td>
                                                                            <span class="label {{$promoCodeAssignment->status->label}}">{{$promoCodeAssignment->status->name}}</span>
                                                                        </td>

                                                                        <td class="text-right">
                                                                            <div class="btn-group">
                                                                                <a href="{{ route('admin.contact.show', $promoCodeAssignment->contact_id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th>Reference</th>
                                                                    <th>Contact</th>
                                                                    <th>Assigned</th>
                                                                    <th>Status</th>
                                                                    <th>Action</th>
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

{{-- @include('admin.components.modals.add_asset_action') --}}
{{-- @include('admin.components.modals.add_kit_asset') --}}

@section('js')

    <script>
        $(document).ready(function() {
            // Set date

            let date_set = {!! json_encode($promoCode->expiry_date) !!};
            let substrings = date_set.split('-');
            var set_date = substrings[1] + '/' + substrings[2] + '/' + substrings[0];

            if(document.getElementById("expiry_date")){
                document.getElementById("expiry_date").value = set_date;
            }



        });

    </script>


@endsection
