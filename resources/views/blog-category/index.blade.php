@extends('layouts.app')

@section("title") Article Category Manager @endsection

@section('content')
<div class="container-fluid">
    <x-bread-crumb>
        <li class="breadcrumb-item active mb-3" aria-current="page">Blog Category Manager</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">
                        <i class="feather-layers"></i>
                        Blog Category Lists
                    </h4>
                    <hr>
                    <form action="{{ route('blog-category.store') }}" class="mb-4" method="POST">
                        @csrf
                        <div class="form-inline">
                            <input type="text" name="title" class="form-control form-control-lg @error('title')
                                is-invalid
                            @enderror" placeholder="New Category" value="{{ old('title') }}">
                            <button class="btn btn-primary btn-lg ms-3">Add Category</button>
                        </div>
                        @error('title')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </form>

                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Owner</th>
                                <th>Controls</th>
                                <th>Created_at</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach (App\BlogCategory::with('user')->get() as $k=>$blogCategory)
                            <tr>
                                <td>{{ ++$k }}</td>
                                <td>{{ $blogCategory->title }}</td>
                                <td>{{ $blogCategory->user->name }}</td>

                                <td>
                                    <a href="{{ route('blog-category.edit', $blogCategory->id) }}"
                                        class="btn btn-sm btn-outline-success">Edit</a>


                                    <form action="{{ route('blog-category.destroy', $blogCategory->id) }}" method="post"
                                        class="d-inline-block">
                                        @csrf
                                        @method('delete')

                                        <input type="hidden" name="id" value="({{  $blogCategory->id }}">
                                        <button type="submit" onclick="return confirm('Sure !')"
                                            class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                                <td>
                                    <span class="small">
                                        <i class="feather-calendar"></i>
                                        {{ $blogCategory->created_at->format("d-m-Y") }}
                                    </span>
                                    <br>
                                    <span class="small">
                                        <i class="feather-clock"></i>
                                        {{ $blogCategory->created_at->format("h:i A") }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

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