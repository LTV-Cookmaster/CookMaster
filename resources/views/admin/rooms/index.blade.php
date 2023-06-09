@extends('admin.admin')

@section('title' , __('rooms.title'))
@include('layouts.navbar')
@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.room.create') }}" class="btn btn-primary">{{__('rooms.create')}}</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>{{__('rooms.name')}}</th>
            <th>{{__('rooms.max_capacity')}}</th>
            <th>{{__('rooms.price')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rooms as $room)
            <tr>
                <td>{{ $room->name }}</td>
                <td>{{ $room->max_capacity }}m²</td>
                <td>{{ $room->price }}€</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $rooms->links() }}
@endsection
