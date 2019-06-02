<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('page-title')</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ env('APP_URL') }}/css/style.css">
</head>

<body class="mainbg">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top bg-transparent">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="{{ env('APP_URL') }}/images/logo.png" class="logo" alt=""/></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/page/beliebt">Beliebt</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/page/uber-uns">Über uns</a>
                </li>
            </ul>
        </div>
        <span class="navbar-text">
            <i class="fa fa-search"></i>
        </span>
    </div>
</nav>

<div class="container">

    <div class="row">
        <div class="col-md-8 mt-4">
        @yield('content')
        </div>
        <div class="col-md-4">
            <div class="card my-4 rounded-corners">
                <div class="card-body">
                    <h6><strong>Beliebte Träume</strong></h6>
                    <ul class="list-unstyled">
                        @isset($populars)
                            @foreach($populars as $popular)
                                <li><a href="/dream/{{$popular->slug}}">{{$popular->title}}</a></li>
                            @endforeach
                        @endisset
                    </ul>
                </div>
            </div>
            <div class="card my-4 rounded-corners">
                <div class="card-body">
                    <h6><strong>Zufällige Traume</strong></h6>
                    <ul class="list-unstyled">
                        @isset($randoms)
                            @foreach($randoms as $random)
                                <li><a href="/dream/{{$random->slug}}">{{$random->title}}</a></li>
                            @endforeach
                        @endisset
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /.container -->

<!-- footer -->
<nav class="navbar navbar-expand-lg navbar-light bg-light footer">
    <div class="container">
        <a class="navbar-brand" href="/">Copyright habegetraumt.de</a>
        <a class="navbar-brand" href="/page/traumarchiv">Traumarchiv</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/page/impressum">Impressum
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
@yield('js')

</body>

</html>
