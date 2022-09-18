@extends('layouts.app')

@section('content')
<div class="container-fulid px-2 py-2 w-100">
    <div class="fs-4">{{ $user->name }}</div>
    <ul class="py-4">
        <li>{{ __('Login ID') }}: {{ $user->login }}</li>
        <li>{{ __('created at') }}: @date($user->created_at)</li>
        <li>{{ __('last login at' )}}: @date($user->last_login_at)</li>
    </ul>
</div> 
@endsection