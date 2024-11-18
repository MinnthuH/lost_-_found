<style>
        #time-button {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .search-icon {
            margin-right: 8px;
            color: black;
        }

        [data-background-color="dark"] .user-box .u-text h4,
        [data-background-color="dark"] .user-box .u-text h6 {
            color: white;
        }

        [data-background-color="dark2"] .user-box .u-text h4,
        [data-background-color="dark2"] .user-box .u-text h6 {
            color: white;
        }

        [data-background-color="white"] .user-box .u-text h4,
        [data-background-color="white"] .user-box .u-text h6 {
            color: black;
        }

        .btn-clock {
            padding: 5px;
            border-radius: 5px;
        }

        [data-background-color="dark"] .btn-clock {
            color: white;
        }

        [data-background-color="dark2"] .btn-clock {
            color: white;
        }

        [data-background-color="white"] .btn-clock {
            color: black;
        }

        #current-time {
            color: black;
        }

        [data-background-color="dark"] #current-time,
        [data-background-color="dark2"] #current-time {
            color: white;
        }

        .changelogout {
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 12px;
            cursor: pointer;
        }

        .changelogout i {
            color: white;
        }

        .changelogout:hover {
            background-color: #c82333;
        }
    </style>

  <!-- Navbar Header -->    
    <!-- <nav class="navbar navbar-expand-lg navbar-light fixed-top" > -->
    
    <!-- <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav"> -->
    <nav class="navbar navbar-expand-lg border-bottom" id="mainNav">
        <div class="container px-5">            
                <!-- Brand -->
                <a class="navbar-brand fw-bold text-black ps-3" href="#page-top">Pencil</a>

                <!-- Toggler (for small screens) -->
                <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>            

            <!-- Navbar Content -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto align-items-center">                   
                    <!-- User Dropdown (visible when authenticated) -->
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="avatar-sm">
                                <img src="{{ asset('images/user1.png') }}" alt="User Avatar" class="avatar-img rounded-circle" />
                            </div>
                            <span class="profile-username ms-2 fw-bold">{{ auth()->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <div class="user-box text-center p-3">
                                    <div class="u-text">
                                        <h4>{{ auth()->user()->name }}</h4>
                                        <h6>{{ auth()->user()->email }}</h6>
                                    </div>
                                </div>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" id="logoutForm" class="d-flex justify-content-center">
                                    @csrf
                                    <button type="submit" class="btn changelogout">
                                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endauth

                    @guest
                    <button class="btn changelogout btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal" class="navbar-brand">                        
                        <i class="fa-solid fa-right-to-bracket pr-2"></i> Login                                                   
                    </button>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
  <script>
      function updateTime() {
          const now = new Date();
          let hours = now.getHours();
          const minutes = String(now.getMinutes()).padStart(2, '0');
          const seconds = String(now.getSeconds()).padStart(2, '0');
          const ampm = hours >= 12 ? 'PM' : 'AM';
          hours = hours % 12;
          hours = hours ? hours : 12;
          const timeString = `${String(hours).padStart(2, '0')}:${minutes}:${seconds} ${ampm}`;
          document.getElementById('current-time').textContent = timeString;
      }

      setInterval(updateTime, 1000);

      updateTime();
  </script>
