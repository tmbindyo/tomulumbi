@extends('layouts.app', ['class' => 'bg-white'])

@section('content')
    <div class="header bg-gradient-secondary py-12 py-lg-12">
        <div class="" style="height: 50%">
            <div class="header-body mt-12 mb-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="bd-example">
                            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('images') }}/5.jpg" class="d-block w-100" style="height: 70%">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>First slide label</h5>
                                        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('images') }}/1.jpg"class="d-block w-100">
                                    <div class="carousel-caption d-none d-md-block">
                                    <h5>Second slide label</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('images') }}/3.jpg"class="d-block w-100">
                                    <div class="carousel-caption d-none d-md-block">
                                    <h5>Third slide label</h5>
                                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                                    </div>
                                </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        {{-- <h1 class="text-white">{{ __('Welcome to Argon .') }}</h1> --}}
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div> --}}
    </div>

    {{-- <div class="container mt--10 pb-5"></div> --}}
@endsection

@section('banner')
<section class="py-7 section-nucleo-icons bg-white overflow-hidden">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="display-3">Who are we?</h2>
                <p class="lead">
                        Be the first to hear about our investment opportunities when they launch
                </p>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8 text-center">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter Email Address" aria-label="Enter Email Address" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                <button class="btn btn-md btn-primary">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
                <div class="btn-wrapper">
                    <a href="/login" class="btn btn-primary">Raise Capital</a>
                    <a href="/login" target="_blank" class="btn btn-default mt-3 mt-md-0">Start Investing</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('projects')
<section class="py-7 section-nucleo-icons bg-white overflow-hidden">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <h2 class="display-3">Current Offerings</h2>
                <br>
                <div class="row">
                    @foreach ($projects as $project)
                        <div class="col-lg-4">
                            <div class="card" style="margin-bottom:10%">
                                <img class="card-img-top" src="{{ asset('images') }}{{ $project->thumbnail }}" alt="Offering Image">                    
                                        <!-- Card body -->
                                <div class="card-body">
                                    <h3 class="card-title mb-3">{{ $project->name }}</h3>
                                    <p class="card-text mb-4">
                                            {{ str_limit($project->description, $limit = 100, $end = '...') }}
                                    </p>
                                </div>
                                <hr>
                                <div class="progress-wrapper">
                                    <div class="progress">
                                        @if(count($project->project_investments) > 0)
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="{{ $project->project_investments->sum('amount')/$project->total_budget * 100  }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $project->project_investments->sum('amount')/$project->total_budget * 100  }}%;"></div>
                                        @else
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <ul class="list-group list-group-flush">
                                    <div class="row">
                                        <div class="col-md-3 stat">
                                            @if(count($project->project_investments) > 0)
                                                @if($project->project_investments->sum('amount') > 1000000)
                                                    <div class="num">{{ $project->project_investments->sum('amount') }}
                                                        <span class="abbrev-number">M</span>
                                                    </div>
                                                @else
                                                    <div class="num">${{ $project->project_investments->sum('amount')/1000 }}
                                                        <span class="abbrev-number">K</span>
                                                    </div>
                                                @endif
                                            @else
                                                <div class="num">$0
                                                    <span class="abbrev-number">M</span>
                                                </div>
                                            @endif
                                            <span>Raised</span>
                                        </div>
                                        <div class="col-md-4 stat">
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
                                            <span>Investors</span>
                                        </div>
                                        <div class="col-md-5" style="padding-right:5%">
                                            <div class="num">${{ $project->minimum_investment }}</div>
                                            <span>Min Investment</span>
                                        </div>
                                    </div>
                                    <li class="list-group-item"><a href="{{ route('offering', $project->id) }}">View Offering</a></li>
                                </ul>      
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
