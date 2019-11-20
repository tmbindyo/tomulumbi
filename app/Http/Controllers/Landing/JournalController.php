<?php

namespace App\Http\Controllers\Landing;

use App\Journal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JournalController extends Controller
{
    public function journals()
    {
        $journals = Journal::where('status_id','be8843ac-07ab-4373-83d9-0a3e02cd4ff5')->with('cover_image')->get();
        return view('landing.journals.journals',compact('journals'));
    }

    public function journalShow($journal_id)
    {
        $journal = Journal::findOrFail($journal_id);
        $journal = Journal::where('id',$journal_id)->with('cover_image','journal_galleries.upload')->first();
        return view('landing.journals.journal_show',compact('journal'));
    }

    public function journalGalleryShow($journal_id)
    {

        return view('landing.journals.journal_gallery_show');

    }
}
