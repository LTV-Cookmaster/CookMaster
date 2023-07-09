@extends('admin.admin')

@section('title' , __('equipments.form.title'))
@include('layouts.navbar')
@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.equipement.create') }}" class="btn btn-primary">{{__('equipments.create')}}</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>{{__('equipments.name')}}</th>
            <th>{{__('equipments.office')}}</th>
            <th>{{__('equipments.price')}}</th>
            <th>{{__('equipments.actions')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($equipements as $equipement)
            <tr>
                <td>{{ $equipement->name }}</td>
                <td>{{ $equipement->office_id }}</td>
                <td>{{ $equipement->price }}€</td>
                <td>
                    <a href="{{ route('admin.equipement.edit', ['equipement' => $equipement->id]) }}" class="btn btn-primary">Modifier</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $equipements->links() }}
@endsection
