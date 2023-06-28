@extends('admin.users')

@section('title', $user->exists ? "Modifier un utilisateur" : "Créer un utilisateur")

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
            @if($user->exists)
                @include('components.input.input' , ['label' => 'Code d\'affiliation' , 'name' => 'referral_code', 'value' => $user->referral_code])
            @else
                @include('components.input.input' , ['label' => 'Password' , 'name' => 'password', 'value' => $user->password, 'class' => 'display-none'])
            @endif

{{--
            @include('components.input.checkbox' , ['label' => 'Admin' , 'name' => 'is_admin', 'value' => $user->is_admin])
--}}
                 <select name="is_admin" id="is_admin">
                     @if($user->is_admin == 0)
                         <option value="0">Non</option>
                         <option value="1">Oui</option>
                     @else
                         <option value="1">Oui</option>
                         <option value="0">Non</option>
                     @endif
                 </select>

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
