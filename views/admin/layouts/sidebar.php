<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= admin_url() ?>" class="brand-link">
      <img src="<?= ADMIN_ASSETS ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PolyMobile</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= ADMIN_ASSETS ?>dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= auth_info()['name'] ?? '' ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= admin_url('dashboard') ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Bảng tin
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= admin_url('san-pham') ?>" class="nav-link">
              <i class="nav-icon fas fa-box"></i>
              <p>
                Sản phẩm
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= admin_url('tai-khoan') ?>" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Tài khoản
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= admin_url('banner') ?>" class="nav-link">
              <i class="nav-icon fas fa-square"></i>
              <p>
                Banner
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= admin_url('comments') ?>" class="nav-link">
              <i class="nav-icon fas fa-square"></i>
              <p>
                QL comment
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= admin_url('cau-hinh-trang') ?>" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Cài đặt trang
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>