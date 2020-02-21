<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cuisine extends Model
{

    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Children
    public function meals()
    {
        return $this->hasMany('App\Meal');
    }

    // Parents
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
