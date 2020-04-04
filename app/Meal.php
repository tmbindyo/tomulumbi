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
        return $this->hasMany('App\Instruction')->orderBy('number');
    }
    public function meal_cooking_styles()
    {
        return $this->hasMany('App\MealCookingStyle');
    }
    public function meal_courses()
    {
        return $this->hasMany('App\MealCourse');
    }
    public function meal_dietary_preferences()
    {
        return $this->hasMany('App\MealDietaryPreference');
    }
    public function meal_ingredients()
    {
        return $this->hasMany('App\MealIngredient');
    }
    public function notes()
    {
        return $this->hasMany('App\Note');
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
    public function dish_type()
    {
        return $this->belongsTo('App\DishType');
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
