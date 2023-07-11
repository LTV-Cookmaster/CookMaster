@extends('admin.admin')
@php
    use App\Models\Reservation;
@endphp
@section('title' , __('courses.title'))
@include('layouts.navbar')
@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
{{--
        <a href="{{ route('courses.create') }}" class="btn btn-primary">{{__('courses.create')}}</a>
--}}
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>{{__('courses.name')}}</th>
            <th>{{__('courses.type')}}</th>
            <th>{{__('courses.price')}}</th>
            <th>{{__('courses.actions')}}</th>

        </tr>
        </thead>
        <tbody>
        @foreach($courses as $event)
            <tr>
                <td>{{ $event->name }}</td>
                <td>{{ __("Formation diplomante") }}</td>
                <td>{{ $event->price }}€</td>
                <td>
                    @if($event->formationData)
                        <p style="color: green">{{__('Formation configuréez')}}</p>
                    @else
                        <a class="btn btn-danger" href="{{ route('courses.create' , ['course_id' => $event->id]) }}">{{__('Formation à configurer')}}</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

     {{$courses->links() }}
@endsection
