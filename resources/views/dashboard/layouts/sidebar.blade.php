<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse shadow" style="background-color:#251d1f;">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        @if ((Auth::guard('user')->user()))       
        <a class="nav-link text-white   {{ Request::is('dashboard/profile*') ? 'active' : '' }}" href="/dashboard/profile">
          <span data-feather="user"></span>
          Profile
        </a>
        @endif
        <li class="nav-item">
          <a class="nav-link  text-white  {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="grid"></span>
            Dashboard
          </a>
        </li>
        @if ((Auth::guard('admin')->user()))       
        <li class="nav-item">
          <a class="nav-link text-white   {{ Request::is('dashboard/user/create') ? 'active' : '' }}" href="/dashboard/user/create" >
            <span data-feather="user-plus"></span>
            Tambah User
          </a>
        @endif

          <a class="nav-link   text-white  {{ Request::is('dashboard/user') ? 'active' : '' }}" href="/dashboard/user">
            <span data-feather="users"  ></span>
            Daftar Siswa
          </a>
        @if ((Auth::guard('admin')->user()))       
           <a class="nav-link text-white {{ Request::is('dashboard/company/create') ? 'active' : '' }}" href="/dashboard/company/create">
            <span data-feather="plus-square"></span>
            Tambah Perusahaan
          </a>
        @endif

            <a class="nav-link text-white  {{ Request::is('dashboard/company') ? 'active' : '' }}" href="/dashboard/company">
            <span data-feather="slack"></span>
            Daftar Perusahaan
          </a>
          @if ((Auth::guard('admin')->user()))       
          <a class="nav-link text-white {{ Request::is('dashboard/submissions') ? 'active' : '' }}" href="/dashboard/submissions">
           <span data-feather="eye"></span>
           Daftar Pengajuan
         </a>
       @endif
        @if ((Auth::guard('user')->user()))       
        <a class="nav-link text-white  {{ Request::is('dashboard/submission') ? 'active' : '' }}" href="/dashboard/submission">
          <span data-feather="book-open"></span>
          Daftar Pengajuan
        </a>

          <a class="nav-link text-white {{ Request::is('dashboard/submission/create') ? 'active' : '' }}" href="/dashboard/submission/create">
            <span data-feather="file-plus"></span>
            Tambahkan pengajuan
          </a>
        </li>



        <a class="nav-link text-white {{ Request::is('dashboard/password/edit') ? 'active' : '' }}" href="/dashboard/password/edit">
          <span data-feather="user"></span>
          Change Password
        </a>
      </li>
        @endif
        <li class="nav-item">
          <form action="/logout" method="post">
            @csrf
            <button type="submit" class="nav-link px-3 text-white border-0" style="background-color: #251d1f;" onclick="return confirm('Apakah kamu ingin Logout?')"><span data-feather="log-out" ></span> Logout  </button>
          </form> 
        </li>
        {{-- <li class="nav-item"><article class="ms-2 mt-3" style="color: white">Selamat Datang di Sistem Informasi PKL.Sistem ini dibuat oleh Nazal Gusti Prastya XI PPLG 2. Dalam rangka mengikuti lomba 17 agustus yang diselenggarakan oleh kepala program Pengembangan Perangkat Lunak dan Game.</article></li> --}}
      </ul>
    </div>
  </nav>
  