<?php

namespace App\Mail;

use App\ToDo;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DailyToDos extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // today
        $today = date('Y-m-d');
        // tomorrow
        $tomorrow = date('Y-m-d', strtotime($today . ' +1 day'));
        // get starting to dos
        $startingToDos = ToDo::where('start_date',$tomorrow)->where('is_completed',False)->with('status')->get();
        // get ongoing to dos
        $ongoingToDos = ToDo::where('start_date','>=',$tomorrow)->where('is_completed',False)->where('end_date','<=',$tomorrow)->where('is_end_date',True)->with('status')->get();
        // get ending to dos
        $endingToDos = ToDo::where('end_date',$tomorrow)->where('is_completed',False)->where('is_end_date',True)->with('status')->get();

        return $this->view('email_templates.daily_to_do')
        ->with(['tomorrow' => $tomorrow,'startingToDos' => $startingToDos,'ongoingToDos' => $ongoingToDos,'endingToDos' => $endingToDos]);


    }
}
