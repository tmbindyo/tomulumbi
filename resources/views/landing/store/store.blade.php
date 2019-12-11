@extends('landing.store.layouts.app')

@section('title', 'Products')

@section('content')

    <!-- Product Catagories Area Start -->
    <div class="products-catagories-area clearfix">
        <div class="amado-pro-catagory clearfix">
            @foreach($products as $product)
                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="{{route('store.product.show',$product->id)}}">
                        <img src="{{ asset('') }}{{ $product->cover_image->pixels750 }}" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From $ {{$product->lowest_price->first()->price}}</p>
                            <h4>{{$product->name}}</h4>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Product Catagories Area End -->
@endsection
