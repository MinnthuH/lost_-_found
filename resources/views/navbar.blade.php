<style>
    .phone_view{
        display: none;
    }
    @media (max-width: 768px) {        
        .phone_view{
            display: block;
        }
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
    <div class="container px-5">
        <a class="navbar-brand fw-bold" href="#page-top">Pencil</a>
            @auth
                <div class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- Avatar Circle with Initials -->
                        <span class="avatar-initials d-flex justify-content-center align-items-center" style="width: 40px; height: 40px; background-color: #000; color: white; border-radius: 50%; border: 1px solid black; font-weight: bold;">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}{{ strtoupper(substr(auth()->user()->name, strpos(auth()->user()->name, ' ') + 1, 1)) }}
                        </span>                    
                    </a>                    
                </div>                
            @endauth
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                {{-- <li class="nav-item"><a class="nav-link me-lg-3" href="#features">Features</a></li>
                <li class="nav-item"><a class="nav-link me-lg-3" href="#download">Download</a></li> --}}
            </ul>
            @auth
                <div class="dropdown d-none d-lg-block">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- Avatar Circle with Initials -->
                        <span class="avatar-initials d-flex justify-content-center align-items-center" style="width: 40px; height: 40px; background-color: #000; color: white; border-radius: 50%; border: 1px solid black; font-weight: bold;">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}{{ strtoupper(substr(auth()->user()->name, strpos(auth()->user()->name, ' ') + 1, 1)) }}
                        </span>
                        <span class="text-black ms-2">{{ auth()->user()->name }}</span>
                    </a>

                    <div class="dropdown-menu Drop" style="background-color: #F0F5F9">
                        <form method="POST" action="{{ route('logout') }}" id="logoutForm" class="d-flex justify-content-center">
                            @csrf
                            <button type="submit" class="p-1 btn btn-danger rounded-pill" id="logoutButton">
                                <i class="fa-solid fa-right-from-bracket"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="phone_view">
                    @csrf
                    <button type="submit" class="p-1 btn btn-danger rounded-pill" id="logoutButton">                        
                        <span class="d-flex align-items-center">
                            <span class="">Logout</span>
                        </span>
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
