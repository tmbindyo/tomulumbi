<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deal extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Children
    public function albums()
    {
        return $this->hasMany('App\Album');
    }
    public function designs()
    {
        return $this->hasMany('App\Design');
    }
    public function projects()
    {
        return $this->hasMany('App\Project');
    }
    public function quotes()
    {
        return $this->hasMany('App\Quote');
    }
    public function to_dos()
    {
        return $this->hasMany('App\ToDo');
    }

    // Parents
    public function campaign()
    {
        return $this->belongsTo('App\Campaign');
    }
    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }
    public function deal_stage()
    {
        return $this->belongsTo('App\DealStage');
    }
    public function lead_source()
    {
        return $this->belongsTo('App\LeadSource');
    }
    public function organization()
    {
        return $this->belongsTo('App\Organization');
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
