@extends('landing.store.layouts.app')

@section('title', 'Checkout')

@section('content')

    <div class="cart-table-area section-padding-100">
        <div class="container-fluid">

            <form method="post" action="{{ route('store.checkout.store') }}">
            @csrf

            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-title">
                            <h2>Checkout</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control" id="first_name" name="first_name" value="" placeholder="First Name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required>
                            </div>
                            <div class="col-12 mb-3">
                                <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number" value="">
                            </div>
                            <div class="col-12 mb-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="">
                            </div>
                            <div class="col-12 mb-3">
                                <select name="delivery_method" class="w-100" id="country">
                                    <option disabled value="usa">Delivery Type</option>
                                    <option selected value="pickup">Pick Up</option>
                                    <option value="delivery">Delivery</option>
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <input type="text" class="form-control mb-3" id="street_address" name="street_address" placeholder="Address" value="">
                            </div>
                            <div class="col-12 mb-3">
                                <input type="text" class="form-control" id="town" name="town" placeholder="Town" value="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control" id="zipCode" name="zipCode" placeholder="Zip Code" value="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="number" class="form-control" id="phone_number" min="0" placeholder="Phone No" value="">
                            </div>
                            <div class="col-12 mb-3">
                                <textarea name="comment" class="form-control w-100" id="comment" name="comment" cols="30" rows="10" placeholder="Leave a comment about your order"></textarea>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="cart-summary">
                        <h5>Cart Total</h5>
                        <ul class="summary-table">
                            <li><span>subtotal:</span> <span>$ {{$total}}</span></li>
                            <li><span>delivery:</span> <span>Free (Pick Up)</span></li>
                            <li><span>total:</span> <span>$ {{$total}}</span></li>
                        </ul>

                        <div class="payment-method">
                            <!-- Cash on delivery -->
{{--                            <div class="custom-control custom-checkbox mr-sm-2">--}}
{{--                                <input type="checkbox" class="custom-control-input" id="cod" checked>--}}
{{--                                <label class="custom-control-label" for="cod">MPESA</label>--}}
{{--                            </div>--}}

                            <!-- Paypal -->
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="paypal">
                                <label class="custom-control-label" for="paypal">Paypal <img class="ml-15" src="{{ asset('themes/store/amado/') }}/img/core-img/paypal.png" alt=""></label>
                            </div>
                        </div>

                        <div class="cart-btn mt-100">
                            <button type="submit" class="btn amado-btn w-100">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>

            </form>

        </div>
    </div>

@endsection
