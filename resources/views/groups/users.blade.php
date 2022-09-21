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
                                <a href="{{ route('groups.edit', array_merge(['user' => $user->id], Request::query())) }}" class="nav-link">全般</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('groups.users',  array_merge(['user'=> $user->id], Request::query())) }}" class="nav-link active">ユーザー</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <table class="table w-100">
                            <thead>
                                <th class="text-center">{{ __('User') }}</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach($user->users as $u)
                                    <tr>
                                        <td class="align-middle">
                                            <a href="{{ route('users.show', ['user' => $u->id]) }}">{{ $u->name }}</a>
                                        </td>
                                        <td class="text-end">
                                            <form method="POST" class="d-inline p-0" action="{{ route('groups.users.destroy', ['user' => $user->id, 'id' => $u->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-none" type="submit"><i class="bi bi-trash"></i>{{ __('Delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
