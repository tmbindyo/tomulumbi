<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssetAction extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Parents
    public function action_type()
    {
        return $this->belongsTo('App\ActionType');
    }
    public function asset()
    {
        return $this->belongsTo('App\Asset');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    // children
    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
}