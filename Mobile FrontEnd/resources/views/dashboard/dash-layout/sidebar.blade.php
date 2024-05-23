<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky" >
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }} " aria-current="page" href="/dashboard">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/users*') ? 'active' : '' }} " href="/dashboard/users">
              <span data-feather="users" class="align-text-bottom"></span>
              Data Users
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/lapangans*') ? 'active' : '' }} " href="/dashboard/lapangans">
              <span data-feather="book-open" class="align-text-bottom"></span>
              Data Lapangan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/rekenings*') ? 'active' : '' }} " href="/dashboard/rekenings">
              <span data-feather="credit-card" class="align-text-bottom"></span>
              Data Rekening
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/bookings*') ? 'active' : '' }} " href="/dashboard/bookings">
              <span data-feather="calendar" class="align-text-bottom"></span>
              Data Reservasi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/laporans*') ? 'active' : '' }} " href="/dashboard/laporans">
              <span data-feather="printer" class="align-text-bottom"></span>
              Laporan
            </a>
          </li>
        </ul>
      </div>
    </nav>