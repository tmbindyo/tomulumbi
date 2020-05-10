<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>tomulumbi | {{$album->name}}</title>

    <link href="{{ asset('inspinia') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/animate.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/css/style.css" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('') }}/tomulumbi_logo.ico" type="image/x-icon">

    <style>
        .text-background {
            position: relative;
            max-width: 800px; /* Maximum width */
            margin: 0 auto; /* Center it */
        }

        .text-background .content {
            position: absolute; /* Position the background text */
            bottom: 0; /* At the bottom. Use top:0 to append it to the top */
            background: rgb(0, 0, 0); /* Fallback color */
            background: rgba(0, 0, 0, 0.5); /* Black background with 0.5 opacity */
            color: #f1f1f1; /* Grey text */
            width: 100%; /* Full width */
            padding: 20px; /* Some padding */
        }
    </style>
</head>

<body class="gray-bg" background=" @if(empty($album->cover_image->pixels1500)) {{ asset('client_proof/story') }}/images/banner.jpg @elseif(isset($album->cover_image->pixels1500)) {{ asset('') }}{{ $album->cover_image->pixels1500 }}@endif">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <h2>{{$album->name}}</h2>
        @if($album->password)
            <p class="text-background">
                This album is password protected and thus access is restricted.
                Please input your email, and the password that was provided to view.
            </p>
        @else
            <p class="text-background">
                Please input your email.
            </p>
        @endif
        <br>
        @if (session('warning'))
            <div class="alert alert-warning alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>Warning!</strong> {{ session('warning') }}
            </div>
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Danger!</strong> {{ session('danger') }}
                </div>
            @endforeach
        @endif

{{--        <form class="m-t" role="form" action="index.html">--}}
        <form method="post" action="{{ route('personal.album.access.check',$album->id) }}" autocomplete="off" class="form-horizontal form-label-left">
            @csrf
            <div class="form-group">
                <input type="email" name="email" class="form-control input-lg" placeholder="Email" required="">
            </div>
            @if($album->password)
                <div class="form-group">
                    <input type="password" name="password" class="form-control input-lg" placeholder="Proof Password" required="">
                </div>
            @endif
            <button type="submit" class="btn btn-primary btn-block btn-lg">ENTER</button>
        </form>
        <br>
        <a href="{{route('personal.albums')}}" class="btn btn-success btn-block btn-lg">Back</a>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{ asset('inspinia') }}/js/jquery-2.1.1.js"></script>
<script src="{{ asset('inspinia') }}/js/bootstrap.min.js"></script>

</body>

</html>
