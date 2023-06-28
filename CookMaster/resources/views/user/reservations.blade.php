<!DOCTYPE html>
<html lang="en">
@php
    use Carbon\Carbon;
@endphp
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <title>@yield('title')</title>
    </head>

    <body>
    @include('layouts.navbar')
    <br>
    <div class="container">
        {{--<section class="mb-5">
            <h2>Courses</h2>
            <table class="table">
                <thead>
                <tr>
                    <th>Course</th>
                    <th>Description</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>xx</td>
                    <td>xxxx</td>
                    <td>June 24, 2023</td>
                </tr>
                </tbody>
            </table>
        </section>--}}

        <section class="mb-5">
            <h2>Workshops</h2>
            <table class="table">
                <thead>
                <tr>
                    <th>{{ __("Nom") }}</th>
                    <th>{{ __("Date") }}</th>
                    <th>{{ __("Horaires") }}</th>
                    <th>{{ __("Prix") }}</th>
                    <th>{{ __("Statut") }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->name }}</td>
                        @php
                        die();
                            $startDate = Carbon::createFromFormat('d-m-Y H:i', $reservation->start_date.' '.$reservation->start_time);
                            $endDate = Carbon::createFromFormat('d-m-Y H:i', $reservation->end_date.' '.$reservation->end_time);
                            $currentDate = Carbon::now();
                            $date = Carbon::createFromFormat('d-m-Y', $reservation->start_date);
                            $formattedDate = $date->format('l jS Y');
                            $start = Carbon::createFromFormat('H:i', $reservation->start_time);
                            $formattedStart = $start->format('H\h');
                            $end = Carbon::createFromFormat('H:i', $reservation->end_time);
                            $formattedEnd = $end->format('H\h');
                        @endphp
                        <td>{{ $formattedDate }}</td>
                        <td>{{ $formattedStart }} - {{ $formattedEnd }}</td>
                        <td>{{ $reservation->price }}€</td>
                        <td>
                            @if ($endDate->isPast())
                                <span style="color: darkgoldenrod">{{ __("Workshop terminé") }}</span>
                            @elseif ($startDate->isFuture())
                                <span style="color: green">{{ __("Workshop à venir") }}</span>
                            @else
                                <span style="color: blue">{{ __("Workshop en cours") }}</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </section>

  {{--  <section>
        <h2>Events</h2>
        <table class="table">
            <thead>
            <tr>
                <th>Event</th>
                <th>Description</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->event->name }}</td>
                    @php
                        $startDate = Carbon::createFromFormat('d-m-Y H:i', $event->event->start_date.' '.$event->event->start_time);
                        $endDate = Carbon::createFromFormat('d-m-Y H:i', $event->event->end_date.' '.$event->event->end_time);
                        $currentDate = Carbon::now();
                        $date = Carbon::createFromFormat('d-m-Y', $event->event->start_date);
                        $formattedDate = $date->format('l jS Y');
                        $start = Carbon::createFromFormat('H:i', $event->event->start_time);
                        $formattedStart = $start->format('H\h');
                        $end = Carbon::createFromFormat('H:i', $event->event->end_time);
                        $formattedEnd = $end->format('H\h');
                    @endphp
                    <td>{{ $formattedDate }}</td>
                    <td>{{ $formattedStart }} - {{ $formattedEnd }}</td>
                    <td>{{ $event->event->price }}€</td>
                    <td>
                        @if ($endDate->isPast())
                            <span style="color: darkgoldenrod">{{ __("Evènement terminé") }}</span>
                        @elseif ($startDate->isFuture())
                            <span style="color: green">{{ __("Evènement à venir") }}</span>
                        @else
                            <span style="color: blue">{{ __("Evènement en cours") }}</span>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>--}}
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@include('layouts.footer')
</body>

</html>
