<?php

namespace App\Http\Controllers\Admin;

use App\Expense;
use App\Account;
use App\Transaction;
use App\Traits\UserTrait;
use App\AccountAdjustment;
use App\Traits\NavbarTrait;
use Illuminate\Http\Request;
use App\Traits\StatusCountTrait;
use App\Traits\ReferenceNumberTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    use UserTrait;
    use NavbarTrait;
    use StatusCountTrait;
    use ReferenceNumberTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function accounts()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();

        // Get albums
        $accounts = Account::with('user','status')->get();

        return view('admin.accounts',compact('accounts','user','navbarValues'));
    }

    public function accountCreate()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();

        return view('admin.account_create',compact('user','navbarValues'));
    }

    public function accountStore(Request $request)
    {
//        return $request;
        // User
        $user = $this->getAdmin();
        // Generate reference
        $size = 5;
        $reference = $this->getRandomString($size);

        // select account type
        $account = new Account();
        $account->reference = $reference;
        $account->name = $request->name;
        $account->balance = $request->balance;
        $account->user_id = Auth::user()->id;
        $account->status_id = 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e';
        $account->save();

        return redirect()->route('admin.account.show',$account->id)->withSuccess('Expense '.$account->reference.' successfully created!');
    }

    public function accountShow($account_id)
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the design status counts
//        $journalsStatusCount = $this->accountsStatusCount();
        // get account
        $account = Account::where('id',$account_id)->with('status','user','account_adjustments','destination_account.source_account','transactions.account','transactions.expense','payments','source_account.destination_account')->first();

    //    return $account;

        return view('admin.account_show',compact('account','user','navbarValues'));
    }


    public function accountUpdate(Request $request, $account_id)
    {
        // User
        $user = $this->getAdmin();
        // select account type
        $accountExists = Account::findOrFail($account_id);
        $account = Account::where('id',$account_id)->first();
        $account->name = $request->name;
        $account->user_id = Auth::user()->id;
        $account->status_id = 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e';
        $account->save();

        return redirect()->route('admin.account.show',$account->id)->withSuccess('Account '.$account->reference.' successfully updated!');
    }

    public function accountDelete()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the design status counts
        $journalsStatusCount = $this->accountsStatusCount();
        // Get albums
        $accounts = Expense::with('user','status')->get();

        return view('admin.accounts',compact('accounts','user','navbarValues','journalsStatusCount'));
    }

    public function accountRestore()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the design status counts
        $journalsStatusCount = $this->accountsStatusCount();
        // Get albums
        $accounts = Expense::with('user','status')->get();

        return view('admin.accounts',compact('accounts','user','navbarValues','journalsStatusCount'));
    }

    public function accountAdjustmentCreate($account_id)
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get all accounts
        $accounts = Account::all();
        // get account
        $accountExists = Account::findOrFail($account_id);
        $account = Account::where('id',$account_id)->first();

        return view('admin.account_adjustment_create',compact('account','user','navbarValues','accounts'));

    }

    public function accountAdjustmentStore(Request $request)
    {

        // User
        $user = $this->getAdmin();
        // new transaction
        $size = 5;
        $reference = $this->getRandomString($size);

        // get account
        $account = Account::where('id',$request->account)->first();
        $accountAdjustment = new AccountAdjustment();

        $accountAdjustment->reference = $reference;
        $accountAdjustment->notes = $request->notes;
        $accountAdjustment->amount = $request->amount;
        $accountAdjustment->initial_account_amount = $account->balance;
        $accountAdjustment->subsequent_account_amount = doubleval($account->balance)-doubleval($request->amount);
        $accountAdjustment->date = date('Y-m-d', strtotime($request->date));

        $accountAdjustment->user_id = Auth::user()->id;
        $accountAdjustment->status_id = 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e';
        $accountAdjustment->account_id = $request->account;
        $accountAdjustment->save();

        // update account
        $account = Account::where('id',$request->account)->first();
        $account->balance = doubleval($account->balance)+doubleval($request->amount);
        $account->save();

        return redirect()->route('admin.account.show',$account->id)->withSuccess('Account Adjustment successfully created!');

    }

    public function accountAdjustmentEdit()
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the design status counts
        $journalsStatusCount = $this->expensesStatusCount();
        // get accounts
        $accounts = Account::all();
        // Get albums
        $transactions = Transaction::with('user','status','source_account','destination_account','account','expense')->get();
        return view('admin.account_adjustment_create',compact('transactions','user','navbarValues','journalsStatusCount','transactions','accounts'));

    }

    public function accountAdjustmentUpdate(Request $request)
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
                $account = Account::where('id',$request->destination_account)->first();
                $account->balance = doubleval($account->balance)+doubleval($request->amount);
                $account->save();

            }
        }
        // account subtraction

        return redirect()->route('admin.transaction.show')->withSuccess('Expense '.$transaction->reference.' successfully updated!');

    }

    public function accountAdjustmentDelete($account_adjustment_id)
    {
        // Check if exists
        $accountAdjustmentExists = AccountAdjustment::findOrFail($account_adjustment_id);
        // get adjustment account
        $accountAdjustment = AccountAdjustment::where('id',$account_adjustment_id)->first();
        $accountAdjustment->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $accountAdjustment->save();

        // reinburse
        $account = Account::where('id',$accountAdjustment->account_id)->first();
        $account->balance = doubleval($account->balance)-doubleval($accountAdjustment->amount);
        $account->save();
        return back()->withSuccess(__('Account adjustment '.$accountAdjustment->reference.' successfully deleted.'));
    }

    public function accountAdjustmentRestore($account_adjustment_id)
    {
        // Check if exists
        $accountAdjustmentExists = AccountAdjustment::findOrFail($account_adjustment_id);
        // get adjustment account
        $accountAdjustment = AccountAdjustment::where('id',$account_adjustment_id)->first();
        $accountAdjustment->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $accountAdjustment->save();

        // reinburse account
        $account = Account::where('id',$accountAdjustment->account_id)->first();
        $account->balance = doubleval($account->balance)+doubleval($accountAdjustment->amount);
        $account->save();

        return back()->withSuccess(__('Account adjustment '.$accountAdjustment->reference.' successfully restored.'));
    }

}
