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

{{--   Script à récupérer pour les bookmarks/likes des recettes
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sélectionne tous les boutons de favori avec la classe "toggle-favorite"
            const favoriteButtons = document.querySelectorAll('.toggle-favorite');

            // Ajoute un écouteur d'événement de clic à chaque bouton de favori
            favoriteButtons.forEach(function(button) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();

                    // Récupère l'icône vide et l'icône pleine à partir du bouton
                    const emptyIcon = button.querySelector('.fa-regular.fa-heart');
                    const filledIcon = button.querySelector('.fa-solid.fa-heart');

                    // Bascule la visibilité des icônes
                    if (emptyIcon.classList.contains('visually-hidden')) {
                        // Affiche l'icône vide et cache l'icône pleine
                        emptyIcon.classList.remove('visually-hidden');
                        filledIcon.classList.add('visually-hidden');
                    } else {
                        // Affiche l'icône pleine et cache l'icône vide
                        emptyIcon.classList.add('visually-hidden');
                        filledIcon.classList.remove('visually-hidden');
                    }
                });
            });
        });
    </script>--}}
</head>

<body>
@include('layouts.navbar')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        {{ session('error') }}
    </div>
@endif
<div class="container-fluid">
    <div class="container">
        <h2 class="text-center mt-2">Your next workshops</h2>
        <div class="row">
            @foreach($workshops as $workshop)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <a href="#" class="shadow-none text-dark">
                        <div class="card mt-5 w-100 border-0 shadow-none rounded-3" style="width: 18rem;">
                            <img src="{{ asset('food.jpg') }}" class="card-img-top shadow-sm rounded-4" alt="...">
                            <div class="card-body d-flex">
                                <div class="row">
                                    <div class="d-flex">
                                        <div class="card-text">
                                        <span class="text-truncate">{{ $workshop->name }}</span>
                                        <br>
                                        <span class="text-truncate" style="color: #1C6513">{{ $workshop->type }}</span>
                                        <br>
                                        <span class="d-inline-block text-truncate" style="max-width: 150px;">{{ $workshop->description }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <h2 class="text-center mt-2">Your next events</h2>
        <div class="row">
            @foreach($formations as $formation)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <a href="#" class="shadow-none text-dark">
                        <div class="card mt-5 w-100 border-0 shadow-none rounded-3" style="width: 18rem;">
                            <img src="{{ asset('food.jpg') }}" class="card-img-top shadow-sm rounded-4" alt="...">
                            <div class="card-body d-flex">
                                <div class="row">
                                    <div class="d-flex">
                                        <div class="card-text">
                                            <span class="text-truncate">{{ $formation->name }}</span>
                                            <br>
                                            <span class="text-truncate" style="color: #1C6513">{{ $formation->type }}</span>
                                            <br>
                                            <span class="d-inline-block text-truncate" style="max-width: 150px;">{{ $formation->description }}</span>
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
