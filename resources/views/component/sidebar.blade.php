<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('AdminLte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Kasir Comp</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? "active" : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Overview
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/barang" class="nav-link {{ Request::is('dashboard/barang*') ? "active" : '' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Barang
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/categories" class="nav-link {{ Request::is('dashboard/categories*') ? "active" : '' }}">
              <i class="nav-icon fas fa-box"></i>
              <p>
                Kategori
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/dashboard/penjualan" class="nav-link {{ Request::is('dashboard/penjualan*') ? "active" : '' }}">
              <i class="nav-icon fas fa-money-bill-wave"></i>
              <p>
                Penjualan
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
