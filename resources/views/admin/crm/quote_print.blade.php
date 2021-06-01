<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>tomulumbi | Quote Print</title>

    <link href="{{ asset('inspinia') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/animate.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/css/style.css" rel="stylesheet">

</head>

<body class="white-bg">
<div class="wrapper wrapper-content p-xl">
    <div class="ibox-content p-xl">
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
                    <abbr title="Phone">P:</abbr> + (254) 708 085 128
                    <br>
                    <abbr title="Email">E:</abbr> info@tomulumbi.com
                </address>
            </div>

            <div class="col-sm-6 text-right">
                <h4>Quote No.</h4>
                <h4 class="text-navy">QUO-{{$quote->reference}}</h4>
                @if($quote->contact)
                <span>To:</span>
                <address>
                    <strong>{{$quote->contact->first_name}} {{$quote->contact->last_name}}  @if($quote->contact->organization) [{{$quote->contact->organization->name}}] @endif </strong>
                    {{--  <br>
                    112 Street Avenu, 1080
                    <br>
                    Miami, CT 445611  --}}
                    <br>
                    <abbr title="Phone">P:</abbr> {{$quote->contact->phone_number}}
                    <br>
                    <abbr title="Email">E:</abbr> {{$quote->contact->email}}
                </address>
                @endif
                <p>
                    <span><strong>Quote Date:</strong> {{$quote->date}}</span><br/>
                    <span><strong>Due Date:</strong> {{$quote->due_date}}</span>
                </p>
            </div>
        </div>

        <div class="table-responsive m-t">
            <table class="table quote-table">
                <thead>
                <tr>
                    <th>Item List</th>
                    <th width="100em">Quantity</th>
                    <th width="100em">Unit Price</th>
                    <th width="100em">Total Price</th>
                </tr>
                </thead>
                <tbody>
                @foreach($quote->quote_items as $quoteItem)
                    <tr>
                        <td>
                            <div>
                                <strong>
                                    {{$quoteItem->product}}
                                </strong>
                            </div>
                        </td>
                        <td>{{$quoteItem->quantity}}</td>
                        <td>Ksh. {{$quoteItem->rate}}</td>
                        <td>Ksh. {{$quoteItem->amount}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div><!-- /table-responsive -->

        <table class="table invoice-total">
            <tbody>
            <tr>
                <td><strong>Sub Total :</strong></td>
                <td>{{$quote->subtotal}}</td>
            </tr>
            <tr>
                <td><strong>Adjustment :</strong></td>
                <td>{{$quote->discount}}</td>
            </tr>
            <tr>
                <td><strong>TOTAL :</strong></td>
                <td>{{$quote->total}}</td>
            </tr>
            </tbody>
        </table>

        <div class="well m-t"><strong>Notes</strong>
            {{$quote->customer_notes}}
        </div>
        <div class="well m-t"><strong>Terms and Conditions</strong>
            {{$quote->terms_and_conditions}}
        </div>

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
