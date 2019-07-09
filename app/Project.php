<?php

namespace App;

use App\Traits\UuidTrait;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes, UuidTrait;

    public $incrementing = false;
    
    // Children

    // Parents
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function project_type()
    {
        return $this->belongsTo('App\ProjectType');
    }
}
