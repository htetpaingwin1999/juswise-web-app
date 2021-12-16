@extends('layouts.app')

@section("title") {{ $user->name }} @endsection

@section('content')
<div class="container-fluid">
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{ route('user-manager.index') }}">Users Lists</a></li>
        <li class="breadcrumb-item active mb-3" aria-current="page">User Permission Control</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12 col-md-8 col-lg-7">
            <div class="card mb-5">
                <div class="card-body text-center shadow">
                    <img class="rounded-circle mb-3 mt-4"
                        src="{{ isset($user->photo) ? asset('storage/user-profile/'.$user->photo) : asset('dashboard/assets/img/avatars/default-profile.png') }}"
                        width="200" height="200">

                    <div class="mt-2">
                        <div class="d-flex align-items-start justify-content-center">
                            <h2 class="fw-bold mb-0">{{ $user->name }}</h2>
                            @if ($user->role == 0)
                            <span class="badge bg-primary">Admin</span>
                            @elseif ($user->role == 1)
                            <span class="fw-bold badge bg-info">Case Volunteer</span>
                            @elseif ($user->role == 2)
                            <span class="fw-bold badge bg-secondary">Contributor</span>
                            @else
                            <span class="fw-bold badge bg-warning">User</span>
                            @endif

                        </div>
                        <h5>
                            @isset($user->position)
                            {{ $user->position }}
                            @else
                            <span class="small fw-bold text-success">Worker</span>
                            @endisset
                        </h5>
                        <h5 class="mb-3">{{ $user->email }}</h5>
                        <hr>

                        @if ($user->role != 0)
                        <form action="{{ route('user-manager.makeAdmin') }}" class="d-inline-block"
                            id="form{{ $user->id }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button type="button" class="btn btn-sm btn-primary"
                                onclick="return askConfirmAdmin({{ $user->id }})">Make
                                Admin</button>
                        </form>

                        @if ($user->role != 1)
                        <form action="{{ route('user-manager.volunteer') }}" class="d-inline-block"
                            id="volForm{{ $user->id }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button type="button" class="btn btn-sm btn-info"
                                onclick="return volConfirm({{ $user->id }})">Make
                                Case Volunteer</button>
                        </form>
                        @endif

                        @if ($user->role != 3)
                        <form action="{{ route('user-manager.makeUser') }}" class="d-inline-block" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button class="btn btn-sm btn-warning">Make
                                User</button>
                        </form>
                        @endif

                        @if ($user->isBanned == 0)
                        <form action="{{ route('user-manager.banUser') }}" class="d-inline-block"
                            id="banForm{{ $user->id }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button type="button" class="btn btn-sm btn-danger"
                                onclick="return banConfirm({{ $user->id }})">Ban User
                            </button>
                        </form>
                        @else
                        <form action="{{ route('user-manager.unlockUser') }}" class="d-inline-block"
                            id="unlockForm{{ $user->id }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <button type="button" class="btn btn-sm btn-success"
                                onclick="return unlockConfirm({{ $user->id }})">
                                Unlock User
                            </button>
                        </form>
                        @endif

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('foot')
    <script>
        const askConfirmAdmin = (id) => {
            Swal.fire({
                title: `Are you sure to upgrade?`,
                text: "Role ချိန်းလိုက်ရင် admin လိုက်ပိုင်ခွင့်များကို ရရှိသွားမည်ဖြစ်ပါသည်။",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, upgrade it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    'Upgrade Success!',
                    'အကောင့်မြှင့်တင်ချင်အောင်မြင်ပါသည်။',
                    'success'
                    )
                    setTimeout(function(){
                       $('#form'+id).submit();
                    }, 1500)
                }
            })
        }

        const volConfirm = (id) => {
            Swal.fire({
            title: `Are you sure to upgrade?`,
            text: "Case Volunteer Role ပြောင်းပါမည်။",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, upgrade it!'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Upgrade Success!',
                'အကောင့်မြှင့်တင်ချင်အောင်မြင်ပါသည်။',
                'success'
                )
                setTimeout(function(){
                $('#volForm'+id).submit();
                }, 1500)
                }
            })
        }

        const banConfirm = (id) => {
            Swal.fire({
            title: `Are you sure to ban?`,
            text: "User ကိုပိတ်လိုက်ရင် အသုံးပြုခွင့်မရှိတော့ပါ။",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, do it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    'Success!',
                    'အကောင့်ပိတ်ခြင်း အောင်မြင်ပါသည်။',
                    'success'
                    )
                    setTimeout(function(){
                    $('#banForm'+id).submit();
                    }, 1500)
                }
            })
        }

        const unlockConfirm = (id) => {
            Swal.fire({
            title: `Are you sure to unlock user?`,
            text: "User အားအသုံးပြုခွင့်ကို ပြန်လည်ပေးပါမည်။",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, do it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    'Success!',
                    'အကောင့်ဖွင့်ခြင်း အောင်မြင်ပါသည်။',
                    'success'
                    )
                    setTimeout(function(){
                    $('#unlockForm'+id).submit();
                    }, 1500)
                }
            })
        }

    </script>
    @endsection