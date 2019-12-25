<?php

namespace App\Traits;

use App\Deal;
use App\Quote;
use App\Album;
use App\Order;
use App\Design;
use App\Project;
use App\Liability;
use App\PromoCodeAssignment;

trait ContactWorkCountTrait
{

    public function ContactWorkCount($contact_id)
    {
        // Get contact albums
        $contactAlbums = Album::where('contact_id',$contact_id)->count();
        // Get contact projects
        $contactProjects = Project::where('contact_id',$contact_id)->count();
        // Get contact designs
        $contactDesigns = Design::where('contact_id',$contact_id)->count();
        // Get contact orders
        $contactOrder = Order::where('contact_id',$contact_id)->count();
        // Get contact liabilities
        $contactLiabilities = Liability::where('contact_id',$contact_id)->count();
        // Get contact assigned promo codes
        $contactAssignedPromoCodes = PromoCodeAssignment::where('contact_id',$contact_id)->count();
        // Get contact deals
        $contactDeals = Deal::where('contact_id',$contact_id)->count();
        // Get contact quotes
        $contactQuotes = Quote::where('contact_id',$contact_id)->count();

        $contactWorkCount = array(
            "contactAlbums"=>$contactAlbums,
            "contactProjects"=>$contactProjects,
            "contactDesigns"=>$contactDesigns,
            "contactOrder"=>$contactOrder,
            "contactLiabilities"=>$contactLiabilities,
            "contactAssignedPromoCodes"=>$contactAssignedPromoCodes,
            "contactDeals"=>$contactDeals,
            "contactQuotes"=>$contactQuotes
        );
        return $contactWorkCount;
    }

}
