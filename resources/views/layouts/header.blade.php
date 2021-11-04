
<div class="">
    <div class="mx-lg-1 mx-2 header my-2 bg-primary shadow mb-5">
        <div class="justify-content-between align-items-center d-flex">
            <buttom class="show-btn btn btn-light d-lg-none ms-2">
                <i class="feather-menu" ></i>
            </buttom>

            <div class="dropdown ms-auto">
                <button class="btn dropdown-toggle profile-btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ isset(Auth::user()->photo) ? asset('storage/user-profile/'.Auth::user()->photo) : asset('dashboard/assets/img/avatars/default-profile.png') }}" class="profile">
                    <span class="fw-bold ms-1 text-white">{{ Auth::user()->name }}</span>
                </button>
                
                <ul class="dropdown-menu mt-1" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('profile.editProfile') }}">Edit Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class=" feather-log-out text-danger"></i>
                            <span>Log Out</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>