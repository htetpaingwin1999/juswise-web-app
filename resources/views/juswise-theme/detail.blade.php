@extends('juswise-theme.master')

@section('title')
{{ $case->title }}
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
                            Council-62-16.pdf
                        </p>
                        <a class="btn btn-view text-secondary ">View document</a>
                    </div>
                </div>

                <div class="text-end mt-3  ">
                    <a href="{{ route('jusxDb') }}" class="btn btn-primary btn-back ">Back</a>
                </div>
            </div>
        </div>
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
                            <form action="" id="setRating">

                                <div>
                                    <label class="text-black-50">How satisified are you with the overall experience on
                                        our website?</label>
                                    <div class="mt-2 star-rating" id="star">
                                        <span class="fa fa-star one " id="starOne"></span>
                                        <span class="fa fa-star two " id="starTwo"></span>
                                        <span class="fa fa-star three " id="starThree"></span>
                                        <span class="fa fa-star four " id="starFour"></span>
                                        <span class="fa fa-star five " id="starFive"></span>
                                    </div>
                                </div>

                                <div class="my-4">
                                    <label class="text-black-50">Did you find what you are looking for?</label>
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            No
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="any" class="mb-2 text-black-50">Any Problem?</label>
                                    <textarea name="" id="any" cols="15" rows="5" class="form-control"
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
    </div>
</section>
@endsection