<?php

namespace App\Http\Controllers\Landing;

use App\PriceList;
use App\Product;
use App\ProductGallery;
use App\ProductView;
use App\Traits\ViewTrait;
use App\Type;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{

    use ViewTrait;

    public function store(Request $request)
    {

        // save that user visited
        $cookie = $request->cookie();
        $view_type = "382da08a-1149-4178-9e7a-92539705f436";
        $view_id = '';
        $view = $this->trackView($cookie,$request,$view_type,$view_id);

        $productCount = Product::count();
        if ($productCount>9){
            $products = Product::where('status_id','e5d06435-7df5-45dd-a4e9-e57f538b8366')->with('lowest_price')->get()->random(9);
        }else{
            $products = Product::where('status_id','e5d06435-7df5-45dd-a4e9-e57f538b8366')->with('cover_image','lowest_price')->get();
        }
//        return $products;
        return view('landing.store.store',compact('products'));

    }

    public function products(Request $request)
    {

        // save that user visited
        $cookie = $request->cookie();
        $view_type = "382da08a-1149-4178-9e7a-92539705f436";
        $view_id = '';
        $view = $this->trackView($cookie,$request,$view_type,$view_id);

        // get types
        $types = Type::all();
        $productCount = Product::count();
        if ($productCount>24){
            $products = Product::where('status_id','e5d06435-7df5-45dd-a4e9-e57f538b8366')->with('cover_image','second_cover_image','product_galleries','price_lists.sub_type','price_lists.size','lowest_price')->get()->random(24);
        }else{
            $products = Product::where('status_id','e5d06435-7df5-45dd-a4e9-e57f538b8366')->with('cover_image','second_cover_image','product_galleries','price_lists.sub_type','price_lists.size','lowest_price')->get();
        }

//        return $products;

        return view('landing.store.products',compact('products','types'));
    }

    public function typeProducts(Request $request, $type_id)
    {

        // save that user visited
        $cookie = $request->cookie();
        $view_type = "382da08a-1149-4178-9e7a-92539705f436";
        $view_id = '';
        $view = $this->trackView($cookie,$request,$view_type,$view_id);

        $typeGet = Type::findOrFail($type_id);
        // get types
        $types = Type::all();
        // products
        $products = Product::where('status_id','e5d06435-7df5-45dd-a4e9-e57f538b8366')->where('type_id',$type_id)->with('cover_image','second_cover_image','product_galleries','price_lists.sub_type','price_lists.size')->paginate(2);
//        return $products;

        return view('landing.store.type_products',compact('products','types','typeGet'));
    }

    public function productShow(Request $request, $product_id)
    {
        // product view
        $productExists = Product::findOrFail($product_id);
        $productExists->views++;
        $productExists->save();
        // create view record
        $productView = new ProductView();
        $productView->cookie = $request->cookie();
        $productView->is_product = True;
        $productView->product_id = $product_id;
        $productView->number = $productExists->views;
        $productView->save();
        // save that user visited
        $cookie = $request->cookie();
        $view_type = "382da08a-1149-4178-9e7a-92539705f436";
        $view_id = $productView->id;
        $view = $this->trackView($cookie,$request,$view_type,$view_id);
        // Get product
        $product = Product::where('id',$product_id)->with('lowest_price','cover_image','second_cover_image','product_galleries.upload','price_lists.sub_type','price_lists.size','type')->first();
        return view('landing.store.product_show',compact('product'));
    }

    public function cart(Request $request)
    {

        // save that user visited
        $cookie = $request->cookie();
        $view_type = "382da08a-1149-4178-9e7a-92539705f436";
        $view_id = '';
        $view = $this->trackView($cookie,$request,$view_type,$view_id);

        $ip = request()->ip();

        $cart = \Cart::session($ip)->getContent();

//        return $cart;
        $total = \Cart::session($ip)->getSubTotal();
        return view('landing.store.cart',compact('cart','total'));

    }

    public function checkout(Request $request)
    {
        // save that user visited
        $cookie = $request->cookie();
        $view_type = "382da08a-1149-4178-9e7a-92539705f436";
        $view_id = '';
        $view = $this->trackView($cookie,$request,$view_type,$view_id);

        //
        return view('landing.store.checkout');
    }

    public function addToCart(Request $request)
    {

        // save that user visited
        $cookie = $request->cookie();
        $view_type = "382da08a-1149-4178-9e7a-92539705f436";
        $view_id = '';
        $view = $this->trackView($cookie,$request,$view_type,$view_id);

//        return $request->fullUrl();
//        return $request->userAgent();
        $value = $request->cookie();
        return $value;
//        $ip = request()->ip();

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
                    \Cart::session($value)->update($item->id, array(
                        'quantity' => +1, // so if the current product has a quantity of 4, it will subtract 1 and will result to 3
                    ));
                }else{
                    // product doesn't exist
                    $options = $value->except('_token', 'productId', 'price', 'qty');
                    $options = array();

                    // add to cart
                    \Cart::session($value)->add(uniqid(), $product->id, $product->price, $request->quantity, $product);
                }
            }
        } else {
            // $cart is empty
            // product doesn't exist
            $options = $request->except('_token', 'productId', 'price', 'qty');
            $options = array();

            // add to cart
            \Cart::session($value)->add(uniqid(), $product->id, $product->price, $request->quantity, $product);
        }

//        return \Cart::getContent();
        return back()->withSuccess(__('Item added to cart successfully.'));

    }

    public function subtractCartItemQuantity(Request $request, $item_id)
    {

        // save that user visited
        $cookie = $request->cookie();
        $view_type = "382da08a-1149-4178-9e7a-92539705f436";
        $view_id = '';
        $view = $this->trackView($cookie,$request,$view_type,$view_id);

        $item = \Cart::get($item_id);

        if ($item->quantity == 1){
            \Cart::remove($item_id);
        }else{
            \Cart::update($item_id, array(
                'quantity' => -1, // so if the current product has a quantity of 4, it will subtract 1 and will result to 3
            ));
            $item = \Cart::get($item_id);
        }

        return $item;
        // if quantity is 0, remove item


    }

    public function addCartItemQuantity(Request $request, $item_id)
    {

        // save that user visited
        $cookie = $request->cookie();
        $view_type = "382da08a-1149-4178-9e7a-92539705f436";
        $view_id = '';
        $view = $this->trackView($cookie,$request,$view_type,$view_id);

        $item = \Cart::get($item_id);

        \Cart::update($item_id, array(
            'quantity' => +1, // so if the current product has a quantity of 4, it will subtract 1 and will result to 3
        ));

        return $item;
        return "Item quantity successfully added.";

    }

    public function removeItem(Request $request, $id)
    {

        // save that user visited
        $cookie = $request->cookie();
        $view_type = "382da08a-1149-4178-9e7a-92539705f436";
        $view_id = '';
        $view = $this->trackView($cookie,$request,$view_type,$view_id);

        \Cart::remove($id);

        if (\Cart::isEmpty()) {
            return redirect()->back()->with('message', 'Your shopping cart is empty, if problems persist please send us an email. Sorry for any inconveniences caused.');
        }
        return back()->withSuccess(__('Item removed from cart successfully.'));

    }

    public function clearCart(Request $request)
    {

        // save that user visited
        $cookie = $request->cookie();
        $view_type = "382da08a-1149-4178-9e7a-92539705f436";
        $view_id = '';
        $view = $this->trackView($cookie,$request,$view_type,$view_id);

        \Cart::clear();
        return back()->withSuccess(__('The cart has been cleared.'));

    }

}
