<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
    use Carbon\Carbon;
@endphp
@section('title' , __('events.title'))
@include('layouts.navbar')
<body>
<div class="container-fluid">
    <div class="container">
        <h2 class="text-center mt-2">{{__('events.next_tastings')}}</h2>
        <div class="row">
            @foreach($tastings as $tasting)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <a href="#" class="shadow-none text-dark">
                        <div class="card mt-5 w-100 border-0 shadow-none rounded-3" style="width: 18rem;">
                            <a href="{{ route('event', ['event' => $tasting->id]) }}">
                                <img src="{{ asset('storage/'.$tasting->img_url) }}" class="card-img-top shadow-sm rounded-4" alt="...">
                            </a>
                            <div class="card-body d-flex">
                                <div class="row">
                                    <div class="d-flex">
                                        <div class="card-text">
                                            <span class="text-truncate">{{ $tasting->name }}</span>
                                            <br>
                                            @php
                                                $date = Carbon::createFromFormat('d-m-Y', $tasting->start_date);
                                                $formattedDate = $date->format('F jS Y');
                                            @endphp
                                            <span class="text-truncate" style="color: #1C6513"><i class="fa-solid fa-calendar-days"></i> {{ $formattedDate }}</span>
                                            <br>
                                            @php
                                                $start = Carbon::createFromFormat('H:i', $tasting->start_time);
                                                $formattedStart = $start->format('H\h');
                                                $end = Carbon::createFromFormat('H:i', $tasting->end_time);
                                                $formattedEnd = $end->format('H\h');
                                            @endphp
                                            <span class="d-inline-block text-truncate" style="max-width: 150px;"><i class="fa-regular fa-clock"></i> {{ $formattedStart }} - {{ $formattedEnd }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
                {{ $tastings->links() }}
        </div>
        <h2 class="text-center mt-2">{{__('events.next_meetings')}}</h2>
        <div class="row">
            @foreach($meetings as $meeting)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <a href="#" class="shadow-none text-dark">
                        <div class="card mt-5 w-100 border-0 shadow-none rounded-3" style="width: 18rem;">
                            <a href="{{ route('event', ['event' => $meeting->id]) }}">
                                <img src="{{ asset('storage/'.$meeting->img_url) }}" class="card-img-top shadow-sm rounded-4" alt="...">
                            </a>
                            <div class="card-body d-flex">
                                <div class="row">
                                    <div class="d-flex">
                                        <div class="card-text">
                                            <span class="text-truncate">{{ $meeting->name }}</span>
                                            <br>
                                            @php
                                                $date = Carbon::createFromFormat('d-m-Y', $meeting->start_date);
                                                $formattedDate = $date->format('F jS Y');
                                            @endphp
                                            <span class="text-truncate" style="color: #1C6513"><i class="fa-solid fa-calendar-days"></i> {{ $formattedDate }}</span>
                                            <br>
                                            @php
                                                $start = Carbon::createFromFormat('H:i', $meeting->start_time);
                                                $formattedStart = $start->format('H\h');
                                                $end = Carbon::createFromFormat('H:i', $meeting->end_time);
                                                $formattedEnd = $end->format('H\h');
                                            @endphp
                                            <span class="d-inline-block text-truncate" style="max-width: 150px;"><i class="fa-regular fa-clock"></i> {{ $formattedStart }} - {{ $formattedEnd }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
                {{ $meetings->links() }}
        </div>
    </div>
    <div class="container">
        <h2 class="text-center mt-2">Online workshops</h2>
        <div class="row">
            @foreach($onlineEvent as $online)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <a href="#" class="shadow-none text-dark">
                        <div class="card mt-5 w-100 border-0 shadow-none rounded-3" style="width: 18rem;">
                            <a href="{{ route('event', ['event' => $online->id]) }}">
                                <img src="{{ asset('storage/'.$online->img_url) }}" class="card-img-top shadow-sm rounded-4" alt="...">
                            </a>
                            <div class="card-body d-flex">
                                <div class="row">
                                    <div class="d-flex">
                                        <div class="card-text">
                                            <span class="text-truncate">{{ $online->name }}</span>
                                            <br>
                                            @php
                                                $date = Carbon::createFromFormat('d-m-Y', $online->start_date);
                                                $formattedDate = $date->format('F jS Y');
                                            @endphp
                                            <span class="text-truncate" style="color: #1C6513"><i class="fa-solid fa-calendar-days"></i> {{ $formattedDate }}</span>
                                            <br>
                                            @php
                                                $start = Carbon::createFromFormat('H:i', $online->start_time);
                                                $formattedStart = $start->format('H\h');
                                                $end = Carbon::createFromFormat('H:i', $online->end_time);
                                                $formattedEnd = $end->format('H\h');
                                            @endphp
                                            <span class="d-inline-block text-truncate" style="max-width: 150px;"><i class="fa-regular fa-clock"></i> {{ $formattedStart }} - {{ $formattedEnd }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
                {{ $onlineEvent->links() }}
        </div>
        <h2 class="text-center mt-2">On site workshops</h2>
        <div class="row">
            @foreach($homeEvent as $workshop)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <a href="#" class="shadow-none text-dark">
                        <div class="card mt-5 w-100 border-0 shadow-none rounded-3" style="width: 18rem;">
                            <a href="{{ route('event', ['event' => $workshop->id]) }}">
                                <img src="{{ asset('storage/'.$workshop->img_url) }}" class="card-img-top shadow-sm rounded-4" alt="...">
                            </a>
                            <div class="card-body d-flex">
                                <div class="row">
                                    <div class="d-flex">
                                        <div class="card-text">
                                            <span class="text-truncate">{{ $workshop->name }}</span>
                                            <br>
                                            @php
                                                $date = Carbon::createFromFormat('d-m-Y', $workshop->start_date);
                                                $formattedDate = $date->format('F jS Y');
                                            @endphp
                                            <span class="text-truncate" style="color: #1C6513"><i class="fa-solid fa-calendar-days"></i> {{ $formattedDate }}</span>
                                            <br>
                                            @php
                                                $start = Carbon::createFromFormat('H:i', $workshop->start_time);
                                                $formattedStart = $start->format('H\h');
                                                $end = Carbon::createFromFormat('H:i', $workshop->end_time);
                                                $formattedEnd = $end->format('H\h');
                                            @endphp
                                            <span class="d-inline-block text-truncate" style="max-width: 150px;"><i class="fa-regular fa-clock"></i> {{ $formattedStart }} - {{ $formattedEnd }}</span>
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
                {{ $homeEvent->links() }}
        </div>

        <h2 class="text-center mt-2">Professional formations</h2>
        <div class="row">
            @foreach($professional as $formation)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <a href="#" class="shadow-none text-dark">
                        <div class="card mt-5 w-100 border-0 shadow-none rounded-3" style="width: 18rem;">
                            <a href="{{ route('event', ['event' => $formation->id]) }}">
                                <img src="{{ asset('storage/'.$formation->img_url) }}" class="card-img-top shadow-sm rounded-4" alt="...">
                            </a>
                            <div class="card-body d-flex">
                                <div class="row">
                                    <div class="d-flex">
                                        <div class="card-text">
                                            <span class="text-truncate">{{ $formation->name }}</span>
                                            <br>
                                            @php
                                                $date = Carbon::createFromFormat('d-m-Y', $formation->start_date);
                                                $formattedDate = $date->format('F jS Y');
                                            @endphp
                                            <span class="text-truncate" style="color: #1C6513"><i class="fa-solid fa-calendar-days"></i> {{ $formattedDate }} <i class="fa-regular fa-clock"></i></span>
                                            <br>
                                            @php
                                                $start = Carbon::createFromFormat('H:i', $online->start_time);
                                                $formattedStart = $start->format('H\h');
                                                $end = Carbon::createFromFormat('H:i', $online->end_time);
                                                $formattedEnd = $end->format('H\h');
                                            @endphp
                                            <span class="d-inline-block text-truncate" style="max-width: 150px;"><i class="fa-regular fa-clock"></i> {{ $formattedStart }} - {{ $formattedEnd }}</span>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
                {{ $professional->links() }}
        </div>
    </div>
</div>
@include('layouts.footer')
</body>
</html>
