<!DOCTYPE html>
<html lang="fr">
<head>
    @section('title' , $workshop->name)
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    @include('.layouts.navbar')
    <style>

        #eventImage {
            border-radius: 15px;
        }

        .eventDetail {
            font-size: 1.2rem;
            margin-top: 10px;
            padding: 20px;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .eventDetail h1 {
            font-size: 2rem;
            color: #343a40;
            margin-bottom: 20px;
        }

        .eventDetail p {
            margin-bottom: 15px;
        }

        .eventDetail .btn-primary {
            padding: 10px 20px;
            font-size: 1.2rem;
        }

        #eventDescription {
            margin-top: 30px;
            font-size: 1.2rem;
            line-height: 1.6;
        }
    </style>
</head>
<body>
@php
        use Carbon\Carbon;
        $date = Carbon::createFromFormat('d-m-Y', $workshop->start_date);
        $formattedDate = $date->format('l jS Y');
        $start = Carbon::createFromFormat('H:i:s', $workshop->start_time);
        $formattedStart = $start->format('H\hi');
        $end = Carbon::createFromFormat('H:i:s', $workshop->end_time);
        $formattedEnd = $end->format('H\hi');
@endphp
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6">
            <img id="eventImage" src="{{ asset('food.jpg') }}" class="img-fluid" alt="Image de l'événement">
        </div>
        <div class="col-lg-6">
            <div class="eventDetail">
                <h1 id="eventTitle">{{ $workshop->name }}</h1>
                <p id="eventTime"><strong>{{__('Heure:')}} </strong>{{ $formattedStart }} - {{ $formattedEnd }}</p>
                @if($reservationCount == $workshop->max_number_of_participants)
                    <p id="eventSeats" style="color: red"><strong>{{__('Complet')}} </strong>{{ $workshop->seats }}</p>
                @else
                    <p id="eventSeats"><strong>{{__('Places restantes: ') .  ($workshop->max_number_of_participants - $reservationCount) . "/" . $workshop->max_number_of_participants }} </strong>{{ $workshop->seats }}</p>
                @endif
                <p id="eventOrganizer"><strong>{{__('Prix:')}} </strong>{{ $workshop->price }}€</p>
                @if($reserve == false)
                <a href="{{ route('checkout' , ['bill' => $workshop]) }}" class="btn btn-success btn-md">{{__('Réserver')}}</a>
                @elseif($reservationCount == $workshop->max_number_of_participants)
                    <p class="btn btn-danger">{{__('Complet')}}</p>
                @else
                    <p class="btn btn-secondary">{{__('Vous êtes déja inscrit')}}</p>
                @endif
            </div>
            <div id="eventDescription">{{ $workshop->description }}</div>
        </div>
    </div>
</div>
</body>
@include('layouts.footer')
</html>
