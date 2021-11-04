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
                <a href="{{ route('home') }}" class="ps-2 sub-home nav-link {{ Request::url() === route('home') ? 'active-item' : '' }}">
                    <i class="fas fa-home me-1"></i>
                    <span>Home</span>
                </a>
            </li>

            {{-- Category Manager --}}
            <x-menu-title title="Category Manager" icon="fas fa-layer-group"></x-menu-title>
            <x-menu-item name="Case Category" icon="fas fa-stream" link="{{ route('category.index') }}"></x-menu-item>
            <x-menu-item name="Article Category" icon="fas fa-stream" link="{{ route('article-category.index') }}"></x-menu-item>
            <hr class="text-primary">

            {{-- Case Manager --}}
            <x-menu-title title="Case Manager" icon="fas fa-book"></x-menu-title>
            <x-menu-item name="Create Case" icon="fas fa-plus-circle" link="{{ route('problem.create') }}"></x-menu-item>
            <x-menu-item name="Case List" icon="fas fa-table" link="{{ route('problem.index') }}"></x-menu-item>
            <hr class="text-primary">

            {{-- Article Manager --}}
            <x-menu-title title="Article Manager" icon="far fa-newspaper"></x-menu-title>
            <x-menu-item name="Create Article" icon="fas fa-plus-circle" link="{{ route('article.create') }}"></x-menu-item>
            <x-menu-item name="Article Lists" icon="far fa-list-alt" link="{{ route('article.index') }}"></x-menu-item>
            <hr class="text-primary">

            {{-- Proccess Schedual --}}
           {{-- <x-menu-title title="Proccess Schedual"></x-menu-title>

            <li class="nav-item">
                <a class="nav-link " href="volunteer_todo_list.html">
                    <i class="fas fa-table"></i>
                    <span>Volunteer_Todo List</span>
                </a>
            </li>
            <li class="nav-item"><a class="nav-link   " href="volunteer_todo_add.html"><i class="fas fa-plus"></i><span>Volunteer_Todo Add</span></a></li>
            <hr  style="color: #5f004f;">
            <li class="mt-4 ">
                    
                <h5 class="mt-3 ps-2" ><i class=" fas fa-clipboard-list me-2"></i>User Feedback  </h5>
                </li>
                <li class="nav-item">
                <a class="nav-link "  href="volunteer_todo_list.html">
                    <i class="fas fa-id-card"></i>
                    <span>User Feedback</span>
                </a>
            </li> --}}

            {{-- <hr  style="color: #5f004f;"> --}}

            {{-- Account Setting --}}
            <x-menu-title title="Account Setting" icon="fas fa-user-cog"></x-menu-title>
            <x-menu-item name="Profile" icon="fas fa-user" link="{{ route('profile') }}"></x-menu-item>
            <x-menu-item name="Edit Profile" icon="fas fa-user-edit" link="{{ route('profile.editProfile') }}"></x-menu-item>
            <x-menu-item name="Change Password" icon="fas fa-sync-alt" link="{{ route('profile.changePassword') }}"></x-menu-item>
            <hr class="text-primary">
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