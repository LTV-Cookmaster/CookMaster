<!DOCTYPE html>

@include('layouts.navbar')

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

        <style>
            /* Custom styles for the background */
            .bg-images {
                height: 100vh;
                background-size: cover;
                background-position: center;
                opacity: 0.8;
                transition: opacity 3s ease-out;
                animation: ease-out 2s infinite;
            }

            .text-image {
                position: relative;
                opacity: 1;
            }

            .text-overlay {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
        </style>

        <script>
            // JavaScript to change background images
            let images = [
                "{{ asset('delivery.jpg') }}", // Placeholder for image 1
                "{{ asset('food.jpg') }}",  // Placeholder for image 2
                "{{ asset('professional.jpg') }}",
                "{{ asset('workshops.jpg') }}",// Placeholder for image 3
                // Add more placeholder image URLs as needed
            ];
            let currentImageIndex = 0;

            function changeBackground() {
                currentImageIndex = (currentImageIndex + 1) % images.length;
                let imageUrl = "url(" + images[currentImageIndex] + ")";
                document.querySelector(".bg-images").style.backgroundImage = imageUrl;
            }

            setInterval(changeBackground, 5000); // Change image every 5 seconds
        </script>

    </head>

    <body>
    <div class="container-fluid w-100 p-0" style="height:80vh;">
        <div class="bg-images carousel-fade h-100 w-100">
            <div class="text-image h-100 w-100 d-flex ms-auto align-items-center">
                <div class="text-overlay d-flex flex-column align-items-center">
                    <span class="text-center w-100 display-2 opacity-100" style="color:#48D793;">{{__('Cookmaster')}}</span>
                    <a href="#"><button type="button" class="btn bg-light text-center m-4 mt-3 px-5 fs-6" style="color: black">{{ __('Subscribe') }}</button></a>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
    </body>
</html>
