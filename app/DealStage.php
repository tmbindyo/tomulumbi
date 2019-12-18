<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DealStage extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // childen
    public function deals()
    {
        return $this->hasMany('App\Deal');
    }

    // parents
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
