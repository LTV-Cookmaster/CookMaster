@extends('admin.users')

@section('title' , __('users.list'))
@php
    use Carbon\Carbon;
@endphp
@include('layouts.navbar')
@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1>@yield('title')</h1>
{{--
        <a href="{{ route('admin.user.create') }}" class="btn btn-primary">{{__('users.create')}}</a>
--}}
    </div>


    <table class="table table-striped">
        <thead class="" style="color: white!important;">
        <tr>
            <th>{{__('users.name')}}</th>
            <th>{{__('users.email')}}</th>
            <th>{{__('users.city')}}</th>
            <th>{{__('users.postal_code')}}</th>
            <th>{{__('users.country')}}</th>
            <th>{{__('users.date')}}</th>
            <th>{{__('users.role')}}</th>
            <th>{{__('users.banned')}}</th>
            <th class="text-center">{{__('users.actions')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
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
                        if ($diffEnJours > 0) $phrase = __('users.phrase') . " " .$diffEnJours. " " . __('users.days');
                        else $phrase = __('users.today');
                @endphp
                <td>{{ $phrase }}</td>
                @if($user->is_admin)
                    <td><strong style="color: darkgoldenrod">{{__('users.admin')}}</strong></td>
                @else
                    <td>{{__('users.member')}}</td>
                @endif
                @if($user->is_ban)
                    <td><strong style="color: red">{{__('users.banned')}}</strong></td>
                    <td>
                        <a href="{{ route('admin.user.edit', $user) }}" class="btn btn-primary">{{__('users.update')}}</a>
                        <a href="{{ route('admin.user.unban', $user) }}" class="btn btn-success">{{__('users.unban')}}</a>
                        @if($user->is_admin)
                            <a href="{{ route('admin.user.demote', $user) }}" class="btn btn-outline-danger">{{__('admin.user_demote')}}</a>
                        @else
                            <a href="{{ route('admin.user.promote', $user) }}" class="btn btn-secondary">{{__('admin.user_promote')}}</a>
                        @endif
                    </td>
                @else
                    <td></td>
                    <td>
                        <a href="{{ route('admin.user.edit', $user) }}" class="btn btn-primary">{{__('users.update')}}</a>
                        <a href="{{ route('admin.user.ban', $user) }}" class="btn btn-danger">{{__('users.ban')}}</a>
                        @if($user->is_admin)
                            <a href="{{ route('admin.user.demote', $user) }}" class="btn btn-outline-danger">{{__('admin.user_demote')}}</a>
                        @else
                            <a href="{{ route('admin.user.promote', $user) }}" class="btn btn-secondary">{{__('admin.user_promote')}}</a>
                        @endif
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
@endsection
