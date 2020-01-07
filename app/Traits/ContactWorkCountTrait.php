<?php

namespace App\Traits;

use App\Deal;
use App\Quote;
use App\Album;
use App\AlbumContact;
use App\Order;
use App\Design;
use App\DesignContact;
use App\Project;
use App\Liability;
use App\ProjectContact;
use App\PromoCodeAssignment;

trait ContactWorkCountTrait
{

    public function ContactWorkCount($contact_id)
    {
        // Get contact albums
        $contactAlbums = AlbumContact::where('contact_id',$contact_id)->count();
        // Get contact projects
        $contactProjects = ProjectContact::where('contact_id',$contact_id)->count();
        // Get contact designs
        $contactDesigns = DesignContact::where('contact_id',$contact_id)->count();
        // Get contact orders
        $contactOrder = Order::where('contact_id',$contact_id)->count();
        // Get contact liabilities
        $contactLiabilities = Liability::where('contact_id',$contact_id)->count();
        // Get contact assigned promo codes
        $contactAssignedPromoCodes = PromoCodeAssignment::where('contact_id',$contact_id)->count();
        // Get contact deals
        $contactDeals = Deal::where('contact_id',$contact_id)->count();

        $contactWorkCount = array(
            "contactAlbums"=>$contactAlbums,
            "contactProjects"=>$contactProjects,
            "contactDesigns"=>$contactDesigns,
            "contactOrder"=>$contactOrder,
            "contactLiabilities"=>$contactLiabilities,
            "contactAssignedPromoCodes"=>$contactAssignedPromoCodes,
            "contactDeals"=>$contactDeals
        );
        return $contactWorkCount;
    }

}
