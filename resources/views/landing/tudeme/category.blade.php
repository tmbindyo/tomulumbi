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
            <div class="row">
                <div class="col-lg-12">
                    <div class="recipe-pagination">
                        <a href="#" class="active">01</a>
                        <a href="#">02</a>
                        <a href="#">03</a>
                        <a href="#">04</a>
                        <a href="#">Next</a>
                    </div>
                </div>
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
                    <div class="cfr-item">
                        <div class="cfr-item-img set-bg" data-setbg="img/cat-feature/big-1.jpg">
                            <i class="fa fa-plus"></i>
                        </div>
                        <div class="cfr-item-text">
                            <div class="cat-name">Vegan</div>
                            <a href="#">
                                <h4>One Pot Weeknight Lasagna Soup Recipe</h4>
                            </a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="cfr-item">
                        <div class="cfr-item-img set-bg" data-setbg="img/cat-feature/big-2.jpg">
                            <i class="fa fa-plus"></i>
                        </div>
                        <div class="cfr-item-text">
                            <div class="cat-name">Meat Lover</div>
                            <a href="#">
                                <h4>Veggie soup with Mushrooms</h4>
                            </a>
                            <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua. Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                    <div class="cfr-item">
                        <div class="cfr-item-img set-bg" data-setbg="img/cat-feature/big-3.jpg">
                            <i class="fa fa-plus"></i>
                        </div>
                        <div class="cfr-item-text">
                            <div class="cat-name">Desert</div>
                            <a href="#">
                                <h4>Caramel Ice Cream with Berries</h4>
                            </a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="cfr-item">
                        <div class="cfr-item-img set-bg" data-setbg="img/cat-feature/big-4.jpg">
                            <i class="fa fa-plus"></i>
                        </div>
                        <div class="cfr-item-text">
                            <div class="cat-name">Desert</div>
                            <a href="#">
                                <h4>Freash Octopuse with lime juice</h4>
                            </a>
                            <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit
                                amet, consectetur adipiscing.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <div class="cfr-small-item">
                        <a href="#"><img src="{{ asset('themes/tudeme/yummy') }}/img/cat-feature/small-1.jpg" alt=""></a>
                        <div class="cfr-small-text">
                            <div class="cat-name">Vegan</div>
                            <h6>One Pot Weeknight Lasagna Soup Recipe</h6>
                        </div>
                    </div>
                    <div class="cfr-small-item">
                        <a href="#"><img src="{{ asset('themes/tudeme/yummy') }}/img/cat-feature/small-2.jpg" alt=""></a>
                        <div class="cfr-small-text">
                            <div class="cat-name">Vegan</div>
                            <h6>Lava Cake with a Tone of Chocolate</h6>
                        </div>
                    </div>
                    <div class="cfr-small-item">
                        <a href="#"><img src="{{ asset('themes/tudeme/yummy') }}/img/cat-feature/small-3.jpg" alt=""></a>
                        <div class="cfr-small-text">
                            <div class="cat-name">Vegan</div>
                            <h6>One Pot Weeknight Lasagna Soup Recipe</h6>
                        </div>
                    </div>
                    <div class="cfr-small-item">
                        <a href="#"><img src="{{ asset('themes/tudeme/yummy') }}/img/cat-feature/small-4.jpg" alt=""></a>
                        <div class="cfr-small-text">
                            <div class="cat-name">Vegan</div>
                            <h6>Smoked Salmon mini Sandwiches with Onion</h6>
                        </div>
                    </div>
                    <div class="cfr-small-item">
                        <a href="#"><img src="{{ asset('themes/tudeme/yummy') }}/img/cat-feature/small-5.jpg" alt=""></a>
                        <div class="cfr-small-text">
                            <div class="cat-name">Vegan</div>
                            <h6>Asparagus with Pork Loin and Vegetables</h6>
                        </div>
                    </div>
                    <div class="cfr-small-item">
                        <a href="#"><img src="{{ asset('themes/tudeme/yummy') }}/img/cat-feature/small-6.jpg" alt=""></a>
                        <div class="cfr-small-text">
                            <div class="cat-name">Vegan</div>
                            <h6>Dry Cookies with Corn</h6>
                        </div>
                    </div>
                    <div class="cfr-small-item">
                        <a href="#"><img src="{{ asset('themes/tudeme/yummy') }}/img/cat-feature/small-7.jpg" alt=""></a>
                        <div class="cfr-small-text">
                            <div class="cat-name">Vegan</div>
                            <h6>Italian Tiramisu with Coffe</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Feature Recipe Section End -->

@endsection
