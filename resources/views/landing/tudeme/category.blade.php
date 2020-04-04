@extends('landing.tudeme.layouts.app')

@section('title', 'Category')

@section('body')

    <!-- Recipe Section Begin -->
    <section class="recipe-section spad">
        <div class="container">
            <div class="row">

                @foreach ($tudemes as $tudeme)
                    <div class="col-lg-4 col-sm-6">
                        <div class="recipe-item">
                            <a href="{{route('tudeme.recipe',$tudeme->id)}}"><img src="{{ asset('') }}{{ $tudeme->icon->pixels500 }}" alt=""></a>
                            <div class="ri-text">
                                @foreach($tudeme->tudeme_tudeme_types->slice(0, 3) as $tudeme_tudeme_type)
                                    <div class="cat-name">{{$tudeme_tudeme_type->tudeme_type->name}}</div>
                                @endforeach
                                <a href="{{route('tudeme.recipe',$tudeme->id)}}">
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
