@extends('layouts.app')

@section("title") Create Article @endsection

@section('content')
<div class="container-fluid">
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Article Lists</a></li>
        <li class="breadcrumb-item active mb-3" aria-current="page">Create Article</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12 mb-3">
            <div class="card">
               <div class="card-body">
                    <h4 class="mb-0">
                        <i class="feather-plus-circle"></i>
                        Create Article
                    </h4>
                    <hr>

                    <form action="{{ route('article.store') }}" id="createArticle" method="POST">
                        @csrf
                    </form>
               </div>
            </div>
        </div>

        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <label for="">Select Category </label>
                        <Select class="form-select @error('category_id')
                            is-invalid
                        @enderror" form="createArticle" name="category" >
                            <option value="">
                                Select Category
                            </option>
                            @foreach ($articleCategories as $category)
                                <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                            @endforeach
                        </Select>
                        @error('category')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-9 my-3 my-lg-0">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                       <div class="form-group mb-3">
                           <label for="">Article Title</label>
                           <input type="text" class="form-control form-control-lg @error('title')
                               is-invalid
                           @enderror" form="createArticle" value="{{ old('title') }}" name="title" required>
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                       </div>

                       <div class="form-group">
                           <label for="">Article Description</label>
                           <textarea class="form-control fs-5 @error('description')
                               is-invalid
                           @enderror" rows="15" form="createArticle" name="description" required>{{ old('description') }}</textarea>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                       </div>

                        <div class="form-group mt-4">
                            <button class="btn btn-primary w-100" form="createArticle">Create Article</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="col-12 col-lg-2">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-0">
                       <button class="btn btn-primary w-100" form="createArticle">Create Article</button>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection
