@extends('admin.admin')

@section('title', $equipement->exists ? __('equipments.form.update') : __('equipments.create'))
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
          action="{{ route($equipement->exists ? 'admin.equipement.update' : 'admin.equipement.store', ['equipement' => $equipement]) }}"
          method="post">
        @csrf
        @method($equipement->exists ? 'put' : 'post')

        <div class="row">
            @include('components.input' , ['class' => 'col','label' => __('equipments.name') , 'name' => 'name', 'value' => $equipement->name])
        </div>
        @include('components.input' , ['label' => __('equipments.description') , 'name' => 'description' ,'value' => $equipement->description])
        <div class="row">
            <div class="col row">
                @include('components.input' , ['label' => __('equipments.price') , 'name' => 'price', 'value' => $equipement->price])
                <br>
                <br>
                <br>
                <div class="mb-3" id="office-container" style="">
                    <select class="form-select" name="office_id" id="office_id">
                        <label for="office_id">{{__('equipments.form.office')}}</label>
                        <option value="default">{{__('equipments.form.select')}}</option>
                        @foreach($offices as $office)
                            <option value="{{ $office->id }}" {{ $equipement->office_id == $office->id ? 'selected' : '' }}>{{ $office->name }} | {{ $office->postal_code }} | {{ $office->address }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>

        <div>
            <button class="btn btn-primary">
                @if($equipement->exists)
                {{__('equipments.form.update')}}
                @else
                {{__('equipments.form.create')}}
                @endif
            </button>
        </div>
    </form>

@endsection
@include('layouts.footer')
