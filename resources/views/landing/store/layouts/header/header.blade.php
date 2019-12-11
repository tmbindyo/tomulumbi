<!-- Header Area Start -->
<header class="header-area clearfix">
    <!-- Close Icon -->
    <div class="nav-close">
        <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <!-- Logo -->
    <div class="logo">
        <a href="{{route('welcome')}}"><img src="{{ asset('themes/store/amado/') }}/img/core-img/logo.png" alt=""></a>
    </div>
    <!-- Amado Nav -->
    <nav class="amado-nav">
        <ul>
            <li class="{{ Route::currentRouteNamed( 'store' ) ?  'active' : '' }}"><a href="{{route('store')}}">Home</a></li>
            <li class="{{ Route::currentRouteNamed( 'store.products' ) ?  'active' : '' }}"><a href="{{route('store.products')}}">Products</a></li>
            <li class="{{ Route::currentRouteNamed( 'store.cart' ) ?  'active' : '' }}"><a href="{{route('store.cart')}}">Cart</a></li>
            <li class="{{ Route::currentRouteNamed( 'store.checkout' ) ?  'active' : '' }}"><a href="{{route('store.checkout')}}">Checkout</a></li>
        </ul>
    </nav>
    <!-- Button Group -->
    <div class="amado-btn-group mt-30 mb-100">
        <a href="#" class="btn amado-btn mb-15">%Discount%</a>
        <a href="#" class="btn amado-btn active">New this week</a>
    </div>
    <!-- Cart Menu -->
    <div class="cart-fav-search mb-100">
        <a href="{{route('store.cart')}}" class="cart-nav"><img src="{{ asset('themes/store/amado/') }}/img/core-img/cart.png" alt=""> Cart <span>(0)</span></a>
        <a href="#" class="fav-nav"><img src="{{ asset('themes/store/amado/') }}/img/core-img/favorites.png" alt=""> Favourite</a>
        <a href="#" class="search-nav"><img src="{{ asset('themes/store/amado/') }}/img/core-img/search.png" alt=""> Search</a>
    </div>
    <!-- Social Button -->
    <div class="social-info d-flex justify-content-between">
        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
    </div>
</header>
<!-- Header Area End -->