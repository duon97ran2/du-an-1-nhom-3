<header class="fs-header">
  <div class="f-hdtop">
    <div class="f-wrap">
      <a class="fs-logo" href="<?= app_url() ?>">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ed/Wikipedia-logo-white.svg/1200px-Wikipedia-logo-white.svg.png" alt="" width="151px">
      </a>
      <ul class="fs-hdmn">
        <li>
          <a href="./kiemtradonhang.html" title="">
            <i class="material-icons">assignment</i>
            <span>Kiểm tra đơn hàng</span>
          </a>
        </li>
        <li>
          <a href="/" title="">
            <i class="material-icons">favorite</i>
            <span>Yêu thích</span>
          </a>
        </li>
        <li class="fs-mnulsb">
          <a href="<?= auth_info() ? 'javascript:;' : app_url('dang-nhap') ?>" title="">
            <i class="material-icons">person</i>
            <span>Tài khoản</span>
          </a>
          <?php if (auth_info()) : ?>
            <ul class="fs-hdmsub fs-hdmsubsmall">
              <?php if (auth_info()['role'] == 'admin') : ?>
                <li><a href="<?= admin_url('dashboard') ?>">Trang quản trị</a></li>
              <?php endif; ?>
              <li><a href="<?= app_url('dang-nhap') ?>">Thông tin tài khoản</a></li>
              <li><a href="<?= app_url('dang-xuat') ?>">Đăng xuất</a></li>
            </ul>
          <?php endif ?>
        </li>
        <li>
          <a href="<?= app_url('gio-hang') ?>" title="">
            <i class="material-icons">shopping_cart</i>
            <span>Giỏ hàng</span>
            <b class="fs-cartic countTotalCart" id="js-cart-total"><?= cart_total() ?></b>
          </a>
        </li>
      </ul>


      <div class="fs-search">
        <form action="" autocomplete="off">
          <label for="key" class="mf-vhiditem">Nhập tên điện thoại, máy tính, phụ kiện... cần tìm</label>
          <input class="fs-stxt" type="text" id="key" placeholder="Nhập tên điện thoại, máy tính, phụ kiện... cần tìm" autocomplete="off" maxlength="50">
          <span class="icon-cance" id="icon-cance" style="display:none" title="Xóa">✕</span>
          <button type="submit" aria-label="Tìm kiếm" class="search-button" title="Tìm kiếm"><i class="ficon f-search"></i></button>
          <div class="fs-sresult" id="result" style="display:none">
            <div class="fs-sremain">
              <ul>
                <li><a href="">Ket qua</a></li>
              </ul>
            </div>
          </div>
        </form>
      </div>
      <script>
        $(function() {
          $(".search-button").keyup(function() {
            let keyword = $(this).val();
            if (keyword != '') {
              $.ajax({
                type: "post",
                url: "<?= app_url('tim-kiem/xu-ly') ?>",
                data: {
                  keyword: keyword,
                },
                success: function(data) {
                  console.log('suceessfully');

                }
              })
            }
          });
        });
      </script>



    </div>
    <input id="queryID" queryid="" hidden="" style="display:none">
    <input id="userIP" ip-user="14.226.4.149" hidden="" style="display:none">
  </div>
  <nav class="fs-menu">
    <div class="f-wrap">
      <ul class="fs-mnul clearfix">
        <?php if (menu_page()) : ?>
          <?php foreach (menu_page() as $cate) : ?>
            <li>
              <a href="<?= $cate['menu_url'] ?? app_url('danh-muc/' . $cate['category_slug']) ?>">
                <div class="base-ic"></div> <?= $cate['category_name'] ?>
              </a>
              <?php if (empty($cate['menu_url'])) : ?>
                <div class="fs-mnsub">
                  <div class="fs-mnbox">
                    <div class="fs-mntd fs-mntd1">
                      <p class="fs-mnstit">Hãng sản xuất</p>
                      <ul class="fs-mnsul fs-mnsul3 clearfix">
                        <li><a href="/">Apple (iPhone)</a></li>
                      </ul>
                    </div>
                    <div class="fs-mntd fs-mntd2">
                      <p class="fs-mnstit">Mức giá</p>
                      <ul class="fs-mnsul fs-mnsul1 clearfix">
                        <li><a href="/">Dưới 2 triệu</a></li>
                      </ul>
                    </div>
                    <div class="fs-mntd fs-mntd3">
                      <p class="fs-mnstit">Bán chạy nhất</p>
                      <ul class="fs-mnsprod">
                        <li class="clearfix">
                          <a class="fs-mnspimg" href="/">
                            <img src="https://images.fpt.shop/unsafe/fit-in/192x192/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/7/16/637620445702136793_samsung-galaxy-a22-5g-den-dd.jpg" alt="Samsung Galaxy A22 5G">
                          </a>
                          <div>
                            <span><a href="/dien-thoai/samsung-galaxy-a22-5g" title="">Samsung Galaxy A22 5G</a></span>
                            <p>6.290.000 ₫</p>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            </li>
          <?php endforeach; ?>
        <?php endif; ?>
      </ul>
    </div>
  </nav>
</header>