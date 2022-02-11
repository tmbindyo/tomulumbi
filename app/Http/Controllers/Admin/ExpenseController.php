<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Album;
use App\Order;
use App\Design;
use App\Status;
use App\Account;
use App\Asset;
use App\AssetAction;
use App\Campaign;
use App\Contact;
use App\Project;
use App\Expense;
use App\ExpenseAccount;
use App\Frequency;
use App\Transaction;
use App\ExpenseItem;
use App\ExpenseType;
use App\Traits\UserTrait;
use App\Traits\NavbarTrait;
use Illuminate\Http\Request;
use App\Mail\CancelledOrder;
use App\Traits\StatusCountTrait;
use App\Traits\ReferenceNumberTrait;
use App\Http\Controllers\Controller;
use App\Liability;
use App\Loan;
use App\Payment;
use App\Quote;
use App\Refund;
use App\Transfer;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ExpenseController extends Controller
{

    use UserTrait;
    use NavbarTrait;
    use StatusCountTrait;
    use ReferenceNumberTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function expenses()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the design status counts
        $journalsStatusCount = $this->expensesStatusCount();
        // Get albums
        $expenses = Expense::with('user','status','expense_account')->get();

        return view('admin.accounting.expenses',compact('expenses','user','navbarValues','journalsStatusCount'));
    }

    public function expenseCreate()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the design status counts
        $journalsStatusCount = $this->expensesStatusCount();
        // expense accounts
        $expenseAccounts = ExpenseAccount::all();
        // get orders
        $orders = Order::with('status')->get();
        // expense statuses
        $expenseStatuses = Status::where('status_type_id','7805a9f3-c7ca-4a09-b021-cc9b253e2810')->get();
        // get albums
        $personalAlbums = Album::where('album_type_id','6fdf4858-01ce-43ff-bbe6-827f09fa1cef')->with('album_type')->get();
        $clientProofs = Album::where('album_type_id','ca64a5e0-d39b-4f2c-a136-9c523d935ea4')->with('album_type')->get();
        // get projects
        $projects = Project::with('status')->get();
        // get design
        $designs = Design::with('status')->get();
        // get transfers
        $transfers = Transfer::all();
        // get campaign
        $campaigns = Campaign::all();
        // get asset
        $assets = Asset::all();
        // get liabilities
        $liabilities = Liability::all();
        // get frequencies
        $frequencies = Frequency::all();
        // get contacts
        $contacts = Contact::with('organization')->get();

        return view('admin.accounting.expense_create',compact('liabilities','assets','campaigns','orders','user','navbarValues','journalsStatusCount','clientProofs','personalAlbums','projects','designs','frequencies','expenseAccounts','transfers','expenseStatuses','contacts'));
    }

    public function expenseStore(Request $request)
    {

        // User
        $user = $this->getAdmin();
        // Generate reference
        $size = 5;
        $reference = $this->getRandomString($size);
        // select expense type
        $expense = new Expense();
        $expense->reference = $reference;
        $expense->date = date('Y-m-d', strtotime($request->date));
        $expense->end_date = date('Y-m-d', strtotime($request->end_date));

        if ($request->is_order == "on")
        {
            $expense->is_order = True;
            $expense->order_id = $request->order;
        }else{
            $expense->is_order = False;
        }
        if ($request->is_album == "on")
        {
            $expense->is_album = True;
            $expense->album_id = $request->album;
        }else{
            $expense->is_album = False;
        }
        if ($request->is_project == "on")
        {
            $expense->is_project = True;
            $expense->project_id = $request->project;
        }else{
            $expense->is_project = False;
        }
        if ($request->is_design == "on")
        {
            $expense->is_design = True;
            $expense->design_id = $request->design;
        }else{
            $expense->is_design = False;
        }
        if ($request->is_transfer == "on")
        {
            $expense->is_transfer = True;
            $expense->transfer_id = $request->transfer;
        }else{
            $expense->is_transfer = False;
        }
        if ($request->is_campaign == "on")
        {
            $expense->is_campaign = True;
            $expense->campaign_id = $request->campaign;
        }else{
            $expense->is_campaign = False;
        }
        if ($request->is_asset == "on")
        {
            $expense->is_asset = True;
            $expense->asset_id = $request->asset;
        }else{
            $expense->is_asset = False;
        }
        if ($request->is_liability == "on")
        {
            $expense->is_liability = True;
            $expense->liability_id = $request->liability;
        }else{
            $expense->is_liability = False;
        }
        if ($request->is_contact == "on")
        {
            $expense->is_contact = True;
            $expense->contact_id = $request->contact;
        }else{
            $expense->is_contact = False;
        }
        if ($request->is_recurring == "on")
        {
            $expense->is_recurring = True;
            $expense->frequency_id = $request->frequency;
            $expense->start_repeat = date('Y-m-d', strtotime($request->start_date));
            $expense->end_repeat = date('Y-m-d', strtotime($request->end_date));
        }else
        {
            $expense->is_recurring = False;
        }
        if ($request->is_draft == "on")
        {
            $expense->is_draft = True;
        }else
        {
            $expense->is_draft = False;
        }

        $expense->sub_total = $request->subtotal;
        $expense->adjustment = $request->adjustment;
        $expense->total = $request->grand_total;
        $expense->paid = 0;

        $expense->notes = $request->notes;

        $expense->expense_account_id = $request->expense_account;
        $expense->user_id = Auth::user()->id;
        $expense->status_id = $request->status;

        $expense->save();


        // item details
        foreach ($request->item_details as $item)
        {
            // item details
            $expenseItem = new ExpenseItem();
            $expenseItem->name = $item['item'];
            $expenseItem->quantity = $item['quantity'];
            $expenseItem->rate = $item['rate'];
            $expenseItem->amount = $item['amount'];
            $expenseItem->user_id = Auth::user()->id;
            $expenseItem->expense_id = $expense->id;
            $expenseItem->status_id = $request->status;
            $expenseItem->save();
        }

        return redirect()->route('admin.expense.show',$expense->id)->withSuccess('Expense '.$expense->reference.' successfully created!');
    }

    public function expenseShow($expense_id)
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the design status counts
        $journalsStatusCount = $this->expensesStatusCount();
        // get expense
        $expense = Expense::where('id',$expense_id)->with('transfer','status','expense_items','transactions','design','expense_account','frequency','order','project','user','album','contact.organization')->withCount('expense_items')->first();


        $payments = Transaction::where('expense_id',$expense->id)->where('status_id','2fb4fa58-f73d-40e6-ab80-f0d904393bf2')->with('expense','account','status')->get();
        $pendingPayments = Transaction::where('expense_id',$expense->id)->where('status_id','a40b5983-3c6b-4563-ab7c-20deefc1992b')->with('expense','account','status')->get();
        return view('admin.accounting.expense_show',compact('expense','user','navbarValues','journalsStatusCount','payments','pendingPayments'));
    }

    public function expensePrint($expense_id)
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the design status counts
        $journalsStatusCount = $this->expensesStatusCount();
        // get expense
        $expense = Expense::where('id',$expense_id)->with('transfer','status','expense_items','transactions','design','expense_account','frequency','order','project','user','album','contact.organization')->withCount('expense_items')->first();
        $payments = Transaction::where('expense_id',$expense->id)->where('status_id','2fb4fa58-f73d-40e6-ab80-f0d904393bf2')->with('expense','account','status')->get();
        $pendingPayments = Transaction::where('expense_id',$expense->id)->where('status_id','a40b5983-3c6b-4563-ab7c-20deefc1992b')->with('expense','account','status')->get();
        return view('admin.accounting.expense_print',compact('expense','user','navbarValues','journalsStatusCount','payments','pendingPayments'));
    }

    public function expenseEdit($expense_id)
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the design status counts
        $journalsStatusCount = $this->expensesStatusCount();
        // Get expense types
        $expenseAccounts = ExpenseAccount::all();
        // get orders
        $orders = Order::with('status')->get();
        // expense statuses
        $expenseStatuses = Status::where('status_type_id','7805a9f3-c7ca-4a09-b021-cc9b253e2810')->get();
        // get albums
        $personalAlbums = Album::where('album_type_id','6fdf4858-01ce-43ff-bbe6-827f09fa1cef')->with('album_type')->get();
        $clientProofs = Album::where('album_type_id','ca64a5e0-d39b-4f2c-a136-9c523d935ea4')->with('album_type')->get();
        // get projects
        $projects = Project::with('status')->get();
        // get design
        $designs = Design::with('status')->get();
        // get transfers
        $transfers = Transfer::all();
        // get campaign
        $campaigns = Campaign::all();
        // get asset
        $assets = Asset::all();
        // get liabilities
        $liabilities = Liability::all();
        // get frequencies
        $frequencies = Frequency::all();
        // get contacts
        $contacts = Contact::with('organization')->get();
        // get expense
        $expense = Expense::where('id',$expense_id)->with('liability','asset','campaign','transfer','status','expense_items','transactions','design','expense_account','frequency','order','project','user','album')->withCount('expense_items')->first();
        // return $expense;

        return view('admin.accounting.expense_edit',compact('liabilities','assets','campaigns','expense','user','navbarValues','journalsStatusCount','expenseAccounts','orders','expenseStatuses','personalAlbums','clientProofs','projects','designs','transfers','frequencies', 'contacts'));
    }

    public function expenseUpdate(Request $request, $expense_id)
    {
        // User
        $user = $this->getAdmin();
        // Generate reference
        $size = 5;
        $reference = $this->getRandomString($size);
        // select expense type
        $expenseExists = Expense::findOrFail($expense_id);
        $expense = Expense::where('id',$expense_id)->first();
        $expense->expense_account_id = $request->expense_account;
        $expense->date = date('Y-m-d', strtotime($request->date));
        if ($request->is_order == "on")
        {
            $expense->is_order = True;
            $expense->order_id = $request->order;
        }else{
            $expense->is_order = False;
            $expense->order_id = null;
        }
        if ($request->is_album == "on")
        {
            $expense->is_album = True;
            $expense->album_id = $request->album;
        }else{
            $expense->is_album = False;
            $expense->album_id = null;
        }
        if ($request->is_project == "on")
        {
            $expense->is_project = True;
            $expense->project_id = $request->project;
        }else{
            $expense->is_project = False;
            $expense->project_id = null;
        }
        if ($request->is_design == "on")
        {
            $expense->is_design = True;
            $expense->design_id = $request->design;
        }else{
            $expense->is_design = False;
            $expense->design_id = null;
        }
        if ($request->is_transfer == "on")
        {
            $expense->is_transfer = True;
            $expense->transfer_id = $request->transfer;
        }else{
            $expense->is_transfer = False;
            $expense->transfer_id = null;
        }
        if ($request->is_campaign == "on")
        {
            $expense->is_campaign = True;
            $expense->campaign_id = $request->campaign;
        }else{
            $expense->is_campaign = False;
            $expense->campaign_id = null;
        }
        if ($request->is_asset == "on")
        {
            $expense->is_asset = True;
            $expense->asset_id = $request->asset;
        }else{
            $expense->is_asset = False;
            $expense->asset_id = null;
        }
        if ($request->is_liability == "on")
        {
            $expense->is_liability = True;
            $expense->liability_id = $request->liability;
        }else{
            $expense->is_liability = False;
            $expense->liability_id = null;
        }
        if ($request->is_recurring == "on")
        {
            $expense->is_recurring = True;
            $expense->frequency_id = $request->frequency;
            $expense->start_repeat = date('Y-m-d', strtotime($request->start_date));
            $expense->end_repeat = date('Y-m-d', strtotime($request->end_date));
        }else
        {
            $expense->is_recurring = False;
            $expense->$expense->start_repeat = null;
            $expense->end_repeat = null;
            $expense->frequency_id = null;
        }
        if ($request->is_draft == "on")
        {
            $expense->is_draft = True;
        }else
        {
            $expense->is_draft = False;
        }

        $expense->sub_total = $request->subtotal;
        $expense->adjustment = $request->adjustment;
        $expense->total = $request->grand_total;

        $expense->notes = $request->notes;

        $expense->user_id = Auth::user()->id;
        $expense->status_id = $request->status;

        $expense->save();

        $expenseProducts =array();
        // item details
        foreach ($request->item_details as $item)
        {
            // check if exists
            $expenseItem = ExpenseItem::where('expense_id',$expense->id)->where('name',$item['item'])->first();
            if($expenseItem)
            {
                $expenseProducts[]['id'] = $expenseItem->id;
                $expenseItem->name = $item['item'];
                $expenseItem->quantity = $item['quantity'];
                $expenseItem->rate = $item['rate'];
                $expenseItem->amount = $item['amount'];
                $expenseItem->user_id = Auth::user()->id;
                $expenseItem->expense_id = $expense->id;
                $expenseItem->status_id = $request->status;
                $expenseItem->save();
            }
            else
            {
                // item details
                $expenseItem = new ExpenseItem();
                $expenseItem->name = $item['item'];
                $expenseItem->quantity = $item['quantity'];
                $expenseItem->rate = $item['rate'];
                $expenseItem->amount = $item['amount'];
                $expenseItem->user_id = Auth::user()->id;
                $expenseItem->expense_id = $expense->id;
                $expenseItem->status_id = $request->status;
                $expenseItem->save();
                $expenseProducts[]['id'] = $expenseItem->id;
            }

        }
        // Get the deleted expense items
        $expenseItemIds = ExpenseItem::where('expense_id',$expense->id)->whereNotIn('id',$expenseProducts)->select('id')->get()->toArray();

        // Delete removed expense items
        DB::table('expense_items')->whereIn('id', $expenseItemIds)->delete();

        return redirect()->route('admin.expense.show',$expense->id)->withSuccess('Expense '.$expense->reference.' successfully updated!');
    }

    public function expenseDelete()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the design status counts
        $journalsStatusCount = $this->expensesStatusCount();
        // Get albums
        $expenses = Expense::with('user','status')->get();

        return view('admin.expenses',compact('expenses','user','navbarValues','journalsStatusCount'));
    }

    public function expenseRestore()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the design status counts
        $journalsStatusCount = $this->expensesStatusCount();
        // Get albums
        $expenses = Expense::with('user','status')->get();

        return view('admin.expenses',compact('expenses','user','navbarValues','journalsStatusCount'));
    }


    public function transactions()
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the design status counts
        $journalsStatusCount = $this->expensesStatusCount();
        // Get albums
        $transactions = Transaction::with('user','status','account','expense')->get();
        return view('admin.accounting.transactions',compact('transactions','user','navbarValues','journalsStatusCount','transactions'));

    }

    public function transactionCreate($expense_id)
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the design status counts
        $journalsStatusCount = $this->expensesStatusCount();
        // get expenses
        $expense = Expense::findOrFail($expense_id);
        // accounts
        $accounts = Account::all();

        // transaction statuses
        $transactionStatuses = Status::where('status_type_id','8f56fc70-6cd8-496f-9aec-89e5748968db')->get();
        return view('admin.accounting.transaction_create',compact('accounts','expense','user','navbarValues','journalsStatusCount','transactionStatuses'));
    }

    public function transactionStore(Request $request)
    {
        // get expense
        $expense = Expense::findOrFail($request->expense);
        // User
        $user = $this->getAdmin();
        // new transaction
        $size = 5;
        $reference = $this->getRandomString($size);
        $transaction = new Transaction();
        $transaction->expense_id = $request->expense;
        $transaction->account_id = $request->account;
        $transaction->amount = $request->amount;

        $transaction->initial_amount = 0;
        $transaction->subsequent_amount = 0;

        $transaction->reference = $reference;
        $transaction->date = date('Y-m-d', strtotime($request->date));
        $transaction->notes = $request->notes;
        $transaction->user_id = Auth::user()->id;
        $transaction->status_id = $request->status;
        $transaction->save();

        // account subtraction
        if ($request->status_id = '2fb4fa58-f73d-40e6-ab80-f0d904393bf2'){

            // update expense paid
            $expensePaid = Expense::where('id',$request->expense)->first();
            $expensePaid->paid = doubleval($expensePaid->paid)+doubleval($request->amount);
            $expensePaid->save();

            // if liability
            if ($expense->is_liability == 1){
                $liability = Liability::findOrFail($expense->liability_id);
                $liability->paid = doubleval($liability->paid)+doubleval($request->amount);
                $liability->save();
            }
            // order
            if ($expense->is_order == 1){
                $order = Order::findOrFail($expense->order_id);
                $order->paid = doubleval($order->paid)+doubleval($request->amount);
                $order->save();
            }
            // campaign
            if ($expense->is_campaign == 1){
                $campaign = Campaign::findOrFail($expense->campaign_id);
                $campaign->actual_cost = doubleval($campaign->actual_cost)+doubleval($request->amount);
                $campaign->save();
            }
            $account = Account::where('id',$request->account)->first();

            // update transaction
            $transaction = Transaction::findOrFail($transaction->id);
            $transaction->initial_amount = $account->balance;
            $transaction->subsequent_amount = doubleval($account->balance)-doubleval($request->amount);
            $transaction->save();

            // update account balance
            $account->balance = doubleval($account->balance)-doubleval($request->amount);
            $account->save();
        }

        return redirect()->route('admin.expense.show',$transaction->expense_id)->withSuccess('Expense '.$transaction->reference.' successfully updated!');

    }

    public function transactionStatusChange(Request $request,$transaction_id)
    {

        // User
        $user = $this->getAdmin();
        // Check if transaction exists
        $transaction = Transaction::findOrFail($transaction_id);
        // get transaction
        $transaction = Transaction::where('id',$transaction_id)->first();
        $transaction->user_id = Auth::user()->id;
        $transaction->status_id = $request->status;
        $transaction->save();

        if ($request->status_id = '2fb4fa58-f73d-40e6-ab80-f0d904393bf2')
        {
            // update expense paid
            $expensePaid = Expense::where('id',$request->expense)->first();
            $expensePaid->paid = doubleval($expensePaid->paid)+doubleval($request->amount);
            $expensePaid->save();

            $account = Account::where('id',$request->account)->first();

            // update transaction
            $transaction = Transaction::findOrFail($transaction->id);
            $transaction->initial_amount = $account->balance;
            $transaction->subsequent_amount = doubleval($account->balance)-doubleval($request->amount);
            $transaction->save();

            // update account balance

            $account->balance = doubleval($account->balance)-doubleval($request->amount);
            $account->save();
        }
        // account subtraction

        return back()->withSuccess('Expense '.$transaction->reference.' status successfully updated!');
    }

    public function transactionPendingPayment(Request $request, $transaction_id)
    {

        // TODO figure out account
        // User
        $user = $this->getAdmin();
        // Check if transaction exists
        $transactionExists = Transaction::findOrFail($transaction_id);

        // get and update transaction
        $transaction = Transaction::where('id',$transaction_id)->first();
        $transaction->date = date('Y-m-d');
        $transaction->user_id = $user->id;
        $transaction->status_id = '2fb4fa58-f73d-40e6-ab80-f0d904393bf2';
        $transaction->save();

        // update expense paid
        $expensePaid = Expense::where('id',$transaction->expense_id)->first();
        $expensePaid->paid = doubleval($expensePaid->paid)+doubleval($request->amount);
        $expensePaid->save();

        $account = Account::where('id',$transaction->account_id)->first();

        // update transaction
        $transaction = Transaction::findOrFail($transaction_id);
        $transaction->initial_amount = $account->balance;
        $transaction->subsequent_amount = doubleval($account->balance)-doubleval($request->amount);
        $transaction->save();

        // update account balance
        $account->balance = doubleval($account->balance)-doubleval($request->amount);
        $account->save();

        return back()->withSuccess('Expense '.$transaction->reference.' successfully marked as billed!');

    }

    public function transactionBilled($transaction_id)
    {

        // User
        $user = $this->getAdmin();
        // Check if transaction exists
        $transactionExists = Transaction::findOrFail($transaction_id);

        // get and update transaction
        $transaction = Transaction::where('id',$transaction_id)->first();
        $transaction->billed = date('Y-m-d');
        $transaction->user_id = $user->id;
        $transaction->status_id = '2fb4fa58-f73d-40e6-ab80-f0d904393bf2';
        $transaction->is_billed = True;
        $transaction->save();

        // update account, credit previously paid amount
        $account = Account::where('id',$transaction->account_id)->first();
        $account->balance = doubleval($account->balance) + doubleval($transaction->amount);
        $account->user_id = $user->id;
        $account->save();

        // create record to track when billed

        return back()->withSuccess('Expense '.$transaction->reference.' successfully marked as billed!');

    }
    // test
    public function testRecurring(){

        $orderData = [
            'message'=>'Test'
        ];

        Mail::to('tmbindyo@fluidtechglobal.com')->send(new CancelledOrder($orderData));

    }


    // payments
    public function payments()
    {
        // User
        $user = $this->getAdmin();
        // get accounts
        $accounts = Account::all();
        // asset actions
        $assetActions = AssetAction::all();
        // loans
        $loans = Loan::all();
        // orders
        $orders = Order::where('is_client',False)->get();
        // quotes
        $quotes = Quote::all();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        $payments = Payment::with('user','status','account')->get();
        return view('admin.accounting.payments',compact('payments','user','navbarValues', 'accounts', 'assetActions', 'loans', 'orders', 'quotes'));
    }

    public function paymentCreate()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get accounts
        $accounts = Account::all();
        // asset actions
        $assetActions = AssetAction::all();
        // loans
        $loans = Loan::all();
        // orders
        $orders = Order::where('is_client',False)->get();
        // quotes
        $quotes = Quote::all();
        return view('admin.accounting.payment_create',compact('user','navbarValues','accounts','assetActions','loans','orders','quotes'));
    }

    public function paymentStore(Request $request)
    {

        // generate reference
        $size = 5;
        $reference = $this->getRandomString($size);

        // get account
        $account = Account::findOrFail($request->account);
        $accountBalance = doubleval($account->balance) + doubleval($request->amount);
        $payment = new Payment();
        $payment->reference = $reference;
        $payment->notes = $request->notes;
        $payment->date = date('Y-m-d', strtotime($request->date));
        $payment->initial_balance = $account->balance;
        $payment->amount = $request->amount;
        $payment->current_balance = $accountBalance;

        if($request->is_asset_action == "on"){
            $payment->is_asset_action = True;
            $payment->asset_action_id = $request->asset_action;
            // update asset action as amount
            $assetAction = AssetAction::findOrFail($request->asset_action);
            $paid = doubleval($request->amount) + doubleval($assetAction->paid);
            $assetAction->paid = $paid;
            $assetAction->save();
        }else{
            $payment->is_asset_action = False;
        }
        if($request->is_loan == "on"){
            $payment->is_loan = True;
            $payment->loan_id = $request->loan;
            // update loan as paid
            $loan = Loan::findOrFail($request->loan);
            $paid = doubleval($request->amount) + doubleval($loan->paid);
            $balance = doubleval($loan->balance) - doubleval($request->amount);
            $loan->paid = $paid;
            $loan->balance = $balance;
            $loan->save();
        }else{
            $payment->is_loan = False;
        }
        if($request->is_order == "on"){
            $payment->is_order = True;
            $payment->order_id = $request->order;
            // update order as paid
            $order = Order::findOrFail($request->order);
            $paid = doubleval($request->amount) + doubleval($order->paid);
            $order->paid = $paid;
            $order->save();
        }else{
            $payment->is_order = False;
        }
        if($request->is_quote == "on"){
            $payment->is_quote = True;
            $payment->quote_id = $request->quote;
            // update quote as paid
            $quote = Quote::findOrFail($request->quote);
            $paid = doubleval($request->amount) + doubleval($quote->paid);
            $quote->paid = $paid;
            $quote->save();
        }else{
            $payment->is_quote = False;
        }

        $payment->account_id = $request->account;
        $payment->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $payment->user_id = Auth::user()->id;
        $payment->save();

        // credit account
        $account->balance = $accountBalance;
        $account->save();

        return redirect()->route('admin.payment.show',$payment->id)->withSuccess('Payment created!');
    }

    public function paymentShow($payment_id)
    {
        // Check if contact type exists
        $paymentExists = Payment::findOrFail($payment_id);
        // User
        $user = $this->getAdmin();
        // get accounts
        $accounts = Account::all();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get payments
        $payments = Payment::with('user','status','account')->get();
        // Get payment
        $payment = Payment::with('user','status','refunds.account','asset_action','loan','order','quote')->where('id',$payment_id)->first();
        return view('admin.accounting.payment_show',compact('payment','user','navbarValues', 'accounts', 'payments', 'paymentExists'));
    }

    public function paymentDelete($payment_id)
    {

        $payment = Payment::findOrFail($payment_id);
        $payment->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $payment->user_id = Auth::user()->id;
        $payment->save();

        return back()->withSuccess(__('Payment '.$payment->name.' successfully deleted.'));
    }
    public function paymentRestore($payment_id)
    {

        $payment = Payment::findOrFail($payment_id);
        $payment->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $payment->user_id = Auth::user()->id;
        $payment->save();

        return back()->withSuccess(__('Payment '.$payment->name.' successfully restored.'));
    }



    // refunds
    public function refunds()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        $refunds = Refund::with('user','status','account')->get();
        return view('admin.accounting.refunds',compact('refunds','user','navbarValues'));
    }

    public function refundCreate($payment_id)
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get accounts
        $accounts = Account::all();
        // payment
        $payment = Payment::findOrFail($payment_id);
        return view('admin.accounting.refund_create',compact('user','navbarValues','accounts','payment'));
    }

    public function refundStore(Request $request)
    {

        // generate reference
        $size = 5;
        $reference = $this->getRandomString($size);

        // get account
        $account = Account::findOrFail($request->account);
        $accountBalance = doubleval($account->balance) - doubleval($request->amount);

        // store refund record
        $refund = new Refund();
        $refund->reference = $reference;
        $refund->notes = $request->notes;

        $refund->initial_amount = $account->balance;
        $refund->subsequent_amount = $accountBalance;
        $refund->amount = $request->amount;

        $refund->date = date('Y-m-d', strtotime($request->date));

        $refund->payment_id = $request->payment;
        $refund->account_id = $request->account;

        $refund->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $refund->user_id = Auth::user()->id;
        $refund->save();

        // update accounts balance
        $account->balance = $accountBalance;
        $account->save();

        return redirect()->route('admin.refund.show',$refund->id)->withSuccess('Refund created!');
    }

    public function refundShow($refund_id)
    {
        // Check if contact type exists
        $refundExists = Refund::findOrFail($refund_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get contact type
        $refund = Refund::with('user','status','account','payment')->where('id',$refund_id)->first();
        return view('admin.accounting.refund_show',compact('refund','user','navbarValues'));
    }

    public function refundUpdate(Request $request, $refund_id)
    {

        $refund = Refund::findOrFail($refund_id);

        return redirect()->route('admin.refund.show',$refund->id)->withSuccess('Refund updated!');
    }

    public function refundDelete($refund_id)
    {

        $refund = Refund::findOrFail($refund_id);
        $refund->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $refund->user_id = Auth::user()->id;
        $refund->save();

        return back()->withSuccess(__('Refund '.$refund->name.' successfully deleted.'));
    }

    public function refundRestore($refund_id)
    {

        $refund = Refund::findOrFail($refund_id);
        $refund->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $refund->user_id = Auth::user()->id;
        $refund->save();

        return back()->withSuccess(__('Refund '.$refund->name.' successfully restored.'));
    }

}
