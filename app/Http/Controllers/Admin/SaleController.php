<?php

namespace App\Http\Controllers\Admin;

use App\Account;
use Auth;
use App\ToDo;
use App\Order;
use App\Status;
use App\Contact;
use App\PromoCode;
use App\Traits\UserTrait;
use App\Traits\OrderTrait;
use App\Traits\NavbarTrait;
use App\PromoCodeAssignment;
use Illuminate\Http\Request;
use App\Traits\StatusCountTrait;
use App\Traits\ReferenceNumberTrait;
use App\Http\Controllers\Controller;
use App\OrderProduct;
use App\PriceList;
use App\Product;

class SaleController extends Controller
{

    use UserTrait;
    use OrderTrait;
    use NavbarTrait;
    use StatusCountTrait;
    use ReferenceNumberTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function orders()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the client proof status counts
        $ordersStatusCount = $this->ordersStatusCount();

        // Get albums
        $orders = Order::with('status','order_products','promo_code_uses','contact.organization')->withCount('order_products')->where('is_paid',False)->get();
        return view('admin.orders',compact('orders','user','navbarValues','ordersStatusCount'));
    }

    public function orderCreate()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // products
        $priceLists = PriceList::with('product.status','sub_type','size','status')->get();
        // contacts
        $contacts = Contact::with('organization')->get();

        return view('admin.order_create',compact('contacts','priceLists','user','navbarValues'));
    }

    public function orderStore(Request $request)
    {
        // Generate reference
        $size = 5;
        $reference = $this->getRandomString($size);

        $order = new Order();
        $order->order_number = $reference;
        $order->cookie = $reference;
        $order->due_date = date('Y-m-d', strtotime($request->due_date));
        $order->expiry_date = date('Y-m-d', strtotime($request->due_date));

        $order->customer_notes = $request->customer_notes;

        $order->subtotal = $request->subtotal;
        $order->discount = $request->discount;
        $order->total = $request->grand_total;
        $order->refund = 0;
        $order->paid = 0;

        if($request->is_draft == "on"){
            $order->is_draft = True;
        }else{
            $order->is_draft = False;
        }

        $order->is_returned = False;
        $order->is_refunded = False;
        $order->is_delivery = False;
        $order->is_paid = False;
        $order->is_client = False;

        // get contact
        $contact = Contact::findOrFail($request->contact);
        $order->email = $contact->email;
        $order->contact_id = $request->contact;
        $order->status_id = "39c51a73-063f-48d6-b0ce-c86f2a0f7cdd";
        // $order->user_id = Auth::user()->id;
        $order->save();

        // Quote items
        foreach ($request->item_details as $item) {
            // get product
            $priceList = PriceList::findOrFail($item['item']);
            $orderProduct = new OrderProduct();
            $orderProduct->rate = $item['rate'];
            $orderProduct->quantity = $item['quantity'];
            $orderProduct->refund_amount = 0;
            $orderProduct->status_id = '39c51a73-063f-48d6-b0ce-c86f2a0f7cdd';
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $priceList->product_id;
            $orderProduct->price_list_id = $item['item'];
            $orderProduct->is_returned = False;
            $orderProduct->is_refunded = False;
            $orderProduct->is_paid = False;
            $orderProduct->save();
        }


        return redirect()->route('admin.order.show',$order->id)->withSuccess('Quote created!');

    }

    public function orderShow($order_id)
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the client proof status counts
        $ordersStatusCount = $this->ordersStatusCount();
        // get project aggregations
        $orderArray = $this->getOrder($order_id);
        $orderStatuses = Status::where('status_type_id','6649fd59-0fc2-44e5-b735-032d72ee3b60')->get();
        // order payment statuses
        // order payment statuses
        // Get orders
        // check if exists
        $orderExists = Order::findOrFail($order_id);
        $order = Order::where('id',$order_id)->with('status','order_products.product','order_products.price_list.size','order_products.price_list.sub_type','order_products.price_list','promo_code_uses','contact','payments','expenses.expense_type')->where('is_paid',False)->first();
        // Pending to dos
        $pendingToDos = ToDo::with('user','status','order')->where('status_id','f3df38e3-c854-4a06-be26-43dff410a3bc')->where('order_id',$order->id)->get();
        // In progress to dos
        $inProgressToDos = ToDo::with('user','status','order')->where('status_id','2a2d7a53-0abd-4624-b7a1-a123bfe6e568')->where('order_id',$order->id)->get();
        // Completed to dos
        $completedToDos = ToDo::with('user','status','order')->where('status_id','facb3c47-1e2c-46e9-9709-ca479cc6e77f')->where('order_id',$order->id)->get();
        // Overdue to dos
        $overdueToDos = ToDo::with('user','status','order')->where('status_id','99372fdc-9ca0-4bca-b483-3a6c95a73782')->where('order_id',$order->id)->get();
//        return $order;
        return view('admin.order_show',compact('order','user','navbarValues','ordersStatusCount','orderArray','pendingToDos','inProgressToDos','completedToDos','overdueToDos','orderStatuses'));
    }

    public function orderPaymentCreate($order_id)
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get accounts
        $accounts = Account::all();
        // loans
        $order = Order::findOrFail($order_id);
        return view('admin.order_payment_create',compact('user','navbarValues','accounts','order'));
    }

    public function orderUpdateStatus(Request $request, $order_id)
    {
        $orderExists = Order::findOrFail($order_id);
        $order = Order::where('id',$order_id)->first();
        $order->status_id = $request->status;
        $order->save();

        return back()->withSuccess(__('Order status successfully updated.'));
    }


    // promo codes
    public function promoCodes()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();

        // Get albums
        $promoCodes = PromoCode::with('user','status')->withCount('promo_code_assignments','promo_code_uses')->get();

        return view('admin.promo_codes',compact('promoCodes','user','navbarValues'));
    }

    public function promoCodeCreate()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();

        return view('admin.promo_code_create',compact('user','navbarValues'));
    }

    public function promoCodeStore(Request $request)
    {
//        return $request;
        // User
        $user = $this->getAdmin();
        // Generate reference
        $size = 5;
        $reference = $this->getRandomString($size);

        // store
        $promoCode = new PromoCode();
        $promoCode->reference = $reference;
        $promoCode->limit = $request->limit;
        $promoCode->assigned = 0;
        $promoCode->used = 0;
        $promoCode->terms_and_conditions = $request->terms_and_conditions;
        $promoCode->expiry_date = date('Y-m-d', strtotime($request->expiry_date));
        $promoCode->discount = $request->discount;
        if($request->is_percentage == "on"){
            $promoCode->is_percentage = True;
        }else{
            $promoCode->is_percentage = False;
        }
        $promoCode->user_id = Auth::user()->id;
        $promoCode->status_id = 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e';
        $promoCode->save();

        return redirect()->route('admin.promo.code.show',$promoCode->id)->withSuccess('Promo code '.$promoCode->reference.' successfully created!');
    }

    public function promoCodeShow($promo_code_id)
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get promo code
        $promoCode = PromoCode::where('id',$promo_code_id)->with('status','user','promo_code_uses','promo_code_assignments')->withCount('promo_code_uses','promo_code_assignments')->first();
        return view('admin.promo_code_show',compact('promoCode','user','navbarValues'));
    }

    public function promoCodeAssign($promo_code_id)
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get promo code
        $promoCode = PromoCode::where('id',$promo_code_id)->with('status','user')->first();
        // get contacts
        $contacts = Contact::with('organization')->get();
        return view('admin.promo_code_assign',compact('promoCode','contacts','user','navbarValues'));
    }

    public function promoCodeAssignment(Request $request)
    {

        // Generate reference
        $size = 5;
        $reference = $this->getRandomString($size);
        // get promo code
        $promoCode = PromoCode::findOrFail($request->promo_code);
        $assigned = $promoCode->assigned;
        $limit = $promoCode->limit;
        $currentAssigned = doubleval($promoCode->assigned) + doubleval($assigned);
        $contact = Contact::findOrFail($request->contact);
        // check if limit has been reached
        if($currentAssigned > $limit){
            return redirect()->route('admin.promo.code.show',$promoCode->id)->withSuccess('Promo code '.$promoCode->reference.' unsuccessfully assigned as it has reached the limit.');
        }
        // get assign promo code
        $promoCodeAssignment = new PromoCodeAssignment();
        $promoCodeAssignment->reference = $reference;
        $promoCodeAssignment->assigned = $request->assigned;
        $promoCodeAssignment->promo_code_id = $request->promo_code;
        $promoCodeAssignment->contact_id = $request->contact;
        $promoCodeAssignment->expiry_date = date('Y-m-d', strtotime($request->expiry_date));
        $promoCodeAssignment->is_used = False;
        $promoCodeAssignment->user_id = Auth::user()->id;
        $promoCodeAssignment->status_id = 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e';
        $promoCodeAssignment->save();

        // update promo code assigned
        $promoCode->assigned = $currentAssigned;
        $promoCode->save();

        return redirect()->route('admin.promo.code.show',$promoCode->id)->withSuccess('Promo code '.$promoCode->reference.' successfully assigned to '.$contact->first_name.' '.$contact->last_name);
    }

    public function promoCodeUpdate(Request $request, $promo_code_id)
    {

        // get promo code
        $promoCode = PromoCode::findOrFail($promo_code_id);
        $promoCode->limit = $request->limit;
        $promoCode->terms_and_conditions = $request->terms_and_conditions;
        $promoCode->expiry_date = date('Y-m-d', strtotime($request->expiry_date));
        $promoCode->discount = $request->discount;
        if($request->is_percentage == "on"){
            $promoCode->is_percentage = True;
        }else{
            $promoCode->is_percentage = False;
        }
        $promoCode->user_id = Auth::user()->id;
        $promoCode->status_id = 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e';
        $promoCode->save();

        return redirect()->route('admin.promo.code.show',$promoCode->id)->withSuccess('Account '.$account->reference.' successfully updated!');
    }

    public function promoCodeDelete($promo_code_id)
    {
        $promoCode = PromoCode::findOrFail($promo_code_id);
        $promoCode->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $promoCode->user_id = Auth::user()->id;
        $promoCode->save();

        return back()->withSuccess(__('Promo code '.$promoCode->name.' successfully deleted.'));
    }

    public function promoCodeRestore($promo_code_id)
    {
        $promoCode = PromoCode::findOrFail($promo_code_id);
        $promoCode->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $promoCode->user_id = Auth::user()->id;
        $promoCode->save();

        return back()->withSuccess(__('Promo code '.$promoCode->name.' successfully restored.'));
    }

}
