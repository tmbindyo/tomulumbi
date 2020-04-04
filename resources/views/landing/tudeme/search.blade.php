@extends('landing.tudeme.layouts.app')

@section('title', 'Search')

@section('body')
    {{-- Advanced search form begin --}}
    {{-- <section>
        <div class="row">
            <div class="container">
                <form method="post" action="{{ route('tudeme.search.results') }}" autocomplete="off"  class="search-model-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" id="search-input" name="name" placeholder="Recipe">
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
                                <option></option>
                                @foreach($cookingStyles as $cookingStyle)
                                    <option value="{{$cookingStyle->id}}">{{$cookingStyle->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <select name="course" class="select2_demo_course form-control input-lg">
                                <option></option>
                                @foreach($courses as $course)
                                    <option value="{{$course->id}}">{{$course->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select name="cuisine" class="select2_demo_cuisine form-control input-lg">
                                <option></option>
                                @foreach($cuisines as $cuisine)
                                    <option value="{{$cuisine->id}}">{{$cuisine->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <select name="dietary_preference[]" class="select2_demo_dietary_preference form-control input-lg" multiple>
                                <option></option>
                                @foreach($dietaryPreferences as $dietaryPreference)
                                    <option value="{{$dietaryPreference->id}}">{{$dietaryPreference->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select name="dish_type" class="select2_demo_dish_type form-control input-lg">
                                <option></option>
                                @foreach($dishTypes as $dishType)
                                    <option value="{{$dishType->id}}">{{$dishType->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <button class="btn-block" type="submit">Search</button>
                </form>
            </div>
        </div>
        <br>
    </section> --}}
    {{-- Advanced search form end --}}

    <!-- Recipe Section Begin -->
    <section class="recipe-section spad">
        <div class="container">
            <div class="row">



                @foreach ($tudemes as $tudeme)
                    <div class="col-lg-4 col-sm-6">
                        <div class="recipe-item">
                            <a href="{{route('tudeme.blog.show',$tudeme->id)}}"><img src="{{ asset('') }}{{ $tudeme->cover_image->pixels500 }}" alt=""></a>
                            <div class="ri-text">
                                <div class="cat-name">Desert</div>
                                <a href="{{route('tudeme.blog.show',$tudeme->id)}}">
                                    <h4>{{$tudeme->name}}</h4>
                                </a>
                                <p>{{$tudeme->description}}.</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            {{--  <div class="row">
                <div class="col-lg-12">
                    <div class="recipe-pagination">
                        <a href="#">Prev</a>
                        <a href="#" class="active">01</a>
                        <a href="#">02</a>
                        <a href="#">03</a>
                        <a href="#">04</a>
                        <a href="#">Next</a>
                    </div>
                </div>
            </div>  --}}
            <div class="row">
                {{ $tudemes->links() }}
            </div>
        </div>
    </section>
    <!-- Recipe Section End -->

    <!-- Blog Feature Recipe Section Begin -->
    <section class="categories-feature-recipe spad">
        <div class="section-title">
            <h5>Featured Recipes</h5>
        </div>
        <div class="container po-relative">
            <div class="plus-icon">
                <i class="fa fa-plus"></i>
            </div>
            <div class="row">
                <div class="col-lg-7">

                    @foreach($tudemeTopRecipies as $tudemeTopRecipie)
                        <div class="cfr-item">
                            <div class="cfr-item-img set-bg" data-setbg="{{ asset('') }}{{ $tudemeTopRecipie->tudeme->cover_image->pixels300 }}">
                                <i class="fa fa-plus"></i>
                            </div>
                            <div class="cfr-item-text">
                                @foreach($tudemeTopRecipie->tudeme->tudeme_tudeme_types->slice(0, 3) as $tudeme_tudeme_type)
                                    <div class="cat-name">{{$tudeme_tudeme_type->tudeme_type->name}}</div>
                                @endforeach
                                <a href="#">
                                    <h4>{{$tudemeTopRecipie->tudeme->name}}</h4>
                                </a>
                                <p>{{$tudemeTopRecipie->tudeme->description}}</p>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="col-lg-4 offset-lg-1">
                    @foreach($tudemeTopSections as $tudemeTopSection)
                        <div class="cfr-small-item">
                            <a href="#"><img src="{{ asset('') }}{{ $tudemeTopSection->tudeme->cover_image->pixels100 }}" alt=""></a>
                            <div class="cfr-small-text">
                                @foreach($tudemeTopSection->tudeme->tudeme_tudeme_types->slice(0, 1) as $tudeme_tudeme_type)
                                    <div class="cat-name">{{$tudeme_tudeme_type->tudeme_type->name}}</div>
                                @endforeach
                            <h6>{{$tudemeTopSection->tudeme->name}}</h6>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Feature Recipe Section End -->

@endsection
