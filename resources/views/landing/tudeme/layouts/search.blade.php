<!-- Search model -->
	<div class="search-model">
		<div class="h-100 d-flex align-items-center justify-content-center">
			<div class="search-close-switch">+</div>
			<form method="post" action="{{ route('tudeme.search') }}" autocomplete="off"  class="search-model-form">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" id="search-input" name="name" placeholder="Recipie">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <select name="cooking_skill" class="select2_demo_cooking_skill form-control input-lg">
                            <option></option>
                            @foreach($cookingSkills as $cookingSkill)
                                <option value="{{$cookingSkill->id}}">{{$cookingSkill->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select name="cooking_style" class="select2_demo_cooking_style form-control input-lg">
                            <option value="">Cooking Style</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <select name="meal_type" class="select2_demo_meal_type form-control input-lg">
                            <option value="">Meal Type</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select name="course" class="select2_demo_course form-control input-lg">
                            <option value="">Course</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <select name="dietary_preference" class="select2_demo_dietary_preference form-control input-lg">
                            <option value="">Dietary Preference</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select name="dish_type" class="select2_demo_dish_type form-control input-lg">
                            <option value="">Dish Type</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <select name="food_type" class="select2_demo_food_type form-control input-lg">
                            <option value="">Food Type</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select name="cuisine" class="select2_demo_cuisine form-control input-lg">
                            <option value="">Cuisine</option>
                        </select>
                    </div>
                </div>
                <br>
                <button class="btn-block" type="submit">Search</button>
			</form>
		</div>
	</div>
	<!-- Search model end -->
