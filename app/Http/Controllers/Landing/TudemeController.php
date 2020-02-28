<?php

namespace App\Http\Controllers\Landing;

use App\Cuisine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Meal;
use App\Tudeme;

class TudemeController extends Controller
{

    public function about()
    {
        return view('landing.tudeme.about');
    }

    public function blog()
    {
        return view('landing.tudeme.blog');
    }

    public function blogShow($blog_id)
    {
        return view('landing.tudeme.blog_show');
    }

    public function categories()
    {
        
        return view('landing.tudeme.categories');
    }

    public function contact()
    {
        return view('landing.tudeme.contact');
    }

    public function index()
    {
        return view('landing.tudeme.index');
    }

    public function recipe()
    {

        // cuisine
        $cuisines = Cuisine::all();

        // $tudeme = Tudeme::findOrFail($tudeme_id);
        $tudeme = Tudeme::with('user','status','cover_image','spread','icon','notes.meal','tudeme_tudeme_types.tudeme_type','tudeme_tudeme_tags.tudeme_tag')->first();
        $tudemeMeals = Meal::where('tudeme_id',$tudeme->id)->with('cooking_skill','dish_type','food_type','meal_type','notes','tudeme','meal_cooking_styles','meal_courses','meal_dietary_preferences','meal_ingredients.measurment','meal_ingredients.ingredient','instructions')->withCount('instructions')->get();

        // return $tudeme;
        return view('landing.tudeme.recipe',compact('tudeme','tudemeMeals','cuisines'));
    }

}
