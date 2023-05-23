@extends('admin.admin')

@section('title' , 'Les locaux')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
   {{--     <a href="{{ route('admin.room.create') }}" class="btn btn-primary">Créer une Room</a>--}}
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Ville</th>
            <th>Nombres de pièces</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($offices as $office)
            <tr>
                <td>{{ $office->name }}</td>
                <td>{{ $office->address }}</td>
                <td>{{ $office->city }}</td>
                <td>{{ $office->number_of_rooms }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('admin.office.list', ['office' => $office->id]) }}">Afficher</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $offices->links() }}
@endsection
