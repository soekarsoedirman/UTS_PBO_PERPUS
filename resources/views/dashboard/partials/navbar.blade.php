<!-- Start Navbar -->
<header class="header d-flex justify-content-center">
    <div class="header_content d-flex flex-row align-items-center">
      <a href="#">
        <div class="logo_container">
          <div class="logo">
            @if (substr_count(URL::current(), '/') == 5)
            <img src='{{Request::is('dashboard') ? '' : '../../'}}img/logotext.png' alt='LOGO' />
            @else
            <img src='{{Request::is('dashboard') ? '' : '../'}}img/logotext.png' alt='LOGO' />    
            @endif  
          </div>
        </div>
      </a>
      <div class="main_nav_container">
        <div class="main_nav">
          <ul class="main_nav_list">
            @if (auth()->user()->role_id <= 2)
              <li class="main_nav_item {{Request::is('dashboard/admin') ? 'sidebar-active' : ''}}">
                <a  href="/dashboard/admin">Daftar Admin</a>
              </li>
              <li class="main_nav_item {{Request::is('dashboard/users') ? 'sidebar-active' : ''}}">
                <a  href="/dashboard/users">Daftar User</a>
              </li>
              <li class="main_nav_item {{Request::is('dashboard/temporaryRents') ? 'sidebar-active'  : ''}}">
                <a  href="/dashboard/temporaryRents">Daftar Peminjaman Sementara</a>
              </li>
            @endif
            @if (auth()->user()->role_id <= 4)
              <li class="main_nav_item {{Request::is('dashboard/rents') ? 'sidebar-active' : ''}}">
                <a  href="/dashboard/rents">Daftar Peminjaman</a>
              </li>
            @endif
            <li class="main_nav_item {{Request::is('dashboard/rooms') ? 'sidebar-active' : ''}}">
              <a  href="/dashboard/rooms">Daftar Ruangan</a>
            </li>




           
            @auth
            <li class="main_nav_item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="text-dark">{{auth()->user()->name}} &#9660;</span> 
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/dashboard/rooms"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form action="/logout" method="post">
                      @csrf
                      <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                  </form>  
              </ul>
            </li>
            @else
            <li class="main_nav_item {{Request::is('login') ? 'active' : ''}}">
              <a href="/login">Login</a>
            </li>
            @endauth
          </ul>
        </div>
      </div>
  </header>
  <!-- End Navbar -->