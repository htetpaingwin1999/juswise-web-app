@extends('layouts.app')

@section('title')
Users Lists
@endsection

@section('content')
<div class="container-fluid">
    <x-bread-crumb>
        <li class="breadcrumb-item active mb-3" aria-current="page">User Lists</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-0">
                        <i class="feather-users"></i>
                        User Lists
                    </h4>
                    <hr>

                    <div class="table-responsive">
                        <table class="table table-hover m-0">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Position</th>
                                    <th>Role</th>
                                    <th>Control</th>
                                    <th>Created_at</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($userLists as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @isset($user->position)
                                        {{ $user->position }}
                                        @else
                                        <span class="">Worker</span>
                                        @endisset
                                    </td>
                                    <td>{{ $user->role }}</td>
                                    <td>

                                    </td>
                                    <td>
                                        <span class="small">
                                            {{-- <i class="feather-calendar"></i> --}}
                                            {{ $user->created_at->format("d-m-Y") }}
                                        </span>
                                        <br>
                                        <span class="small">
                                            {{-- <i class="feather-clock"></i> --}}
                                            {{ $user->created_at->format("h:i A") }}
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
</div>
@endsection