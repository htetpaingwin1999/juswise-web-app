@extends('juswise-theme.master')

@section('title')
Juswise
@endsection

@section('content')
{{-- Navigation --}}
@include('juswise-theme.navbar')

{{-- Hero Banner --}}
<div class="container-fluid home-bg mt-5 home-ph"
    style="background-image: url('{{ asset('images/banner/home-bg.png') }}')">
    <div class="row min-vh-100 d-flex align-items-center justify-content-center">
        <div class="col-12">
            <div class="text-warning home-text text-center  typewriter-effect">
                <h3 class="element text-warning"></h3>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid what-we-do">
    <div class="row ">
        <div class="container">
            <div class="row ">
                <div class="">
                    <h3 class="text-center  text-secondary fw-bold mb-3  mt-4 wow animate__bounceIn"
                        style="text-decoration: underline; text-underline-offset: 0.3em;text-decoration-color: #FDD749">
                        What We Do</h3>
                </div>

                <div class="d-md-flex align-items-center justify-content-evenly  mt-5 ">
                    <div class="col-12 col-md-4">
                        <div>
                            <video width="450px" class=" shadow rounded" autoplay loop>
                                <source src="{{ asset('juswise-theme/img/hd.mp4') }}" type="video/mp4">
                            </video>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 ">
                        <div class="mt-5">
                            <p class=" wow animate__backInRight ">Our Phase - 1 product namely “JusX” is aimed to
                                present Myanmar case laws and legal research in an easily accessible structure; not
                                only well-detailed enough for legal scholar viewers but also comprehensible enough
                                to attract the general public. Our Next Step, Phase 2 is soon-to-be published and is
                                designed to offer direct and precise answers to legal concerns faced in everyone’s
                                daily life. What’s Next? You wouldn’t want to miss anything from Us.</p>
                        </div>

                    </div>
                </div>


            </div>
        </div>


    </div>
</div>

<section id="about-us">
    <div class="container-fluid about-bg mt-5 mb-5 ">
        <div class="row  ">
            <div class="container">
                <div class="row">
                    <div class="mt-md-5 mt-3">
                        <h3 class="text-center text-secondary fw-bold wow animate__zoomInDown ani1"
                            style="text-decoration: underline; text-underline-offset: 0.3em;">About Us</h3>
                    </div>
                    <div class="d-md-flex align-items-center justify-content-evenly about-all mt-3 ">
                        <div class="col-12 col-md-6">

                            <div class=" text-black-50 wow animate__backInLeft ani1">
                                <h3 class="text-warning">About Us</h3>
                                <p class="pt-1">
                                    Our Team is a group of innovative and passionate law students, developers and
                                    designers who are passionate about changing Myanmar's legal services industry
                                    for the better.
                                </p>

                            </div>
                            <a href="{{ route('about') }}"> <button
                                    class="btn btn-outline-primary shadow-lg  wow animate__zoomIn rounded-pill ani2">Read
                                    More</button></a>
                        </div>
                        <div class="col-12 col-md-4 mt-2  mt-md-0">
                            <div class="">
                                <img src="{{ asset('images/banner/group.jpeg') }}"
                                    class="img-fluid wow animate__flipInX shadow-lg rounded ani2 " alt="">
                            </div>
                        </div>
                    </div>


                </div>
            </div>


        </div>
    </div>
</section>

@include('juswise-theme.footer')
@endsection

@section('foot')
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
<script>
    var typed = new Typed(".element", {
    strings: [
    "Welcome to JusWise.",
    "We Research",
    "We Serve",
    "Your Legal Buddy"
    ],
    typeSpeed: 60,
    backSpeed: 80,
    backDelay: 80,
    loop: true,
    showCursor: false,
    fadeOut: true,
    fadeOutClass: "typed-fade-out",
    fadeOutDelay: 500
    });
</script>
@endsection