<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OfferingType extends Model
{
    use SoftDeletes, UuidTrait;

    public $incrementing = false;
    
    
    //
    public function projects()
    {
        return $this->hasMany('App\Project');
    }
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
