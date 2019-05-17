@extends('layouts.app', ['class' => 'bg-white'])

@section('content')
<div class="header bg-gradient-secondary py-12 py-lg-12">
        <div class="" style="height: 50%">
            <div class="header-body mt-12 mb-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="bd-example">
                            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('images') }}/{{ $project->thumbnail }}" class="d-block w-100" style="height: 70%">
                                    <div class="carousel-caption d-none d-md-block bg-white">
                                        <h2 class="text-black">{{ $project->name }}</h5>
                                            <br>
                                            <ul class="list-group list-group-flush">
                                                <div class="row">
                                                    <div class="col-md-3 stat">
                                                        @if(count($project->project_investments) > 0)
                                                            @if($project->project_investments->sum('amount') > 1000000)
                                                                <div class="num">{{ $project->project_investments->sum('amount') }}
                                                                    <span class="abbrev-number">M</span>
                                                                </div>
                                                            @else
                                                                <div class="num">${{ $project->project_investments->sum('amount') }}
                                                                    <span class="abbrev-number">K</span>
                                                                </div>
                                                            @endif
                                                        @else
                                                            <div class="num">$0
                                                                <span class="abbrev-number">M</span>
                                                            </div>
                                                        @endif
                                                        <span class="span">Raised</span>
                                                    </div>
                                                    <div class="col-md-3 stat">
                                                        @if(count($project->project_investments) > 0)
                                                            <div class="num">{{ $project->project_investments->count('amount') }}
                                                                @if($project->project_investments->count('amount') > 1000)
                                                                    <span class="abbrev-number">K</span>
                                                                @else
                                                                    <span class="abbrev-number"></span>
                                                                @endif
                                                            </div>
                                                        @else
                                                            <div class="num">0
                                                                <span class="abbrev-number"></span>
                                                            </div>
                                                        @endif
                                                        <span class="span">Investors</span>
                                                    </div>
                                                    <div class="col-md-3 stat">
                                                        <div class="num">${{ $project->minimum_investment }}</div>
                                                        <span class="span">Min Investment</span>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <a data-toggle="modal" data-target="#exampleModal">
                                                            <div class="num"><i class="fa fa-play"></i></div>
                                                            <span class="span">Play Video</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </ul> 
                                        <a href="/login" type="button" class="btn btn-success">Invest Now</a>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Modal -->
        <div class="row">
            <div class="col-md-12">
                <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-body">
                        <iframe width="1000" height="700" src="{{ $project->video }} frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('project-info')
<section class="py-7 section-nucleo-icons bg-white overflow-hidden">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <hr>
                    <h2 class="display-3 text-center">{{ $project->name }}</h2>
                <hr>
                <div class="row">
                    <div class="col-lg-8">
                        <p class="lead">
                            {{ $project->description }}
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <p class="lead">
                                <b>DBG Highlights & Vision Driven By New Management Team</b>
                                <br>
                                <ul>
                                    <li>We hope to build a portfolio of 5 to 10 lifestyle brands each with the potential to generate $50 to $100mm in annual revenue</li>
                                    <li>We own two brands currently and we are aiming for a possible acquisition in 2019</li>
                                    <li>Our goal is to grow revenues to $250mm+ in 5 years or more</li>
                                    <li>Actively seeking liquidity options once this Reg A offering closes, including the AIM or OTC</li>
                                    <li>Liquidity would mean investors would be able to buy and sell their shares </li>
                                </ul>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('equity')
<section class="py-7 section-nucleo-icons bg-white overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <!-- Avatar -->
                            </div>
                            <div class="col ml--2">
                                <h1 class="mb-0">Price Per Share</h1>
                                <h2 class="text-md text-muted mb-0">{{ $project->return_rate }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <!-- Avatar -->
                            </div>
                            <div class="col ml--2">
                                <h1 class="mb-0">Minimum Investment</h1>
                                <h2 class="text-md text-muted mb-0">${{ $project->minimum_investment }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <!-- Avatar -->
                            </div>
                            <div class="col ml--2">
                                <h1 class="mb-0">Valuation</h1>
                                <h2 class="text-md text-muted mb-0">{{ sprintf('$ %s', number_format($project->total_budget, 0)) }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('milestones')
    
@endsection

@section('testimonials')
<section class="py-7 section-nucleo-icons bg-white overflow-hidden">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-gradient-default">
                    <div class="card-body">
                        <h3 class="card-title text-white">Testimonials</h3>
                        <blockquote class="blockquote text-white mb-0">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                            <footer class="blockquote-footer text-danger">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-gradient-default">
                    <div class="card-body">
                        <h3 class="card-title text-white">Testimonials</h3>
                        <blockquote class="blockquote text-white mb-0">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                            <footer class="blockquote-footer text-danger">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-gradient-default">
                    <div class="card-body">
                        <h3 class="card-title text-white">Testimonials</h3>
                        <blockquote class="blockquote text-white mb-0">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                            <footer class="blockquote-footer text-danger">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('team')
    <section class="py-7 section-nucleo-icons bg-white overflow-hidden">
        <div class="container">
            @if(count($project->project_teams) > 0)
                <h2 class="display-3 text-center">Meet The Team</h2>
            @endif
            <div class="row">
                @foreach ($project->project_teams as $team)
                     <div class="col-lg-4">
                        <div class="card">
                            <!-- Card body -->
                            <div class="card-body">
                                <a href="#!">
                                    <img src="{{ asset('images') }}/{{ $team->image }}" class="rounded-circle img-center img-fluid shadow shadow-lg--hover" style="width: 140px; height: 130px">
                                </a>
                                <div class="pt-4 text-center">
                                    <h5 class="h3 title">
                                        <span class="d-block mb-1">{{ $team->name }}</span>
                                        <small class="h4 font-weight-light text-muted">{{ $team->position }}</small>
                                    </h5>
                                    <div class="mt-3">
                                        <a href="#" class="btn btn-twitter btn-icon-only rounded-circle">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a href="#" class="btn btn-facebook btn-icon-only rounded-circle">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                        <a href="#" class="btn btn-dribbble btn-icon-only rounded-circle">
                                            <i class="fab fa-dribbble"></i>
                                        </a>
                                    </div>
                                </div>
                            
                            </div>       
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('project-images')
    
@endsection

@section('updates')
<section class="py-7 section-nucleo-icons bg-white overflow-hidden">
    <div class="container">
        @if(count($project->project_updates) > 0)
            <h2>PROJECT UPDATES</h4>
        @endif
        <div class="row updates">
            @foreach($project->project_updates as $updates)
                <div class="card" style="margin-bottom:4%">
                    <div class="card-body">
                        <h3 class="card-title text-center">{{ $updates->name }}</h3>
                        <p class="card-text">{{ $updates->description }}</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

@section('comments')
<section class="py-7 section-nucleo-icons bg-white overflow-hidden">
    <div class="container">
        <h2>PROJECT COMMENTS</h4>
        <div id="disqus_thread"></div>    
    </div>
</section>
@endsection