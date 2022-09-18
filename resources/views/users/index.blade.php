@extends('layouts.admin')

@section('content-admin')
<div class="container-fulid px-2 py-2 w-100">
    <div class="row justify-content-between">
        <div class="col-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><span class="fs-4">ユーザー</span></li>
                </ol>
            </nav>
        </div>
        <div class="col-4 text-end">
            <a href="{{ route('users.create') }}" class="text-decoration-none link-dark"><i class="bi bi-person-plus"></i> {{ __('New User') }}</a>
        </div>
    </div>
    <table class="table bg-white w-100">
        <thead>
            <th class="text-center">@sortablelink('login', __('Login ID'))</th>
            <th class="text-center">@sortablelink('name', __('Name'))</th>
            <th class="text-center">{{ __('Email') }}</th>
            <th class="text-center">{{ __('Administrator') }}</th>
            <th class="text-center">@sortablelink('created_at', __('created at'))</th>
            <th class="text-center">@sortablelink('last_login_at', __('last login at'))</th>
            <th></th>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="align-middle"><a href="{{ route('users.edit', ['user' => $user->id]) }}">{{ $user->login }}</a></td>
                    <td class="align-middle">{{ $user->name }}</td>
                    <td class="align-middle">{{ $user->email }}</td>
                    <td class="text-center align-middle">@if($user->admin) <i class="bi-check"></i> @endif</td>
                    <td class="text-center align-middle">@datetime($user->created_at)</td>
                    <td class="text-center align-middle">@datetime($user->last_login_at)</td>
                    <td class="text-end align-middle">
                        <form method="POST" class="d-inline" action="{{ route('users.destroy', ['user' => $user->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-none" type="submit"><i class="bi bi-trash"></i>{{ __('Delete') }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row justify-content-center">
        {{ $users->appends(request()->query())->links(); }}
    </div>
</div>
@endsection