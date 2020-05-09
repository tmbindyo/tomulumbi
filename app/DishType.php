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
    public function cover_image()
    {
        return $this->hasOne('App\Upload','id', 'cover_image_id');
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
