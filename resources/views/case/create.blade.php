@extends('layouts.app')

@section("title") Create Case @endsection

@section('content')
<div class="container-fluid">
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('problem.index') }}">Case Lists</a></li>
        <li class="breadcrumb-item active mb-3" aria-current="page">Create Case
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">
                        <i class="feather-plus-circle"></i>
                        Create Case
                    </h4>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-9">
            <div class="card shadow mt-3">
                <div class="card-body case-card m-4">
                    <form action="{{ route('problem.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-4">
                            <label for="parties">Parties Name</label>
                            <input type="text" id="parties" class="form-control fs-5 @error('title')
                                is-invalid
                            @enderror" placeholder="U Mya Vs Daw Hla" value="{{ old('title') }}" name="title" required>
                            @error('title')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label>Case Number</label>
                            <textarea rows="6" class="form-control fs-5 @error('case_number')
                                is-invalid
                            @enderror" placeholder="အမှုအမှတ်စဉ်" name="case_number"
                                required>{{ old('case_number') }}</textarea>
                            @error('case_number')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="">Select Category </label>
                            <Select class="form-select @error('category_id')
                                is-invalid
                            @enderror" name="category_id" required>
                                <option value="">
                                    အမှုအမျိုးအစား (eg.အမွေမှူ)
                                </option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected' :
                                    '' }}>{{ $category->title }}</option>
                                @endforeach
                            </Select>
                            @error('category_id')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label>Allegations</label>
                            <textarea rows="6" class="form-control fs-5 @error('allegation')
                                is-invalid
                            @enderror" placeholder="တရားစွဲဆိုသော/ပါရှိသောပုဒ်မ" name="allegation"
                                required>{{ old('allegation') }}</textarea>
                            @error('allegation')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label>Date Of Decision</label>
                            <input type="date" class="form-control fs-5 @error('decision_date')
                                is-invalid
                            @enderror" placeholder="အမှုဆုံးဖြတ်သည့်နေ့အတိအကျ" value="{{ old('decision_date') }}"
                                name="decision_date" required>
                            @error('decision_date')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label>Case Summary</label>
                            <textarea rows="12" class="form-control fs-5 @error('case_summary')
                                is-invalid
                            @enderror" placeholder="အမှုဖြစ်စဉ်အကျဉ်း" name="case_summary"
                                required>{{ old('case_summary') }}</textarea>
                            @error('case_summary')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label>Decision</label>
                            <textarea rows="12" class="form-control fs-5 @error('decision')
                                is-invalid
                            @enderror" placeholder="အမှုဖြစ်စဉ်အကျဉ်း" name="decision"
                                required>{{ old('decision') }}</textarea>
                            @error('decision')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label>Instance</label>
                            <input type="text" class="form-control fs-5 @error('instance')
                                is-invalid
                            @enderror" placeholder="ဆုံးဖြတ်ချက်အမျိုးအစား" value="{{ old('instance') }}"
                                name="instance" required>
                            @error('instance')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label>Reasoning Decision of Court</label>
                            <textarea rows="12" class="form-control fs-5 @error('conclusion')
                                is-invalid
                            @enderror" placeholder="ဆုံးဖြတ်ရာတွင် ထည့်သွင်းစဉ်းစားချက်များ" name="conclusion"
                                required>{{ old('conclusion') }}</textarea>
                            @error('conclusion')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label>Related Cases & Documents</label>
                            <textarea rows="10" class="form-control fs-5 @error('related_case')
                                is-invalid
                            @enderror" placeholder="ဆက်စပ်သည်များ (အမှု/စာအုပ်)" name="related_case"
                                required>{{ old('related_case') }}</textarea>
                            @error('related_case')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label>Document Name</label>
                            <input type="text" class="form-control fs-5 @error('document_name')
                            is-invalid
                            @enderror" placeholder="စာအုပ်နာမည်" value="{{ old('document_name') }}"
                                name="document_name" required>
                            @error('document_name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label>Document Link</label>
                            <input type="text" class="form-control fs-5 @error('document_link')
                            is-invalid
                            @enderror" placeholder="စာအုပ်လိပ်စာ" value="{{ old('document_link') }}"
                                name="document_link" required>
                            @error('document_link')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button class="btn btn-primary btn-lg w-100 mt-3">Create Case</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection