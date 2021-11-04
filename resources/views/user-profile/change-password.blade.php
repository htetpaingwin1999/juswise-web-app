@extends('layouts.app')

@section('title')
    Change Password
@endsection

@section('content')
    <div class="container-fluid">
        <x-bread-crumb>
            <li class="breadcrumb-item"><a href="{{ route('profile') }}">Profile</a></li>
            <li class="breadcrumb-item active mb-3" aria-current="page">Change Password</li>
        </x-bread-crumb>

        <div class="row">
            <div class="col-12 col-md-8 col-lg-5">
                <div class="card">
                    <div class="card-body py-3">
                        <form action="{{ route('profile.updatePassword') }}" method="post">
                            @csrf
                            <div class="form-group ">
                                <label for="email">
                                    <i class="feather-lock"></i>
                                    Current Password
                                </label>
                                <input type="password" class="form-control"
                                    placeholder="Current Password" name="current_password" >
                                @error("current_password")
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group my-3">
                                <label for="current">
                                    <i class="feather-refresh-ccw"></i>
                                    Change Password
                                </label>
                                <input type="password" class="form-control" id="current"
                                    placeholder="New Password"  name="new_password" >
                                @error("new_password")
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">
                                    <i class="feather-check"></i>
                                    Confirm Password
                                </label>
                                <input type="password" class="form-control" id="repeat"
                                placeholder="Confirm Password" name="new_confirm_password" >
                                @error("new_confirm_password")
                                <small class="font-weight-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-5">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" required>
                                    <label class="form-check-label" for="flexSwitchCheckDefault">I'm sure</label>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    <i class="mr-1 feather-refresh-ccw"></i>
                                    Update Password
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection