@extends('landing.tudeme.layouts.app')

@section('title', 'Blog')

@section('body')

    <!-- Recipe Section Begin -->
    <section class="recipe-section spad">
        <div class="container">
            <div class="row">

                @foreach ($journals as $journal)
                    <div class="col-lg-4 col-sm-6">
                        <div class="recipe-item">
                            <a href="{{route('tudeme.blog.show',$journal->id)}}"><img src="{{ asset('') }}{{ $journal->cover_image->pixels750 }}" alt=""></a>
                            <div class="ri-text">
                                <div class="cat-name">Desert</div>
                                <a href="{{route('tudeme.blog.show',$journal->id)}}">
                                    <h4>{{$journal->name}}</h4>
                                </a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.</p>
                            </div>
                        </div>
                    </div>
                @endforeach

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
            <div class="row">
                {{ $journals->links() }}
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
