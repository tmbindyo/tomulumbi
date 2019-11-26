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
use App\ProjectView;
use App\Sale;
use App\ToDo;
use Auth;
use App\Loan;
use App\Institution;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

trait ProjectTrait
{

    public function getProject($project_id)
    {
        // project view
        $projectViews = ProjectView::where('is_project',True)->where('project_id',$project_id)->count();
        // project gallery view
        $projectGalleryViews = ProjectView::where('is_project_gallery',True)->where('project_id',$project_id)->count();
        // to dos
        // Get pending to dos
        $pendingToDos = ToDo::where('project_id',$project_id)->where('status_id','f3df38e3-c854-4a06-be26-43dff410a3bc')->count();
        // Get inProgress to dos
        $inProgressToDos = ToDo::where('project_id',$project_id)->where('status_id','2a2d7a53-0abd-4624-b7a1-a123bfe6e568')->count();
        // Get completed to dos
        $completedToDos = ToDo::where('project_id',$project_id)->where('status_id','facb3c47-1e2c-46e9-9709-ca479cc6e77f')->count();
        // Get overdue to dos
        $overdueToDos = ToDo::where('project_id',$project_id)->where('status_id','99372fdc-9ca0-4bca-b483-3a6c95a73782')->count();

        $projectArray = array(
            "projectViews"=>$projectViews,
            "projectGalleryViews"=>$projectGalleryViews,
            "pendingToDos"=>$pendingToDos,
            "inProgressToDos"=>$inProgressToDos,
            "completedToDos"=>$completedToDos,
            "overdueToDos"=>$overdueToDos
        );
        return $projectArray;

    }


}
