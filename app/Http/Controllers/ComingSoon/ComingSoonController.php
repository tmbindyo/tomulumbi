<?php

namespace App\Http\Controllers\ComingSoon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComingSoonController extends Controller
{
    public function comingSoon() {
        return view('comingSoon.index');
    }
}
