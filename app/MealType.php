<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MealType extends Model
{

    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Parents
    public function cuisine()
    {
        return $this->belongsTo('App\Cuisine');
    }
    public function cooking_skill()
    {
        return $this->belongsTo('App\CookingSkill');
    }
    public function cooking_style()
    {
        return $this->belongsTo('App\CookingStyle');
    }
    public function course()
    {
        return $this->belongsTo('App\Course');
    }
    public function dietary_preference()
    {
        return $this->belongsTo('App\DietaryPreference');
    }
    public function dish_type()
    {
        return $this->belongsTo('App\DishType');
    }
    public function food_type()
    {
        return $this->belongsTo('App\FoodType');
    }
    public function meal_type()
    {
        return $this->belongsTo('App\MealType');
    }
    public function tudeme()
    {
        return $this->belongsTo('App\Tudeme');
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
