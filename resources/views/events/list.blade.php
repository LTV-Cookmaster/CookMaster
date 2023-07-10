@extends('admin.admin')
@php
    use App\Models\Reservation;
@endphp
@section('title' , __('events.title'))
@include('layouts.navbar')
@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
             <a href="{{ route('events.create') }}" class="btn btn-primary">{{__('events.create')}}</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>{{__('events.name')}}</th>
            <th>{{__('events.type')}}</th>
            <th>{{__('events.price')}}</th>
            <th>{{__('events.number_of_participants')}}</th>
            <th>{{__('events.actions')}}</th>

        </tr>
        </thead>
        <tbody>
        @foreach($events as $event)
            <tr>
                <td>{{ $event->name }}</td>
                <td>@switch($event->type)
                        @case('tastingEvent')
                            {{ __('events.tasting_event') }}
                            @break
                        @case('professionalFormation')
                            {{ __('events.professional_formation') }}
                            @break
                        @case('onlineWorkshop')
                            {{ __('events.online_workshop') }}
                            @break
                        @case('meetingEvent')
                            {{ __('events.meeting_event') }}
                            @break
                        @case('homeWorkshop')
                            {{ __('events.home_workshop') }}
                            @break
                        @default
                            {{ __('events.unknown_type') }}
                    @endswitch</td>
                <td>{{ $event->price }}€</td>
                @php
                    $reservationCount = Reservation::where('event_id', $event->id)->count();
                @endphp
                @if($reservationCount == $event->number_of_participants)
                    <td id="eventSeats" style="color: red"><i class="fa-solid fa-person"></i> <strong>{{__('events.full')}} </strong>{{ $event->seats }}</td>
                @else
                    <td id="eventSeats"><i class="fa-solid fa-person"></i> <strong>{{($event->number_of_participants - $reservationCount) . "/" . $event->number_of_participants }} </strong>{{ $event->seats }}</td>
                @endif
                <td>
                    <a class="btn btn-primary" href="{{ route('events.edit', ['event' => $event->id]) }}">{{__('events.edit')}}</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

   {{-- {{ $offices->links() }}--}}
@endsection
