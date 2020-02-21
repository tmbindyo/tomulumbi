<?php

namespace App\Http\Controllers\Landing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TudemeController extends Controller
{

    public function about()
    {
        return view('landing.tudeme.about');
    }

    public function blog()
    {
        return view('landing.tudeme.blog');
    }

    public function categories()
    {
        return view('landing.tudeme.categories');
    }

    public function contact()
    {
        return view('landing.tudeme.contact');
    }

    public function index()
    {
        return view('landing.tudeme.index');
    }

    public function recipe()
    {
        return view('landing.tudeme.recipe');
    }

}
