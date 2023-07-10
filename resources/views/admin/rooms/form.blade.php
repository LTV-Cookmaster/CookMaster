@extends('admin.admin')

@section('title', $room->exists ? __('rooms.edit') : __('rooms.create'))
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
    <h1>@yield('title')</h1>

    <form class="vstack gap-2"
          action="{{ route($room->exists ? 'admin.room.update' : 'admin.room.store', ['room' => $room]) }}"
          method="post">
        @csrf
        @method($room->exists ? 'put' : 'post')

        <div class="row">
            @include('components.input' , ['class' => 'col','label' => __('rooms.name') , 'name' => 'name', 'value' => $room->name])
        </div>
        @include('components.input' , ['label' => __('rooms.description') , 'name' => 'description', 'type' => 'textarea' ,'value' => $room->description])
        <div class="row">
            <div class="col row">
                @include('components.input' , ['label' => __('rooms.max_capacity') , 'name' => 'max_capacity', 'value' => $room->max_capacity])
                @include('components.input' , ['label' => __('rooms.price') , 'name' => 'price', 'value' => $room->price])
            </div>
        </div>
        <div class="mb-3" id="office-container" style="display:block">
            <select class="form-select" name="office_id" id="office-select">
                <option value="default">Select an office</option>
                @foreach($offices as $office)
                    <option value="{{ $office->id }}">{{ $office->name }} | {{ $office->postal_code }} | {{ $office->address }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button class="btn btn-primary">
                @if($room->exists)
                {{__('rooms.update')}}
                @else
                {{__('rooms.create')}}
                @endif
            </button>
        </div>
    </form>

@endsection
