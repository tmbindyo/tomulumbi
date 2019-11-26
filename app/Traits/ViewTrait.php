<?php

namespace App\Traits;

use App\Invoice;
use App\View;
use Auth;
use App\Loan;
use App\Institution;
use http\Client\Response;

trait ViewTrait
{

    use PasswordTrait;
    public function setCookie($request) {
        $value = $this->generateString();
        $cookie = cookie()->forever('name', $value);
        return $cookie;
    }

    public function getCookie($request) {
        return $request->cookie('tomulumbi_session');
    }

    public function trackView($cookie,$request,$view_type,$view_id)
    {

        // Save view
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
