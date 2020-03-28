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
use App\TudemeFeaturedRecipie;
use App\TudemeTopRecipie;
use App\TudemeTopSection;

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
            // get meal count
            $mealCount = Meal::where('cooking_skill_id',$category)->count();
            if($mealCount > 0){
                // get meals for this cooking skill
                $tudemeMealTudemeIds = Meal::where('cooking_skill_id',$category)->select('tudeme_id')->get()->toArray();
                $tudemes = Tudeme::whereIn('id',$tudemeMealTudemeIds)->with('cover_image')->paginate(15);
                // get tudeme wherein
            }elseif($mealCount == 0){
                return back()->withWarning(__('Sorry, yet to get to making a '.$cookingSkill->name.' level meal.'));
            }


            // get meals
        }elseif($category_type==2){
            // filter by cooking style
            $cookingStyle = CookingStyle::findOrFail($category);
            $cookingStyle = CookingStyle::where('id',$category)->first();

            // get meal count
            $mealCount = Meal::where('cooking_skill_id',$category)->count();
            if($mealCount > 0){
                // get meals for this cooking skill
                $tudemeMealTudemeIds = Meal::where('cooking_style_id',$category)->select('tudeme_id')->get()->toArray();
                $tudemes = Tudeme::whereIn('id',$tudemeMealTudemeIds)->with('cover_image')->paginate(15);
                // get tudeme wherein
            }elseif($mealCount == 0){
                return back()->withWarning(__('Sorry, yet to get to making a '.$cookingStyle->name.' level meal.'));
            }

            // get meals
        }elseif($category_type==3){
            // filter by meal type
            $mealType = MealType::findOrFail($category);
            $mealType = MealType::where('id',$category)->first();

            // get meal count
            $mealCount = Meal::where('meal_type_id',$category)->count();
            if($mealCount > 0){
                // get meals for this cooking skill
                $tudemeMealTudemeIds = Meal::where('meal_type_id',$category)->select('tudeme_id')->get()->toArray();
                $tudemes = Tudeme::whereIn('id',$tudemeMealTudemeIds)->with('cover_image')->paginate(15);
                // get tudeme wherein
            }elseif($mealCount == 0){
                return back()->withWarning(__('Sorry, yet to get to making a '.$mealType->name.' level meal.'));
            }

            // get meals
        }elseif($category_type==4){
            // filter by course
            $course = Course::findOrFail($category);
            $course = Course::where('id',$category)->first();

            // get meal count
            $mealCount = Meal::where('course_id',$category)->count();
            if($mealCount > 0){
                // get meals for this cooking skill
                $tudemeMealTudemeIds = Meal::where('course_id',$category)->select('tudeme_id')->get()->toArray();
                $tudemes = Tudeme::whereIn('id',$tudemeMealTudemeIds)->with('cover_image')->paginate(15);
                // get tudeme wherein
            }elseif($mealCount == 0){
                return back()->withWarning(__('Sorry, yet to get to making a '.$course->name.' level meal.'));
            }

            // get meals
        }elseif($category_type==5){
            // filter by dietary preference
            $dietaryPreference = DietaryPreference::findOrFail($category);
            $dietaryPreference = DietaryPreference::where('id',$category)->first();

            // get meal count
            $mealCount = Meal::where('dietary_preference_id',$category)->count();
            if($mealCount > 0){
                // get meals for this cooking skill
                $tudemeMealTudemeIds = Meal::where('dietary_preference_id',$category)->select('tudeme_id')->get()->toArray();
                $tudemes = Tudeme::whereIn('id',$tudemeMealTudemeIds)->with('cover_image')->paginate(15);
                // get tudeme wherein
            }elseif($mealCount == 0){
                return back()->withWarning(__('Sorry, yet to get to making a '.$dietaryPreference->name.' level meal.'));
            }

            // get meals
        }elseif($category_type==6){
            // filter by dish type
            $dishType = DishType::findOrFail($category);
            $dishType = DishType::where('id',$category)->first();

            // get meal count
            $mealCount = Meal::where('dish_type_id',$category)->count();
            if($mealCount > 0){
                // get meals for this cooking skill
                $tudemeMealTudemeIds = Meal::where('dish_type_id',$category)->select('tudeme_id')->get()->toArray();
                $tudemes = Tudeme::whereIn('id',$tudemeMealTudemeIds)->with('cover_image')->paginate(15);
                // get tudeme wherein
            }elseif($mealCount == 0){
                return back()->withWarning(__('Sorry, yet to get to making a '.$dishType->name.' level meal.'));
            }

            // get meals
        }elseif($category_type==7){
            // filter by food type
            $foodType = FoodType::findOrFail($category);
            $foodType = FoodType::where('id',$category)->first();

            // get meal count
            $mealCount = Meal::where('food_type_id',$category)->count();
            if($mealCount > 0){
                // get meals for this cooking skill
                $tudemeMealTudemeIds = Meal::where('food_type_id',$category)->select('tudeme_id')->get()->toArray();
                $tudemes = Tudeme::whereIn('id',$tudemeMealTudemeIds)->with('cover_image')->paginate(15);
                // get tudeme wherein
            }elseif($mealCount == 0){
                return back()->withWarning(__('Sorry, yet to get to making a '.$foodType->name.' level meal.'));
            }

            // get meals
        }elseif($category_type==8){
            // filter by cuisine
            $cuisine = Cuisine::findOrFail($category);
            $cuisine = Cuisine::where('id',$category)->first();

            // get meal count
            $mealCount = Meal::where('cuisine_id',$category)->count();
            if($mealCount > 0){
                // get meals for this cooking skill
                $tudemeMealTudemeIds = Meal::where('cuisine_id',$category)->select('tudeme_id')->get()->toArray();
                $tudemes = Tudeme::whereIn('id',$tudemeMealTudemeIds)->with('cover_image')->paginate(15);
                // get tudeme wherein
            }elseif($mealCount == 0){
                return back()->withWarning(__('Sorry, yet to get to making a '.$cuisine->name.' level meal.'));
            }

            // get meals
        }else{

            return back()->withWarning(__('Sorry, yet to get to making a level meal.'));

        }
        return view('landing.tudeme.category',compact('category_type','tudemes'));
    }

    public function contact()
    {
        return view('landing.tudeme.contact');
    }

    public function index()
    {
        // tudeme top section
        $tudemeTopSections = TudemeTopSection::where('status_id','c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->with('tudeme.cover_image','tudeme_top_location')->count();
        // top right
        $tudemeTopRightTopSection = TudemeTopSection::where('tudeme_top_location_id','379564a7-907c-4cb9-9e75-b1117961f320')->where('status_id','c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->with('tudeme.cover_image','tudeme_top_location')->first();
        // center
        $tudemeCenterTopSection = TudemeTopSection::where('tudeme_top_location_id','eb7ba288-5774-4fa1-b31f-b0acfda6f37f')->where('status_id','c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->with('tudeme.cover_image','tudeme_top_location')->first();
        // top left
        $tudemeTopLeftTopSection = TudemeTopSection::where('tudeme_top_location_id','708bd75d-1a25-441e-b165-6c5400627e37')->where('status_id','c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->with('tudeme.cover_image','tudeme_top_location')->first();
        // bottom left
        $tudemeBottomLeftTopSection = TudemeTopSection::where('tudeme_top_location_id','29a58b4d-4d9e-4f33-9982-ef4139b11902')->where('status_id','c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->with('tudeme.cover_image','tudeme_top_location')->first();
        // bottom left
        $tudemeBottomRightTopSection = TudemeTopSection::where('tudeme_top_location_id','be7118e3-80f2-40ca-b237-f8f1f795f413')->where('status_id','c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->with('tudeme.cover_image','tudeme_top_location')->first();
        // tudeme top first
        $tudemeTopRecipies = TudemeTopRecipie::where('is_featured',False)->where('status_id','c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->with('tudeme.cover_image')->get();
        // tudeme top featured first
        $tudemeTopFeaturedRecipie = TudemeTopRecipie::where('is_featured',True)->where('status_id','c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->with('tudeme.cover_image')->first();
        // tudeme featured recipies
        $tudemeFeaturedRecipies = TudemeFeaturedRecipie::where('status_id','c670f7a2-b6d1-4669-8ab5-9c764a1e403e')->with('tudeme.cover_image','tudeme.icon')->get();

        return view('landing.tudeme.index',compact('tudemeTopSections','tudemeTopRightTopSection','tudemeCenterTopSection','tudemeTopLeftTopSection','tudemeBottomLeftTopSection','tudemeBottomRightTopSection','tudemeTopRecipies','tudemeTopFeaturedRecipie','tudemeFeaturedRecipies'));
    }

    public function recipe($recipie_id)
    {

        // cuisine
        $cuisines = Cuisine::all();

        // $tudeme = Tudeme::findOrFail($tudeme_id);
        $tudeme = Tudeme::where('id',$recipie_id)->with('user','status','cover_image','spread','icon','notes.meal','tudeme_tudeme_types.tudeme_type','tudeme_tudeme_tags.tudeme_tag','albums')->first();
        $tudemeMeals = Meal::where('tudeme_id',$tudeme->id)->with('cooking_skill','dish_type','food_type','meal_type','notes','tudeme','meal_cooking_styles','meal_courses','meal_dietary_preferences','meal_ingredients.measurment','meal_ingredients.ingredient','instructions')->withCount('instructions')->get();

        // return $tudeme;
        return view('landing.tudeme.recipe',compact('tudeme','tudemeMeals','cuisines'));
    }

}
