@extends('layouts.app')

@section('title')
    Profile
@endsection

@section('content')
    <div class="container-fluid">
        <x-bread-crumb>
            <li class="breadcrumb-item active mb-3" aria-current="page">Profile</li>
        </x-bread-crumb>

        <div class="row">
            <div class="col-12 col-lg-5">
                <div class="card mb-3">
                    <div class="card-body text-center shadow">
                    <img class="rounded-circle mb-3 mt-4" src="{{ isset(Auth::user()->photo) ? asset('storage/user-profile/'.Auth::user()->photo) : asset('dashboard/assets/img/avatars/default-profile.png') }}" width="180" height="180">
                    
                    <div class="mt-2">
                        <h4 class="fw-bold">{{ Auth::user()->name }}</h4>
                        <p>{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection