<?php

namespace App\Traits;

use App\Album;
use App\AlbumDownload;
use App\AlbumImage;
use App\AlbumSet;
use App\Product;
use App\ProductView;
use App\ProductWork;
use App\Email;
use App\Invoice;
use App\Journal;
use App\Order;
use App\Project;
use App\Sale;
use App\ToDo;
use Auth;
use App\Loan;
use App\Institution;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

trait ProductTrait
{

    public function getProduct($product_id)
    {
        // product view
        $productViews = ProductView::where('is_product',True)->where('product_id',$product_id)->count();
        // to dos
        // Get pending to dos
        $pendingToDos = ToDo::where('product_id',$product_id)->where('status_id','f3df38e3-c854-4a06-be26-43dff410a3bc')->count();
        // Get inProgress to dos
        $inProgressToDos = ToDo::where('product_id',$product_id)->where('status_id','2a2d7a53-0abd-4624-b7a1-a123bfe6e568')->count();
        // Get completed to dos
        $completedToDos = ToDo::where('product_id',$product_id)->where('status_id','facb3c47-1e2c-46e9-9709-ca479cc6e77f')->count();
        // Get overdue to dos
        $overdueToDos = ToDo::where('product_id',$product_id)->where('status_id','99372fdc-9ca0-4bca-b483-3a6c95a73782')->count();

        $productArray = array(
            "productViews"=>$productViews,
            "pendingToDos"=>$pendingToDos,
            "inProgressToDos"=>$inProgressToDos,
            "completedToDos"=>$completedToDos,
            "overdueToDos"=>$overdueToDos
        );
        return $productArray;

    }


}
