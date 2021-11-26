@extends('juswise-theme.master')

@section('title')
About Us
@endsection

@section('head')
<link rel="stylesheet" href="{{ asset('dashboard/assets/Vendor/imagehover.css-master/css/imagehover.css') }}">
@endsection

@section('content')
{{-- Navigation --}}
@include('juswise-theme.navbar')

{{-- Hero Banner --}}
<div class="container-fluid about-page-bg mt-5 bg-blur  home-ph "
    style="background-image: url('{{ asset('images/banner/about-bg.jpg') }}')">
    <div class="row min-vh-100 d-md-flex  align-items-center justify-content-center">
        <div class="col-12 col-md-6 col-lg-4 text-primary text-center  animate__animated animate__fadeIn">
            <div class="text-white main-cap-ph ">
                <h1 class="mb-3 fw-bolder   " style="z-index: 0; color: #FF7722;">About Us</h1>
                <p class="text-light  fw-bolder">
                    Our Team is a group of innovative and passionate law students, developers and designers who are
                    passionate about changing Myanmar's legal services industry for the better.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid about-page-2" id="about">
    <div class="row  ">
        <div class="container">
            <div class="row ">
                <div class="mt-5">
                    <h3 class="text-center mt-md-2 text-secondary mt-5 wow animate__zoomInDown ani1"
                        style="text-decoration: underline; text-underline-offset: 0.3em;">About Us</h3>
                </div>
                <div class="d-md-flex align-items-center justify-content-evenly about-all mt-lg-5  ">
                    <div class="col-12 col-md-6">

                        <div class=" text-black-50 wow animate__fadeInLeft ani1 my-3">
                            <p>
                                We welcome creative and passionate individuals who have talents in different fields:
                                legal studies, technical architecture, economics. The JusX team believes in the values
                                of human resources to reach its goals with collective creativity and harmonious
                                teamwork. As JusX is constantly guided to maintain a fresh and empathetic learning
                                environment for all members, we welcome any individuals to explore their talents and
                                begin their self-discovery journey by working here with innovative and passionate law
                                students,
                                developers and designers who are passionate about changing Myanmar's legal services
                                industry for the better.
                            </p>
                            <!-- <br> -->
                            <h5>Call for contributors</h5>
                            <p class="pt-1">
                                We welcome any experienced or inexperienced contributors who possess strong passion for
                                writing, deep interest in legal studies and strong sense of community welfare. If you’re
                                interested, see our JusX contributor kit here and email us at
                                <u>connect.juswise@gmail.com</u>.
                            </p>

                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div>
                            <img src="{{ asset('images/theme/team.one.jpeg') }}"
                                class="img-fluid wow animate__flipInX shadow-lg rounded ani2 mb-5" alt="">
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<div class="container-fluid d-none d-xl-block">
    <div class="row ">
        <div class="col-12 ">
            <div class="d-md-flex">
                <div class="card ">
                    <figure class="imghvr-push-up">
                        <img src="{{ asset('images/theme/mcustom.png') }}" class="about-hover-img" alt="example-image">
                        <figcaption>
                            <h1 class="about-line-img">MYANMAR CUSTOMARY CASES</h1>
                        </figcaption>
                    </figure>
                </div>

                <div class="card">
                    <figure class="imghvr-push-up">
                        <img src="{{ asset('images/theme/civil.jpeg') }}" class="about-hover-img" alt="example-image">
                        <figcaption>
                            <h1 class="about-line-img">CIVIL CASES</h1>
                        </figcaption>
                    </figure>
                </div>

                <div class="card">
                    <figure class="imghvr-push-up">
                        <img src="{{ asset('images/theme/criminal.jpeg') }}" class="about-hover-img"
                            alt="example-image">
                        <figcaption>
                            <h1 class="about-line-img">CRIMINAL CASES</h1>
                        </figcaption>

                    </figure>
                </div>

                <div class="card">
                    <figure class="imghvr-push-up">
                        <img src="{{ asset('images/theme/labor.jpeg') }}" class="about-hover-img" alt="example-image">
                        <figcaption>
                            <h1 class="about-line-img">LABOR CASES</h1>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Team member info -->
<div class="container-fluid mt-5 mt-md-0 mb-5 " style="background-color: #FAFAFA!important;">
    <div class="row  align-items-center justify-content-center ">
        <div class="col-12 ">
            <div class="text-center mt-5 pt-5">
                <h2 class="fw-bolder mt-5 mt-md-0 "
                    style="text-decoration: underline; text-underline-offset: 0.3em; color: #FF7722;">JusX Database</h4>
            </div>
        </div>

        <div class="col-12 col-lg-4  about-middle-text ">
            <div class="text-center">
                <h3 class="py-2 fw-light text-secondary ">Free of Charge</h3>
                <p>JusX Database costs NONE for all users who would like to access our legal content.</p>
            </div>
        </div>
        <div class="col-12 col-lg-4 about-middle-text ">
            <div class="text-center">
                <h3 class="py-2 fw-light text-secondary">Accessible
                </h3>
                <p>Creation of JusX originated from the pure intention to exclude difficulty to access information from
                    being an obstacle for one’s legal studies.</p>
            </div>
        </div>
        <div class="col-12 col-lg-4  about-middle-text ">
            <div class="text-center">
                <h3 class="py-2 m-0 fw-light text-secondary">Diversity</h3>
                <p class="m-0 pt-md-3">A variety of legal contents are presented on JusX for all of our targeted
                    audiences. Scholarly debates and fresh perspectives are welcome.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-12">
            <div class="container">
                <div class="row d-flex align-items-center h-75">
                    <div class="col-12 col-md-4 ">
                        <div class="mb-5 mt-5 mt-md-0">
                            <div class="card shadow ">
                                <div class="card-body ">
                                    <h3 class="counter text-center fw-bolder">6</h3>
                                    <h4 class="text-center  fw-bold" style="color: #FF7722;">Legal Officer</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="mb-5">
                            <div class="card  shadow">
                                <div class="card-body">
                                    <h3 class="counter  text-center fw-bolder">4</h3>
                                    <h4 class="text-center  fw-bold" style="color: #FF7722;">Technical Architects</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="mb-5">
                            <div class="card shadow">
                                <div class="card-body">
                                    <h3 class="counter  fw-bolder text-center">15</h3>
                                    <h4 class="text-center  fw-bold" style="color: #FF7722;">Volunteer Researchers</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Footer --}}
@include('juswise-theme.footer')

@endsection

@section('foot')
<script src="{{ asset('dashboard/assets/Vendor/way_point/jquery.waypoints.js') }}"></script>
<script src="{{ asset('dashboard/assets/Vendor/counter_up/counter_up.js') }}"></script>
<script>
    $(".counter").counterUp({
    delay: 10,
    time: 1000
    });
</script>
@endsection