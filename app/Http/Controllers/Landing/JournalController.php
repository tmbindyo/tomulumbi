<?php

namespace App\Http\Controllers\Landing;

use App\Album;
use App\Journal;
use App\JournalView;
use App\Traits\ViewTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JournalController extends Controller
{

    use ViewTrait;

    public function journals(Request $request)
    {
        // save that user visited
        $cookie = $request->cookie();
        $view_type = "7e7445ac-aa06-4138-bab8-c28a5d7be6b9";
        $view_id = '';
        $view = $this->trackView($request,$view_type,$view_id);

        $journals = Journal::where('is_tudeme',False)->where('status_id','be8843ac-07ab-4373-83d9-0a3e02cd4ff5')->with('cover_image')->get();
        return view('landing.journals.journals',compact('journals'));
    }

    public function journalShow(Request $request, $journal_id)
    {

        if ($request->cookie()['tomulumbi_session']){
            $tomulumbi_session = $request->cookie()['tomulumbi_session'];
        }
        else{
            $tomulumbi_session = '';
        }

        // Check if journal exists
        $journal = Journal::findOrFail($journal_id);
        // Get journal
        $journal = Journal::where('is_tudeme',False)->where('id',$journal_id)->with('cover_image','journal_galleries.upload','project','album','design')->first();
        // return $journal;

        // journal view
        $journalExists = Journal::findOrFail($journal_id);
        $journalExists->views++;
        $journalExists->save();

        // create view record
        $journalView = new JournalView();
        $journalView->is_journal = True;
        $journalView->cookie = $tomulumbi_session;
        $journalView->journal_id = $journal_id;
        $journalView->number = $journalExists->views;
        $journalView->save();

        // save that user visited
        $cookie = $request->cookie();
        $view_type = "7e7445ac-aa06-4138-bab8-c28a5d7be6b9";
        $view_id = $journalView->id;
        $view = $this->trackView($request,$view_type,$view_id);

        return view('landing.journals.journal_show',compact('journal'));
    }

    public function journalGalleryShow(Request $request, $journal_id)
    {
        return view('landing.journals.journal_gallery_show');

    }

}
