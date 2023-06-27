@extends('admin.admin')

@php
    use Carbon\Carbon;
    if ($event->exists) {
        $date_start = Carbon::createFromFormat('d-m-Y', $event->start_date);
        $formattedStartDate = $date_start->format('Y-m-d');
        $date_end = Carbon::createFromFormat('d-m-Y', $event->end_date);
        $formattedEndDate = $date_end->format('Y-m-d');
    } else {
        $formattedStartDate = '';
        $formattedEndDate = '';
    }
@endphp
@section('title', $event->exists ? "Éditer un évènement" : "Créer un évènement")

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>@yield('title')</h1>

    <form class="vstack gap-2" action="{{ $event->exists ? route('events.update', ['event' => $event]) : route('events.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method($event->exists ? 'put' : 'post')

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    @include('components.input', ['label' => 'Name', 'name' => 'name', 'value' => $event->name])
                </div>

                <div class="mb-3">
                    <select class="form-select" name="type">
                        <option value="tastingEvent" {{ $event->type === 'tastingEvent' ? 'selected' : '' }}>Tasting Event</option>
                        <option value="professionalFormation" {{ $event->type === 'professionalFormation' ? 'selected' : '' }}>Professional Formation</option>
                        <option value="onlineWorkshop" {{ $event->type === 'onlineWorkshop' ? 'selected' : '' }}>Online Workshop</option>
                        <option value="meetingEvent" {{ $event->type === 'meetingEvent' ? 'selected' : '' }}>Meeting Event</option>
                        <option value="homeWorkshop" {{ $event->type === 'homeWorkshop' ? 'selected' : '' }}>Home Workshop</option>
                    </select>
                </div>

                <div class="mb-3">
                    @include('components.input', ['label' => 'Description', 'name' => 'description', 'type' => 'textarea', 'value' => $event->description])
                </div>

                <div class="mb-3">
                    @include('components.input', ['label' => 'Price', 'name' => 'price', 'type' => 'number', 'value' => $event->price])
                </div>

                <div class="mb-3">
                    @include('components.input', ['label' => 'Number of Participants', 'name' => 'number_of_participants', 'type' => 'number', 'value' => $event->number_of_participants])
                </div>

                <div class="mb-3">
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    @include('components.input', ['label' => 'Start Date', 'name' => 'start_date', 'type' => 'date', 'value' => $formattedStartDate])
                </div>

                <div class="mb-3">
                    @include('components.input', ['label' => 'End Date', 'name' => 'end_date', 'type' => 'date', 'value' => $formattedEndDate])
                </div>

                <div class="mb-3">
                    @include('components.input', ['label' => 'Start Time', 'name' => 'start_time', 'type' => 'time', 'value' => $event->start_time])
                </div>

                <div class="mb-3">
                    @include('components.input', ['label' => 'End Time', 'name' => 'end_time', 'type' => 'time', 'value' => $event->end_time])
                </div>

                <div class="mb-3">
                    <select class="form-select" name="type">
                        @foreach($offices as $office)
                            <option value="{{ $office->id }}" {{ $event->office_id === $office->id ? 'selected' : '' }}>{{ $office->name }} | {{ $office->postal_code }} | {{ $office->address }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3" id="room-select-wrapper" style="display: none;">
                    <select class="form-select" name="room" id="room-select">

                    </select>
                </div>

                <script>
                    var officeSelect = document.getElementById('office-select');
                    var roomSelectWrapper = document.getElementById('room-select-wrapper');
                    var roomSelect = document.getElementById('room-select');

                    officeSelect.addEventListener('change', function() {
                        var selectedOfficeId = officeSelect.value;

                        fetch('/rooms/{office_id}}/{start_date}/{end_date}/{start_time}/{end_time}')
                            .then(response => response.json())
                            .then(data => {
                                roomSelect.innerHTML = '';
                                data.forEach(function(room) {
                                    var option = document.createElement('option');
                                    option.value = room.id;
                                    option.textContent = room.name;
                                    roomSelect.appendChild(option);
                                });

                                roomSelectWrapper.style.display = 'block';
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                    });
                </script>






            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div>
                    <button class="btn btn-primary">
                        @if($event->exists)
                            Modifier
                        @else
                            Créer
                        @endif
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
