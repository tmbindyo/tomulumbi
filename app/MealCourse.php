<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MealCourse extends Model
{

    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Parents
    public function course()
    {
        return $this->belongsTo('App\course');
    }
    public function meal()
    {
        return $this->belongsTo('App\Meal');
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
