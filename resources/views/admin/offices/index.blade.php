@extends('admin.admin')

@section('title' , __('offices.title'))
@include('layouts.navbar')
@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
   {{--     <a href="{{ route('admin.room.create') }}" class="btn btn-primary">Créer une Room</a>--}}
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>{{__('offices.name')}}</th>
            <th>{{__('offices.address')}}</th>
            <th>{{__('offices.city')}}</th>
            <th>{{__('offices.number_rooms')}}</th>
            <th>{{__('offices.actions')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($offices as $office)
            <tr>
                <td>{{ $office->name }}</td>
                <td>{{ $office->address }}</td>
                <td>{{ $office->city }}</td>
                <td>{{ $office->number_of_rooms }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('admin.office.list', ['office' => $office->id]) }}">{{__('offices.show')}}</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $offices->links() }}
@endsection
