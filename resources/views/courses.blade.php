<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@section('title' , 'Courses')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<body>
@include('layouts.navbar')

<div class="container-fluid">
    <div class="container">
        <h2 class="text-center mt-4" style="color:#1C6513;">{{__('Salty')}}</h2>
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="#" class="shadow-none text-dark">
                    <div class="card mt-5 w-100 border-0 shadow-none rounded-3" style="width: 18rem;">
                        <img src="{{ asset('food.jpg') }}" class="card-img-top shadow-sm rounded-4" alt="...">
                        <div class="card-body d-flex">
                            <div class="row">
                                <div class="d-flex">
                                    <p class="card-text text-break">{{ __('Pasta') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="#" class="shadow-none text-dark">
                    <div class="card mt-5 w-100 border-0 shadow-none rounded-3" style="width: 18rem;">
                        <img src="{{ asset('food.jpg') }}" class="card-img-top shadow-sm rounded-4" alt="...">
                        <div class="card-body d-flex">
                            <div class="row">
                                <div class="d-flex">
                                    <p class="card-text text-break">{{ __('Meat') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="#" class="shadow-none text-dark">
                    <div class="card mt-5 w-100 border-0 shadow-none rounded-3" style="width: 18rem;">
                        <img src="{{ asset('food.jpg') }}" class="card-img-top shadow-sm rounded-4" alt="...">
                        <div class="card-body d-flex">
                            <div class="row">
                                <div class="d-flex">
                                    <p class="card-text text-break">{{ __('Rice') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="#" class="shadow-none text-dark">
                    <div class="card mt-5 w-100 border-0 shadow-none rounded-3" style="width: 18rem;">
                        <img src="{{ asset('food.jpg') }}" class="card-img-top shadow-sm rounded-4" alt="...">
                        <div class="card-body d-flex">
                            <div class="row">
                                <div class="d-flex">
                                    <p class="card-text text-break">{{ __('Chicken') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <h5 class="text-end mt-4"><a href="#" class="shadow-none text-success">{{__('More recipes...')}}</a></h5>
        <h2 class="text-center mt-2" style="color:#1C6513;">{{__('Sweet')}}</h2>
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="#" class="shadow-none text-dark">
                    <div class="card mt-5 w-100 border-0 shadow-none rounded-3" style="width: 18rem;">
                        <img src="{{ asset('food.jpg') }}" class="card-img-top shadow-sm rounded-4" alt="...">
                        <div class="card-body d-flex">
                            <div class="row">
                                <div class="d-flex">
                                    <p class="card-text text-break">{{ __('Opera cake') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="#" class="shadow-none text-dark">
                    <div class="card mt-5 w-100 border-0 shadow-none rounded-3" style="width: 18rem;">
                        <img src="{{ asset('food.jpg') }}" class="card-img-top shadow-sm rounded-4" alt="...">
                        <div class="card-body d-flex">
                            <div class="row">
                                <div class="d-flex">
                                    <p class="card-text text-break">{{ __('Red velvet') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="#" class="shadow-none text-dark">
                    <div class="card mt-5 w-100 border-0 shadow-none rounded-3" style="width: 18rem;">
                        <img src="{{ asset('food.jpg') }}" class="card-img-top shadow-sm rounded-4" alt="...">
                        <div class="card-body d-flex">
                            <div class="row">
                                <div class="d-flex">
                                    <p class="card-text text-break">{{ __('Fondant au chocolat') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="#" class="shadow-none text-dark">
                    <div class="card mt-5 w-100 border-0 shadow-none rounded-3" style="width: 18rem;">
                        <img src="{{ asset('food.jpg') }}" class="card-img-top shadow-sm rounded-4" alt="...">
                        <div class="card-body d-flex">
                            <div class="row">
                                <div class="d-flex">
                                    <p class="card-text text-break">{{ __('Panna cotta') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <h5 class="text-end mt-4"><a href="#" class="shadow-none text-success">{{__('More recipes...')}}</a></h5>
    </div>
</div>
@include('layouts.footer')
</body>
</html>
