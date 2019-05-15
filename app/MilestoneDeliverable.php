<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MilestoneDeliverable extends Model
{   
    use SoftDeletes;
    //

    public function project_milestone()
    {
        return $this->belongsTo('App\ProjectMilestone');
    }
}
