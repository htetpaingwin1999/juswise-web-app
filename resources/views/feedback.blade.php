@extends('layouts.app')

@section("title") User Feedback @endsection

@section('content')
<div class="container-fluid">
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Profile</a></li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">
                        <i class="feather-sidebar"></i>
                        User Feedback
                    </h4>

                    <hr>

                    <div class="d-flex align-items-baseline mt-4 mb-0">
                        <form action="{{ route('feedback.index') }}" class="mb-4" method="GET">
                            <div class="form-inline">
                                <input type="text" class="form-control" placeholder="Search ..."
                                    value="{{ request()->search }}" name="search" required>
                                <button class="btn btn-primary ms-3">
                                    <i class="feather-search"></i>
                                </button>
                            </div>
                        </form>

                        <div class="ms-5 d-flex align-items-center">
                            @isset(request()->search)
                            <a href="{{ route('feedback.index') }}" class="text-decoration-none btn btn-danger btn-sm">
                                x
                            </a>
                            <p class="fw-bold mt-3 ms-2">Search keyword : <span class="fs-5">'{{ request()->search
                                    }}'</span></p>
                            @endisset
                        </div>
                    </div>

                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Rating</th>
                                <th>Useful</th>
                                <th>Description</th>
                                <th>Created_at</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($feedbacks as $feedback)
                            <tr>
                                <td>{{ $feedback->id }}</td>
                                <td>{{ $feedback->rating }}</td>
                                <td>
                                    @if ($feedback->useful == 1)
                                    Yes
                                    @else
                                    No
                                    @endif
                                </td>
                                <td>{{ $feedback->description }}</td>
                                <td>
                                    <span class="small">
                                        <i class="feather-calendar"></i>
                                        {{ $feedback->created_at->format("d-m-Y") }}
                                    </span>
                                    <br>
                                    <span class="small">
                                        <i class="feather-clock"></i>
                                        {{ $feedback->created_at->format("h:i A") }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="mt-8 d-flex justify-content-between align-items-center">
                        <div>
                            {{ $feedbacks->appends(Request::all())->onEachSide(1)->links() }}
                        </div>

                        <div>
                            <h4 class="mb-0">Total: <span class="text-primary">{{ $feedbacks->total() }}</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection