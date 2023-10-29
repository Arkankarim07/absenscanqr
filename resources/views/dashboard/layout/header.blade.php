<header class="navbar sticky-top bg-danger flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">Absen 40</a>

  <ul class="navbar-nav flex-row d-md-none">
    <li class="nav-item text-nowrap">
      <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <svg class="bi"><use xlink:href="#list"/></svg>
      </button>
    </li>
  </ul>

  <div class="navbar-nav">
    <div class="nav-item">
      @guest
      <a  href="/login" class=" text-decoration-none">
        <button class="btn btn-dark fw-bold text-white nav-link px-3">Login</button>
      </a>
      @else
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-dark fw-bold nav-link px-3 text-white">Logout</button>
      </form>
      @endguest


    </div>
  </div>
</header>