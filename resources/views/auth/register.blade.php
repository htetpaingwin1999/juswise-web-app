@extends('layouts.app')

@section('title')
    Create Account
@endsection

@section('content')
<div class="container">
   <div class="row justify-content-center align-items-center vh-100">
       <div class="col-12 col-md-5">
            <div class="card shadow">
                <div class="card-body px-4">
                    <div class="d-flex justify-content-center my-2">
                        <img src="{{ asset(\App\Base::$logo) }}"></img>
                    </div>
                    <h5 class="text-center text-primary">Create Account</h5>

                    <form class="user mt-4" action="{{ route('register') }}" method="POST">
                        @csrf

                        {{-- Username --}}
                        <div class="mb-4 form-group">
                            <input class="form-control form-control-user @error('name')
                                is-invalid
                            @enderror" type="text" placeholder="Username" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-4 form-group">
                            <input class="form-control form-control-user @error('email')
                                is-invalid
                            @enderror" type="email" aria-describedby="emailHelp" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="row mb-4">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input class="form-control form-control-user @error('password')
                                    is-invalid
                                @enderror" type="password" placeholder="Password" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                                @enderror
                            </div>

                            <div class="col-sm-6">
                                <input class="form-control form-control-user" type="password" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <button class="btn btn-outline-primary d-block btn-user w-100" type="submit">Sign Up</button>
                        <hr>
                    </form>
                </div>
            </div>
       </div>
       
   </div>
</div>
@endsection
