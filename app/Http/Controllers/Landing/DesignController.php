<?php

namespace App\Http\Controllers\Landing;

use App\Design;
use App\DesignGallery;
use App\DesignView;
use App\DesignWork;
use App\Traits\ViewTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DesignController extends Controller
{

    use ViewTrait;

    public function designs(Request $request)
    {
        // save that user visited
        $cookie = $request->cookie();
        $view_type = "3e5302a7-3ed6-4bfe-a7b4-1875228ade42";
        $view_id = '';
        $view = $this->trackView($cookie,$request,$view_type,$view_id);

        // Get designs
        $designs = Design::where('status_id','be8843ac-07ab-4373-83d9-0a3e02cd4ff5')->with('cover_image')->get();
        $designsCount = Design::where('status_id','be8843ac-07ab-4373-83d9-0a3e02cd4ff5')->count();

//        return $designsCount;
        // First column
        if($designsCount > 1){
            // first column
            if($designsCount % 2 == 0){
                // Even
                $firstColumnCount = $designsCount/2;
                $secondColumnCount = $designsCount/2;
                // Select
                $firstColumn = DB::table('designs')
                    ->leftJoin('uploads', 'designs.cover_image_id', '=', 'uploads.id')
                    ->leftJoin('contacts', 'designs.contact_id', '=', 'contacts.id')
                    ->select('designs.*','designs.name as design_name', 'contacts.name as contact_name','uploads.*', 'contacts.*')
                    ->where('designs.status_id', 'be8843ac-07ab-4373-83d9-0a3e02cd4ff5')
                    ->orderBy('designs.created_at', 'desc')
                    ->limit($firstColumnCount)
                    ->get();

//                return $firstColumn;
                $secondColumn = DB::table('designs')
                    ->leftJoin('uploads', 'designs.cover_image_id', '=', 'uploads.id')
                    ->leftJoin('contacts', 'designs.contact_id', '=', 'contacts.id')
                    ->select('designs.*','designs.name as design_name', 'contacts.name as contact_name','uploads.*', 'contacts.*')
                    ->where('designs.status_id', 'be8843ac-07ab-4373-83d9-0a3e02cd4ff5')
                    ->orderBy('designs.created_at', 'asc')
                    ->limit($secondColumnCount)
                    ->get();
            }
            else{
                // Odd
                $evenDesigns = $designsCount-1;
                $evenValue = $evenDesigns/2;

                $firstColumnCount = $evenValue+1;
                $secondColumnCount = $evenDesigns/2;
                // Select
                $firstColumn = DB::table('designs')
                    ->leftJoin('uploads', 'designs.cover_image_id', '=', 'uploads.id')
                    ->leftJoin('contacts', 'designs.contact_id', '=', 'contacts.id')
                    ->select('designs.*','designs.name as design_name', 'contacts.name as contact_name','uploads.*', 'contacts.*')
                    ->where('designs.status_id', 'be8843ac-07ab-4373-83d9-0a3e02cd4ff5')
                    ->orderBy('designs.created_at', 'desc')
                    ->limit($firstColumnCount)
                    ->get();

//                return $firstColumn;
                $secondColumn = DB::table('designs')
                    ->leftJoin('uploads', 'designs.cover_image_id', '=', 'uploads.id')
                    ->leftJoin('contacts', 'designs.contact_id', '=', 'contacts.id')
                    ->select('designs.*','designs.name as design_name', 'contacts.name as contact_name','uploads.*', 'contacts.*')
                    ->where('designs.status_id', 'be8843ac-07ab-4373-83d9-0a3e02cd4ff5')
                    ->orderBy('designs.created_at', 'asc')
                    ->limit($secondColumnCount)
                    ->get();

            }
        } else{
            $firstColumn = DB::table('designs')
                ->leftJoin('uploads', 'designs.cover_image_id', '=', 'uploads.id')
                ->leftJoin('contacts', 'designs.contact_id', '=', 'contacts.id')
                ->select('designs.*','designs.name as design_name', 'contacts.name as contact_name','uploads.*', 'contacts.*')
                ->where('designs.status_id', 'be8843ac-07ab-4373-83d9-0a3e02cd4ff5')
                ->orderBy('designs.created_at', 'desc')
                ->get();
            $secondColumn = [];
        }

//        return $firstColumn;
        return view('landing.design.designs',compact('firstColumn','secondColumn'));
    }

    public function designShow(Request $request, $design_id)
    {

        // Get designs
        $design = Design::findOrFail($design_id);
        $design = Design::where('id',$design_id)->with('design_works.upload','contact')->first();

        // design view
        $designExists = Design::findOrFail($design_id);
        $designExists->views++;
        $designExists->save();
        // create view record
        $designView = new DesignView();
        $designView->cookie = $request->cookie();
        $designView->is_design = True;
        $designView->design_id = $design_id;
        $designView->number = $designExists->views;
        $designView->save();

        // save that user visited
        $cookie = $request->cookie();
        $view_type = "3e5302a7-3ed6-4bfe-a7b4-1875228ade42";
        $view_id = $designView->id;
        $view = $this->trackView($cookie,$request,$view_type,$view_id);

        return view('landing.design.design_show',compact('design'));
    }

    public function designWork(Request $request, $design_work_id)
    {
        // save that user visited
        $cookie = $request->cookie();
        $view_type = "3e5302a7-3ed6-4bfe-a7b4-1875228ade42";
        $view_id = '';
        $view = $this->trackView($cookie,$request,$view_type,$view_id);

        $designWork = DesignWork::findOrFail($design_work_id);
        $designWork = DesignWork::where('id',$design_work_id)->with('design','upload')->first();

        // design view
        $designWorkExists = DesignWork::findOrFail($design_work_id);
        $designWorkExists->views++;
        $designWorkExists->save();

        // create view record
        $designView = new DesignView();
        $designView->is_design_work = True;
        $designView->cookie = $request->cookie();
        $designView->design_work_id = $design_work_id;
        $designView->number = $designWorkExists->views;
        $designView->save();

        // Get designs
        return view('landing.design.design_work',compact('designWork'));
    }

    public function designGallery(Request $request, $design_id)
    {
        // save that user visited
        $cookie = $request->cookie();
        $view_type = "3e5302a7-3ed6-4bfe-a7b4-1875228ade42";
        $view_id = '';
        $view = $this->trackView($cookie,$request,$view_type,$view_id);

        $design = Design::findOrFail($design_id);
        $design = Design::where('id',$design_id)->with('contact')->first();

        $designGallery = DesignGallery::where('design_id',$design_id)->with('upload','design_work')->get();
        // design view
        $designExists = Design::findOrFail($design_id);
        $designExists->gallery_views++;
        $designExists->save();
        // create view record
        $designView = new DesignView();
        $designView->is_design_gallery = True;
        $designView->design_id = $design_id;
        $designView->number = $designExists->gallery_views;
        $designView->save();

        // design view
//        return $designGallery;
        // Get designs
        return view('landing.design.design_gallery',compact('designGallery','design'));
    }

}
