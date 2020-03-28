@extends('landing.tudeme.layouts.app')

@section('title', 'Home')

@section('body')

    <!-- Page Top Recipe Section Begin -->
    @if($tudemeTopSections == 5)
        <section class="page-top-recipe">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 order-lg-2">
                        <div class="pt-recipe-item large-item">
                            <a href="{{route('tudeme.recipe',$tudemeCenterTopSection->tudeme->id)}}">
                                <div class="pt-recipe-img set-bg" data-setbg="{{ asset('') }}{{ $tudemeCenterTopSection->tudeme->cover_image->pixels500 }}">
                                    <i class="fa fa-plus"></i>
                                </div>
                            </a>
                            <div class="pt-recipe-text">
                                <span>March 10, 2019</span>
                                <a href="{{route('tudeme.recipe',$tudemeCenterTopSection->tudeme->id)}}"><h4>{{$tudemeCenterTopSection->tudeme->name}}</h4></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 order-lg-1">
                        <div class="pt-recipe-item">
                            <a href="{{route('tudeme.recipe',$tudemeTopLeftTopSection->tudeme->id)}}">
                                <div class="pt-recipe-img set-bg" data-setbg="{{ asset('') }}{{ $tudemeTopLeftTopSection->tudeme->cover_image->pixels500 }}">
                                    <i class="fa fa-plus"></i>
                                </div>
                            </a>
                            <div class="pt-recipe-text">
                                <a href="{{route('tudeme.recipe',$tudemeTopLeftTopSection->tudeme->id)}}"><h4>{{$tudemeTopLeftTopSection->tudeme->name}}</h4></a>
                            </div>
                        </div>
                        <div class="pt-recipe-item">
                            <a href="{{route('tudeme.recipe',$tudemeBottomLeftTopSection->tudeme->id)}}">
                                <div class="pt-recipe-img set-bg" data-setbg="{{ asset('') }}{{ $tudemeBottomLeftTopSection->tudeme->cover_image->pixels500 }}">
                                    <i class="fa fa-plus"></i>
                                </div>
                            </a>
                            <div class="pt-recipe-text">
                                <a href="{{route('tudeme.recipe',$tudemeBottomLeftTopSection->tudeme->id)}}"><h4>{{$tudemeBottomLeftTopSection->tudeme->name}}</h4></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 order-lg-3">
                        <div class="pt-recipe-item">
                            <a href="{{route('tudeme.recipe',$tudemeTopRightTopSection->tudeme->id)}}">
                                <div class="pt-recipe-img set-bg" data-setbg="{{ asset('') }}{{ $tudemeTopRightTopSection->tudeme->cover_image->pixels500 }}">
                                    <i class="fa fa-plus"></i>
                                </div>
                            </a>
                            <div class="pt-recipe-text">
                                <a href="{{route('tudeme.recipe',$tudemeTopRightTopSection->tudeme->id)}}"><h4>{{$tudemeTopRightTopSection->tudeme->name}}</h4></a>
                            </div>
                        </div>
                        <div class="pt-recipe-item">
                            <a href="{{route('tudeme.recipe',$tudemeBottomRightTopSection->tudeme->id)}}">
                                <div class="pt-recipe-img set-bg" data-setbg="{{ asset('') }}{{ $tudemeBottomRightTopSection->tudeme->cover_image->pixels500 }}">
                                    <i class="fa fa-plus"></i>
                                </div>
                            </a>
                            <div class="pt-recipe-text">
                                <a href="{{route('tudeme.recipe',$tudemeBottomRightTopSection->tudeme->id)}}"><h4>{{$tudemeBottomRightTopSection->tudeme->name}}</h4></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
    <br>
    <br>
    <br>
    <br>
    @endif

    <!-- Page Top Recipe Section End -->

    <!-- Top Recipe Section Begin -->
    <section class="top-recipe spad">
        <div class="section-title">
            <h5>Top Recipes this Week</h5>
        </div>
        <div class="container po-relative">
            <div class="plus-icon">
                <i class="fa fa-plus"></i>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="top-recipe-item large-item">
                        <a href="{{route('tudeme.recipe',$tudemeTopFeaturedRecipie->tudeme->id)}}">
                            <div class="top-recipe-img set-bg" data-setbg="{{ asset('') }}{{ $tudemeTopFeaturedRecipie->tudeme->cover_image->pixels500 }}">
                                <i class="fa fa-plus"></i>
                            </div>
                        </a>
                        <div class="top-recipe-text">
                            <div class="cat-name">Desert</div>
                            <a href="{{route('tudeme.recipe',$tudemeTopFeaturedRecipie->tudeme->id)}}">
                                <h4>{{$tudemeTopFeaturedRecipie->tudeme->name}}</h4>
                            </a>
                            <p>{{$tudemeTopFeaturedRecipie->tudeme->description}}.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    @foreach($tudemeTopRecipies as $tudemeTopRecipie)
                        <div class="top-recipe-item">
                            <div class="row">
                                <div class="col-sm-4">
                                    <a href="{{route('tudeme.recipe',$tudemeTopRecipie->tudeme->id)}}">
                                        <div class="top-recipe-img set-bg" data-setbg="{{ asset('') }}{{ $tudemeTopRecipie->tudeme->cover_image->pixels500 }}">
                                            <i class="fa fa-plus"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-8">
                                    <div class="top-recipe-text">
                                        <div class="cat-name">Vegan</div>
                                        <a href="{{route('tudeme.recipe',$tudemeTopRecipie->tudeme->id)}}">
                                            <h4>{{$tudemeTopRecipie->tudeme->name}}</h4>
                                        </a>
                                        <p>{{$tudemeTopRecipie->tudeme->description}}.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Top Recipe Section End -->

    <!-- Categories Filter Section Begin -->
    <div class="categories-filter-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="filter-item">
                        <ul>
                            <li class="active" data-filter="*">Vegetarian</li>
                            <li data-filter=".mostpopular">Most popular</li>
                            <li data-filter=".meatlover">Meat Lover</li>
                            <li data-filter=".glutenfree">Gluten Free</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="cf-filter" id="category-filter">
                <div class="cf-item mix all mostpopular">
                    <div class="cf-item-pic">
                        <img src="{{ asset('themes/tudeme/yummy') }}/img/cate-filter/cate-filter-1.jpg" alt="">
                    </div>
                    <div class="cf-item-text">
                        <h5>Sunday Brunch: Spaghetti and Eggs Recipe</h5>
                    </div>
                </div>
                <div class="cf-item mix all mostpopular">
                    <div class="cf-item-pic">
                        <img src="{{ asset('themes/tudeme/yummy') }}/img/cate-filter/cate-filter-2.jpg" alt="">
                    </div>
                    <div class="cf-item-text">
                        <h5>Sunday Brunch: Spaghetti and Eggs Recipe</h5>
                    </div>
                </div>
                <div class="cf-item mix all meatlover mostpopular">
                    <div class="cf-item-pic">
                        <img src="{{ asset('themes/tudeme/yummy') }}/img/cate-filter/cate-filter-3.jpg" alt="">
                    </div>
                    <div class="cf-item-text">
                        <h5>Sunday Brunch: Spaghetti and Eggs Recipe</h5>
                    </div>
                </div>
                <div class="cf-item mix all meatlover">
                    <div class="cf-item-pic glutenfree">
                        <img src="{{ asset('themes/tudeme/yummy') }}/img/cate-filter/cate-filter-4.jpg" alt="">
                    </div>
                    <div class="cf-item-text">
                        <h5>Sunday Brunch: Spaghetti and Eggs Recipe</h5>
                    </div>
                </div>
                <div class="cf-item mix all meatlover glutenfree">
                    <div class="cf-item-pic">
                        <img src="{{ asset('themes/tudeme/yummy') }}/img/cate-filter/cate-filter-5.jpg" alt="">
                    </div>
                    <div class="cf-item-text">
                        <h5>Sunday Brunch: Spaghetti and Eggs Recipe</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories Filter Section End -->

    <!-- Feature Recipe Section Begin -->
    <section class="feature-recipe">
        <div class="section-title">
            <h5>Featured Recipes</h5>
        </div>
        <div class="container po-relative">
            <div class="plus-icon">
                <i class="fa fa-plus"></i>
            </div>
            <div class="row">

                @foreach ($tudemeFeaturedRecipies as $tudemeFeaturedRecipie)
                    <div class="col-lg-6">
                        <div class="fr-item">
                            <a href="{{route('tudeme.recipe',$tudemeFeaturedRecipie->tudeme->id)}}">
                                <div class="fr-item-img">
                                    <img src="{{ asset('') }}{{ $tudemeFeaturedRecipie->tudeme->icon->pixels500 }}" alt="">
                                </div>
                            </a>
                            <div class="fr-item-text">
                                <a href="{{route('tudeme.recipe',$tudemeFeaturedRecipie->tudeme->id)}}"><h4>{{$tudemeFeaturedRecipie->tudeme->name}}</h4></a>
                                <p>{{$tudemeFeaturedRecipie->tudeme->name}}.</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Feature Recipe Section End -->

@endsection
