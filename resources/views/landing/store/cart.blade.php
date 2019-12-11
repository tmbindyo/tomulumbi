@extends('landing.store.layouts.app')

@section('title', 'Cart')

@section('content')

    <div class="cart-table-area section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="cart-title mt-50">
                        <h2>Shopping Cart</h2>
                    </div>

                    <div class="cart-table clearfix">
                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cart as $item)
                                <tr>
                                    <td class="cart_product_img">
                                        <a href="#"><img src="{{ asset('') }}{{($item->attributes->product['cover_image']['pixels500'])}}" alt="Product"></a>
                                    </td>
                                    <td class="cart_product_desc">
                                        <h5>{{$item->attributes->product['name']}}:{{$item->attributes->sub_type['name']}} {{$item->attributes->size['size']}}</h5>
                                    </td>
                                    <td class="price">
                                        <span>{{$item->price}}</span>
                                    </td>
                                    <td class="qty">
                                        <div class="qty-btn d-flex">
                                            <p>Qty</p>
                                            <div class="quantity">
                                                <span class="qty-minus subtractCartItemQuantity" data-fid="{{$item->id}}" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                                <input type="number" disabled class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="{{$item->quantity}}">
                                                <span class="qty-plus AddCartItemQuantity" data-fid="{{$item->id}}" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="cart-summary">
                        <h5>Cart Total</h5>
                        <ul class="summary-table">
                            <li><span>subtotal:</span> <span id="subtotal">$ {{$total}}</span></li>
                        </ul>
                        <div class="amado-btn-group mt-30 mb-100">
                            <a href="{{route('store.checkout')}}" class="btn amado-btn mb-15 w-100">Checkout</a>
                            <a href="{{route('clear.cart')}}" class="btn amado-btn active w-100">Clear Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <script>
        $('.subtractCartItemQuantity').on('click',function(){
            var id = $(this).data('fid')

            //send value by ajax to server
            var xhr = new XMLHttpRequest();
            xhr.open("GET", '{{url('subtract/cart/item/quantity')}}'+'/'+id);
            xhr.setRequestHeader('Content-Type', '');
            xhr.send();
            xhr.onload = function() {
                console.log(this.responseText);

                // if row is equals to 0, delete row
                alert("Item Quantity reduced.");
            }
        });

    </script>

    <script>
        $('.AddCartItemQuantity').on('click',function(){
            var id = $(this).data('fid')

            //send value by ajax to server
            var xhr = new XMLHttpRequest();
            xhr.open("GET", '{{url('add/cart/item/quantity')}}'+'/'+id, true);
            xhr.setRequestHeader('Content-Type', '');
            xhr.responseType = 'json';
            xhr.send();
            xhr.onload = function() {

                // parse json response to array
                var jsonResponse = xhr.response;

                // Get value of price updated item
                var price = jsonResponse.price;

                // Get current subtotal
                subtotal = document.getElementById("subtotal").innerText;
                // Get new subtotal
                var newsubtotal = Number(subtotal) + Number(price);

                // set new price to subtotal span
                document.getElementById("subtotal").textContent=newsubtotal;
                alert("Item quantity increased.");
            }
        });

    </script>

    <script>
        $('.subtractCartItemQuantity').on('click',function(){
            var id = $(this).data('fid')

            //send value by ajax to server
            var xhr = new XMLHttpRequest();
            xhr.open("GET", '{{url('subtract/cart/item/quantity')}}'+'/'+id, true);
            xhr.setRequestHeader('Content-Type', '');
            xhr.responseType = 'json';
            xhr.send();
            xhr.onload = function() {

                // parse json response to array
                var jsonResponse = xhr.response;

                // Get value of price updated item
                var price = jsonResponse.price;

                // Get current subtotal
                subtotal = document.getElementById("subtotal").innerText;
                // Get new subtotal
                var newsubtotal = Number(subtotal) - Number(price);

                // set new price to subtotal span
                document.getElementById("subtotal").textContent=newsubtotal;
                alert("Item quantity reduced.");
            }
        });

    </script>

@endsection
