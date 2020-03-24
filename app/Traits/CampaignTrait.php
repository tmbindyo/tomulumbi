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

trait CampaignTrait
{

    public function campaign()
    {
        // design view

        // campaign metrics
        $expectedRevenue = DB::table('campaign')->sum('expected_revenue');
        $budgetedCost = DB::table('campaign')->sum('budgeted_cost');
        $actualost = DB::table('campaign')->sum('actual_cost');

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
