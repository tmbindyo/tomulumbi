<?php

namespace App\Traits;

use App\Album;
use App\AlbumDownload;
use App\AlbumImage;
use App\AlbumSet;
use App\Design;
use App\DesignView;
use App\DesignWork;
use App\Email;
use App\Invoice;
use App\Journal;
use App\Order;
use App\Product;
use App\Project;
use App\Sale;
use App\ToDo;
use Auth;
use App\Loan;
use App\Institution;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

trait DesignTrait
{

    public function getDesign($design_id)
    {
        // design view
        $designViews = DesignView::where('is_design',True)->where('design_id',$design_id)->count();
        // get design works
        $designWorkViews = array();
        $designWorks = DesignWork::where('design_id',$design_id)->get();
        $designWorkCount = DesignWork::where('design_id',$design_id)->count();

        $designWorkViewCount = [];
        $downloadArr = [];

        foreach ($designWorks as $key => $value) {
            $designWorkViewCount[(int)$key]["name"] = $value->name;
            $designWorkViewCount[(int)$key]["views"] = $value->views;
        }

        for($i = 1; $i <= $designWorkCount; $i++){
            if(!empty($designWorkViewCount[$i])){
                $downloadArr[$i] = $designWorkViewCount[$i];
            }else{
                $downloadArr[$i] = 0;
            }
        }

        for($i = 1; $i <= $designWorkCount; $i++){

        }

        // design gallery view
        $designGalleryViews = DesignView::where('is_design_gallery',True)->where('design_id',$design_id)->count();

        // to dos
        // Get pending to dos
        $pendingToDos = ToDo::where('design_id',$design_id)->where('status_id','f3df38e3-c854-4a06-be26-43dff410a3bc')->count();
        // Get inProgress to dos
        $inProgressToDos = ToDo::where('design_id',$design_id)->where('status_id','2a2d7a53-0abd-4624-b7a1-a123bfe6e568')->count();
        // Get completed to dos
        $completedToDos = ToDo::where('design_id',$design_id)->where('status_id','facb3c47-1e2c-46e9-9709-ca479cc6e77f')->count();
        // Get overdue to dos
        $overdueToDos = ToDo::where('design_id',$design_id)->where('status_id','99372fdc-9ca0-4bca-b483-3a6c95a73782')->count();

        $designArray = array(
            "designViews"=>$designViews,
            "designWorkViewCount"=>$designWorkViewCount,
            "designGalleryViews"=>$designGalleryViews,
            "pendingToDos"=>$pendingToDos,
            "inProgressToDos"=>$inProgressToDos,
            "completedToDos"=>$completedToDos,
            "overdueToDos"=>$overdueToDos
        );
        return $designArray;

    }


}
