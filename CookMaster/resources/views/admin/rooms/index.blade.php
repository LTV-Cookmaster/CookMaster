@extends('admin.admin')

@section('title' , 'Les Rooms')

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
            <th>Reservé</th>
            <th class="text-end">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rooms as $room)
            <tr>
                <td>{{ $room->name }}</td>
                <td>{{ $room->max_capacity }}</td>
                <td>{{ $room->price }}</td>
                <td>{{ $room->is_booked }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $rooms->links() }}
@endsection
