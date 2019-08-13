<!DOCTYPE HTML>
@extends('client_proof.landing.layouts.app')

@section('title', 'Client Proof')

@section('css')
    <!--[if lte IE 8]><script src="{{ asset('client_proof/phantom') }}/assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="{{ asset('client_proof/phantom') }}/assets/css/main.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="{{ asset('client_proof/phantom') }}/assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="{{ asset('client_proof/phantom') }}/assets/css/ie8.css" />
    <![endif]-->

@endsection



@section('header')
    {{--todo try dynamic headers--}}
    <header>
{{--        <h1><!--[-->This is Phantom, a free, fully responsive site<!--]--><br />--}}
{{--            <!--[-->template designed by <a href="http://html5up.net">HTML5 UP</a>.<!--]--></h1>--}}
{{--        <p>Etiam quis viverra lorem, in semper lorem. Sed nisl arcu euismod sit amet nisi euismod sed cursus arcu elementum ipsum arcu vivamus quis venenatis orci lorem ipsum et magna feugiat veroeros aliquam. Lorem ipsum dolor sit amet nullam dolore.</p>--}}
    </header>
@endsection
@section('content')

    <section class="tiles">
        @foreach($albums as $album)
            <article class="style1">
                <span class="image">
                    @if(empty($album->cover_image->small_thumbnail))
                        <img src="{{ asset('client_proof/phantom') }}/images/pic01.jpg" alt="" />
                    @elseif(isset($album->cover_image->small_thumbnail))
                        <img src="{{ asset('') }}{{ $album->cover_image->small_thumbnail }}" alt="" />
                    @endif
                </span>
                <a href="{{route('client.proof', $album->id)}}">
                    <h2>{{$album->name}}</h2>
                    <div class="content">
{{--                        <p>Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.</p>--}}
                        <h5>{{$album->date}}</h5>
                    </div>
                </a>
            </article>
        @endforeach
    </section>
@endsection

@section('js')

    <!-- Scripts -->
    <script src="{{ asset('client_proof/phantom') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('client_proof/phantom') }}/assets/js/skel.min.js"></script>
    <script src="{{ asset('client_proof/phantom') }}/assets/js/util.js"></script>
    <!--[if lte IE 8]><script src="{{ asset('client_proof/phantom') }}/assets/js/ie/respond.min.js"></script><![endif]-->
    <script src="{{ asset('client_proof/phantom') }}/assets/js/main.js"></script>

@endsection
