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
@section('title', $event->exists ? __('events.edit_event') : __('events.create_event'))
@include('layouts.navbar')
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

    @if(session('error'))
        <div id="error-alert" class="alert alert-danger alert-dismissible fade show text-center d-flex align-items-center justify-content-between" role="alert">
            <span style="flex-grow: 1; text-align: center;">{{ session('error') }}</span>
            <p id="close-error" type="button" class="m-0">
                <i class="fa-solid fa-xmark"></i>
            </p>
        </div>
    @endif

    <h1>@yield('title')</h1>

    <form class="vstack gap-2" id="form" action="{{ $event->exists ? route('events.update', ['event' => $event]) : route('events.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method($event->exists ? 'put' : 'post')

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    @include('components.input', ['label' => __('events.name'), 'name' => 'name', 'value' => $event->name])
                </div>

                <div class="mb-3">
                    <label for="type">{{__('events.type')}}</label>
                    <select class="form-select" name="type">
                        @foreach($eventsTypes as $eventTypes)
                            <option value="{{ $eventTypes['name'] }}" {{ $event->type == $eventTypes['name'] ? 'selected' : '' }}>
                                {{ $eventTypes['label'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    @include('components.input', ['label' => __('events.description'), 'name' => 'description', 'type' => 'textarea', 'value' => $event->description])
                </div>

                <div class="mb-3">
                    <label for="contractor_id">{{__('events.contractor')}}</label>
                    <select class="form-select" name="contractor_id">
                        @foreach($contractors as $contractor))
                        <option value="{{ $contractor->id}}" {{ $event->contractor_id == $contractor->id ? 'selected' : '' }}>{{$contractor->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    @include('components.input', ['label' => __('events.price'), 'name' => 'price', 'type' => 'number', 'value' => $event->price])
                </div>

                <div class="mb-3">
                    @include('components.input', ['label' => __('events.number_of_participants'), 'name' => 'number_of_participants', 'type' => 'number', 'value' => $event->number_of_participants])
                </div>

{{--                <div class="mb-3">
                    <div class="mb-3">
                        <label for="image" class="form-label">{{__('events.image')}}</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                </div>--}}

            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    @include('components.input', ['label' => __('events.start_date'), 'name' => 'start_date', 'type' => 'date', 'value' => $formattedStartDate])
                </div>

                <div class="mb-3" id="end-date-container" style="'display:block'">
                @include('components.input', ['label' => __('events.end_date'), 'name' => 'end_date', 'type' => 'date', 'value' => $formattedEndDate])
                </div>

                <div class="mb-3" id="start-time-container" style="'display:block'">
                    @include('components.input', ['label' => __('events.start_time'), 'name' => 'start_time', 'type' => 'time', 'value' => $event->start_time])
                </div>

                <div class="mb-3" id="end-time-container" style="'display:block'">
                    @include('components.input', ['label' => __('events.end_time'), 'name' => 'end_time', 'type' => 'time', 'value' => $event->end_time])
                </div>

                <div class="mb-3" id="office-container" style="'display:block'">
                    <select class="form-select" name="office_id" id="office-select">
                        <option value="default">{{__('events.office_select')}}</option>
                        @foreach($offices as $office)
                            <option value="{{ $office->id }}" {{ $event->office_id == $office->id ? 'selected' : '' }}>{{ $office->name }} | {{ $office->postal_code }} | {{ $office->address }}</option>
                        @endforeach
                    </select>
                </div>
                <p id="loading" style="display: none">{{__('events.loading')}}</p>

                <div class="mb-3" id="room-select-wrapper" style="display: block;">
                    <select class="form-select" name="room_id" id="room-select">
                        <option value="{{ $room->id }}">{{ $room->name }} | {{__('events.max_capacity')}} {{ $room->max_capacity }} | {{__('events.available')}}</option>
                    </select>
                </div>

                <script>
                    var officeSelect = document.getElementById('office-select');
                    var roomSelectWrapper = document.getElementById('room-select-wrapper');
                    var roomSelect = document.getElementById('room-select');
                    var startDateInput = document.getElementById('start_date');
                    var endDateInput = document.getElementById('end_date');
                    var startTimeInput = document.getElementById('start_time');
                    var endTimeInput = document.getElementById('end_time');
                    var loading = document.getElementById('loading');

                    function formatDate(originalDate) {
                        let parts = originalDate.split("-");
                        return `${parts[2]}-${parts[1]}-${parts[0]}`;
                    }

                    officeSelect.addEventListener('change', function() {
                        var selectedOfficeId = officeSelect.value;

                        if (selectedOfficeId === 'default') {
                            startDateInput.disabled = false;
                            endDateInput.disabled = false;
                            startTimeInput.disabled = false;
                            endTimeInput.disabled = false;
                            roomSelect.innerHTML = '';
                            roomSelectWrapper.style.display = 'none';
                        } else {
                            startDateInput.disabled = true;
                            endDateInput.disabled = true;
                            startTimeInput.disabled = true;
                            endTimeInput.disabled = true;
                            loading.style.display = 'block';
                            roomSelectWrapper.style.display = 'none';
                            console.log(`/api/rooms/${selectedOfficeId}/${formatDate(startDateInput.value)}/${formatDate(endDateInput.value)}/${startTimeInput.value}/${endTimeInput.value}`);
                            fetch(`/api/rooms/${selectedOfficeId}/${formatDate(startDateInput.value)}/${formatDate(endDateInput.value)}/${startTimeInput.value}/${endTimeInput.value}`)
                                .then(response => response.json())
                                .then(data => {
                                    roomSelect.innerHTML = '';
                                    data.forEach(function (room) {
                                        var option = document.createElement('option');
                                        option.value = room.id;
                                        option.textContent = room.name + " | " + 'Capacité: ' + room.max_capacity + " | Disponible";
                                        roomSelect.appendChild(option);
                                    });

                                    roomSelectWrapper.style.display = 'block';
                                    loading.style.display = 'none';
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    loading.style.display = 'none';
                                });
                        }
                    });
                    document.getElementById('start_date').addEventListener('change', function() {
                        const endDateContainer = document.getElementById('end-date-container');
                        if (this.value !== '') {
                            endDateContainer.style.display = 'block';
                        } else {
                            endDateContainer.style.display = 'none';
                            document.getElementById('end_date').value = '';
                            document.getElementById('start-time-container').style.display = 'none';
                            document.getElementById('end-time-container').style.display = 'none';
                            document.getElementById('office-container').style.display = 'none';
                        }
                    });

                    document.getElementById('end_date').addEventListener('change', function() {
                        const startTimeContainer = document.getElementById('start-time-container');
                        if (this.value !== '') {
                            startTimeContainer.style.display = 'block';
                        } else {
                            startTimeContainer.style.display = 'none';
                            document.getElementById('start_time').value = '';
                            document.getElementById('end-time-container').style.display = 'none';
                            document.getElementById('office-container').style.display = 'none';
                        }
                    });

                    document.getElementById('start_time').addEventListener('change', function() {
                        const endTimeContainer = document.getElementById('end-time-container');
                        if (this.value !== '') {
                            endTimeContainer.style.display = 'block';
                        } else {
                            endTimeContainer.style.display = 'none';
                            document.getElementById('end_time').value = '';
                            document.getElementById('office-container').style.display = 'none';
                        }
                    });

                    document.getElementById('end_time').addEventListener('change', function() {
                        const officeContainer = document.getElementById('office-container');
                        if (this.value !== '') {
                            officeContainer.style.display = 'block';
                        } else {
                            officeContainer.style.display = 'none';
                        }
                    });
                    document.getElementById('form').addEventListener('submit', function(event) {
                        // Réactiver les champs de date et d'heure avant la soumission du formulaire
                        startDateInput.disabled = false;
                        endDateInput.disabled = false;
                        startTimeInput.disabled = false;
                        endTimeInput.disabled = false;
                    });
                </script>






            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div>
                    <button class="btn btn-primary">
                        @if($event->exists)
                            {{__('events.edit')}}
                        @else
                            {{__('events.create')}}
                        @endif
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
