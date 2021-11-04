@extends('layouts.app')

@section("title") Edit Category @endsection

@section('content')
<div class="container-fluid">
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('article-category.index') }}">Article Category Manager</a></li>
        <li class="breadcrumb-item active mb-3" aria-current="page">Edit Category</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
               <div class="card-body">
                    <h4 class="mb-0">
                        <i class="feather-layers"></i>
                        Edit Category
                    </h4>
                    <hr>

                    <form action="{{ route('article-category.update', $articleCategory->id) }}" class="mb-4" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-inline">
                            <input type="text" name="title" class="form-control form-control-lg @error('title')
                                is-invalid
                            @enderror" placeholder="New Category" value="{{ old('title',  $articleCategory->title) }}" required>
                            <button class="btn btn-success btn-lg ms-3">Update Category</button>
                        </div>

                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </form>

                    @include('article-category.list')
               </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('foot')
    <script>
        const askArtiCateConfirm = (id) => {
            Swal.fire({
                title: `Are you sure?`,
                text: "You won't be able to revert this!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    'Deleted!',
                    'This Category has been deleted.',
                    'success'
                    )
                    setTimeout(function(){
                       $('#form'+id).submit();
                    }, 1500)
                }
            })
        }

    </script>
@endsection