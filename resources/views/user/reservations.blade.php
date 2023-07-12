<!DOCTYPE html>
<html lang="fr">
@section('title' , 'Mes réservations')
@php
    use Carbon\Carbon;

@endphp
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <title>@yield('title')</title>
    </head>
@include('layouts.navbar')
    <body>
    <br>
    <div class="container">
        <section class="mb-5">
            <h2>{{__('reservations.my_reservations')}}</h2>
            <table class="table">
                <thead>
                <tr>
                    <th>{{ __('reservations.name') }}</th>
                    <th>{{ __('reservations.date') }}</th>
                    <th>{{ __('reservations.hours') }}</th>
                    <th>{{ __('reservations.price') }}</th>
                    <th>{{ __('reservations.status') }}</th>
                    <th>{{ __('reservations.see_more') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($events as $reservation)
                    <tr>
                        <td>{{ $reservation->name }}</td>
                        @php
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
                                <span style="color: darkgoldenrod">{{ __('reservations.done_workshop') }}</span>
                            @elseif ($startDate->isFuture())
                                <span style="color: green">{{ __('reservations.coming_workshop') }}</span>
                            @else
                                <span style="color: blue">{{ __('reservations.in_progress_workshop') }}</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('event', ['event' => $reservation->id]) }}" class="btn btn-primary">{{__('reservations.see')}}</a>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@include('layouts.footer')
</body>

</html>
