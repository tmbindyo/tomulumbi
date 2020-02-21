<?php

namespace App\Http\Controllers\Landing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LetterController extends Controller
{

    public function letters()
    {
        return view('landing.letters.letters');
    }

    public function letterShow($letter_id)
    {
        return view('landing.letters.letter_show');
    }

}
