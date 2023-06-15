<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@section('title' , 'Workshops')
@php
    use Carbon\Carbon;
@endphp
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
@include('layouts.navbar')
    <body>

    <div class="container-fluid">
        <div class="container">
            <h2 class="text-center mt-2">Online workshops</h2>
            <div class="row">
                @foreach($onlines as $online)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <a href="#" class="shadow-none text-dark">
                            <div class="card mt-5 w-100 border-0 shadow-none rounded-3" style="width: 18rem;">
                                @php
                                    $elements = ['food.jpg', 'professional.jpg', 'workshops.jpg'];
                                    $randomIndex = array_rand($elements);
                                    $randomElement = $elements[$randomIndex];
                                @endphp
                                <a href="{{ route('online', ['workshop' => $online->id]) }}">
                                <img src="{{ asset($randomElement) }}" class="card-img-top shadow-sm rounded-4" alt="...">
                                </a>
                                <div class="card-body d-flex">
                                    <div class="row">
                                        <div class="d-flex">
                                            <div class="card-text">
                                                <span class="text-truncate">{{ $online->name }}</span>
                                                <br>
                                                @php
                                                    $date = Carbon::createFromFormat('d-m-Y', $online->start_date);
                                                    $formattedDate = $date->format('l jS Y');
                                                @endphp
                                            <span class="text-truncate" style="color: #1C6513">{{ $formattedDate }}</span>
                                            <br>
                                                @php
                                                    $start = Carbon::createFromFormat('H:i:s', $online->start_time);
                                                    $formattedStart = $start->format('H\hi');
                                                    $end = Carbon::createFromFormat('H:i:s', $online->end_time);
                                                    $formattedEnd = $end->format('H\hi');
                                                @endphp
                                            <span class="d-inline-block text-truncate" style="max-width: 150px;">{{ $formattedStart }} - {{ $formattedEnd }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>


            <h2 class="text-center mt-2">On site workshops</h2>
            <div class="row">
                @foreach($workshops as $workshop)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <a href="#" class="shadow-none text-dark">
                            <div class="card mt-5 w-100 border-0 shadow-none rounded-3" style="width: 18rem;">
                                @php
                                    $elements = ['food.jpg', 'professional.jpg', 'workshops.jpg'];
                                    $randomIndex = array_rand($elements);
                                    $randomElement = $elements[$randomIndex];
                                @endphp
                                    <img src="{{ asset($randomElement) }}" class="card-img-top shadow-sm rounded-4" alt="...">
                                    <div class="card-body d-flex">
                                        <div class="row">
                                            <div class="d-flex">
                                                <div class="card-text">
                                                    <span class="text-truncate">{{ $workshop->name }}</span>
                                                    <br>
                                                    @php
                                                        $date = Carbon::createFromFormat('d-m-Y', $workshop->start_date);
                                                        $formattedDate = $date->format('l jS Y');
                                                @endphp
                                                <span class="text-truncate" style="color: #1C6513">{{ $formattedDate }}</span>
                                                <br>
                                                @php
                                                    $start = Carbon::createFromFormat('H:i:s', $workshop->start_time);
                                                    $formattedStart = $start->format('H\hi');
                                                    $end = Carbon::createFromFormat('H:i:s', $workshop->end_time);
                                                    $formattedEnd = $end->format('H\hi');
                                                @endphp
                                                <span class="d-inline-block text-truncate" style="max-width: 150px;">{{ $formattedStart }} - {{ $formattedEnd }}</span>
                                                <br>
                                                <span class="text-truncate" style="max-width: 150px;">{{ $workshop->address }}</span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

        <h2 class="text-center mt-2">Professional formations</h2>
        <div class="row">
            @foreach($formations as $formation)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <a href="#" class="shadow-none text-dark">
                        <div class="card mt-5 w-100 border-0 shadow-none rounded-3" style="width: 18rem;">
                            @php
                                    $elements = ['food.jpg', 'professional.jpg', 'workshops.jpg'];
                                    $randomIndex = array_rand($elements);
                                    $randomElement = $elements[$randomIndex];
                            @endphp
                                    <img src="{{ asset($randomElement) }}" class="card-img-top shadow-sm rounded-4" alt="...">
                            <div class="card-body d-flex">
                                <div class="row">
                                    <div class="d-flex">
                                        <div class="card-text">
                                            <span class="text-truncate">{{ $formation->name }}</span>
                                            <br>
                                            @php
                                                $date = Carbon::createFromFormat('d-m-Y', $formation->start_date);
                                                $formattedDate = $date->format('l jS Y');
                                                $start = Carbon::createFromFormat('H:i:s', $formation->start_time);
                                                $formattedStart = $start->format('H\hi');
                                                $end = Carbon::createFromFormat('H:i:s', $formation->end_time);
                                                $formattedEnd = $end->format('H\hi');
                                            @endphp
                                            <span class="text-truncate" style="color: #1C6513">{{ $formattedDate }} {{ $formattedStart }} - {{ $formattedEnd }}</span>
                                            <br>
                                            <span class="d-inline-block text-truncate" style="max-width: 150px;">{{ $formation->description }}</span>
                                            <br>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@include('layouts.footer')
</body>
</html>
