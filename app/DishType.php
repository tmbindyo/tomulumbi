<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DishType extends Model
{

    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // children
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
