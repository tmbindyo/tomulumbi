<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Album;
use App\Order;
use App\Design;
use App\Status;
use App\Account;
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
        $expenses = Expense::with('user','status')->get();

        return view('admin.expenses',compact('expenses','user','navbarValues','journalsStatusCount'));
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
        // get transactions
        $transactions = Transaction::all();
        // get frequencies
        $frequencies = Frequency::all();

        return view('admin.expense_create',compact('orders','user','navbarValues','journalsStatusCount','clientProofs','personalAlbums','projects','designs','frequencies','expenseAccounts','transactions','expenseStatuses'));
    }

    public function expenseStore(Request $request)
    {
//        return $request;
        // User
        $user = $this->getAdmin();
        // Generate reference
        $size = 5;
        $reference = $this->getRandomString($size);
        // select expense type
        $expense = new Expense();
        $expense->reference = $reference;
        $expense->date = date('Y-m-d', strtotime($request->date));

        if ($request->is_order == "on")
        {
            $expense->is_order = True;
            $expense->order_id = $request->order;
        }
        if ($request->is_album == "on")
        {
            $expense->is_album = True;
            $expense->album_id = $request->album;
        }
        if ($request->is_project == "on")
        {
            $expense->is_project = True;
            $expense->project_id = $request->project;
        }
        if ($request->is_design == "on")
        {
            $expense->is_design = True;
            $expense->design_id = $request->design;
        }
        if ($request->is_transaction == "on")
        {
            $expense->is_transaction = True;
            $expense->transaction_id = $request->transaction;
        }
        if ($request->is_transfer == "on")
        {
            $expense->is_transfer = True;
            $expense->transfer_id = $request->transfer;
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
        $expense = Expense::where('id',$expense_id)->with('transfer','status','expense_items','transactions','design','expense_account','frequency','order','project','user','album')->withCount('expense_items')->first();
        $payments = Transaction::where('expense_id',$expense->id)->where('status_id','2fb4fa58-f73d-40e6-ab80-f0d904393bf2')->with('expense','account','status')->get();
        $pendingPayments = Transaction::where('expense_id',$expense->id)->where('status_id','a40b5983-3c6b-4563-ab7c-20deefc1992b')->with('expense','account','status')->get();
        return view('admin.expense_show',compact('expense','user','navbarValues','journalsStatusCount','payments','pendingPayments'));
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
        // get transactions
        $transactions = Transaction::all();
        // get frequencies
        $frequencies = Frequency::all();
        // get expense
        $expense = Expense::where('id',$expense_id)->with('transaction','status','expense_items','payments','account','design','expense_type','frequency','order','project','user','album')->withCount('expense_items')->first();

        return view('admin.expense_edit',compact('expense','user','navbarValues','journalsStatusCount','expenseAccounts','orders','expenseStatuses','personalAlbums','clientProofs','projects','designs','transactions','frequencies'));
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
        $expense->reference = $reference;
        $expense->expense_type_id = $request->expense_type;
        $expense->date = date('Y-m-d', strtotime($request->date));

        if ($request->is_order == "on")
        {
            $expense->is_order = True;
            $expense->order_id = $request->order;
        }
        if ($request->is_album == "on")
        {
            $expense->is_album = True;
            $expense->album_id = $request->album;
        }
        if ($request->is_project == "on")
        {
            $expense->is_project = True;
            $expense->project_id = $request->project;
        }
        if ($request->is_design == "on")
        {
            $expense->is_design = True;
            $expense->design_id = $request->design;
        }
        if ($request->is_transaction == "on")
        {
            $expense->is_transaction = True;
            $expense->transaction_id = $request->transaction;
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
        $transactions = Transaction::with('user','status','source_account','destination_account','account','expense')->get();
        return view('admin.transactions',compact('transactions','user','navbarValues','journalsStatusCount','transactions'));

    }

    public function transactionCreate($expense_id)
    {

        // check if expense_id is 1
        // get expense
        if ($expense_id == 1){
            $expense = [];
        }else{
            $expenseExists = Expense::findOrFail($expense_id);
            $expense = Expense::where('id',$expense_id)->first();
        }
        $withdrawal = [];
        $deposit = [];
        $account = [];

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the design status counts
        $journalsStatusCount = $this->expensesStatusCount();
        // get accounts
        $accounts = Account::all();
        // get expenses
        $expenses = Expense::all();

        // albums
//        $album
        // designs
        // projects
        // orders

        // transaction statuses
        $transactionStatuses = Status::where('status_type_id','8f56fc70-6cd8-496f-9aec-89e5748968db')->get();
        return view('admin.transaction_create',compact('expense','user','navbarValues','journalsStatusCount','accounts','expenses','transactionStatuses','account','deposit','withdrawal'));
    }

    public function accountWithdrawal($account_id)
    {

        // get account
        $accountExists = Account::findOrFail($account_id);
        $withdrawal = Account::where('id',$account_id)->first();
        $expense = [];
        $deposit = [];
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the design status counts
        $journalsStatusCount = $this->expensesStatusCount();
        // get accounts
        $accounts = Account::all();
        // get expenses
        $expenses = Expense::all();
        // transaction statuses
        $transactionStatuses = Status::where('status_type_id','8f56fc70-6cd8-496f-9aec-89e5748968db')->get();
        return view('admin.transaction_create',compact('expense','user','navbarValues','journalsStatusCount','accounts','expenses','transactionStatuses','withdrawal','deposit'));
    }

    public function accountDeposit($account_id)
    {

        // get account
        $accountExists = Account::findOrFail($account_id);
        $deposit = Account::where('id',$account_id)->first();
        $expense = [];
        $withdrawal = [];
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the design status counts
        $journalsStatusCount = $this->expensesStatusCount();
        // get accounts
        $accounts = Account::all();
        // get expenses
        $expenses = Expense::all();
        // transaction statuses
        $transactionStatuses = Status::where('status_type_id','8f56fc70-6cd8-496f-9aec-89e5748968db')->get();
        return view('admin.transaction_create',compact('expense','user','navbarValues','journalsStatusCount','accounts','expenses','transactionStatuses','withdrawal','deposit'));
    }

    public function transactionStore(Request $request)
    {

        // User
        $user = $this->getAdmin();
        // new transaction
        $size = 5;
        $reference = $this->getRandomString($size);
        $transaction = new Transaction();
        if ($request->is_expense == "on")
        {
            $transaction->is_expense = True;
            $transaction->is_transfer = False;
            $transaction->expense_id = $request->expense;

            // update account paid
            $expensePaid = Expense::where('id',$request->expense)->first();
            $expensePaid->paid = doubleval($expensePaid->paid)+doubleval($request->amount);
            $expensePaid->save();
        }
        $transaction->account_id = $request->account;
        $transaction->amount = $request->amount;
        $transaction->reference = $reference;
        $transaction->date = date('Y-m-d', strtotime($request->date));
        $transaction->notes = $request->notes;
        if ($request->is_transfer == "on")
        {
            $transaction->is_transfer = True;
            $transaction->is_expense = False;
            $transaction->source_account_id = $request->source_account;
            $transaction->destination_account_id = $request->destination_account;
        }
        $transaction->user_id = Auth::user()->id;
        $transaction->status_id = $request->status;
        $transaction->save();

        if ($request->status_id = '2fb4fa58-f73d-40e6-ab80-f0d904393bf2')
        {
            if ($request->is_expense == "on")
            {
                $account = Account::where('id',$request->account)->first();
                $account->balance = doubleval($account->balance)-doubleval($request->amount);
                $account->save();
            } elseif ($request->is_transfer == "on")
            {
                // credit source
                $account = Account::where('id',$request->source_account)->first();
                $account->balance = doubleval($account->balance)-doubleval($request->amount);
                $account->save();
                // debit destination
                $destinationAccount = Account::where('id',$request->destination_account)->first();
                $destinationAccount->balance = doubleval($destinationAccount->balance)+doubleval($request->amount);
                $destinationAccount->save();
            }
        }
        // account subtraction

        return back()->withSuccess('Expense '.$transaction->reference.' successfully updated!');

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
            if ($request->is_expense == "on")
            {
                $account = Account::where('id',$request->account)->first();
                $account->balance = doubleval($account->balance)-doubleval($request->amount);
                $account->save();
            } elseif ($request->is_transfer == "on")
            {
                // credit source
                $account = Account::where('id',$request->source_account)->first();
                $account->balance = doubleval($account->balance)-doubleval($request->amount);
                $account->save();
                // debit destination
                $account = Account::where('id',$request->destination_account)->first();
                $account->balance = doubleval($account->balance)+doubleval($request->amount);
                $account->save();
            }
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
        $transaction->notes = '';
        $transaction->user_id = $user->id;
        $transaction->is_billed = True;
        $transaction->status_id = '2fb4fa58-f73d-40e6-ab80-f0d904393bf2';
        $transaction->save();

        // update account paid
        $expensePaid = Expense::where('id',$transaction->expense_id)->first();
        $expensePaid->paid = doubleval($expensePaid->paid)+doubleval($transaction->amount);
        $expensePaid->save();

        // update account, subtract paid amount
        $account = Account::where('id',$transaction->account_id)->first();
        $account->balance = doubleval($account->balance) - doubleval($transaction->amount);
        $account->user_id = $user->id;
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
        $transaction->user_id = $user->id;
        $transaction->status_id = '2fb4fa58-f73d-40e6-ab80-f0d904393bf2';
        $transaction->is_billed = True;
        $transaction->save();

        // update account, credit previously paid amount
        $account = Account::where('id',$transaction->account_id)->first();
        $account->balance = doubleval($account->balance) + doubleval($transaction->amount);
        $account->user_id = $user->id;
        $account->save();

        return back()->withSuccess('Expense '.$transaction->reference.' successfully marked as billed!');

    }
    // test
    public function testRecurring(){

        $orderData = [
            'message'=>'Test'
        ];

        Mail::to('tmbindyo@fluidtechglobal.com')->send(new CancelledOrder($orderData));

    }
}
