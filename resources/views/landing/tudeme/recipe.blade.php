@extends('landing.tudeme.layouts.app')

@section('title', 'Recipe')

@section('body')

    <!-- Hero Search Section Begin -->
    <div class="hero-search set-bg" @if($tudeme->spread)  data-setbg="{{ asset('') }}{{ $tudeme->spread->pixels750 }}" @else data-setbg="{{ asset('themes/tudeme/yummy') }}/img/search-bg.jpg" @endif>
    </div>
    <!-- Hero Search Section End -->
    <!-- Single Recipe Section Begin -->
    <section class="single-page-recipe spad">
        <div class="recipe-top">
            <div class="container-fluid">
                <div class="recipe-title">
                    <span>~
                        @foreach ($tudeme->tudeme_tudeme_tags as $tudeme_tag)
                            {{$tudeme_tag->tudeme_tag->name}} \
                        @endforeach
                    ~</span>
                    <h2>{{$tudeme->name}}</h2>
                    <ul class="tags">
                        @foreach ($tudeme->tudeme_tudeme_types as $tudeme_type)
                            <li>{{$tudeme_type->tudeme_type->name}}</li>
                        @endforeach
                    </ul>
                </div>
                <img @if($tudeme->cover_image) src="{{ asset('') }}{{ $tudeme->cover_image->pixels750 }}" @else src="{{ asset('themes/tudeme/yummy') }}/img/recipe-single.jpg"  @endif alt="">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="ingredients-item">
                        <div class="intro-item">
                            <img @if($tudeme->icon) src="{{ asset('') }}{{ $tudeme->icon->pixels750 }}"  @else src="{{ asset('themes/tudeme/yummy') }}/img/intro-img.jpg" @endif alt="">
                            <h2>{{$tudeme->name}}</h2>
                            <div class="recipe-time">
                                <ul>
                                    <li>Prep time: <span>{{$tudeme->prep_time}}</span></li>
                                    <li>Cook time: <span>{{$tudeme->cook_time}}</span></li>
                                    <li>Yield: <span>{{$tudeme->yield}}</span></li>
                                    <li>Serves: <span>{{$tudeme->serves}}</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="ingredient-list">
                            <div class="recipe-btn">
                                <a href="javascript:window.print()">Print Recipe</a>
                                @foreach($tudeme->albums as $album)
                                    @if($album->album_type_id == "ca64a5e0-d39b-4f2c-a136-9c523d935ea4")
                                        <a href="{{ route('client.proof', $album->id) }}" class="black-btn">View Album</a>
                                    @elseif($album->album_type_id == "6fdf4858-01ce-43ff-bbe6-827f09fa1cef")
                                        <a href="{{ route('personal.album.access', $album->id) }}" class="black-btn">View Album</a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="list-item">
                                <h5>Ingredients</h5>

                                @foreach ($tudemeMeals as $meal)
                                    <div class="salad-list">
                                    <h6>For the {{$meal->name}}</h6>
                                        <ul>
                                            @foreach ($meal->meal_ingredients as $ingredient)
                                                <li>{{$ingredient->details}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    {{-- <div class="nutrition-fact">
                        <div class="nutri-title">
                            <h6>Nutrition Facts</h6>
                            <span>Serves {{$tudeme->serves}}</span>
                        </div>
                        <ul>
                            <li>Total Fat : 20.4g</li>
                            <li>Cholesterol : 2%</li>
                            <li>Chalories: 345</li>
                        </ul>
                    </div> --}}
                </div>
                <div class="col-lg-7">
                    <div class="recipe-right">
                        <div class="recipe-desc">
                            <h3>Description</h3>
                            {!! $tudeme->body !!}
                        </div>
                        <div class="instruction-list">
                            @foreach ($tudemeMeals as $meal)
                                <h3>{{$meal->name}} Instructions</h3>
                                <ul>

                                    @foreach ($meal->instructions as $instruction)
                                        <li>
                                            <span>{{$instruction->number}}.</span>
                                            {{$instruction->instruction}}
                                        </li>
                                    @endforeach

                                </ul>
                            @endforeach

                        </div>
                        <div class="notes">
                            <h3>Notes</h3>

                            @foreach ($tudeme->notes as $note)

                                <div class="notes-item">
                                    <span>i</span> <i>@if($note->meal){{$meal->name}}@endif</i>
                                    <p>{{$note->notes}}</p>
                                </div>

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Single Recipe Section End -->

    <!-- Similar Recipe Section Begin -->
    <section class="similar-recipe spad">
        <div class="container">
            <div class="row">
                @foreach($similarRecipies as $similarRecipie)
                    <div class="col-lg-3 col-md-6">
                        <div class="similar-item">
                            <a href="{{route('tudeme.recipe',$similarRecipie->id)}}"><img src="{{ asset('') }}{{ $similarRecipie->cover_image->pixels100 }}" alt=""></a>
                            <div class="similar-text">
                                @foreach($similarRecipie->tudeme_tudeme_types->slice(0, 1) as $tudeme_tudeme_type)
                                    <div class="cat-name">{{$tudeme_tudeme_type->tudeme_type->name}}</div>
                                @endforeach
                                <h6>{{$similarRecipie->name}}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Similar Recipe Section End -->

@endsection
