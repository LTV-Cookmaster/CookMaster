@extends('admin.users')

@section('title', $user->exists ? "Modifier un utilisateur" : "Créer un utilisateur")

@section('content')

    <h1>@yield('title')</h1>

    <form class="vstack gap-2" action="{{ route($user->exists ? 'admin.user.update' : 'admin.user.store', ['user' => $user]) }}" method="post">
        @csrf
        @method($user->exists ? 'put' : 'post')

        <div class="row">
            @include('components.input.input' , ['class' => 'col','label' => 'Nom' , 'name' => 'name', 'value' => $user->name])
        </div>
        @include('components.input.input' , ['class' => 'col','label' => 'email' , 'name' => 'email', 'value' => $user->email])
        <div class="row">
            <div class="col row">
                @include('components.input.input' , ['class' => 'col','label' => 'Adresse' , 'name' => 'address', 'value' => $user->address])
                @include('components.input.input' , ['label' => 'Ville' , 'name' => 'city', 'value' => $user->city])
            </div>
            <div class="col row">
                @include('components.input.input' , ['class' => 'col','label' => 'Code postal' , 'name' => 'postal_code', 'value' => $user->postal_code])
                @include('components.input.input' , ['label' => 'Pays' , 'name' => 'country', 'value' => $user->country])
            </div>
            @include('components.input.input' , ['label' => 'Téléphone' , 'name' => 'phone', 'value' => $user->phone])

{{--            @include('components.input.checkbox' , ['label' => 'Banni' , 'name' => 'ban', 'value' => $user->isBan])--}}

        </div>

        <div>
            <button class="btn btn-primary">
                @if($user->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>
    </form>

@endsection
