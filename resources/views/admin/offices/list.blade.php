@extends('admin.admin')

@section('title' , $officeName)
@include('layouts.navbar')
@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.office.index') }}" class="btn btn-primary">{{__('offices.show_others')}}</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>{{__('offices.name')}}</th>
            <th>{{__('offices.max_capacity')}}</th>
            <th>{{__('offices.price')}}</th>
            <th>{{__('offices.booked')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rooms as $room)
            <tr>
                <td>{{ $room->name }}</td>
                <td>{{ $room->max_capacity }}m²</td>
                <td>{{ $room->price }}€</td>
                @if($room->is_booked)
                    <td><span style="color: orange">{{__('offices.booked')}}</span></td>
                @else
                    <td><span style="color: darkgreen">{{__('offices.free')}}</span></td>
                @endif
                <td>
            </tr>
        @endforeach
        </tbody>
    </table>

{{--    {{ $rooms->links() }}--}}
@endsection
