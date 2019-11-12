<?php

namespace App\Http\Controllers\Landing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function storeCart()
    {
        //
        return view('landing.store.cart');
    }
    public function storeCheckout()
    {
        //
        return view('landing.store.checkout');
    }
    public function storeProductShow($product_id)
    {
        //
        return view('landing.store.product_show');
    }
    public function storeProducts()
    {
        //
        return view('landing.store.products');
    }
    public function store()
    {
        //
        return view('landing.store.store');
    }

}
