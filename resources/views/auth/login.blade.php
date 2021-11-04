@extends('layouts.app')

@section('title')
    Sign In
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-9 col-lg-12 col-xl-10">

                <div class="card shadow border-0 my-5" >
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <img src="{{ asset('dashboard/assets/img/dogs/login-img.png') }}" alt="" class="img-fluid">
                            </div>

                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        {{-- <h4 class="text-dark mb-5 fw-bold">Welcome To JusWise</h4> --}}
                                        <img src="{{ asset(\App\Base::$logo) }}" class="mb-5"></img>
                                    </div>

                                    <form class="user" action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <input class="form-control form-control-user @error('email')
                                                is-invalid
                                            @enderror" type="email" placeholder="Enter Your Name..." value="{{ old('email') }}" name="email" required autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <input class="form-control form-control-user @error('password')
                                                is-invalid
                                            @enderror" type="password" placeholder="Password" name="password">

                                            @error('password')
                                            <span class=" invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                       <button class="btn btn-primary d-block btn-user w-100" type="submit">Sign In</button>
                                        
                                        
                                    </form>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection