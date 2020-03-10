<?php

namespace App\Http\Controllers\Landing;

use App\CookingSkill;
use App\CookingStyle;
use App\Course;
use App\Cuisine;
use App\DietaryPreference;
use App\DishType;
use App\FoodType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Journal;
use App\Meal;
use App\MealType;
use App\Tudeme;

class TudemeController extends Controller
{

    public function about()
    {
        return view('landing.tudeme.about');
    }

    public function blog()
    {

        $journals = Journal::where('is_tudeme',True)->with('user','status')->orderBy('created_at', 'desc')->get();
        return view('landing.tudeme.blog',compact('journals'));

    }

    public function blogShow($journal_id)
    {

        $journal = Journal::where('id',$journal_id)->with('user','status','journal_labels.label','cover_image')->orderBy('created_at', 'desc')->first();
        return view('landing.tudeme.blog_show',compact('journal'));

    }

    public function categories($category_type)
    {
        if($category_type==1){
            // filter by cooking skill
            $cookingSkills = CookingSkill::all();
            return view('landing.tudeme.categories',compact('category_type','cookingSkills'));
        }elseif($category_type==2){
            // filter by cooking style
            $cookingStyles = CookingStyle::all();
            return view('landing.tudeme.categories',compact('category_type','cookingStyles'));
        }elseif($category_type==3){
            // filter by meal type
            $mealTypes = MealType::all();
            return view('landing.tudeme.categories',compact('category_type','mealTypes'));
        }elseif($category_type==4){
            // filter by course
            $courses = Course::all();
            return view('landing.tudeme.categories',compact('category_type','courses'));
        }elseif($category_type==5){
            // filter by dietary preference
            $dietaryPreferences = DietaryPreference::all();
            return view('landing.tudeme.categories',compact('category_type','dietaryPreferences'));
        }elseif($category_type==6){
            // filter by dish type
            $dishTypes = DishType::all();
            return view('landing.tudeme.categories',compact('category_type','dishTypes'));
        }elseif($category_type==7){
            // filter by food type
            $foodTypes = FoodType::all();
            return view('landing.tudeme.categories',compact('category_type','foodTypes'));
        }elseif($category_type==8){
            // filter by cuisine
            $cuisines = Cuisine::all();
            return view('landing.tudeme.categories',compact('category_type','cuisines'));
        }else{

        }
    }

    public function category($category_type, $category)
    {
        if($category_type==1){
            // filter by cooking skill
            $cookingSkill = CookingSkill::findOrFail($category);
            $cookingSkill = CookingSkill::where('id',$category)->first();
            $mealCount = Meal::where('cooking_skill_id',$category)->count();
            $meals = Meal::where('cooking_skill_id',$category)->get();

            if($mealCount > 0){
                
            }elseif($mealCount == 0){
                return back()->withWarning(__('Sorry, yet to get to making a '.$cookingSkill->name.' level meal.'));
            }else{
                
            }


            // get meals
        }elseif($category_type==2){
            // filter by cooking style
            $cookingStyle = CookingStyle::findOrFail($category);
            $cookingStyle = CookingStyle::where('id',$category)->first();

            // get meals
        }elseif($category_type==3){
            // filter by meal type
            $mealType = MealType::findOrFail($category);
            $mealType = MealType::where('id',$category)->first();

            // get meals
        }elseif($category_type==4){
            // filter by course
            $course = Course::findOrFail($category);
            $course = Course::where('id',$category)->first();

            // get meals
        }elseif($category_type==5){
            // filter by dietary preference
            $dietaryPreference = DietaryPreference::findOrFail($category);
            $dietaryPreference = DietaryPreference::where('id',$category)->first();

            // get meals
        }elseif($category_type==6){
            // filter by dish type
            $dishType = DishType::findOrFail($category);
            $dishType = DishType::where('id',$category)->first();

            // get meals
        }elseif($category_type==7){
            // filter by food type
            $foodType = FoodType::findOrFail($category);
            $foodType = FoodType::where('id',$category)->first();

            // get meals
        }elseif($category_type==8){
            // filter by cuisine
            $cuisine = Cuisine::findOrFail($category);
            $cuisine = Cuisine::where('id',$category)->first();

            // get meals
        }else{

        }
        return view('landing.tudeme.category',compact('category_type'));
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
        $tudeme = Tudeme::with('user','status','cover_image','spread','icon','notes.meal','tudeme_tudeme_types.tudeme_type','tudeme_tudeme_tags.tudeme_tag','albums')->first();
        $tudemeMeals = Meal::where('tudeme_id',$tudeme->id)->with('cooking_skill','dish_type','food_type','meal_type','notes','tudeme','meal_cooking_styles','meal_courses','meal_dietary_preferences','meal_ingredients.measurment','meal_ingredients.ingredient','instructions')->withCount('instructions')->get();

        // return $tudeme;
        return view('landing.tudeme.recipe',compact('tudeme','tudemeMeals','cuisines'));
    }

}
