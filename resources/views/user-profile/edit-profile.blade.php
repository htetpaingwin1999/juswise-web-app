@extends('layouts.app')

@section('title')
Edit Profile
@endsection

@section('content')
<div class="container-fluid">
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('profile') }}">Profile</a></li>
        <li class="breadcrumb-item active mb-3" aria-current="page">Edit Profile</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12 col-lg-5">
            <div class="card">
                <div class="card-body text-center shadow">
                    <img class="rounded-circle mb-3 mt-4"
                        src="{{ isset(Auth::user()->photo) ? asset('storage/user-profile/'.Auth::user()->photo) : asset('dashboard/assets/img/avatars/default-profile.png') }}"
                        width="180" height="180">

                    <form action="{{ route('profile.updatePhoto') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="d-flex justify-content-between align-items-end mb-2">
                            <div class="form-group mb-0">
                                <label class="text-center">
                                    <i class="feather-image"></i>
                                    Select New Photo
                                </label>
                                <input type="file" name="photo" class="p-1 overflow-hidden" required>

                                {{-- <input class="form-control" type="file" name="photo" required> --}}

                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="mr-1 feather-upload"></i>
                            </button>
                        </div>
                        @error("photo")
                        <small class="fw-bold text-danger text-center">{{ $message }}</small>
                        @enderror
                    </form>
                </div>
            </div>

        </div>
        <div class="col-12 col-lg-7">

            <div class="row">
                <div class="col">

                    {{-- Username & Email Form --}}
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">User Info</p>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('profile.changeNameEmail') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col">
                                        <div class="">
                                            <label class="form-label" for="username">
                                                <strong>
                                                    <i class="mr-1 feather-user"></i>
                                                    Username
                                                </strong>
                                            </label>
                                            <input class="form-control @error('name')
                                                is-invalid
                                            @enderror" type="text" id="username" placeholder="Username"
                                                value="{{ Auth::user()->name }}" name="name">

                                            @error("name")
                                            <small class="fw-bold text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="">
                                            <label class="form-label" for="email">
                                                <strong>
                                                    <i class="mr-1 feather-mail"></i>
                                                    Email
                                                </strong>
                                            </label>
                                            <input class="form-control @error('email')
                                                is-invalid
                                            @enderror" type="email" id="email" placeholder="user@example.com"
                                                value="{{ Auth::user()->email }}" name="email">

                                            @error("email")
                                            <small class="fw-bold text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <div class="col-6">
                                        <label class="form-label" for="username">
                                            <strong>
                                                <i class="fas fa-briefcase"></i>
                                                Position
                                            </strong>
                                        </label>
                                        <input type="text" class="form-control @error('position')
                                            is-invalid
                                        @enderror" name="position" value="{{ Auth::user()->position }}"
                                            placeholder="Programmer">
                                        @error('position')
                                        <small class="fw-bold text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mt-4">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"
                                            required>
                                        <label class="form-check-label" for="flexSwitchCheckDefault">I'm sure</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        Save Setting
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    {{-- Contact Form --}}
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Contact Settings</p>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="mb-3"><label class="form-label"><strong>Address</strong></label>
                                    <input class="form-control" type="text"
                                        placeholder="eg.No(1).&nbsp;C[1], Tarmwe Gyi(က+ခ),&nbsp;TarMwe,&nbsp;Yangon"
                                        name="address">
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label"><strong>Ph Number</strong></label>
                                            <input class="form-control" type="number" min="8"
                                                placeholder="Enter Your Ph Number" name="phno">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3"><button class="btn btn-primary btn-sm"
                                        type="submit">Save&nbsp;Settings</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection