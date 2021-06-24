<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>tomulumbi | Order Print</title>

    <link href="{{ asset('inspinia') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/animate.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/css/style.css" rel="stylesheet">

    <style type="text/css" media="print">
        @page {
            size: A4;   /* auto is the initial value */
            margin: 5px;  /* this affects the margin in the printer settings */
        }
    </style>

</head>

<body class="tomulumbi-bg">
<div class="wrapper wrapper-content p-xl">
    <div class="tomulumbi-content">
        <img  width="80em" src="{{ asset('') }}tomulumbi/symbol/transparent/500px/1.png" alt="tomulumbi" title="tomulumbi"/>
    <div>
    <div class="tomulumbi-content">
        <div class="row">
            <div class="col-sm-6">
                <h5>From:</h5>
                <address>
                    <strong>tomulumbi.</strong>
                    <br>
                    General Accident House
                    <br>
                    Nairobi, Kenya 52824
                    <br>
                    <abbr>P:</abbr> + (254) 708 085 128
                    <br>
                    <abbr>E:</abbr> info@tomulumbi.com
                </address>
            </div>

            <div class="col-sm-6 text-right">
                <h4>Order # <span class="text-navy">ODR-{{$order->order_number}}</span></h4>
                @if($order->contact)
                <span>To:</span>
                <address>
                    <strong>{{$order->contact->first_name}} {{$order->contact->last_name}}  @if($order->contact->organization) [{{$order->contact->organization->name}}] @endif </strong>
                    {{--  <br>
                    112 Street Avenu, 1080
                    <br>
                    Miami, CT 445611  --}}
                    <br>
                    <abbr title="Phone">P:</abbr> {{$order->contact->phone_number}}
                    <br>
                    <abbr title="Email">E:</abbr> {{$order->contact->email}}
                </address>
                @endif
                <p>
                    <span><strong>Due Date:</strong> {{$order->due_date}}</span><br/>
                    <span><strong>Expiry Date:</strong> {{$order->expiry_date}}</span>
                </p>
            </div>
        </div>

        <div class="table-responsive m-t">
            <table class="table order-table">
                <thead>
                <tr>
                    <th>ITEM LIST</th>
                    <th width="80em">QUANTITY</th>
                    <th width="100em">UNIT PRICE</th>
                    <th width="100em">TOTAL PRICE</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($order->order_products as $product)
                    <tr>
                        <td>
                            <div>
                                <strong>
                                    {{$product->product->name}} [{{$product->price_list->size->size}} {{$product->price_list->sub_type->name}}]
                                </strong>
                            </div>
                        </td>
                        <td>{{$product->quantity}}</td>
                        <td>Ksh. {{$product->rate}}</td>
                        <td>Ksh. {{$product->amount}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div><!-- /table-responsive -->

        <table class="table invoice-total">
            <tbody>
            <tr>
                <td><strong>SUB TOTAL :</strong></td>
                <td>{{$order->subtotal}}</td>
            </tr>
            <tr>
                <td><strong>ADJUSTMENT :</strong></td>
                <td>{{$order->discount}}</td>
            </tr>
            <tr>
                <td><strong>TOTAL :</strong></td>
                <td>{{$order->total}}</td>
            </tr>
            </tbody>
        </table>

        <div class="well m-t"><strong>Notes:</strong>
            {!!$order->notes!!}
        </div>


        <div >
        {{-- <div class="tomulumbi-footer"> --}}
            <div class="text-center">
                <h2 style="color:#ffce00;"><strong> WWW.TOMULUMBI.COM</strong></h2>
            </div>
        </div>

        {{-- <div class="footer">
            <div class="">
                tomulumbi.com
            </div>
            <div>
                <strong>tomulumbi.com</strong>
            </div>
        </div> --}}

    </div>

</div>

<!-- Mainly scripts -->
<script src="{{ asset('inspinia') }}/js/jquery-2.1.1.js"></script>
<script src="{{ asset('inspinia') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('inspinia') }}/js/plugins/metisMenu/jquery.metisMenu.js"></script>

<!-- Custom and plugin javascript -->
<script src="{{ asset('inspinia') }}/js/inspinia.js"></script>

<script type="text/javascript">
    window.print();
</script>

</body>

</html>
