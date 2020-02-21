<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meal extends Model
{

    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Children
    public function instructions()
    {
        return $this->hasMany('App\Instruction');
    }
    public function institution()
    {
        return $this->hasMany('App\Institution');
    }

    // Parents
    public function cuisine()
    {
        return $this->belongsTo('App\Cuisine');
    }
    public function cooking_skill()
    {
        return $this->belongsTo('App\CookingSkill');
    }
    public function course()
    {
        return $this->belongsTo('App\Course');
    }
    public function food_type()
    {
        return $this->belongsTo('App\FoodType');
    }
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function tudeme()
    {
        return $this->belongsTo('App\Tudeme');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
