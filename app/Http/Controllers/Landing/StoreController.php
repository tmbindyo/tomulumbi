<?php

namespace App\Http\Controllers\Landing;

use App\Contact;
use App\Mail\OrderEmails;
use App\Order;
use App\OrderProduct;
use App\PriceList;
use App\Product;
use App\ProductGallery;
use App\ProductView;
use App\Traits\PaypalPaymentTrait;
use App\Traits\ReferenceNumberTrait;
use App\Traits\ViewTrait;
use App\Type;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Facades\PayPal;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\AdaptivePayments;


class StoreController extends Controller
{

    use ViewTrait;
    use ReferenceNumberTrait;


    public function store(Request $request)
    {

        // save that user visited

        $view_type = "382da08a-1149-4178-9e7a-92539705f436";
        $view_id = '';
        $view = $this->trackView($request,$view_type,$view_id);

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
        $view_type = "382da08a-1149-4178-9e7a-92539705f436";
        $view_id = '';
        $view = $this->trackView($request,$view_type,$view_id);

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

        $view_type = "382da08a-1149-4178-9e7a-92539705f436";
        $view_id = '';
        $view = $this->trackView($request,$view_type,$view_id);

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
        $productView->cookie = $this->getCookie($request);
        $productView->is_product = True;
        $productView->product_id = $product_id;
        $productView->number = $productExists->views;
        $productView->save();
        // save that user visited

        $view_type = "382da08a-1149-4178-9e7a-92539705f436";
        $view_id = $productView->id;
        $view = $this->trackView($request,$view_type,$view_id);

        // Get product
        $product = Product::where('id',$product_id)->with('lowest_price','cover_image','second_cover_image','product_galleries.upload','price_lists.sub_type','price_lists.size','type')->first();
        return view('landing.store.product_show',compact('product'));
    }

    public function cart(Request $request)
    {

        // save that user visited
        $view_type = "382da08a-1149-4178-9e7a-92539705f436";
        $view_id = '';
        $view = $this->trackView($request,$view_type,$view_id);
        // Get cookie
        $cookie = $this->getCookie($request);
        // Get user cart
        $cart = \Cart::session($cookie)->getContent();
        // get user total
        $total = \Cart::session($cookie)->getSubTotal();

        return view('landing.store.cart',compact('cart','total'));

    }

    public function checkout(Request $request)
    {

        // save that user visited
        $view_type = "382da08a-1149-4178-9e7a-92539705f436";
        $view_id = '';
        $view = $this->trackView($request,$view_type,$view_id);
        // get user cookie
        $cookie = $this->getCookie($request);
        // get cart
        $cart = \Cart::session($cookie)->getContent();

        // get user total
        $total = \Cart::session($cookie)->getSubTotal();
        return view('landing.store.checkout',compact('total'));

    }

    public function checkoutStore(Request $request)
    {

        // save that user visited
        $view_type = "382da08a-1149-4178-9e7a-92539705f436";
        $view_id = '';
        $view = $this->trackView($request,$view_type,$view_id);
        // get user cookie
        $cookie = $this->getCookie($request);
        // get cart
        $cart = \Cart::session($cookie)->getContent();
        // get user total
        $total = \Cart::session($cookie)->getSubTotal();
        // Generate reference
        $size = 5;
        $reference = $this->getRandomString($size);

        // check if contact exists
        $contact = Contact::where('email',$request->email)->first();
        if (!$contact){
            // create contact
            $contact = new Contact();
            $contact->first_name = $request->first_name;
            $contact->last_name = $request->last_name;
            $contact->email = $request->email;
            $contact->phone_number = $request->phone_number;
            $contact->user_id = 1;
            $contact->is_organization = False;
            $contact->is_lead = False;
            $contact->about = '';
            $contact->status_id = 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e';
            $contact->save();
        }

        // order
        $order = new Order();
        $order->cookie = $cookie;
        $order->email = $request->email;
        $order->order_number = $reference;
        $order->customer_notes = $request->comment;

        $order->total = $total;
        $order->subtotal = $total;
        $order->refund = $total;
        // discount is based on promo codes
        $order->discount = 0;

        $order->expiry_date = date('Y-m-d', strtotime(date('Y-m-d'). ' + 5 days'));
        $order->due_date = date('Y-m-d', strtotime(date('Y-m-d'). ' + 15 days'));

        $order->status_id = '39c51a73-063f-48d6-b0ce-c86f2a0f7cdd';
        $order->contact_id = $contact->id;

        if ($request->delivery_method == "pickup"){
            $order->is_delivery = False;
        }else{
            $order->is_delivery = True;
        }
        $order->is_returned = False;
        $order->is_refunded = False;
        $order->is_paid = False;
        $order->is_client = True;
        $order->is_draft = False;

        $order->save();


        foreach ($cart as $item){

            // order product
            $orderProduct = new OrderProduct();
            $orderProduct->rate = $item->price;
            $orderProduct->quantity = $item->quantity;
            $orderProduct->refund_amount = 0;
            $orderProduct->status_id = '39c51a73-063f-48d6-b0ce-c86f2a0f7cdd';
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $item->attributes->product['id'];
            $orderProduct->price_list_id = $item->name;
            $orderProduct->is_returned = False;
            $orderProduct->is_refunded = False;
            $orderProduct->is_paid = False;
            $orderProduct->save();
        }

        // clear cart
//        \Cart::session($cookie)->clear();

        $orderData = Order::where('id',$order->id)->with('order_products.product.cover_image','order_products.product.second_cover_image','order_products.price_list.size','order_products.price_list.sub_type')->first();
        // todo replace email with $order->email
        Mail::to('tmbindyo@fluidtechglobal.com')->send(new OrderEmails($orderData));


        // payment

        // https://github.com/srmklive/laravel-paypal
        // To use express checkout.
        $provider = new ExpressCheckout();
        // To use express checkout(used by default).
        $provider = PayPal::setProvider('express_checkout');
        // Additional PayPal API Parameters
        $options = [
            'BRANDNAME' => 'tomulumbi',
            'LOGOIMG' => 'https://example.com/mylogo.png',
            'CHANNELTYPE' => 'Merchant'
        ];

        $data['items'] = [];
        foreach ($orderData->order_products as $item){
            $data['items'][] = [
                'name' => $item->product->name,
                'price' => $item->price_list->price,
                'desc'  => $item->price_list->price,
                'qty' => $item->quantity
            ];
        }

        $data['invoice_id'] = $order->order_number;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url'] = url('/payment/success');
        $data['cancel_url'] = url('/cart');

        $data['total'] = $order->total;

        // Express Checkout
        $response = $provider->setExpressCheckout($data);
        // clear cart
        \Cart::session($cookie)->clear();
        // This will redirect user to PayPal
        return redirect($response['paypal_link']);

    }

    public function orderPayment(Request $request)
    {
        // save that user visited
        $orderData = Order::where('id',$order->id)->first();
        $orderData->is_paid = True;
        // todo replace email with $order->email
        // send successfulpayment email
        Mail::to('tmbindyo@fluidtechglobal.com')->send(new OrderEmails($orderData));

    }

    public function addToCart(Request $request)
    {

        // save that user visited
        $view_type = "382da08a-1149-4178-9e7a-92539705f436";
        $view_id = '';
        $view = $this->trackView($request,$view_type,$view_id);
        // get user cookie
        $cookie = $this->getCookie($request);
        // Get product
        $product = PriceList::findOrFail($request->price_list);
        $product = PriceList::where('id',$request->price_list)->with('product.cover_image','sub_type','size')->first();

        // todo check if product already exists
        $cart = \Cart::session($cookie)->getContent();

        if(!$cart->isEmpty()){
            // $cart is not empty
            foreach ($cart as $item){
                if ($item->name == $product->id){
                    $quantity = doubleval($item->quantity);
                    \Cart::session($cookie)->update($item->id, array(
                        'quantity' => +$request->quantity, // so if the current product has a quantity of 4, it will subtract 1 and will result to 3
                    ));
                }else{
                    // product doesn't exist
                    $options = $request->except('_token', 'productId', 'price', 'qty');
                    $options = array();

                    // add to cart
                    \Cart::session($cookie)->add(uniqid(), $product->id, $product->price, $request->quantity, $product);
                }
            }
        } else {
            // $cart is empty
            // product doesn't exist
            $options = $request->except('_token', 'productId', 'price', 'qty');
            $options = array();

            // add to cart
            \Cart::session($cookie)->add(uniqid(), $product->id, $product->price, $request->quantity, $product);
        }

        return back()->withSuccess(__('Item added to cart successfully.'));

    }

    public function subtractCartItemQuantity(Request $request, $item_id)
    {

        // save that user visited

        $view_type = "382da08a-1149-4178-9e7a-92539705f436";
        $view_id = '';
        $view = $this->trackView($request,$view_type,$view_id);
        // get user cookie
        $cookie = $this->getCookie($request);
        // get item
        $item = \Cart::session($cookie)->get($item_id);

        if ($item->quantity == 1){
            \Cart::session($cookie)->remove($item_id);
        }else{
            \Cart::session($cookie)->update($item_id, array(
                'quantity' => -1, // so if the current product has a quantity of 4, it will subtract 1 and will result to 3
            ));
            $item = \Cart::session($cookie)->get($item_id);
        }
        return $item;
        // if quantity is 0, remove item
    }

    public function addCartItemQuantity(Request $request, $item_id)
    {

        // save that user visited

        $view_type = "382da08a-1149-4178-9e7a-92539705f436";
        $view_id = '';
        $view = $this->trackView($request,$view_type,$view_id);
        // get user cookie
        $cookie = $this->getCookie($request);
        // get item
        $item = \Cart::session($cookie)->get($item_id);
        \Cart::session($cookie)->update($item_id, array(
            'quantity' => +1, // so if the current product has a quantity of 4, it will subtract 1 and will result to 3
        ));
        return $item;
        return "Item quantity successfully added.";
    }

    public function removeItem(Request $request, $id)
    {

        // save that user visited

        $view_type = "382da08a-1149-4178-9e7a-92539705f436";
        $view_id = '';
        $view = $this->trackView($request,$view_type,$view_id);
        // get user cookie
        $cookie = $this->getCookie($request);
        // get item
        \Cart::session($cookie)->remove($id);

        if (\Cart::session($cookie)->isEmpty()) {
            return redirect()->back()->with('message', 'Your shopping cart is empty, if problems persist please send us an email. Sorry for any inconveniences caused.');
        }
        return back()->withSuccess(__('Item removed from cart successfully.'));

    }

    public function clearCart(Request $request)
    {

        // save that user visited

        $view_type = "382da08a-1149-4178-9e7a-92539705f436";
        $view_id = '';
        $view = $this->trackView($request,$view_type,$view_id);
        // get user cookie
        $cookie = $this->getCookie($request);
        // clear cart
        \Cart::session($cookie)->clear();
        return back()->withSuccess(__('The cart has been cleared.'));

    }


}
