<?php

namespace App\Traits;

use App\Album;
use App\Quote;
use App\Design;
use App\Project;


trait DealWorkCountTrait
{

    public function DealWorkCount($deal_id)
    {
        // Get deal albums
        $dealAlbums = Album::where('deal_id',$deal_id)->count();
        // Get deal projects
        $dealProjects = Project::where('deal_id',$deal_id)->count();
        // Get deal designs
        $dealDesigns = Design::where('deal_id',$deal_id)->count();
        // Get deal quotes
        $dealQuotes = Quote::where('deal_id',$deal_id)->count();

        $dealWorkCount = array(
            "dealAlbums"=>$dealAlbums,
            "dealProjects"=>$dealProjects,
            "dealDesigns"=>$dealDesigns,
            "dealQuotes"=>$dealQuotes
        );
        return $dealWorkCount;
    }

}
