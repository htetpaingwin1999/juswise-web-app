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
                            {{ $case->document_name }}
                        </p>
                        <a href="{{ $case->document_link }}" target="_blank"
                            class="btn btn-view text-secondary mb-0">View document</a>
                    </div>
                </div>

                <div class="text-end mt-3  ">
                    <a href="{{ route('jusxDb') }}" class="btn btn-primary btn-back ">Back</a>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

@section('foot')
<script>
    function chgdark() {
            document.body.classList.toggle("dark-mode");
            // document.getElementById("modeIcon").classList.toggle("fa-sun");/
        }
        // ================== Star Rating Process ==================
        // $('#addStar').change('.star', function(e) {
        // $(this).submit();
        // });
       
</script>
@endsection