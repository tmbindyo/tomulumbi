@extends('landing.tudeme.layouts.app')

@section('title', 'Categories')

@section('body')

    <!-- Recipe Section Begin -->
    <section class="recipe-section spad">
        <div class="container">
            <div class="row">


                @if($category_type==1)
                    @foreach($cookingSkills as $cookingSkill)
                        <div class="col-lg-4 col-sm-6">
                            <div class="recipe-item">
                                <a href="{{route('tudeme.category',['category_type'=>$category_type,'category'=>$cookingSkill->id])}}"><img src="{{ asset('themes/tudeme/yummy') }}/img/recipe/recipe-1.jpg" alt=""></a>
                                <div class="ri-text">
                                    <div class="cat-name">Desert</div>
                                    <a href="{{route('tudeme.category',['category_type'=>$category_type,'category'=>$cookingSkill->id])}}">
                                        <h4>{{$cookingSkill->name}}</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @elseif($category_type==2)
                    @foreach($cookingStyles as $cookingStyle)
                        <div class="col-lg-4 col-sm-6">
                            <div class="recipe-item">
                                <a href="{{route('tudeme.category',['category_type'=>$category_type,'category'=>$cookingStyle->id])}}"><img src="{{ asset('themes/tudeme/yummy') }}/img/recipe/recipe-1.jpg" alt=""></a>
                                <div class="ri-text">
                                    <div class="cat-name">Desert</div>
                                    <a href="{{route('tudeme.category',['category_type'=>$category_type,'category'=>$cookingStyle->id])}}">
                                        <h4>{{$cookingStyle->name}}</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @elseif($category_type==4)
                    @foreach($courses as $course)
                        <div class="col-lg-4 col-sm-6">
                            <div class="recipe-item">
                                <a href="{{route('tudeme.category',['category_type'=>$category_type,'category'=>$course->id])}}"><img src="{{ asset('themes/tudeme/yummy') }}/img/recipe/recipe-1.jpg" alt=""></a>
                                <div class="ri-text">
                                    <div class="cat-name">Desert</div>
                                    <a href="{{route('tudeme.category',['category_type'=>$category_type,'category'=>$course->id])}}">
                                        <h4>{{$course->name}}</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @elseif($category_type==5)
                    @foreach($dietaryPreferences as $dietaryPreference)
                        <div class="col-lg-4 col-sm-6">
                            <div class="recipe-item">
                                <a href="{{route('tudeme.category',['category_type'=>$category_type,'category'=>$dietaryPreference->id])}}"><img src="{{ asset('themes/tudeme/yummy') }}/img/recipe/recipe-1.jpg" alt=""></a>
                                <div class="ri-text">
                                    <div class="cat-name">Desert</div>
                                    <a href="{{route('tudeme.category',['category_type'=>$category_type,'category'=>$dietaryPreference->id])}}">
                                        <h4>{{$dietaryPreference->name}}</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @elseif($category_type==6)
                    @foreach($dishTypes as $dishType)
                        <div class="col-lg-4 col-sm-6">
                            <div class="recipe-item">
                                <a href="{{route('tudeme.category',['category_type'=>$category_type,'category'=>$dishType->id])}}"><img src="{{ asset('themes/tudeme/yummy') }}/img/recipe/recipe-1.jpg" alt=""></a>
                                <div class="ri-text">
                                    <div class="cat-name">Desert</div>
                                    <a href="{{route('tudeme.category',['category_type'=>$category_type,'category'=>$dishType->id])}}">
                                        <h4>{{$dishType->name}}</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @elseif($category_type==8)
                    @foreach($cuisines as $cuisine)
                        <div class="col-lg-4 col-sm-6">
                            <div class="recipe-item">
                                <a href="{{route('tudeme.category',['category_type'=>$category_type,'category'=>$cuisine->id])}}"><img src="{{ asset('themes/tudeme/yummy') }}/img/recipe/recipe-1.jpg" alt=""></a>
                                <div class="ri-text">
                                    <div class="cat-name">Desert</div>
                                    <a href="{{route('tudeme.category',['category_type'=>$category_type,'category'=>$cuisine->id])}}">
                                        <h4>{{$cuisine->name}}</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif


            </div>
            {{-- <div class="row">
                <div class="col-lg-12">
                    <div class="recipe-pagination">
                        <a href="#" class="active">01</a>
                        <a href="#">02</a>
                        <a href="#">03</a>
                        <a href="#">04</a>
                        <a href="#">Next</a>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="row">
                {{ $tudemes->links() }}
            </div> --}}

        </div>
    </section>
    <!-- Recipe Section End -->

    <!-- Categories Feature Recipe Section Begin -->
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
    <!-- Categories Feature Recipe Section End -->

@endsection
