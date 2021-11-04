@extends('layouts.app')

@section("title") Article Lists @endsection

@section('content')
<div class="">
    <x-bread-crumb>
        <li class="breadcrumb-item active mb-3" aria-current="page">Article Lists</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
               <div class="card-body">
                    <h4 class="mb-0">
                        <i class="feather-list"></i>
                        Article Lists
                    </h4>
                    <hr>

                    <div class="d-flex align-items-baseline">
                        <form action="{{ route('article.index') }}" class="mb-4" method="GET">
                            <div class="form-inline">
                                <input type="text" class="form-control" placeholder="Search ..." value="{{ request()->search }}" name="search"  required>
                                <button class="btn btn-primary ms-3">
                                    <i class="feather-search"></i>
                                </button>
                            </div>
                        </form>

                        <div class="ms-5 d-flex align-items-center">
                            @isset(request()->search)
                                <a href="{{ route('article.index') }}" class="text-decoration-none btn btn-danger btn-sm">
                                   x
                                </a>
                                <p class="fw-bold mt-3 ms-2">Search keyword : <span class="fs-5">'{{ request()->search }}'</span></p>
                            @endisset
                        </div>
                    </div>

                    <table class="table table-hover table-bordered table-responsive">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Article</th>
                                <th>Category</th>
                                <th>Owner</th>
                                <th>Control</th>
                                <th>Created_at</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($articles as $article)
                                <tr>
                                    <td>{{ $article->id }}</td>
                                    <td>
                                        <span class="fw-bold">{{ Str::words($article->title, 5, '...') }}</span>
                                        <br>
                                        <small class="text-black-50">{{ Str::words($article->description, 7, '.....') }}</small>
                                    </td>
                                    <td class="text-nowrap">{{ $article->category->title }}</td>
                                    <td class="text-nowrap">{{ $article->user->name }}</td>
                                    <td class="text-nowrap">
                                        <a href="{{ route('article.show', $article->id) }}" class="btn btn-sm btn-outline-success">
                                            Show
                                        </a>

                                        <a href="{{ route('article.edit', $article->id) }}" class="btn btn-sm btn-outline-primary">
                                            Edit
                                        </a>

                                        <form action="{{ route('article.destroy', $article->id) }}" method="post" class="d-inline-block" id="form{{ $article->id }}">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-sm btn-outline-danger" onclick="return askConfirm({{ $article->id }})">Delete</button>
                                        </form>
                                    </td>
                                    <td>
                                        <span class="small">
                                            {{-- <i class="feather-calendar"></i> --}}
                                            {{ $article->created_at->format("d-m-Y") }}
                                        </span>
                                        <br>
                                        <span class="small">
                                            {{-- <i class="feather-clock"></i> --}}
                                            {{ $article->created_at->format("h:i A") }}
                                        </span>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="6" class="text-center fa-2x text-black-50">There is no article.</td>    
                                </tr>    
                            @endforelse
                        </tbody>

                    </table>

                    <div class="d-lg-flex justify-content-between align-items-center">
                        {{ $articles->appends(request()->all())->links() }}
                        <h4 class="mb-0">Total : {{ $articles->total() }}</h4>
                    </div>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('foot')
    <script>
         const askConfirm = (id) => {
            Swal.fire({
                title: 'Do you want to delete?',
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
