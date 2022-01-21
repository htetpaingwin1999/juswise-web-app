<div class="col-12 col-lg-3 col-xl-3 sidebar1  vh-100 overflow-auto">
    {{-- Brand Logo --}}
    <div class="d-flex mt-3 align-items-center justify-content-between">
        <div class="px-3">
            <img src="{{ asset(\App\Base::$logo) }}" class='img-fluid' alt="">
        </div>
        <div class="close-btn d-lg-none ">
            <i class="feather-x" style="font-size: 2rem; "></i>
        </div>
    </div>

    {{-- Sub Menu --}}
    <div class="nav-item my-4">
        <ul class="px-3 sub-menu">

            <li class="mt-3">
                <a href="{{ route('home') }}"
                    class="ps-2 sub-home nav-link {{ Request::url() === route('home') ? 'active-item' : '' }}">
                    <i class="fas fa-home me-1"></i>
                    <span>Home</span>
                </a>
            </li>


            @if (Auth::user()->role == 0)
            {{-- Feedback --}}
            <li class="mt-1">
                <a href="{{ route('feedback.index') }}"
                    class="ps-2 sub-home nav-link {{ Request::url() === route('feedback.index') ? 'active-item' : '' }}">
                    <i class="feather-sidebar"></i>
                    <span>User Feedback</span>
                </a>
            </li>

            {{-- User Manager --}}
            <x-menu-title title="User Manager" icon="fas fa-users-cog"></x-menu-title>
            <x-menu-item name="User Lists" icon="fas fa-users" link="{{ route('user-manager.index') }}"></x-menu-item>
            <hr class="text-primary">

            {{-- Category Manager --}}
            <x-menu-title title="Category Manager" icon="fas fa-layer-group"></x-menu-title>
            <x-menu-item name="Case Category" icon="fas fa-stream" link="{{ route('category.index') }}"></x-menu-item>
            <hr class="text-primary">

            {{-- Case Manager --}}
            <x-menu-title title="Case Manager" icon="fas fa-book"></x-menu-title>
            <x-menu-item name="Create Case" icon="fas fa-plus-circle" link="{{ route('problem.create') }}">
            </x-menu-item>
            <x-menu-item name="Case List" icon="fas fa-table" link="{{ route('problem.index') }}"></x-menu-item>
            <hr class="text-primary">



            {{-- Account Setting --}}
            <x-menu-title title="Account Setting" icon="fas fa-user-cog"></x-menu-title>
            <x-menu-item name="Profile" icon="fas fa-user" link="{{ route('profile') }}"></x-menu-item>
            <x-menu-item name="Edit Profile" icon="fas fa-user-edit" link="{{ route('profile.editProfile') }}">
            </x-menu-item>
            <x-menu-item name="Change Password" icon="fas fa-sync-alt" link="{{ route('profile.changePassword') }}">
            </x-menu-item>
            <hr class="text-primary">

            @elseif (Auth::user()->role == 1)
            {{-- Case Manager --}}
            <x-menu-title title="Case Manager" icon="fas fa-book"></x-menu-title>
            <x-menu-item name="Create Case" icon="fas fa-plus-circle" link="{{ route('problem.create') }}">
            </x-menu-item>
            <x-menu-item name="Case List" icon="fas fa-table" link="{{ route('problem.index') }}"></x-menu-item>
            <hr class="text-primary">

            {{-- Account Setting --}}
            <x-menu-title title="Account Setting" icon="fas fa-user-cog"></x-menu-title>
            <x-menu-item name="Profile" icon="fas fa-user" link="{{ route('profile') }}"></x-menu-item>
            <x-menu-item name="Edit Profile" icon="fas fa-user-edit" link="{{ route('profile.editProfile') }}">
            </x-menu-item>
            <x-menu-item name="Change Password" icon="fas fa-sync-alt" link="{{ route('profile.changePassword') }}">
            </x-menu-item>
            <hr class="text-primary">
            @elseif (Auth::user()->role == 2)
            {{-- Article Manager --}}
            <x-menu-title title="Article Manager" icon="far fa-newspaper"></x-menu-title>
            <x-menu-item name="Create Article" icon="fas fa-plus-circle" link="{{ route('article.create') }}">
            </x-menu-item>
            <x-menu-item name="Article Lists" icon="far fa-list-alt" link="{{ route('article.index') }}"></x-menu-item>
            <hr class="text-primary">

            {{-- Account Setting --}}
            <x-menu-title title="Account Setting" icon="fas fa-user-cog"></x-menu-title>
            <x-menu-item name="Profile" icon="fas fa-user" link="{{ route('profile') }}"></x-menu-item>
            <x-menu-item name="Edit Profile" icon="fas fa-user-edit" link="{{ route('profile.editProfile') }}">
            </x-menu-item>
            <x-menu-item name="Change Password" icon="fas fa-sync-alt" link="{{ route('profile.changePassword') }}">
            </x-menu-item>
            <hr class="text-primary">
            @endif
        </ul>

        {{-- Logout --}}
        <div class="mx-3 my-4">
            <a class="btn btn-danger btn-sm w-100" href="{{ route('logout') }}" onclick="
                event.preventDefault();document.getElementById('logout-form').submit();">
                Logout
            </a>
        </div>

        <form id="logout-form" class="d-none" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
    </div>
</div>
