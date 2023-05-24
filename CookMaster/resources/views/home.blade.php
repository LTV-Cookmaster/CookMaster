<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preload" href="{{ asset('delivery.jpg') }}" as="image">
    <link rel="preload" href="{{ asset('menu.jpg') }}" as="image">
    <link rel="preload" href="{{ asset('profcook.jpg') }}" as="image">
    <link rel="preload" href="{{ asset('workshop.jpg') }}" as="image">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<body>
@include('layouts.navbar')

<div class="container-fluid">
    <div class="container">
        <h2 class="text-center">Your next workshops</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card mt-4">
                    <div class="card-body">
                        <a href="#">
                        <img src="{{ asset('logo.png') }}" alt="hello" height="200" width="200">
                        </a>
                    </div>
                    <div class="card-body">
                        <span>hello</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mt-4">
                    <div class="card-header">
                        <a href="#">
                            <img src="{{ asset('logo.png') }}" alt="hello" height="200" width="200">
                        </a>
                    </div>
                    <div class="card-body">
                        <span>hello2</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mt-4">
                    <div class="card-header">
                        <a href="#">
                            <img src="{{ asset('logo.png') }}" alt="hello" height="200" width="200">
                        </a>
                    </div>
                    <div class="card-body">
                        <span>hello3</span>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="text-center">Your next events</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card mt-4">
                    <div class="card-header">
                        <a href="#">
                            <img src="{{ asset('logo.png') }}" alt="hello" height="200" width="200">
                        </a>
                    </div>
                    <div class="card-body">
                        <span>hello</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mt-4">
                    <div class="card-header">
                        <a href="#">
                            <img src="{{ asset('logo.png') }}" alt="hello" height="200" width="200">
                        </a>
                    </div>
                    <div class="card-body">
                        <span>hello2</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mt-4">
                    <div class="card-header">
                        <a href="#">
                            <img src="{{ asset('logo.png') }}" alt="hello" height="200" width="200">
                        </a>
                    </div>
                    <div class="card-body">
                        <span>hello3</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
</body>
</html>
