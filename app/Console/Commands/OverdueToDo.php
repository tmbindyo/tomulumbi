<?php

namespace App\Console\Commands;

use App\ToDo;
use Illuminate\Console\Command;

class OverdueToDo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'overdue:todos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Marking overdue to dos status';

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
        // get doday
        $today = date('Y-m-d');

        // get overdue todos with different status
        // update overdue to do status
        \App\ToDo::where('start_date', '<', $today)
        ->whereNotIn('status_id',['99372fdc-9ca0-4bca-b483-3a6c95a73782','facb3c47-1e2c-46e9-9709-ca479cc6e77f'])
          ->update(['status_id' => '99372fdc-9ca0-4bca-b483-3a6c95a73782']);

        // $toDos = ToDo::where('start_date', '>', $today)->where('status_id', '!=','99372fdc-9ca0-4bca-b483-3a6c95a73782')->update('status_id','99372fdc-9ca0-4bca-b483-3a6c95a73782');

    }
}
