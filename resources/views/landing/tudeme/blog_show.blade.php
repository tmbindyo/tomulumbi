@extends('landing.tudeme.layouts.app')

@section('title', $journal->name)

@section('body')

    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="blog-pic">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <img width="1766px" src="{{ asset('') }}{{ $journal->cover_image->pixels2500 }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-text">
                        <div class="blog-title">
                            <span>{{$journal->created_at}}</span>
                            <h2>{{$journal->name}}</h2>
                            <ul class="tags">

                                @foreach ($journal->journal_labels as $journal_label)
                                    <li>{{$journal_label->label->name}}</li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="blog-desc">
                            {!!$journal->body!!}
                            <div class="blog-quote">
                                <i class="fa fa-quote-left"></i>
                                <p>{{$journal->description}}.</p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

    <!-- Similar Recipe Section Begin -->
    <section class="similar-recipe spad">
        <div class="container">
            <div class="row">
                @foreach($journals as $journal)
                    <div class="col-lg-3 col-md-6">
                        <div class="similar-item">
                            <a href="#"><img src="{{ asset('') }}{{ $journal->cover_image->pixels100 }}" alt=""></a>
                            <div class="similar-text">
                                @foreach($journal->journal_labels->slice(0, 1) as $journal_label)
                                    <div class="cat-name">{{$journal_label->label->name}}</div>
                                @endforeach
                                <h6>{{$journal->name}}</h6>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Similar Recipe Section End -->

@endsection
