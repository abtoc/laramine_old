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
                    <li class="breadcrumb-item active"><span class="fs-4">グループ</span></li>
                </ol>
            </nav>
        </div>
        <div class="col-4 text-end">
            <a href="{{ route('groups.create', Request::query()) }}" class="text-decoration-none link-dark"><i class="bi bi-person-plus"></i> {{ __('New Group') }}</a>
        </div>
    </div>
    <form action="{{ route('groups.index')}}" class="row g-1 mb-3">
        @foreach($query_exception_page as $key => $value)
            @if(!in_array($key, ['name']))
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endif
        @endforeach
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
            <th class="text-center">{{ __('Name') }}</th>
            <th class="text-center">{{ __('Group')}}</th>
            <th></th>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="align-middle">
                        <a href="{{ route('groups.edit', array_merge(['user' => $user->id], Request::query())) }}" class="@if(!$user->isActive()) link-secondary @endif">
                            {{ $user->name }}
                        </a>
                    </td>
                    <td class="align-middle text-center">
                        <span class="@if(!$user->isActive()) text-muted @endif">{{ $user->users->count() }}</span>
                    </td>
                    <td class="text-end align-middle">
                        @if($user->isGroup())
                            <form method="POST" class="d-inline p-0" action="{{ route('groups.destroy', array_merge(['user' => $user->id], $query_exception_page)) }}">
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