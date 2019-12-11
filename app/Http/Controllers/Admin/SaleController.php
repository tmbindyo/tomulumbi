<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Status;
use App\ToDo;
use App\Traits\NavbarTrait;
use App\Traits\OrderTrait;
use App\Traits\StatusCountTrait;
use App\Traits\UserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SaleController extends Controller
{

    use UserTrait;
    use NavbarTrait;
    use StatusCountTrait;
    use OrderTrait;

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
        $orders = Order::with('user','status','order_product','account','promo_code_uses','client')->where('is_paid',False)->get();
        return view('admin.orders',compact('orders','user','navbarValues','ordersStatusCount'));
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
        $order = Order::where('id',$order_id)->with('user','status','order_product.product','order_product.price_list','account','promo_code_uses','client','payments','expenses.expense_type')->where('is_paid',False)->first();
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

    public function orderUpdateStatus(Request $request, $order_id)
    {
        $orderExists = Order::findOrFail($order_id);
        $order = Order::where('id',$order_id)->first();
        $order->status_id = $request->status;
        $order->save();

        return back()->withSuccess(__('Order status successfully updated.'));
    }

}
