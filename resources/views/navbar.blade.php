<nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
    <div class="container px-5">
        <a class="navbar-brand fw-bold" href="#page-top">Pencil</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="bi-list"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                {{-- <li class="nav-item"><a class="nav-link me-lg-3" href="#features">Features</a></li>
                <li class="nav-item"><a class="nav-link me-lg-3" href="#download">Download</a></li> --}}
            </ul>
            @auth
                <!-- Show Logout Button if User is Logged In -->
                <form method="POST" action="{{ route('logout') }}" id="logoutForm" class="d-flex justify-content-center">
                    @csrf
                    <button type="submit" class="p-1 btn btn-danger rounded-pill" id="logoutButton">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </button>
                </form>
            @endauth

            @guest
                <!-- Show Login Button if User is Not Logged In -->
                <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal" data-bs-target="#loginModal">
                    <span class="d-flex align-items-center">
                        <span class="small">Login</span>
                    </span>
                </button>
            @endguest
        </div>
    </div>
</nav>
