@extends('layouts.admin')

@section('content-admin')
<div class="container py-4">
    <div class="row justify-content-between">
        <div class="col-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}"><span class="fs-4">ユーザー</span></a></li>
                    <li class="breadcrumb-item active"><span class="fs-4">{{ $user->login }}</span></li>
            </nav>
        </div>
        <div class="col-4 text-end">
            <a href="{{ route('users.show', ['user' => $user->id]) }}" class="text-decoration-none link-dark"><i class="bi bi-person"></i> {{ __('Profile') }}</a>
        </div>
    </div>
     <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">{{ __('Update') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', array_merge(['user' => $user->id], Request::query())) }}">
                        @csrf
 
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="login" class="col-md-4 col-form-label text-md-end">{{ __('Login ID') }}</label>
                            <div class="col-md-6">
                                <input id="login" type="text" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login', $user->login) }}" required autocomplete="on">

                                @error('login')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4"></div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input type="checkbox" id="admin" class="form-check-input" name="admin" value="1" {{ old('admin', $user->admin ? '1' : null) === '1' ? 'checked' : '' }}>
                                    <label for="admin" class="form-check-label">{{ __('Administrator') }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4"></div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input type="checkbox" id="must-change-passwd" class="form-check-input" name="must_change_passwd" value="1" {{ old('must_change_passwd', $user->must_change_passwd ? '1' : null) === '1' ? 'checked' : '' }}>
                                    <label for="must-change-passwd" class="form-check-label">{{ __('Enter your password when logging in') }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection