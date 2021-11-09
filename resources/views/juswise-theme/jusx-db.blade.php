@extends('juswise-theme.master')

@section('name')
JusX Database
@endsection

@section('head')
<style>
    .category-list {
        border-radius: 20px;
        transition: 0.5s;
    }

    .selected {
        background: #7A0A4F !important;
        color: white !important;
    }

    /** rating **/
    div.stars {
        display: inline-block;
    }

    input.star {
        display: none;
    }

    label.star {
        position: relative;
        right: 280px;
        float: right;
        padding: 5px;
        font-size: 20px;
        color:
            #444;
        transition: all .2s;
    }

    input.star:checked~label.star:before {
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        content: "\f005";
        color: #7A0A4F;
        transition: all .25s;
    }

    input.star-5:checked~label.star:before {
        color: #7A0A4F;
        text-shadow: 0 0 5px #7f8c8d;
    }

    input.star-1:checked~label.star:before {
        color: #7A0A4F;
    }

    label.star:hover {
        transform: rotate(-15deg) scale(1.3);
    }

    label.star:before {
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        content: "\f005";
    }


    .horline>li:not(:last-child):after {
        content: " |";
    }

    .horline>li {
        font-weight: bold;
        color:
            #ff7e1a;

    }

    /** end rating **/
</style>
@endsection

@section('content')
<nav class="navbar navbar-expand-lg py-3 navbar-light animate__animated animate__bounceInDown  position-fixed top-0 w-100"
    id="nav">
    <div class="container">
        <a href="{{ route('index') }}">
            <img src="{{ asset(\App\Base::$logo) }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="feather-menu p-1 text-secondary menu-icon"></i>

        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ms-auto mb-2 mb-lg-0">
                <li class="nav-item  mx-2 ">
                    <a class="nav-link text-secondary" aria-current="page" href="{{ route('index') }}">Home</a>
                </li>
                <li class="nav-item  mx-2">
                    <a class="nav-link text-secondary nav-underline" href="{{ route('jusxDb') }}">JusX Database</a>
                </li>

                {{-- <li class="nav-item  mx-2">
                    <a class="nav-link text-secondary " href="jusX-blog.html" target="_blank">Blog</a>
                </li> --}}
                <li class="nav-item  mx-2">
                    <a class="nav-link empower text-light" href="{{ route('donate') }}">Empower Us</a>
                </li>


            </ul>

        </div>
    </div>
</nav>

<!-- Home -->
<section id="home" class="jusX-Db-bg mt-5"
    style="background-image: url('{{ asset('images/banner/jusx-database.jpg') }}')">
    <div class="container">

        <!-- Hero Text -->
        <div class="row min-vh-100 d-flex justify-content-center align-items-center">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="text-white text-center">
                    <h2 class="mb-5 text-secondary">JusX Database</h2>
                    <p style="font-family: sans-serif!important;">
                        ✔ Free of Charge
                        <br>
                        ✔ Accessible
                        <br>
                        ✔ Diversity
                        <br>
                        Free search engine for Legal Cases

                    </p>
                </div>
            </div>
        </div>

        <!-- JusX Hero  -->
        <div class="jusx-hero">
            <div class="d-flex justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="d-flex shadow-sm">
                        <div class="custom-search-bar d-inline-block">
                            <form action="{{ route('jusxDb') }}" method="GET" id="searchCase">
                                <i class="fas fa-search"></i>
                                <input type="text" placeholder="Search case here" name="search"
                                    value="{{ request()->search }}" required>
                            </form>
                        </div>

                        <div>

                            <button class="btn btn-primary btn-search text-white" form="searchCase">Search</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- Search Engine Button --}}
<div class="container mt-5">
    <div class="row justify-content-md-center">
        <div class="col-10">
            <button class="btn btn-engine btn-primary  text-nowrap  mt-3 mt-md-0 show">Search Engine <i
                    class="icofont-simple-down "></i></button>
        </div>
    </div>
</div>

<!-- JUSX-SEARCH Box -->
<section class="jusx-search hide-engine ">
    <div class="container">
        <div class="row align-items-center  justify-content-center ">
            <div class="col-12 col-md-9 col-lg-7">

                <div class="shadow px-4 py-4 mt-5">
                    <div class="d-md-flex justify-content-between">
                        {{-- Category Lists --}}
                        <div class="">
                            <h4 class="text-secondary mb-3 mt-0">Category of Case</h4>

                            <div>
                                @foreach ($categories as $category)
                                <a href="{{ route('baseOnCategory', $category->id) }}"
                                    class="d-block text-decoration-none category-list shadow-sm mb-2 text-center text-dark bg-light py-1 {{ request()->url() === route('baseOnCategory', $category->id) ? 'selected' : '' }}">
                                    {{ $category->title }}
                                </a>
                                @endforeach
                            </div>
                        </div>

                        {{-- Divider --}}
                        <div class="ms-2 d-none d-md-block ">
                            <div class=" border border-secondary line">

                            </div>
                        </div>

                        <div class="ms-0 ms-md-3 mt-3 mt-md-0">
                            <form action="{{ route('baseOnDate') }}" method="GET">
                                <h4 class="text-secondary">Date of Decision</h4>
                                <div class="form-group mt-3">
                                    <label for="">Start Date</label>
                                    <input type="date" class="form-control" name="start" required>
                                </div>

                                <div class="form-group mt-3">
                                    <label for="">End Date</label>
                                    <input type="date" class="form-control" name="end">
                                </div>

                                <div class="mt-4">
                                    <button class="btn btn-outline-secondary w-100">Search</button>
                                    {{-- <button type="button"
                                        class="btn btn-outline-danger close-engine ">Cancel</button> --}}
                                </div>
                            </form>
                        </div>

                        <i class="icofont-close-line fs-1 close-engine close d-none d-xl-block"></i>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
<!-- JUSX-SEARCH END -->

<!--Case Content -->
<section class="jusx-content">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-12 col-md-10 mt-lg-5 mt-0">
                <p class="fw-bold mb-md-5">Search Result : <span class="text-primary">{{ $cases->total() }}</span></p>

                <!-- Case  -->
                @forelse ($cases as $case)
                <div class=" card p-3 shadow mb-5">
                    <h3 class="fw-bolder " style="letter-spacing: 3px;">{{ $case->title }}</h3>
                    <span class="text-secondary fs-5 my-2">{{ $case->category->title }} | {{ $case->decision_date
                        }}</span>
                    <p class="fs-5">{{ Str::words($case->case_summary, 35, '...') }}</p>
                    <div class="">
                        <a href="{{ route('db.detail', $case->id) }}" class="btn btn-outline-secondary float-end">View
                            More</a>
                    </div>
                </div>
                @empty
                <h1>There is no case</h1>
                @endforelse

                <!-- Pagination -->
                <div class="mt-8 d-flex justify-content-center justify-content-md-end">
                    {{ $cases->appends(Request::all())->onEachSide(1)->links() }}
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Modal -->
<div>
    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Launch static backdrop modal
                </button> -->

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content custom-content">
                <div class="modal-header custom-header">
                    <h4 class="modal-title fw-bold" id="staticBackdropLabel">Share Your Experience</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('review') }}" method="POST" id="setRating">
                        @csrf
                        <div class="form-group required mb-5">
                            <span class="text-black-50">
                                How satisified are you with the overall experience on our website?
                            </span>
                            <div class="">
                                <input class="star star-5" value="5" id="star-5" type="radio" name="star" />
                                <label class="star star-5" for="star-5"></label>
                                <input class="star star-4" value="4" id="star-4" type="radio" name="star" />
                                <label class="star star-4" for="star-4"></label>
                                <input class="star star-3" value="3" id="star-3" type="radio" name="star" />
                                <label class="star star-3" for="star-3"></label>
                                <input class="star star-2" value="2" id="star-2" type="radio" name="star" />
                                <label class="star star-2" for="star-2"></label>
                                <input class="star star-1" value="1" id="star-1" type="radio" name="star" />
                                <label class="star star-1" for="star-1"></label>
                            </div>
                        </div>


                        <div class="my-4">
                            <label class="text-black-50">Did you find what you are looking for?</label>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="radio" name="useful" value="1"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="useful" value="0"
                                    id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    No
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="any" class="mb-2 text-black-50">Any Problem?</label>
                            <textarea name="feedback" id="any" cols="15" rows="5" class="form-control"
                                placeholder="Enter your message"></textarea>
                        </div>

                    </form>
                </div>
                <div class="modal-footer custom-footer">
                    <button type="submit" form="setRating" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>

</div>

@include('juswise-theme.footer')
@endsection

@section('foot')
<script>
    $(window).on('load',function(){
        $('.hide-engine').hide();

        });
        $('.show').click(function(){
        $('.hide-engine').fadeIn();


        });
        $('.close-engine').click(function(){
        $('.hide-engine').fadeOut();
        $('.btn-engine-ph').show();
        });
        $('.btn-engine-ph').click(function(){
        $(this).hide();
    });

    $(window).on('load', function() {
    // $("#staticBackdrop").modal('show');
    
    });
    
    let timer = setInterval(function () {
        $("#staticBackdrop").modal('show');
    }, 5000);
    
    setTimeout(function () {
        clearInterval(timer);
        console.log('stop')
    }, 10000);
</script>
@endsection