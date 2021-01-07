<?php

namespace App\Http\Controllers\Landing;

use AWS;
use Storage;
use App\Email;
use Tests\TestCase;
use App\Mail\TestEmail;
use App\Mail\DailyToDos;
use App\Traits\ViewTrait;
use App\Mail\CustomerEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Aws\StorageGateway\StorageGatewayClient;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LandingController extends Controller
{

    use ViewTrait;

    public function welcome(Request $request)
    {

        // save that user visited
        $view_type = "81e702ff-08ee-49eb-9900-d2f9703a4bbf";
        $view_id = '';
        $view = $this->trackView($request,$view_type,$view_id);
        // return $view;
        return view('welcome');

    }

    public function wedding(Request $request)
    {

        // save that user visited
        $view_type = "81e702ff-08ee-49eb-9900-d2f9703a4bbf";
        $view_id = '';
        $view = $this->trackView($request,$view_type,$view_id);
        // return $view;
        return view('comingSoon.wedding');

    }

    public function EmailStore(Request $request)
    {

        $email = new Email();
        $email->name = $request->name;
        $email->subject = $request->subject;
        $email->email = $request->email;
        $email->message = $request->message;
        $email->status_id = "9c267c79-162e-4ae1-9340-57a4c5ca5e81";
        $email->save();

        $findEmail = Email::findOrFail($email->id);

        // send email notification
        Mail::to('info@tomulumbi.com')->send(new CustomerEmail($findEmail));

        // Send email to client saying they shall be contacted
        return back()->withSuccess(__('Thank you for reaching out, please wait for us to get back to you.'));

    }

    public function testEmail()
    {
        $data = ['message' => 'This is a test!'];
        Mail::to('info@tomulumbi.com')->send(new TestEmail($data));
    }

    public function javascriptNotEnabled()
    {
        return view('landing.javascript');
    }

    public function test()
    {
        Mail::to('info@tomulumbi.com')->send(new DailyToDos());
    }

    public function addFile()
    {
        $created = Storage::disk('minio')->put('new/test2.txt','Hello World 2!');
        $this->assertTrue($created);
    }

    public function getFile()
    {
        $readedFile = Storage::disk('minio')->url('new/DSC_0589.jpg');
        return $readedFile;
    }

    public function jsonFile()
    {
        $readedFile = Storage::cloud()->put('hello.json', '{"hello": "world"}');
        return $readedFile;
    }

    public function jsonFileGet()
    {
        $readedFile = Storage::cloud()->get('hello.json');
        return $readedFile;
    }

    public function jsonFileGetTemp()
    {
        $readedFile = Storage::cloud()->temporaryUrl("ClaireShelton/CoverImage/750/DSC_0589.jpg", \Carbon\Carbon::now()->addSecond(10));
        return $readedFile;
    }



}
