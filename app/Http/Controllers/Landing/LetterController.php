<?php

namespace App\Http\Controllers\Landing;

use App\Letter;
use App\LetterView;
use App\Traits\ViewTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LetterController extends Controller
{

    use ViewTrait;

    public function letters(Request $request)
    {

        // save that user visited
        $cookie = $request->cookie();
        $view_type = "7e7445ac-aa06-4138-bab8-c28a5d7be6b9";
        $view_id = '';
        $view = $this->trackView($request,$view_type,$view_id);

        $letters = Letter::where('status_id','be8843ac-07ab-4373-83d9-0a3e02cd4ff5')->with('cover_image')->get();

        return view('landing.letters.letters',compact('letters'));
    }


    public function letterShow(Request $request, $letter_id)
    {

        // Check if letter exists
        $letter = Letter::findOrFail($letter_id);
        // Get letter
        $letter = Letter::where('id',$letter_id)->with('cover_image', 'letterLetterTags.letterTag')->first();
//         return $letter;

        // letter view
        $letterExists = Letter::findOrFail($letter_id);
        $letterExists->views++;
        $letterExists->save();

        // create view record
        $letterView = new LetterView();
//        $letterView->is_letter = True;
        $letterView->cookie = $request->cookie()['tomulumbi_session'];
        $letterView->letter_id = $letter_id;
        $letterView->number = $letterExists->views;
        $letterView->save();

        // save that user visited
        $cookie = $request->cookie();
        $view_type = "7e7445ac-aa06-4138-bab8-c28a5d7be6b9";
        $view_id = $letterView->id;
        $view = $this->trackView($request,$view_type,$view_id);

        // next and previous
        $previous = Letter::where('created_at', '<', $letter->created_at)->first();
        $next = Letter::where('created_at', '>', $letter->created_at)->first();


        return view('landing.letters.letter_show', compact('letter', 'next', 'previous'));
    }

}
