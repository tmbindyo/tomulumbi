<?php

namespace App\Traits;

use App\Invoice;
use App\View;
use Auth;
use App\Loan;
use App\Institution;

trait ViewTrait
{

    public function trackView($cookie,$request,$view_type,$view_id)
    {

        $view = new View();
        $view->cookie = $cookie['tomulumbi_session'];
        $view->route = $request->fullUrl();
        $view->view_id = $view_id;
        $view->view_type_id = $view_type;
        $view->ip = request()->ip();
        $view->save();

        return $view->id;
    }

}
