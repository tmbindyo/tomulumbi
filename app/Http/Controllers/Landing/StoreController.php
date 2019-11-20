<?php

namespace App\Http\Controllers\Landing;

use App\PriceList;
use App\Product;
use App\ProductGallery;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{

    public function store()
    {
        //
        return view('landing.store.store');
    }
    public function storeProducts()
    {
        // products
        $products = Product::where('status_id','e5d06435-7df5-45dd-a4e9-e57f538b8366')->with('cover_image','second_cover_image','product_galleries','price_lists.sub_type','price_lists.size')->get();
//        return $products;
        return view('landing.store.products',compact('products'));
    }
    public function storeProductShow($product_id)
    {
        $product = Product::where('id',$product_id)->with('cover_image','second_cover_image','product_galleries.upload','price_lists.sub_type','price_lists.size','type')->first();
//        return $product;
        return view('landing.store.product_show',compact('product'));
    }
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
    public function addToCart(Request $request)
    {
        // Get product
        $product = PriceList::findOrFail($request->price_list);
        $options = $request->except('_token', 'productId', 'price', 'qty');

        // add to cart
        \Cart::add(uniqid(), $product->id, $product->price, $request->quantity, $options);

        return back()->withSuccess(__('Item added to cart successfully.'));
//        return redirect()->back()->with('message', 'Item added to cart successfully.');
    }

    public function removeItem($id)
    {
        \Cart::remove($id);

        if (\Cart::isEmpty()) {
            return redirect('/');
        }
        return redirect()->back()->with('message', 'Item removed from cart successfully.');
    }

    public function clearCart()
    {

        Cart::clear();
        return redirect()->back()->with('message', 'The cart has been cleared.');

    }
}
