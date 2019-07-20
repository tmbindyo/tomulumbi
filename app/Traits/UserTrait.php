<?php 

namespace App\Traits;

use App\Invoice;
use Auth;
use App\Loan;
use App\Institution;

trait UserTrait
{

    public function getAdmin()
    {
        // Get user
        $user = Auth::user();
        return $user;
    }

}