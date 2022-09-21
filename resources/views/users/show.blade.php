@extends('layouts.app')

@section('content')
<div class="container-fulid px-2 py-2 w-100">
    <div class="d-flex flex-column flex-wrap">
        <div class="mb-3">
            <div class="fs-4">{{ $user->name }}</div>
            <ul class="py-2">
                <li>{{ __('Login ID') }}: {{ $user->login }}</li>
                <li>{{ __('created at') }}: @date($user->created_at)</li>
                <li>{{ __('last login at' )}}: @date($user->last_login_at)</li>
            </ul>
        </div>
        <div class="mb-3">
            <div class="fs-4">{{ __('Group') }}</div>
            <ul class="py-2">
                @foreach($user->groups as $group)
                    <li>
                        @if(Auth::user()->admin)
                            <a href="{{ route('groups.edit', ['user' => $group->id]) }}">{{ $group->name }}</a>
                        @else
                            {{ $group->name }}
                        @endif                       
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div> 
@endsection