<?php

namespace App\Http\Controllers\Landing;

use App\Design;
use App\DesignGallery;
use App\DesignWork;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DesignController extends Controller
{
    public function designs()
    {
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
    public function designShow($design_id)
    {
        // Get designs
        $design = Design::findOrFail($design_id);
        $design = Design::where('id',$design_id)->with('design_works.upload','contact')->first();

//        return $design;

        return view('landing.design.design_show',compact('design'));
    }
    public function designWork($design_work_id)
    {
        $designWork = DesignWork::findOrFail($design_work_id);
        $designWork = DesignWork::where('id',$design_work_id)->with('design','upload')->first();
//        return $designWork;
        // Get designs
        return view('landing.design.design_work',compact('designWork'));
    }
    public function designGallery($design_id)
    {
        $design = Design::findOrFail($design_id);
        $design = Design::where('id',$design_id)->with('contact')->first();

        $designGallery = DesignGallery::where('design_id',$design_id)->with('upload','design_work')->get();
//        return $designGallery;
        // Get designs
        return view('landing.design.design_gallery',compact('designGallery','design'));
    }
}
