<?php

namespace App\Traits;

use App\AlbumDownload;
use App\DesignView;
use App\JournalView;
use App\OrderProduct;
use App\ProductView;
use App\ProjectView;
use Carbon\Carbon;
use App\Album;
use App\AlbumView;
use App\Design;
use App\Email;
use App\Invoice;
use App\Journal;
use App\Order;
use App\Product;
use App\Project;
use App\Sale;
use Auth;
use App\Loan;
use App\Institution;
use App\TudemeView;
use Illuminate\Support\Facades\DB;

trait DownloadViewNumbersTrait
{

    public function getAlbumDownloadViewNumbers($album_id)
    {
        // get year
        $year = date('Y');
        $views = AlbumView::where('album_id',$album_id)->where(DB::raw('YEAR(created_at)'), '=', $year)->select('id', 'created_at')
            ->get()
            ->groupBy(function($date) {
                //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });

        $viewmcount = [];
        $viewArr = [];

        foreach ($views as $key => $value) {
            $viewmcount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($viewmcount[$i])){
                $viewArr[$i] = $viewmcount[$i];
            }else{
                $viewArr[$i] = 0;
            }
        }

        $downloads = AlbumDownload::where('album_id',$album_id)->where(DB::raw('YEAR(created_at)'), '=', $year)->select('id', 'created_at')
            ->get()
            ->groupBy(function($date) {
                //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });

        $downloadmcount = [];
        $downloadArr = [];

        foreach ($downloads as $key => $value) {
            $downloadmcount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($downloadmcount[$i])){
                $downloadArr[$i] = $downloadmcount[$i];
            }else{
                $downloadArr[$i] = 0;
            }
        }


        $navbarValues = array(
            "views"=>$viewArr,
            "downloads"=>$downloadArr
        );

        return $navbarValues;
    }

    public function getDesignViews($design_id)
    {
        // get year
        $year = date('Y');
        $views = DesignView::where('design_id',$design_id)->where(DB::raw('YEAR(created_at)'), '=', $year)->select('id', 'created_at')
            ->get()
            ->groupBy(function($date) {
                //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });

        $viewmcount = [];
        $viewArr = [];

        foreach ($views as $key => $value) {
            $viewmcount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($viewmcount[$i])){
                $viewArr[$i] = $viewmcount[$i];
            }else{
                $viewArr[$i] = 0;
            }
        }

        $galleryViews = DesignView::where('design_id',$design_id)->where('is_design_gallery',True)->where(DB::raw('YEAR(created_at)'), '=', $year)->select('id', 'created_at')
            ->get()
            ->groupBy(function($date) {
                //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });

        $galleryViewmCount = [];
        $galleryViewArr = [];

        foreach ($galleryViews as $key => $value) {
            $galleryViewmCount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($galleryViewmCount[$i])){
                $galleryViewArr[$i] = $galleryViewmCount[$i];
            }else{
                $galleryViewArr[$i] = 0;
            }
        }


        $viewValues = array(
            "views"=>$viewArr,
            "galleryViews"=>$galleryViewArr
        );

        return $viewValues;
    }

    public function getProjectViews($project_id)
    {
        // get year
        $year = date('Y');
        $views = ProjectView::where('project_id',$project_id)->where(DB::raw('YEAR(created_at)'), '=', $year)->select('id', 'created_at')
            ->get()
            ->groupBy(function($date) {
                //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });

        $viewmcount = [];
        $viewArr = [];

        foreach ($views as $key => $value) {
            $viewmcount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($viewmcount[$i])){
                $viewArr[$i] = $viewmcount[$i];
            }else{
                $viewArr[$i] = 0;
            }
        }

        $galleryViews = ProjectView::where('project_id',$project_id)->where('is_project_gallery',True)->where(DB::raw('YEAR(created_at)'), '=', $year)->select('id', 'created_at')
            ->get()
            ->groupBy(function($date) {
                //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });

        $galleryViewmCount = [];
        $galleryViewArr = [];

        foreach ($galleryViews as $key => $value) {
            $galleryViewmCount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($galleryViewmCount[$i])){
                $galleryViewArr[$i] = $galleryViewmCount[$i];
            }else{
                $galleryViewArr[$i] = 0;
            }
        }


        $viewValues = array(
            "views"=>$viewArr,
            "galleryViews"=>$galleryViewArr
        );

        return $viewValues;
    }

    public function getJournalViews($journal_id)
    {
        // get year
        $year = date('Y');
        $views = JournalView::where('journal_id',$journal_id)->where(DB::raw('YEAR(created_at)'), '=', $year)->select('id', 'created_at')
            ->get()
            ->groupBy(function($date) {
                //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });

        $viewmcount = [];
        $viewArr = [];

        foreach ($views as $key => $value) {
            $viewmcount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($viewmcount[$i])){
                $viewArr[$i] = $viewmcount[$i];
            }else{
                $viewArr[$i] = 0;
            }
        }

        $galleryViews = JournalView::where('journal_id',$journal_id)->where('is_journal_gallery',True)->where(DB::raw('YEAR(created_at)'), '=', $year)->select('id', 'created_at')
            ->get()
            ->groupBy(function($date) {
                //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });

        $galleryViewmCount = [];
        $galleryViewArr = [];

        foreach ($galleryViews as $key => $value) {
            $galleryViewmCount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($galleryViewmCount[$i])){
                $galleryViewArr[$i] = $galleryViewmCount[$i];
            }else{
                $galleryViewArr[$i] = 0;
            }
        }


        $viewValues = array(
            "views"=>$viewArr,
            "galleryViews"=>$galleryViewArr
        );

        return $viewValues;
    }

    public function getTudemeViews($tudeme_id)
    {
        // get year
        $year = date('Y');
        $views = TudemeView::where('tudeme_id',$tudeme_id)->where(DB::raw('YEAR(created_at)'), '=', $year)->select('id', 'created_at')
            ->get()
            ->groupBy(function($date) {
                //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });

        $viewmcount = [];
        $viewArr = [];

        foreach ($views as $key => $value) {
            $viewmcount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($viewmcount[$i])){
                $viewArr[$i] = $viewmcount[$i];
            }else{
                $viewArr[$i] = 0;
            }
        }

        $galleryViews = TudemeView::where('tudeme_id',$tudeme_id)->where('is_tudeme_gallery',True)->where(DB::raw('YEAR(created_at)'), '=', $year)->select('id', 'created_at')
            ->get()
            ->groupBy(function($date) {
                //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });

        $galleryViewmCount = [];
        $galleryViewArr = [];

        foreach ($galleryViews as $key => $value) {
            $galleryViewmCount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($galleryViewmCount[$i])){
                $galleryViewArr[$i] = $galleryViewmCount[$i];
            }else{
                $galleryViewArr[$i] = 0;
            }
        }


        $viewValues = array(
            "views"=>$viewArr,
            "galleryViews"=>$galleryViewArr
        );

        return $viewValues;
    }

    public function getProductViews($product_id)
    {
        // get year
        $year = date('Y');
        $views = ProductView::where('product_id',$product_id)->where(DB::raw('YEAR(created_at)'), '=', $year)->select('id', 'created_at')
            ->get()
            ->groupBy(function($date) {
                //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });

        $viewmcount = [];
        $viewArr = [];

        foreach ($views as $key => $value) {
            $viewmcount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($viewmcount[$i])){
                $viewArr[$i] = $viewmcount[$i];
            }else{
                $viewArr[$i] = 0;
            }
        }

        $viewValues = array(
            "views"=>$viewArr
        );

        return $viewValues;
    }

    public function getPriceListOrders($price_list_id)
    {
        // get year
        $year = date('Y');
        $orders = OrderProduct::where('price_list_id',$price_list_id)->where(DB::raw('YEAR(created_at)'), '=', $year)->select('id', 'created_at')
            ->get()
            ->groupBy(function($date) {
                //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });

        $ordermcount = [];
        $orderArr = [];

        foreach ($orders as $key => $value) {
            $ordermcount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($ordermcount[$i])){
                $orderArr[$i] = $ordermcount[$i];
            }else{
                $orderArr[$i] = 0;
            }
        }


        $sales = OrderProduct::where('price_list_id',$price_list_id)->where(DB::raw('YEAR(created_at)'), '=', $year)->select('id', 'created_at')
            ->get()
            ->groupBy(function($date) {
                //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->created_at)->format('m'); // grouping by months
            });

        $salemCount = [];
        $saleArr = [];

        foreach ($sales as $key => $value) {
            $salemCount[(int)$key] = count($value);
        }

        for($i = 1; $i <= 12; $i++){
            if(!empty($salemCount[$i])){
                $saleArr[$i] = $salemCount[$i];
            }else{
                $saleArr[$i] = 0;
            }
        }


        $viewValues = array(
            "orders"=>$orderArr,
            "sales"=>$saleArr
        );

        return $viewValues;
    }

}
