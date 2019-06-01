<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MilestoneDeliverable extends Model
{   
    use SoftDeletes, UuidTrait;

    public $incrementing = false;
    //

    public function project_milestone()
    {
        return $this->belongsTo('App\ProjectMilestone');
    }
}
