@extends('layouts.admin')

@section('content-admin')
<div class="container-fulid px-2 py-2 w-100">
    <div class="row justify-content-between">
        <div class="col-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('groups.index', Request::query()) }}"><span class="fs-4">{{ __("Group") }}</span></a></li>
                    <li class="breadcrumb-item active"><span class="fs-4">{{ $user->name }}</span></li>
                </ol>
            </nav>
        </div>
        <div class="col-4 text-end">
        </div>
    </div>
     <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">{{ __('Update') }}</div>
                <div class="card-body">
                    <div class="row mb-3">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="{{ route('groups.edit', array_merge(['user' => $user->id], Request::query())) }}" class="nav-link active">全般</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('groups.users',  array_merge(['user'=> $user->id], Request::query())) }}" class="nav-link">ユーザー</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <form method="POST" action="{{ route('groups.update', array_merge(['user' => $user->id], Request::query())) }}">
                            @csrf
     
                            <div class="row mb-3">
                                <label for="name" class="col-md-1 col-form-label text-md-end">{{ __('Name') }}</label>
    
                                <div class="col-md-11">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus @if(!$user->isGroup()) disabled @endif>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-1">
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
</div>
@endsection
