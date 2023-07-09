@extends('admin.users')

@section('title', $user->exists ? __('users.update_user') : __('users.create'))

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
            @include('components.input.input' , ['class' => 'col','label' => __('users.name') , 'name' => 'name', 'value' => $user->name])
        </div>
        @include('components.input.input' , ['class' => 'col','label' => __('users.email') , 'name' => 'email', 'value' => $user->email])
        <div class="row">
            <div class="col row">
                @include('components.input.input' , ['class' => 'col','label' => __('users.address') , 'name' => 'address', 'value' => $user->address])
                @include('components.input.input' , ['label' => __('users.city') , 'name' => 'city', 'value' => $user->city])
            </div>
            <div class="col row">
                @include('components.input.input' , ['class' => 'col','label' => __('users.postal_code') , 'name' => 'postal_code', 'value' => $user->postal_code])
                @include('components.input.input' , ['label' => __('users.country') , 'name' => 'country', 'value' => $user->country])
            </div>
            @include('components.input.input' , ['label' => __('users.phone') , 'name' => 'phone', 'value' => $user->phone])
            @if($user->exists)
                @include('components.input.input' , ['label' => __('users.referral_code') , 'name' => 'referral_code', 'value' => $user->referral_code])
            @else
                @include('components.input.input' , ['label' => __('users.password') , 'name' => 'password', 'value' => $user->password, 'class' => 'display-none'])
            @endif

{{--
            @include('components.input.checkbox' , ['label' => 'Admin' , 'name' => 'is_admin', 'value' => $user->is_admin])
--}}
                 <select name="is_admin" id="is_admin">
                     @if($user->is_admin == 0)
                         <option value="0">{{__('users.no')}}</option>
                         <option value="1">{{__('users.yes')}}</option>
                     @else
                         <option value="0">{{__('users.no')}}</option>
                         <option value="1">{{__('users.yes')}}</option>
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
