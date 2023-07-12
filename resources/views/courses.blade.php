<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
    use Carbon\Carbon;
@endphp
@section('title' , 'Courses')
@include('layouts.navbar')
<body>
<div class="container-fluid">
    <div class="container">
        <h2 class="text-center mt-2">{{__('courses.available_formations')}}</h2>
        <div class="row">
            @foreach($events as $event)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <a href="#" class="shadow-none text-dark">
                        <div class="card mt-5 w-100 border-0 shadow-none rounded-3" style="width: 18rem;">
                            <a href="{{ route('courses.index', ['course_id' => $event->id]) }}">
                                <img src="{{ asset('storage/'.$event->img_url) }}" class="card-img-top shadow-sm rounded-4" alt="...">
                            </a>
                            <div class="card-body d-flex">
                                <div class="row">
                                    <div class="d-flex">
                                        <div class="card-text">
                                            <i class="fa-solid fa-tag"></i> <span class="text-truncate">{{ $event->name }}</span>
                                            <br>
                                            <i class="fa-solid fa-award"></i> <span class="text-truncate">{{__('courses.graduating_formations')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
</div>
@include('layouts.footer')
</body>
</html>
