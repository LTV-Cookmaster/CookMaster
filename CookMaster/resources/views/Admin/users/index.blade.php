@extends('admin.users')

@section('title' , 'Listes des Utilisateurs')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Créer un user</a>
    </div>
    <table class="table table-striped">
        <thead class="thead-dark" style="background-color: black;color: white">
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Ville</th>
            <th>Code Postal</th>
            <th>Pays</th>
            <th>Date Création</th>
            <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr class="table-success">
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->city }}</td>
                <td>{{ $user->postal_code }}</td>
                <td>{{ $user->country }}</td>
                <td>{{ $user->created_at }}</td>
                <td><a href="{{ route('admin.user.edit', $user) }}" class="btn btn-primary">Modifier</a>
                <a href="#" class="btn btn-danger">Bannir</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
@endsection
