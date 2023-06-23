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
                        <td>{{ $reservation->workshop->name }}</td>
                        @php
                            $startDate = Carbon::createFromFormat('d-m-Y H:i:s', $reservation->workshop->start_date.' '.$reservation->workshop->start_time);
                            $endDate = Carbon::createFromFormat('d-m-Y H:i:s', $reservation->workshop->end_date.' '.$reservation->workshop->end_time);
                            $currentDate = Carbon::now();
                            $date = Carbon::createFromFormat('d-m-Y', $reservation->workshop->start_date);
                            $formattedDate = $date->format('l jS Y');
                            $start = Carbon::createFromFormat('H:i:s', $reservation->workshop->start_time);
                            $formattedStart = $start->format('H\hi');
                            $end = Carbon::createFromFormat('H:i:s', $reservation->workshop->end_time);
                            $formattedEnd = $end->format('H\hi');
                        @endphp
                        <td>{{ $formattedDate }}</td>
                        <td>{{ $formattedStart }} - {{ $formattedEnd }}</td>
                        <td>{{ $reservation->workshop->price }}€</td>
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

{{--    <section>
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
            <tr>
                <td>Event 1</td>
                <td>Description of Event 1</td>
                <td>June 28, 2023</td>
            </tr>
            <tr>
                <td>Event 2</td>
                <td>Description of Event 2</td>
                <td>July 5, 2023</td>
            </tr>
            <tr>
                <td>Event 3</td>
                <td>Description of Event 3</td>
                <td>July 12, 2023</td>
            </tr>
            </tbody>
        </table>
    </section>
          --}}
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@include('layouts.footer')
</body>

</html>
