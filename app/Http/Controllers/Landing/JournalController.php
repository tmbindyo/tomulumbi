<?php

namespace App\Http\Controllers\Landing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JournalController extends Controller
{
    public function journals()
    {
        //

        return view('landing.journals.journals');
    }
    public function journalShow($journal_id)
    {
        return view('landing.journals.journal_show');
    }
    public function journalGalleryShow($journal_id)
    {

        return view('landing.journals.journal_gallery_show');

    }
}
