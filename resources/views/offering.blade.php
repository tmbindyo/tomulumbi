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
                                    <img src="{{ asset('images') }}/single.jpg" class="d-block w-100" style="height: 70%">
                                    <div class="carousel-caption d-none d-md-block bg-white">
                                        <h2 class="text-black">The future of investing is here.</h5>
                                            <br>
                                            <ul class="list-group list-group-flush">
                                                    <div class="row">
                                                        <div class="col-md-3 stat">
                                                            <div class="num">$3.4
                                                                <span class="abbrev-number">M</span>
                                                            </div>
                                                            <span class="span">Raised</span>
                                                        </div>
                                                        <div class="col-md-3 stat">
                                                            <div class="num">3.4
                                                                <span class="abbrev-number">K</span>
                                                            </div>
                                                            <span class="span">Investors</span>
                                                        </div>
                                                        <div class="col-md-3 stat">
                                                            <div class="num">$500</div>
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
                                        <button type="button" class="btn btn-success">Invest Now</button>
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
                        <iframe width="1000" height="700" src="https://www.youtube.com/embed/7ZeJRLsYRfg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
            <div class="col-lg-8 text-center">
                <hr>
                    <h2 class="display-3">DIGITAL BRANDS GROUP: A PORTFOLIO OF HIGH GROWTH DIGITAL FIRST APPAREL BRANDS</h2>
                <hr>
                <div class="row">
                    <div class="col-lg-8">
                        <p class="lead">
                                Our portfolio model significantly increases revenues, decreases operating expenses, and establishes brand longevity.
                                Our strategy reflects what traditional luxury holding companies have done for decades. But instead of wholesale first, we modernized the model to reflect how consumers discover and shop today, which is digital-first. 
                                By eliminating administrative and operational responsibilities for our brands, we stimulate creativity, innovation, and a maniacal commitment to the product and customer experience.  This in turn drives emotional customer connections and brand longevity
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
                                <h2 class="text-md text-muted mb-0">7.05%</h2>
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
                                <h2 class="text-md text-muted mb-0">$504.89</h2>
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
                                <h2 class="text-md text-muted mb-0">$119M</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
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
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <!-- Card body -->
                        <div class="card-body">
                            <a href="#!">
                                <img src="{{ asset('images') }}/2.jpg" class="rounded-circle img-center img-fluid shadow shadow-lg--hover" style="width: 140px; height: 130px">
                            </a>
                            <div class="pt-4 text-center">
                                <h5 class="h3 title">
                                    <span class="d-block mb-1">Antony Mwathi</span>
                                    <small class="h4 font-weight-light text-muted">Full Stack Developer</small>
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
                <div class="col-lg-4">
                    <div class="card">
                        <!-- Card body -->
                        <div class="card-body">
                            <a href="#!">
                                <img src="{{ asset('images') }}/2.jpg" class="rounded-circle img-center img-fluid shadow shadow-lg--hover" style="width: 140px; height: 130px">
                            </a>
                            <div class="pt-4 text-center">
                                <h5 class="h3 title">
                                    <span class="d-block mb-1">Thomas Mulumbi</span>
                                    <small class="h4 font-weight-light text-muted">Project Manager</small>
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
                <div class="col-lg-4">
                    <div class="card">
                        <!-- Card body -->
                        <div class="card-body">
                            <a href="#!">
                                <img src="{{ asset('images') }}/2.jpg" class="rounded-circle img-center img-fluid shadow shadow-lg--hover" style="width: 140px; height: 130px">
                            </a>
                            <div class="pt-4 text-center">
                                <h5 class="h3 title">
                                    <span class="d-block mb-1">Micheal Wanyoike</span>
                                    <small class="h4 font-weight-light text-muted">Product Lead</small>
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
            </div>
        </div>
    </section>
@endsection

@section('project-images')
    
@endsection

@section('updates')
<section class="py-7 section-nucleo-icons bg-white overflow-hidden">
    <div class="container">
        <h2>PROJECT UPDATES</h4>
        <div class="row updates">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Notice of Funds Disbursement</h5>
                    <p class="card-text">As you might know, Fusion Farms has exceeded its minimum funding goal. When a company reaches its minimum on StartEngine, it's about to begin withdrawing funds. If you invested in Fusion Farms be on the lookout for an email that describes more about the disbursement process.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
        <div class="row updates">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Notice of Funds Disbursement</h5>
                    <p class="card-text">As you might know, Fusion Farms has exceeded its minimum funding goal. When a company reaches its minimum on StartEngine, it's about to begin withdrawing funds. If you invested in Fusion Farms be on the lookout for an email that describes more about the disbursement process.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
        <div class="row updates">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Notice of Funds Disbursement</h5>
                    <p class="card-text">As you might know, Fusion Farms has exceeded its minimum funding goal. When a company reaches its minimum on StartEngine, it's about to begin withdrawing funds. If you invested in Fusion Farms be on the lookout for an email that describes more about the disbursement process.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
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