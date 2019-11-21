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

        $cart = \Cart::getContent();

//        return $cart;
        $total = \Cart::getSubTotal();
        return view('landing.store.cart',compact('cart','total'));

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
        $product = PriceList::where('id',$request->price_list)->with('product.cover_image','sub_type','size')->first();

        // todo check if product already exists
        $cart = \Cart::getContent();

        if(!$cart->isEmpty()){
            // $cart is not empty
            foreach ($cart as $item){
                if ($item->name == $product->id){
                    $quantity = doubleval($item->quantity);
                    \Cart::update($item->id, array(
                        'quantity' => +1, // so if the current product has a quantity of 4, it will subtract 1 and will result to 3
                    ));
                }else{
                    // product doesn't exist
                    $options = $request->except('_token', 'productId', 'price', 'qty');
                    $options = array();

                    // add to cart
                    \Cart::add(uniqid(), $product->id, $product->price, $request->quantity, $product);
                }
            }
        } else {
            // $cart is empty
            // product doesn't exist
            $options = $request->except('_token', 'productId', 'price', 'qty');
            $options = array();

            // add to cart
            \Cart::add(uniqid(), $product->id, $product->price, $request->quantity, $product);
        }

        return back()->withSuccess(__('Item added to cart successfully.'));

    }

    public function subtractCartItemQuantity($item_id)
    {

        \Cart::update($item_id, array(
            'quantity' => -1, // so if the current product has a quantity of 4, it will subtract 1 and will result to 3
        ));

        return back()->withSuccess(__('Item quantity successfully updated.'));

    }
    public function addCartItemQuantity($item_id)
    {

        \Cart::update($item_id, array(
            'quantity' => +1, // so if the current product has a quantity of 4, it will subtract 1 and will result to 3
        ));

        return back()->withSuccess(__('Item quantity successfully updated.'));

    }

    public function removeItem($id)
    {

        \Cart::remove($id);

        if (\Cart::isEmpty()) {
            return redirect()->back()->with('message', 'Your shopping cart is empty, if problems persist please send us an email. Sorry for any inconveniences caused.');
        }
        return back()->withSuccess(__('Item removed from cart successfully.'));

    }

    public function clearCart()
    {

        \Cart::clear();
        return back()->withSuccess(__('The cart has been cleared.'));

    }
}
