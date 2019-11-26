<?php

namespace App\Http\Controllers\Admin;

use App\Traits\NavbarTrait;
use App\Traits\UserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    use UserTrait;
    use NavbarTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

}
