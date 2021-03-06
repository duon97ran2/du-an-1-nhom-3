<header class="fs-header">
  <div class="f-hdtop">
    <div class="f-wrap">
      <a class="fs-logo" href="<?= app_url() ?>">
        <?php if (option_info('logo')) : ?>
          <img src="<?= option_info() ? asset('uploads/'.option_info('logo')) : '' ?>" alt="" width="165px" height="35px">
        <?php else: ?>
          <h2 style="font-size: 25px;" class="text-white">POLYMOBILE</h2>
        <?php endif; ?>
      </a>
      <ul class="fs-hdmn">
      <li>
          <a href="<?= app_url('tin-tuc') ?>" title="">
            <i class="material-icons">newspaper</i>
            <span>Blog</span>
          </a>
        </li>
        <li>
          <a href="<?= app_url('tim-kiem-don-hang')?>" title="">
            <i class="material-icons">assignment</i>
            <span>Kiểm tra đơn hàng</span>
          </a>
        </li>
        <li>
          <a href="<?= app_url('yeu-thich')?>" title="">
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
                <?php if(auth_info()['role'] == 'admin') : ?>
                  <li><a href="<?= admin_url('dashboard') ?>" target="_blank">Trang quản trị</a></li>
                <?php endif; ?>
                <li><a href="<?= app_url('thong-tin-ca-nhan') ?>">Thông tin tài khoản</a></li>
                <li><a href="<?= app_url('dang-xuat') ?>">Đăng xuất</a></li>
            </ul>
          <?php endif ?>
        </li>
        <li>
          <a href="<?= app_url('gio-hang') ?>" title="">
            <i class="material-icons">shopping_cart</i>
            <span>Giỏ hàng</span>
            <?php if (auth_info()) : ?>
            <b class="fs-cartic countTotalCart" id="js-cart-total" data-total="<?= cart_total() ?>"><?= cart_total() ?></b>
            <?php endif; ?>
          </a>
        </li>
      </ul>


      <div class="fs-search">
        <form action="<?= app_url('tim-kiem') ?>" method="get" autocomplete="off">
          <label for="key" class="mf-vhiditem">Nhập tên điện thoại, máy tính, phụ kiện... cần tìm</label>
          <input class="fs-stxt" type="text" id="search_input" name="keyword" placeholder="Nhập tên sản phẩm cần tìm" autocomplete="off" maxlength="50">
          <span class="icon-cance" id="icon-cance" style="display:none" title="Xóa">✕</span>
          <button type="submit" aria-label="Tìm kiếm" class="search-button" title="Tìm kiếm"><i class="ficon f-search"></i></button>
          <div class="fs-sresult" id="result_search" style="display:none">
            <div class="fs-sremain">
              <ul id="result_search_data">
              </ul>
            </div>
          </div>
        </form>
          <script>
            $(function() { 
              $('#icon-cance').on('click', function() {
                $(this).css('display', 'none');
                $('#search_input').val(null);
                $("#result_search_data").html(null);
              });
              $("#search_input").on('change keyup', function() {
                  let keyword = $(this).val();
                  if (keyword.trim() != '') {
                    $('#icon-cance').css('display', 'block');
                    $.ajax({
                      type: "post",
                      url: "<?= app_url('tim-kiem/xu-ly') ?>",
                      data: {
                        keyword: keyword,
                      },
                      success: function(data) {
                        $("#result_search").css('display', 'block');
                        $("#result_search_data").html(data);
                      }
                    });
                  } else {
                    $("#result_search_data").html(null);
                    $('#icon-cance').css('display', 'none');
                  }
              });
            });
        </script>
      </div>
    </div>
  </div>
  <?php if(menu_page()): ?>
  <nav class="fs-menu">
    <div class="f-wrap">
      <ul class="fs-mnul clearfix">
        <?php foreach (menu_page() as $cate) : ?>
          <li>
            <a href="<?= empty($cate['menu_url']) ? app_url('danh-muc/'.$cate['category_slug']) : $cate['menu_url'] ?>">
              <div class="base-ic"></div> <?= $cate['category_name'] ?>
            </a>
            <?php if(empty($cate['menu_url'])) : ?>
              <div class="fs-mnsub">
                <div class="fs-mnbox">
                  <div class="fs-mntd fs-mntd1">
                    <?php if(brand_page()): ?>
                    <p class="fs-mnstit">Hãng sản xuất</p>
                    <ul class="fs-mnsul fs-mnsul3 clearfix">
                      <?php foreach (brand_page() as $brand) : ?>
                      <li><a href="<?= app_url('danh-muc/'.$cate['category_slug'].'?brand='.$brand['brand_id']) ?>"><?= $brand['brand_name'] ?></a></li>
                      <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                  </div>
                  <div class="fs-mntd fs-mntd2">
                    <p class="fs-mnstit">Mức giá</p>
                    <ul class="fs-mnsul fs-mnsul1 clearfix">
                      <li><a href="<?= app_url('danh-muc/'.$cate['category_slug'].'?price=duoi-2-trieu') ?>">Dưới 2 triệu</a></li>
                      <li><a href="<?= app_url('danh-muc/'.$cate['category_slug'].'?price=tu-2-4-trieu') ?>">Từ 2 - 4 triệu</a></li>
                      <li><a href="<?= app_url('danh-muc/'.$cate['category_slug'].'?price=tu-4-7-trieu') ?>">Từ 4 - 7 triệu</a></li>
                      <li><a href="<?= app_url('danh-muc/'.$cate['category_slug'].'?price=tu-7-13-trieu') ?>">Từ 7 - 13 triệu</a></li>
                      <li><a href="<?= app_url('danh-muc/'.$cate['category_slug'].'?price=tren-13-trieu') ?>">Trên 13 triệu</a></li>
                    </ul>
                  </div>
                  <?php if (product_most_view()) : ?>
                  <div class="fs-mntd fs-mntd3">
                    <p class="fs-mnstit">Xem nhiều nhất</p>
                    <ul class="fs-mnsprod">
                      <li class="clearfix">
                        <a class="fs-mnspimg" href="<?= app_url('san-pham/'.product_most_view()['product_slug']) ?>">
                          <img src="<?= asset('uploads/'.product_most_view()['product_image']) ?>" alt="Samsung Galaxy A22 5G">
                        </a>
                        <div>
                          <span><a href="<?= app_url('san-pham/'.product_most_view()['product_slug']) ?>" title=""><?= product_most_view()['product_name'] ?></a></span>
                          <?php if (product_most_view()['product_discount'] > 0) : ?>
                            <p>
                              <?= discount_price(product_most_view()['product_price'], product_most_view()['product_discount']) ?>
                              <strike><?= priceVND(product_most_view()['product_price']) ?></strike>
                            </p>
                          <?php else: ?>
                            <p><?= priceVND(product_most_view()['product_price']) ?></p>
                          <?php endif; ?>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <?php endif; ?>
                </div>
              </div>
            <?php endif; ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </nav>
  <?php endif; ?>
</header>