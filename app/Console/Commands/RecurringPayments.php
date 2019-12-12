<?php

namespace App\Console\Commands;

use App\Account;
use App\Expense;
use App\Traits\ReferenceNumberTrait;
use App\Transaction;
use Illuminate\Console\Command;

class RecurringPayments extends Command
{

    use ReferenceNumberTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recurring:payments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recurring payments like server costs';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // get all expenses that are recurring
        $recurringExpenses = Expense::where('is_recurring',True)->with('frequency','status')->get();
        foreach($recurringExpenses as $expense){

            $today = date('Y-m-d');
            // check if a new payment is in 5 days
            $startDate = $expense->start_repeat;
            $endDate = $expense->end_repeat;
            // return $startDate.'|'.$today.'|'.$endDate;
            if($today<$startDate and $today<$endDate){
                // check if we have 7 days to next payment
                $futureDate=date('Y-m-d', strtotime('+'.$expense->frequency->frequency.' '.$expense->frequency->type, strtotime($today)) );
                // return $futureDate;
                // get difference between today and future date
                $datetime1 = new DateTime($today);
                $datetime2 = new DateTime($futureDate);
                $difference = $datetime2->diff($datetime1);
                $days = $difference->format('%a');
                // return $today.'|'.$futureDate.'|'.$days;
                // check if future date is in 5 days
                if($days <= 7){
                    // check if already exists
                    $transaction = Transaction::where('expense_id',$expense->id)->where('date',$futureDate)->first();
                    

                    if($transaction){

                    
                    }else{
                        // User
                        $user = $this->getAdmin();
                        // get expense transaction
                        $initialTransaction = Transaction::where('expense_id',$expense->id)->orderBy('created_at','asc')->first();
                        if($initialTransaction){
                            
                            // new transaction
                            $size = 5;
                            $reference = $this->getRandomString($size);
                            $transaction = new Transaction();

                            $transaction->is_expense = True;
                            $transaction->is_transfer = False;
                            $transaction->expense_id = $expense->id;

                            $transaction->account_id = $initialTransaction->account_id;
                            $transaction->amount = $expense->total;
                            $transaction->reference = $reference;
                            $transaction->date = $futureDate;
                            $transaction->notes = '';

                            $transaction->user_id = $user->id;
                            $transaction->status_id = 'a40b5983-3c6b-4563-ab7c-20deefc1992b';
                            $transaction->save();
                        }

                    }

                }

            }

        }

    }
}
