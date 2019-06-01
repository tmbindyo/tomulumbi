<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReviewType extends Model
{
    use SoftDeletes, UuidTrait;

    public $incrementing = false;
    
    
    //
    public function reviews()
    {
        return $this->hasMany('App\Review');
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
