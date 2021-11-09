@extends('layouts.app')

@section("title") {{ $problem->title }} @endsection

@section('theme')
<style>
    .case-detail .title {
        line-height: 45px;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('problem.index') }}">Case Lists</a></li>
        <li class="breadcrumb-item active mb-3" aria-current="page">Case Details</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body case-detail my-3">
                    <h4 class="title">{{ $problem->title }}</h4>
                    <hr class="text-primary">

                    <div class="mt-5 px-2 case-body">
                        <h4 class="fw-bold text-primary">Case Number</h4>
                        <p class="mt-2 fs-5">{{ $problem->case_number }}</p>
                    </div>

                    <div class="mt-5 px-2 case-body">
                        <h4 class="fw-bold text-primary">Category of the case</h4>
                        <p class="mt-2 fs-5">{{ $problem->category->title }}</p>
                    </div>

                    <div class="mt-5 px-2 case-body">
                        <h4 class="fw-bold text-primary">Allegations</h4>
                        <p class="mt-2 fs-5">{{ $problem->allegation }}</p>
                    </div>

                    <div class="mt-5 px-2 case-body">
                        <h4 class="fw-bold text-primary">Date of Decision</h4>
                        <p class="mt-2 fs-5">{{ $problem->decision_date }}</p>
                    </div>

                    <div class="mt-5 px-2 case-body">
                        <h4 class="fw-bold text-primary">Case Summary</h4>
                        <p class="mt-2 fs-5">{{ $problem->case_summary }}</p>
                    </div>

                    <div class="mt-5 px-2 case-body">
                        <h4 class="fw-bold text-primary">Decision</h4>
                        <p class="mt-2 fs-5">{{ $problem->decision }}</p>
                    </div>

                    <div class="mt-5 px-2 case-body">
                        <h4 class="fw-bold text-primary">Instance</h4>
                        <p class="mt-2 fs-5">{{ $problem->instance }}</p>
                    </div>

                    <div class="mt-5 px-2 case-body">
                        <h4 class="fw-bold text-primary">Reasoning Decision of Court</h4>
                        <p class="mt-2 fs-5">{{ $problem->conclusion }}</p>
                    </div>

                    <div class="mt-5 px-2 case-body">
                        <h4 class="fw-bold text-primary">Related Cases & Documents</h4>
                        <p class="mt-2 fs-5">{{ $problem->related_case }}</p>
                    </div>

                    <div class="mt-5 px-2 case-body">
                        <h4 class="fw-bold text-primary">Document Name</h4>
                        <p class="mt-2 fs-5">{{ $problem->document_name }}</p>
                    </div>

                    <div class="mt-5 px-2 case-body">
                        <h4 class="fw-bold text-primary">Document Link</h4>
                        <p class="mt-2 fs-5">{{ $problem->document_link }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection