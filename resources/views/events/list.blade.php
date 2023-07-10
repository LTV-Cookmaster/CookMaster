@extends('admin.admin')
@php
    use App\Models\Reservation;
@endphp
@section('title' , 'Les événements')
@include('layouts.navbar')
@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
             <a href="{{ route('events.create') }}" class="btn btn-primary">Créer un évènement</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Type</th>
            <th>Prix</th>
            <th>Nombres de participants</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($events as $event)
            <tr>
                <td>{{ $event->name }}</td>
                <td>@switch($event->type)
                        @case('tastingEvent')
                            {{ __('Dégustation') }}
                            @break
                        @case('professionalFormation')
                            {{ __('Formation professionnelle') }}
                            @break
                        @case('onlineWorkshop')
                            {{ __('Atelier en ligne') }}
                            @break
                        @case('meetingEvent')
                            {{ __('Réunion') }}
                            @break
                        @case('homeWorkshop')
                            {{ __('Atelier à domicile') }}
                            @break
                        @default
                            {{ __('Type inconnu') }}
                    @endswitch</td>
                <td>{{ $event->price }}€</td>
                @php
                    $reservationCount = Reservation::where('event_id', $event->id)->count();
                @endphp
                @if($reservationCount == $event->number_of_participants)
                    <td id="eventSeats" style="color: red"><i class="fa-solid fa-person"></i> <strong>{{__('Complet')}} </strong>{{ $event->seats }}</td>
                @else
                    <td id="eventSeats"><i class="fa-solid fa-person"></i> <strong>{{($event->number_of_participants - $reservationCount) . "/" . $event->number_of_participants }} </strong>{{ $event->seats }}</td>
                @endif
                <td>
                    <a class="btn btn-secondary" href="{{ route('addEquipementToEvent', ['event_id' => $event->id]) }}">Ajouter des équipements</a>
                    <a class="btn btn-primary" href="{{ route('events.edit', ['event' => $event->id]) }}">Modifier</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

   {{-- {{ $offices->links() }}--}}
@endsection
