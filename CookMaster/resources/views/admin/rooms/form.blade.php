@extends('admin.admin')

@section('title', $room->exists ? "Editer un bien" : "Créer un bien")

@section('content')

    <h1>@yield('title')</h1>

    <form class="vstack gap-2" action="{{ route($room->exists ? 'admin.room.update' : 'admin.room.store', ['room' => $room]) }}" method="post">
        @csrf
        @method($room->exists ? 'put' : 'post')

        <div class="row">
                @include('shared.input' , ['class' => 'col','label' => 'Nom' , 'name' => 'name', 'value' => $room->name])
        </div>
                @include('shared.input' , ['label' => 'Description' , 'name' => 'description', 'type' => 'textarea' ,'value' => $room->description])
        <div class="row">
            <div class="col row">
                @include('shared.input' , ['label' => 'Capacité maximum' , 'name' => 'max_capacity', 'value' => $room->max_capacity])
                @include('shared.input' , ['label' => 'Prix' , 'name' => 'price', 'value' => $room->price])
            </div>
                @include('shared.checkbox' , ['label' => 'Reservé' , 'name' => 'is_booked', 'value' => $room->is_booked])

        </div>

        <div>
            <button class="btn btn-primary">
                @if($room->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>
    </form>

@endsection
