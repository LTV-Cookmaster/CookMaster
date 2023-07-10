@include('layouts.navbar')
@section('title' , 'Profile')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success">
        <ul>
                <li>{{ session('success') }}</li>
        </ul>
    </div>
@endif
<div class="container rounded bg-white mt-5 mb-5 d-flex justify-content-center">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                <span class="font-weight-bold">{{ $user->name }}</span>
                <span class="text-black-50">{{ $user->email }}</span>
                <span> </span>
            </div>
        </div>
        <div class="col-md-6 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">{{__('Profile Settings')}}</h4>
                </div>
                <form action="{{ route('profil.update') }}" method="POST">
                    @csrf
                <div class="row mt-2 justify-content-center">
                    <div class="col-md-12">
                        <label class="labels">{{__('Name')}}</label>
                        <input type="text" name="name" class="form-control form-control-lg" placeholder="{{__('First name')}}" value="{{ $user->name }}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">{{__('Mobile Number')}}</label>
                        <input type="text" name="phone" class="form-control form-control-lg" placeholder="{{__('Enter phone number')}}" value="{{ $user->phone }}">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">{{__('Address Line 1')}}</label>
                        <input type="text" name="address" class="form-control form-control-lg" placeholder="{{__('Enter address line 1')}}" value="{{ $user->address }}">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">{{__('Postcode')}}</label>
                        <input type="text" name="postal_code" class="form-control form-control-lg" placeholder="{{__('Enter postcode')}}" value="{{ $user->postal_code }}">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">{{__('Country')}}</label>
                        <input type="text" name="country" class="form-control form-control-lg" placeholder="{{__('Enter country')}}" value="{{ $user->country }}">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">{{__('City')}}</label>
                        <input type="text" name="city" class="form-control form-control-lg" placeholder="{{__('Enter state/region')}}" value="{{ $user->city }}">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">{{__('Email ID')}}</label>
                        <p class="form-control form-control-lg">{{ $user->email }} </p>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">{{__('Code de parrainage')}}</label>
                        <p class="form-control form-control-lg">{{ $user->referee_code }}</p>
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" type="submit">{{__('Save Profile')}}</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>




<style>

    .form-control:focus {
        box-shadow: none;
        border-color: #4CAF50;
    }

    .profile-button {
        background: #4CAF50;
        box-shadow: none;
        border: none;
    }

    .profile-button:hover {
        background: #388E3C;
    }

    .profile-button:focus {
        background: #388E3C;
        box-shadow: none;
    }

    .profile-button:active {
        background: #388E3C;
        box-shadow: none;
    }

    .back:hover {
        color: #388E3C;
        cursor: pointer;
    }

    .labels {
        font-size: 11px;
    }

    .add-experience:hover {
        background: #4CAF50;
        color: #fff;
        cursor: pointer;
        border: solid 1px #4CAF50;
    }


@include('layouts.footer')
