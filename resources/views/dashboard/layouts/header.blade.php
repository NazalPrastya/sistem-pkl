<header class="navbar navbar-dark sticky-top  flex-md-nowrap p-0 shadow" style="background-color: #1d050b;">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Sistem PKL SKANIC</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <form action="/logout" method="post">
          @csrf
          <button type="submit" class="nav-link px-3 text-white border-0" style="background-color: #1d050b;" onclick="return confirm('Apakah kamu ingin Logout?')"><span data-feather="log-out" ></span> Logout  </button>
        </form> 
        {{-- <a class="nav-link px-3" href="#">Sign out</a> --}}
      </div>
    </div>
  </header>