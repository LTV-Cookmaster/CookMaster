@extends('admin.admin')

@section('title' , 'Les Equipements louables')
@include('layouts.navbar')
@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.equipement.create') }}" class="btn btn-primary">Créer un equipement</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Office</th>
            <th>Prix</th>
            <th>Actions</th>
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
