@extends('layouts.admin')

@section('content-admin')
@php
    $query_exception_page = Request::query();
    unset($query_exception_page['page']);   
@endphp
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
            <a href="{{ route('users.create', Request::query()) }}" class="text-decoration-none link-dark"><i class="bi bi-person-plus"></i> {{ __('New User') }}</a>
        </div>
    </div>
    <form action="{{ route('users.index')}}" class="row g-1 mb-3">
        @foreach($query_exception_page as $key => $value)
            @if(!in_array($key, ['status', 'name']))
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endif
        @endforeach
        <label for="status" class="col-auto col-form-label text-md-end">{{ __('Status') }}:</label>
        <div class="col-auto">
            <select name="status" id="status" class="form-select form-select-sm">
                @foreach(App\Enums\UserStatus::cases() as $status)
                    <option value="{{ $status->value }}" @if((int)Request::query('status') === $status->value) selected @endif>{{ $status->string() }}</option>
                @endforeach
            </select>
        </div>
        <label for="name" class="col-auto col-form-label text-md-end">{{ __('Name') }}:</label>
        <div class="col-auto">
            <input type="text" id="name" name="name" class="form-control form-control-sm" value="{{ Request::query('name') }}">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary btn-sm">{{ __('Apply')}}</button>
        </div>
    </form>
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
                    <td class="align-middle">
                        <a href="{{ route('users.edit', array_merge(['user' => $user->id], Request::query())) }}" class="@if(!$user->isActive()) link-secondary @endif">
                            {{ $user->login }}
                        </a>
                    </td>
                    <td class="align-middle"><span class="@if(!$user->isActive()) text-muted @endif">{{ $user->name }}</span></td>
                    <td class="align-middle">
                        <a href="mailto:{{ $user->email }}" class="@if(!$user->isActive()) link-secondary @endif">{{ $user->email }}</a>
                    </td>
                    <td class="text-center align-middle">@if($user->admin) <i class="bi-check"></i> @endif</td>
                    <td class="text-center align-middle"><span class="@if(!$user->isActive()) text-muted @endif">@datetime($user->created_at)<span></td>
                    <td class="text-center align-middle"><span class="@if(!$user->isActive()) text-muted @endif">@datetime($user->last_login_at)</span></td>
                    <td class="text-end align-middle">
                        @if(Auth::id() !== $user->id)
                            @if($user->isActive())
                                <form method="POST" class="d-inline p-0" action="{{ route('users.lock', array_merge(['user' => $user->id], Request::query())) }}">
                                    @csrf
                                    <button class="btn btn-none" type="submit"><i class="bi bi-lock"></i>{{ __('Lock') }}</button>
                                </form>
                            @else
                                <form method="POST" class="d-inline p-0" action="{{ route('users.active', array_merge(['user' => $user->id],Request::query())) }}">
                                    @csrf
                                    @if($user->isLocked())
                                        <button class="btn btn-none" type="submit"><i class="bi bi-unlock"></i>{{ __('Unlock') }}</button>
                                    @else
                                        <button class="btn btn-none" type="submit"><i class="bi bi-unlock"></i>{{ __('Active') }}</button>
                                    @endif
                                </form>
                            @endif
                            <form method="POST" class="d-inline p-0" action="{{ route('users.destroy', array_merge(['user' => $user->id], $query_exception_page)) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-none" type="submit"><i class="bi bi-trash"></i>{{ __('Delete') }}</button>
                            </form>
                        @endif
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