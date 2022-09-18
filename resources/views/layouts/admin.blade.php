@extends('layouts.app')

@section('content')
<div class="d-flex flex-column flex-shrink-0 p-3 bg-white" style="width: 280px">
    <span class="fs-4">管理</span>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="#" class="nav-link link-dark"><i class="bi-x-diamond"></i> {{ __("Project") }}</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link link-dark"><i class="bi-person"></i> {{ __("User") }}</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link link-dark"><i class="bi-people"></i> {{ __("Group") }}</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link link-dark"><i class="bi-gear"></i> {{ __("Setting") }}</a>
        </li>
    </ul>
</div>
@yield('content-admin')
@endsection