<nav class="navbar navbar-expand-lg py-3 navbar-light animate__animated animate__bounceInDown  position-fixed top-0 w-100"
    id="nav">
    <div class="container">
        <a href="{{ route('index') }}">
            <img src="{{ asset(\App\Base::$logo) }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="feather-menu p-1 text-secondary menu-icon"></i>

        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ms-auto mb-2 mb-lg-0">
                <li class="nav-item  mx-2 ">
                    <a class="nav-link text-secondary {{ request()->url() === route('index') ? 'nav-underline' : '' }}"
                        aria-current="page" href="{{ route('index') }}">Home</a>
                </li>
                <li class="nav-item  mx-2">
                    <a class="nav-link text-secondary {{ request()->url() === route('jusxDb') ? 'nav-underline' : ''  }}"
                        href="{{ route('jusxDb') }}">JusX Database</a>
                </li>

                {{-- <li class="nav-item  mx-2">
                    <a class="nav-link text-secondary " href="jusX-blog.html" target="_blank">Blog</a>
                </li> --}}

                <li class="nav-item  mx-2">
                    <a class="nav-link empower text-light" href="{{ route('donate') }}">Empower Us</a>
                </li>


            </ul>

        </div>
    </div>
</nav>