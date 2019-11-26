<?php

namespace App\Traits;

use App\Album;
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

trait NavbarTrait
{

    public function getNavbarValues()
    {
        // Get unread emails
        $unreadEmails = Email::where('status_id','9c267c79-162e-4ae1-9340-57a4c5ca5e81')->get();
        // Get unread emails count
        $unreadEmailsCount = Email::where('status_id','9c267c79-162e-4ae1-9340-57a4c5ca5e81')->count();
        // Get client proofs count
        $clientProofsCount = Album::where('album_type_id','ca64a5e0-d39b-4f2c-a136-9c523d935ea4')->count();
        // Get personal albums  count
        $personalAlbumsCount = Album::where('album_type_id','6fdf4858-01ce-43ff-bbe6-827f09fa1cef')->count();
        // Get designs count
        $designsCount = Design::count();
        // Get projects count
        $projectsCount = Project::count();
        // Get jounrals count
        $journalsCount = Journal::count();
        // Get products count
        $productsCount = Product::count();
        // Get orders count
        $ordersCount = Order::where('status_id','66e71792-5289-4554-ba69-97933dfb1e49')->count();
        // Get abandoned cart count
        $abandonedCartsCount = Order::where('status_id','d228f839-2378-49d1-90b7-eb31dc4cc946')->count();
        // Get sales count
        $salesCount = Order::where('is_sale',True)->where('status_id','ab95912f-1a23-4443-b822-4159adb1185a')->count();

        $navbarValues = array("unreadEmails"=>$unreadEmails,
            "unreadEmailsCount"=>$unreadEmailsCount,
            "clientProofsCount"=>$clientProofsCount,
            "personalAlbumsCount"=>$personalAlbumsCount,
            "designsCount"=>$designsCount,
            "projectsCount"=>$projectsCount,
            "journalsCount"=>$journalsCount,
            "productsCount"=>$productsCount,
            "ordersCount"=>$ordersCount,
            "salesCount"=>$salesCount,
            "abandonedCartsCount"=>$abandonedCartsCount
        );

        return $navbarValues;
    }


}
