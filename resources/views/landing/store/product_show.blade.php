@extends('landing.store.layouts.app')

@section('title', 'Product '.$product->name)

@section('content')

    <!-- Product Details Area Start -->
    <div class="single-product-area section-padding-100 clearfix">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mt-50">
                            <li class="breadcrumb-item"><a href="{{route('store')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('store.type.products',$product->type_id)}}">{{$product->type->name}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-7">
                    <div class="single_product_thumb">
                        <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url({{ asset('') }}{{ $product->cover_image->pixels500 }});">
                                </li>
                                <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url({{ asset('') }}{{ $product->second_cover_image->pixels500 }});">
                                </li>
                                @foreach($product->product_galleries->take(2) as $image)
                                    <li data-target="#product_details_slider" data-slide-to="{{$loop->iteration+1}}" style="background-image: url({{ asset('') }}{{ $image->upload->pixels500 }});">
                                    </li>
                                @endforeach


                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <a class="gallery_img" href="{{ asset('') }}{{ $product->cover_image->pixels750 }}">
                                        <img class="d-block w-100" src="{{ asset('') }}{{ $product->cover_image->pixels750 }}" alt="First slide">
                                    </a>
                                </div>
                                <div class="carousel-item">
                                    <a class="gallery_img" href="{{ asset('') }}{{ $product->second_cover_image->pixels750 }}">
                                        <img class="d-block w-100" src="{{ asset('') }}{{ $product->second_cover_image->pixels750 }}" alt="Second slide">
                                    </a>
                                </div>

                                @foreach($product->product_galleries->take(2) as $image)
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="{{ asset('') }}{{ $image->upload->pixels750 }}">
                                            <img class="d-block w-100" src="{{ asset('') }}{{ $image->upload->pixels750 }}" alt="Third slide">
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="single_product_desc">
                        <!-- Product Meta Data -->
                        <div class="product-meta-data">
                            <div class="line"></div>
                            <p class="product-price">$. {{$product->lowest_price->first()->price}}</p>
                            <a href="{{route('store.product.show',1)}}">
                                <h6>{{$product->name}}</h6>
                            </a>
                            <!-- Ratings & Review -->
                            <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                <div class="ratings">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <div class="review">
                                    <a href="#">Write A Review</a>
                                </div>
                            </div>
                            <!-- Avaiable -->
                            <p class="avaibility"><i class="fa fa-circle"></i> In Stock</p>
                        </div>

                        <div class="short_overview my-5">
                            <p>{{$product->description}}</p>
                        </div>

                        <!-- Add to Cart Form -->
                        <form class="cart clearfix" method="post" action="{{ route('add.cart') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <select name="price_list" class="w-100" id="country">
                                        @foreach($product->price_lists as $priceList)
                                            <option data-fid="" value="{{$priceList->id}}">{{$priceList->size->size}} {{$priceList->sub_type->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="cart-btn d-flex mb-50">
                                <p>Qty</p>
                                <div class="quantity">
                                    <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                    <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="1">
                                    <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                </div>
                            </div>

                            <button type="submit" name="addtocart" value="5" class="btn amado-btn">Add to cart</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Details Area End -->
@endsection
