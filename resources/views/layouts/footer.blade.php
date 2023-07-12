<br>
<br>
<br>
<div class="container-fluid mt-5" style="position: fixed; left: 0; bottom: 0; width: 100%; background-color: white; padding: 10px; text-align: center; margin-top: -60px;">
    <footer class="d-flex flex-wrap justify-content-between align-items-center">
        <p class="col-md-4 mb-0 text-muted text-start">{{__('footer.title')}} ©</p>

        <div class="flex flex-shrink-0 justify-evenly border-t border-gray-200 p-2">
            <a href="{{ route('locale.setting', 'en') }}">
                <span class="sr-only">{{ __('english') }}</span>
                <img class="inline-block h-8 w-8 rounded-full" style="width: 40px; height: 25px;" src="{{ asset('english_flag.png') }}"
                     alt="{{ __('english') }}">
            </a>
            <a href="{{ route('locale.setting', 'fr') }}">
                <span class="sr-only">{{ __('french') }}</span>
                <img class="inline-block h-8 w-8 rounded-full" style="width: 40px; height: 25px;" src="{{ asset('french_flag.png') }}"
                     alt="{{ __('french') }}">
            </a>
        </div>

        <ul class="nav col-md-4 justify-content-end">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">{{__('footer.about_us')}}</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">{{__('footer.privacy_policy')}}</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted disabled">{{__('footer.email')}}</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2"><i class="fa-brands fa-facebook" style="color: #1C6513"></i></a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2"><i class="fa-brands fa-twitter" style="color: #1C6513"></i></a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2"><i class="fa-brands fa-instagram" style="color: #1C6513"></i></a></li>
        </ul>
    </footer>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
