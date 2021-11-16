@extends('juswise-theme.master')

@section('title')
{{ $case->title }}
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
        right: 304px;
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

    @media only screen and (max-width: 425px) {
        label.star {
            right: 202px;
        }
    }

    @media only screen and (max-width: 375px) {
        label.star {
            right: 166px;
        }
    }

    @media only screen and (max-width: 360px) {
        label.star {
            right: 152px;
        }
    }

    @media only screen and (max-width: 325px) {
        label.star {
            right: 110px;
        }
    }

    /** end rating **/
</style>
@endsection

@section('content')
<button class="mode-chg animate__animated animate__fadeInDown animate__delay-1s shadow" id="dark-btn"
    onclick="chgdark()">
    <i class=" fas fa-moon" id="modeIcon"></i>
</button>

<section class="jusx-details">
    <div class="container ">

        <div class="row justify-content-center min-vh-100">
            <div class="col-12 col-md-10">
                <h4 class="fw-bold mt-3  " style="line-height: 35px">{{ $case->title }}</h4>
                <hr class="line">


                <div class="jusx-text">
                    <h5 class="text-secondary fw-bold mb-0">Case Number</h5>
                    <br>
                    <p class="">
                        {{ $case->case_number }}
                    </p>
                    <hr class="line">
                    <br>
                    <br>
                </div>

                <div class="jusx-text">
                    <h5 class="text-secondary fw-bold mb-0">Category of the Case</h5>
                    <br>
                    <p>
                        {{ $case->category->title }}
                    </p>
                    <hr class="line">
                    <br>
                    <br>
                </div>

                <div class="jusx-text">
                    <h5 class="text-secondary fw-bold mb-0">Allegations</h5>
                    <br>
                    <p>
                        {{ $case->allegation }}
                    </p>
                    <hr class="line">
                    <br>
                    <br>
                </div>

                <div class="jusx-text">
                    <h5 class="text-secondary fw-bold mb-0">Date of Decision</h5>
                    <br>
                    <p>
                        {{ $case->decision_date }}
                    </p>
                    <hr class="line">
                    <br>

                </div>

                <div class="jusx-text">
                    <h5 class="text-secondary fw-bold mb-0">Case Summary</h5>
                    <br>
                    <p>
                        {{ $case->case_summary }}
                    </p>
                    <br>
                    <hr class="line">
                    <br>

                </div>

                <div class="jusx-text">
                    <h5 class="text-secondary fw-bold mb-0">Decision</h5>
                    <br>
                    <p>{{ $case->decision }}</p>
                    <hr class="line">
                    <br>

                </div>

                <div class="jusx-text">
                    <h5 class="text-secondary fw-bold mb-0">Instance</h5>
                    <br>
                    <p>
                        {{ $case->instance }}
                    </p>
                    <hr class="line">
                    <br>

                </div>

                <div class="jusx-text">
                    <h5 class="text-secondary fw-bold mb-0">Reasoning Decision of Court</h5>
                    <p>
                        {{ $case->conclusion }}
                    </p>
                    <hr class="line">
                </div>


                <div class="jusx-pdf mt-5">
                    <h5 class="text-secondary fw-bold mb-0">Related Cases & Documents</h5>
                    <br>
                    <p>{{ $case->related_case }}</p>
                    <hr class="line">
                    <div class="d-flex justify-content-between">
                        <p class="fw-bold">
                            <i class="far fa-file-alt text-success"></i>
                            {{ $case->document_name }}
                        </p>
                        <a href="{{ $case->document_link }}" target="_blank"
                            class="btn btn-view text-secondary mb-0">View document</a>
                    </div>
                </div>

                <div class="text-end mt-5 mt-md-2">
                    <a href="{{ route('jusxDb') }}" class="btn btn-primary btn-back ">Back</a>
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
                    <h4 class="modal-title fw-bold text-secondary" id="staticBackdropLabel">Share Your Experience</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('feedback.setRating') }}" method="POST" id="setRating">
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
                            <textarea name="description" id="any" cols="15" rows="5" class="form-control"
                                placeholder="Enter your message" required></textarea>
                        </div>

                    </form>
                </div>
                <div class="modal-footer custom-footer">
                    <button type="submit" form="setRating" class="btn btn-secondary">Submit</button>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('foot')
<script>
    function chgdark() {
        document.body.classList.toggle("dark-mode");
    }
       
    let timer = setInterval(function () {
        $("#staticBackdrop").modal('show');
    }, 5000);
        
    setTimeout(function () {
        clearInterval(timer);
        console.log('stop')
    }, 10000);
       
</script>
@endsection