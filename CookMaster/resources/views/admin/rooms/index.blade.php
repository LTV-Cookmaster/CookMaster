@extends('admin.admin')

@section('title' , 'Les Rooms')
@include('layouts.navbar')
@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.room.create') }}" class="btn btn-primary">Créer une Room</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Capacité max</th>
            <th>Prix</th>
            <th>Réservé</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rooms as $room)
            <tr>
                <td>{{ $room->name }}</td>
                <td>{{ $room->max_capacity }}m²</td>
                <td>{{ $room->price }}€</td>
                @if($room->is_booked)
                    <td><span style="color: orange">Réservé</span></td>
                @else
                    <td><span style="color: darkgreen">Libre</span></td>
                @endif
                <td>
                    <a class="btn btn-primary">Afficher</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $rooms->links() }}
@endsection
