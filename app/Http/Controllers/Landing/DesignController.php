<?php

namespace App\Http\Controllers\Landing;

use App\Album;
use App\Design;
use App\DesignView;
use App\DesignWork;
use App\DesignGallery;
use App\Traits\ViewTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Journal;

class DesignController extends Controller
{

    use ViewTrait;

    public function designs(Request $request)
    {
        // save that user visited
        $cookie = $request->cookie();
        $view_type = "3e5302a7-3ed6-4bfe-a7b4-1875228ade42";
        $view_id = '';
        $view = $this->trackView($request,$view_type,$view_id);

        // Get designs
        $designs = Design::where('status_id','be8843ac-07ab-4373-83d9-0a3e02cd4ff5')->with('cover_image','design_contacts.contact')->get();
        // return $designs;
        $designsCount = Design::where('status_id','be8843ac-07ab-4373-83d9-0a3e02cd4ff5')->count();

        return view('landing.design.designs',compact('designs'));
    }

    public function designShow(Request $request, $design_id)
    {

        if ($request->cookie()['tomulumbi_session']){
            $tomulumbi_session = $request->cookie()['tomulumbi_session'];
        }
        else{
            $tomulumbi_session = '';
        }

        // Get designs
        $design = Design::findOrFail($design_id);
        $design = Design::where('id',$design_id)->with('design_works.upload','design_contacts.contact','albums','journals')->first();
        $designAlbums = Album::where('status_id','be8843ac-07ab-4373-83d9-0a3e02cd4ff5')->where('design_id',$design->id)->get();
        $designJournals = Journal::where('status_id','be8843ac-07ab-4373-83d9-0a3e02cd4ff5')->where('design_id',$design->id)->get();
        // return $designAlbums;

        // design view
        $designExists = Design::findOrFail($design_id);
        $designExists->views++;
        $designExists->save();
        // create view record
        $designView = new DesignView();
        $designView->cookie = $tomulumbi_session;
        $designView->is_design = True;
        $designView->design_id = $design_id;
        $designView->number = $designExists->views;
        $designView->save();

        // save that user visited
        $cookie = $request->cookie();
        $view_type = "3e5302a7-3ed6-4bfe-a7b4-1875228ade42";
        $view_id = $designView->id;
        $view = $this->trackView($request,$view_type,$view_id);

        return view('landing.design.design_show',compact('design','designAlbums','designJournals'));
    }

    public function designWork(Request $request, $design_work_id)
    {

        if ($request->cookie()['tomulumbi_session']){
            $tomulumbi_session = $request->cookie()['tomulumbi_session'];
        }
        else{
            $tomulumbi_session = '';
        }

        // save that user visited
        $cookie = $request->cookie();
        $view_type = "3e5302a7-3ed6-4bfe-a7b4-1875228ade42";
        $view_id = '';
        $view = $this->trackView($request,$view_type,$view_id);

        $designWork = DesignWork::findOrFail($design_work_id);
        $designWork = DesignWork::where('id',$design_work_id)->with('design','upload')->first();

        // design view
        $designWorkExists = DesignWork::findOrFail($design_work_id);
        $designWorkExists->views++;
        $designWorkExists->save();

        // create view record
        $designView = new DesignView();
        $designView->is_design_work = True;
        $designView->cookie = $tomulumbi_session;
        $designView->design_work_id = $design_work_id;
        $designView->number = $designWorkExists->views;
        $designView->save();

        // Get designs
        return view('landing.design.design_work',compact('designWork'));
    }

    public function designGallery(Request $request, $design_id)
    {

        if ($request->cookie()['tomulumbi_session']){
            $tomulumbi_session = $request->cookie()['tomulumbi_session'];
        }
        else{
            $tomulumbi_session = '';
        }

        // save that user visited
        $cookie = $request->cookie();
        $view_type = "3e5302a7-3ed6-4bfe-a7b4-1875228ade42";
        $view_id = '';
        $view = $this->trackView($request,$view_type,$view_id);

        $design = Design::findOrFail($design_id);
        $design = Design::where('id',$design_id)->with('design_contacts')->first();

        $designGallery = DesignGallery::where('design_id',$design_id)->with('upload','design_work')->get();
        // design view
        $designExists = Design::findOrFail($design_id);
        $designExists->gallery_views++;
        $designExists->save();
        // create view record
        $designView = new DesignView();
        $designView->is_design_gallery = True;
        $designView->cookie = $tomulumbi_session;
        $designView->design_id = $design_id;
        $designView->number = $designExists->gallery_views;
        $designView->save();

        // design view
//        return $designGallery;
        // Get designs
        return view('landing.design.design_gallery',compact('designGallery','design'));
    }

}
