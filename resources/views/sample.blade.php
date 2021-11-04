@extends('layouts.app')

@section("title") Sample @endsection

@section('content')
<div class="container-fluid">
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('profile') }}">Profile</a></li>
        <li class="breadcrumb-item active mb-3" aria-current="page">Edit Profile</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
               <div class="card-body">
                    <h4 class="mb-0">
                        <i class="feather-plus-circle"></i>
                        Create Article
                    </h4>
                    <hr>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection
