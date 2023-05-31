@extends('admin.users')

@section('title' , 'Listes des Utilisateurs')
@php
    use Carbon\Carbon;
@endphp
@include('layouts.navbar')
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
            <th>Rôle</th>
            <th>Ban</th>
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
                <td style="max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
               {{--     {{ \Illuminate\Support\Str::limit($user->country, 20) }}--}}
                    {{ $user->country }}
                </td>
                @php
                        $dateCreation = Carbon::createFromFormat('Y-m-d H:i:s', $user->created_at);
                        $diffEnJours = $dateCreation->diffInDays(Carbon::now());
                        if ($diffEnJours > 0) $phrase = "il y a " . $diffEnJours . " jours";
                        else $phrase = "Aujourd'hui";
                @endphp
                <td>{{ $phrase }}</td>
                @if($user->is_admin)
                    <td><strong style="color: darkgoldenrod">Admin</strong></td>
                @else
                    <td>Membre</td>
                @endif
                @if($user->is_ban)
                    <td><strong style="color: red">Banni</strong></td>
                    <td>
                        <a href="{{ route('admin.user.edit', $user) }}" class="btn btn-primary">Modifier</a>
                        <a href="{{ route('admin.user.unban', $user) }}" class="btn btn-success">Débannir</a>
                    </td>
                @else
                    <td></td>
                    <td>
                        <a href="{{ route('admin.user.edit', $user) }}" class="btn btn-primary">Modifier</a>
                        <a href="{{ route('admin.user.ban', $user) }}" class="btn btn-danger">Bannir</a>
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
@endsection
