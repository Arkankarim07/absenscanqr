<div class="d-flex flex-column sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
  <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3">
      @auth
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('absen') ? 'active' : 'text-dark' }} d-flex align-items-center gap-2 active" aria-current="page" href="/absen">
            <span class="bi" data-feather="file-text"></span>
            Dashboard
          </a>
        </li>
        <hr>
      </ul>
      @endauth
    </div>
  </div>
</div>
