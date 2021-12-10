<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= admin_url('dashboard') ?>" class="brand-link">
    <?php if (option_info('logo')) : ?>
      <img src="<?= option_info() ? asset('uploads/' . option_info('logo')) : '' ?>" class="ml-3" width="150px" height="30px">
    <?php else : ?>
      <img src="<?= ADMIN_ASSETS ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">PolyMobile</span>
    <?php endif; ?>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= auth_info()['avatar'] ? asset(auth_info()['avatar']) : ADMIN_ASSETS . 'dist/img/avatar.png' ?>" class="img-circle elevation-2" alt="User Image">
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
          <a href="<?= admin_url('danh-muc') ?>" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Danh mục
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
          <a href="<?= admin_url('qua-tang') ?>" class="nav-link">
            <i class="nav-icon fas fa-gift"></i>
            <p>
              Quà tặng
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= admin_url('banner') ?>" class="nav-link">
            <i class="nav-icon fas fa-square"></i>
            <p>
              Ảnh bìa
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= admin_url('comment') ?>" class="nav-link">
            <i class="nav-icon fas fa-square"></i>
            <p>
              Bình luận
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= admin_url('bai-viet') ?>" class="nav-link">
            <i class="nav-icon fas fa-newspaper"></i>
            <p>
              Bài viết
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= admin_url('thuong-hieu') ?>" class="nav-link">
            <i class="nav-icon fas fa-copyright"></i>
            <p>
              Thương hiệu
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= admin_url('phieu-giam-gia') ?>" class="nav-link">
            <i class="nav-icon fas fa-ticket-alt"></i>
            <p>
              Vouchers
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= admin_url('don-hang') ?>" class="nav-link">
            <i class="nav-icon fas fa-clipboard-list" aria-hidden="true"></i>
            <p>
              Đơn hàng
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