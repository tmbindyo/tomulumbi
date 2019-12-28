@extends('admin.layouts.app')

@section('title', ' Quote')

@section('css')

    <link href="{{ asset('inspinia') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/animate.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/css/style.css" rel="stylesheet">

@endsection

@section('content')

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-5">
                <h2>Quote</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{route('admin.dashboard')}}">Home</a>
                    </li>
                    <li>
                        <a href="#">CRM</a>
                    </li>
                    <li>
                        <a href="{{route('admin.quotes')}}">Quotes</a>
                    </li>
                    <li class="active">
                        <strong>Quote</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-7">
                <div class="title-action">
                    <a href="{{route('admin.quote.edit',$quote->id)}}" class="btn btn-warning btn-outline"><i class="fa fa-pencil"></i> Edit </a>
                    @if($quote->is_campaign == 1)
                        <a href="{{route('admin.campaign.show',$quote->campaign_id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Campaign </a>
                    @endif
                    @if($quote->is_draft == 1)
                        <a href="{{route('admin.quote.edit',$quote->id)}}" class="btn btn-success btn-outline"><i class="fa fa-pencil"></i> Accepted </a>
                        <a href="{{route('admin.quote.edit',$quote->id)}}" class="btn btn-warning btn-outline"><i class="fa fa-pencil"></i> Rejected </a>
                        <a href="{{route('admin.quote.edit',$quote->id)}}" class="btn btn-danger btn-outline"><i class="fa fa-pencil"></i> Cancelled </a>
                        <a href="{{route('admin.quote.send',$quote->id)}}" class="btn btn-info btn-outline"><i class="fa fa-mail-forward"></i> Send</a>
                        <a href="{{route('admin.quote.print',$quote->id)}}" target="_blank" class="btn btn-success btn-outline"><i class="fa fa-print"></i> Print </a>
                    @endif
                </div>
            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">



            <div class="row">
                <div class="col-md-9">

                    <div class="ibox">
                        <div class="ibox-title">
                            <span class="pull-right">(<strong>{{$quote->quote_items_count}}</strong>) items</span>
                            <h5>Items</h5>
                        </div>
                        @foreach($quote->quote_items as $product)
                            <div class="ibox-content">


                            <div class="table-responsive">
                                <table class="table shoping-cart-table">

                                    <tbody>
                                    <tr>
                                        <td width="90">
                                            <div class="cart-product-imitation">
                                            </div>
                                        </td>
                                        <td class="desc">
                                            <h3>
                                                <a href="#"> {{$product->product}} </a>

                                            </h3>
                                        </td>

                                        <td>
                                            <h4>
                                                {{$product->rate}}
                                            </h4>
                                        </td>
                                        <td width="65">
                                            <input type="text" class="form-control" value="{{$product->quantity}}" readonly>
                                        </td>
                                        <td>
                                            <h4>
                                                {{$product->amount}}
                                            </h4>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        @endforeach
                        <div class="ibox-content">


                        </div>
                    </div>

                </div>
                <div class="col-md-3">

                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Cart Summary</h5>
                        </div>
                        <div class="ibox-content">
                            <span>
                                Total
                            </span>
                            <h2 class="font-bold">
                                Ksh. {{$quote->total}}
                            </h2>

                            <hr/>
                            <span>
                                Tax
                            </span>
                            <h2 class="font-bold">
                                Ksh. {{$quote->tax}}
                            </h2>

                            <hr/>
                            <span>
                                Discount
                            </span>
                            <h2 class="font-bold">
                                Ksh. {{$quote->discount}}
                            </h2>

                            <hr/>
                            <span class="text-muted small">
                                @if($quote->contact->organization_id == 1)
                                    {{--  if organization  --}}
                                    <address>
                                        <strong>{{$quote->contact->company_name}}</strong><br>
                                        112 Street Avenu, 1080<br>
                                        Miami, CT 445611<br>
                                        <abbr title="Phone">P:</abbr> {{$quote->contact->phone_number}}<br>
                                        <abbr title="Email">E:</abbr> {{$quote->contact->email}}
                                    </address>
                                @else
                                    {{--  if not organization  --}}
                                    <address>
                                        <strong>{{$quote->contact->first_name}} {{$quote->contact->last_name}}</strong><br>
                                        112 Street Avenu, 1080<br>
                                        Miami, CT 445611<br>
                                        <abbr title="Phone">P:</abbr> {{$quote->contact->phone_number}}<br>
                                        <abbr title="Email">E:</abbr> {{$quote->contact->email}}
                                    </address>
                                @endif
                            </span>
                            <div class="m-t-sm">
                                <div class="btn-group">

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>




        </div>

@endsection
@section('js')

<!-- Mainly scripts -->
<script src="{{ asset('inspinia') }}/js/jquery-2.1.1.js"></script>
<script src="{{ asset('inspinia') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('inspinia') }}/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="{{ asset('inspinia') }}/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="{{ asset('inspinia') }}/js/inspinia.js"></script>
<script src="{{ asset('inspinia') }}/js/plugins/pace/pace.min.js"></script>

@endsection
