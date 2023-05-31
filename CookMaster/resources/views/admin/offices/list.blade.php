@extends('admin.admin')

@section('title' , $officeName)
@include('layouts.navbar')
@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.office.index') }}" class="btn btn-primary">Afficher les autres locaux</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Capacité max</th>
            <th>Prix</th>
            <th>Réservé</th>
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
            </tr>
        @endforeach
        </tbody>
    </table>

{{--    {{ $rooms->links() }}--}}
@endsection
