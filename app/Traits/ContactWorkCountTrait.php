<?php

namespace App\Traits;

use App\Album;
use App\Design;
use App\Email;
use App\Journal;
use App\Order;
use App\Product;
use App\Project;
use App\ToDo;


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

        $contactWorkCount = array(
            "contactAlbums"=>$contactAlbums,
            "contactProjects"=>$contactProjects,
            "contactDesigns"=>$contactDesigns
        );
        return $contactWorkCount;
    }

}
