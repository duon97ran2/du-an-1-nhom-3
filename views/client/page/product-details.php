<main class="l-main">
  <div class="l-pd">
    <div class="l-pd-header">
      <div class="g-container px-2">
        <div class="row">
          <ol class="breadcrumb bg-transparent breadcrumb-margin">
            <li class="breadcrumb-item "><a href="<?= app_url() ?>" title="Trang chủ">Trang chủ</a></li>
            <li class="breadcrumb-item "><a href="<?= app_url('danh-muc/' . $product_default['category_slug']) ?>" title="Trang chủ"><?= $product_default['category_name'] ?></a></li>
            <li class="breadcrumb-item active"><a href="<?= app_url('san-pham/' . $product_default['product_slug']) ?>" class="text-capitalize"><?= $product_default['product_name']; ?></a></li>
          </ol>
        </div>
      </div>
      <div class="g-container">
        <div class="l-pd-top">
          <h1 class="st-name text-capitalize"><?= $product_default['category_name'] . ' ' . $product_default['product_name']; ?></h1>
        </div>
        <div class="l-pd-row clearfix">
          <div class="l-pd-left">
            <div class="st-slider ">
              <?php if ($product_default['is_variant'] == 1) : ?>
                <img class="p-4 card shadow" src="<?= asset('uploads/' . $product_default['product_variant_image']) ?>" alt="" width="100%">
              <?php else : ?>
                <img class="p-4 card shadow" src="<?= asset('uploads/' . $product_default['product_image']) ?>" alt="" width="100%">
              <?php endif; ?>
            </div>
          </div>
          <div class="l-pd-right">
            <div class="st-price">
              <div class="st-price__left">
                <div class="st-price-main">
                  <!-- discount_price -->
                  <?php if ($product_default['is_variant'] == 1) : ?>
                    <?php if ($product_default['product_variant_discount'] > 0) : ?>
                      <div class="d-flex">
                        <h2 class=""><?= discount_price($product_default['product_variant_price'], $product_default['product_variant_discount']) ?></h2>
                        <h3 class="ml-3 text-secondary"><strike><?= priceVND($product_default['product_variant_price']) ?></strike></h3>
                      </div>
                    <?php else : ?>
                      <h2 class=""><?= priceVND($product_default['product_variant_price']) ?></h2>
                    <?php endif ?>
                  <?php else : ?>
                    <?php if ($product_default['product_discount'] > 0) : ?>
                      <div class="d-flex">
                        <h2 class=""><?= discount_price($product_default['product_price'], $product_default['product_discount']) ?></h2>
                        <h3 class="ml-3 text-secondary"><strike><?= priceVND($product_default['product_price']) ?></strike></h3>
                      </div>
                    <?php else : ?>
                      <h2 class=""><?= priceVND($product_default['product_price']) ?></h2>
                    <?php endif ?>
                  <?php endif ?>
                </div>
              </div>
            </div>
            <span class="">Còn lại: <?= $product_default['product_variant_quantity'] ?? $product_default['product_quantity'] ?> (sản phẩm)</span>
            <p class="mt-3">Lượt xem: <?= $product_default['product_views'] ?> lượt</p>
            <?php if ($product_default['is_variant'] == 1) : ?>
              <div class="st-select-color mt-3">
                <form method="GET" action="">
                  <?php foreach ($product_variant as $variant) : ?>
                    <label for="color-<?= $variant['product_variant_slug'] ?>" class="select-color-cus">
                      <input type="radio" name="color" id="color-<?= $variant['product_variant_slug'] ?>" class="js-color-type width-0" value="<?= $variant['product_variant_slug'] ?>" <?= $variant['product_variant_slug'] == $product_default['product_variant_slug'] ? 'checked' : '' ?> onclick="this.form.submit()">
                      <div class="st-select-color__item js--select-color-item">
                        <div class="img">
                          <img src="<?= asset('uploads/' . $variant['product_variant_image']) ?>" alt="<?= $variant['product_variant_name'] ?>">
                        </div>
                        <p title="<?= $variant['product_variant_name'] ?>"><?= $variant['product_variant_name'] ?></p>
                      </div>
                    </label>
                  <?php endforeach; ?>
                </form>
              </div>
            <?php endif ?>

            <?php if ($product_default['product_gifts']) : ?>
              <div class="st-boxPromo">
                <div class="title">Nhận ngay khuyến mại đặc biệt</div>
                <ul class="st-boxPromo__list st-boxPromo__list--more">
                  <?php foreach ($gifts as $gift) : ?>
                    <?php foreach (explode(',', $product_default['product_gifts']) as $item) : ?>
                      <?php if ($item == $gift['gift_id']) : ?>
                        <li>
                          <span class="icon-chekc material-icons">check_circle</span>
                          <div><span><?= $gift['gift_name'] ?></span></div>
                        </li>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  <?php endforeach; ?>
                </ul>
              </div>
            <?php endif; ?>

            <div class="st-pd-btn mt-3">
              <input type="hidden" name='quantity' class="form-control w-25 mx-2 text-center js-quantity-type" value="1" min="0" max="<?= $product_default['product_variant_quantity'] ?? $product_default['product_quantity'] ?>">
              <?php if ($product_default['is_variant'] == 1) : ?>
                <?php if ($product_default['product_variant_quantity'] > 0) : ?>
                  <button class="btn btn-info btn-xl btn--lg" id="js-add-to-cart" data-id="<?= $product_default['product_id'] ?>" data-price="<?= $product_default['product_variant_price'] ?? $product_default['product_price'] ?>" data-login="<?= empty(auth_info()) ? 0 : 1 ?>" data-url="<?= app_url('gio-hang/them-san-pham') ?>">
                    <div><strong>THÊM VÀO GIỎ HÀNG</strong></div>
                    <p>Giao hàng miễn phí hoặc nhận tại shop</p>
                  </button>
                <?php else : ?>
                  <button class='btn btn-info btn-xl btn--lg disabled'>
                    <div><strong>Hết hàng</strong></div>
                    <p>Sản phẩm đang hết hàng</p>
                  </button>
                <?php endif; ?>
              <?php else : ?>
                <?php if ($product_default['product_quantity'] > 0) : ?>
                  <button class="btn btn-info btn-xl btn--lg" id="js-add-to-cart" data-id="<?= $product_default['product_id'] ?>" data-price="<?= $product_default['product_variant_price'] ?? $product_default['product_price'] ?>" data-login="<?= empty(auth_info()) ? 0 : 1 ?>" data-url="<?= app_url('gio-hang/them-san-pham') ?>">
                    <div><strong>THÊM VÀO GIỎ HÀNG</strong></div>
                    <p>Giao hàng miễn phí hoặc nhận tại shop</p>
                  </button>
                <?php else : ?>
                  <button class='btn btn-info btn-xl btn--lg disabled'>
                    <div><strong>Hết hàng</strong></div>
                    <p>Sản phẩm đang hết hàng</p>
                  </button>
                <?php endif; ?>
              <?php endif; ?>
              <button class="btn btn-danger btn-xl btn--sm" data-id="<?= $product_default['product_id'] ?>" id="js-add-to-wishlists" data-login="<?= empty(auth_info()) ? 0 : 1 ?>" data-url="<?= app_url('luu-yeu-thich') ?>">
                <div><strong><span class="material-icons">favorite</span></strong></div>
                <p> Yêu thích </p>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="l-pd-body">
      <div class="g-container">
        <div class="l-pd-body__wrapper">
          <div class="l-pd-body__left">
            <div class="card re-card st-card st-card--article js--st-card--article">
              <h2 class="card-title">Thông tin sản phẩm <?= $product_default['product_name']; ?></h2>
              <div class="card-body">
                <?= $product_default['product_content']; ?>
              </div>
            </div>
          </div>
          <?php if ($product_configuration) : ?>
            <div class="l-pd-body__right">
              <div class="card re-card st-card">
                <h2 class="card-title">Thông số kỹ thuật</h2>
                <div class="card-body">
                  <table class="st-pd-table mb30">
                    <tbody>
                      <tr>
                        <td>Màn hình</td>
                        <td><span><?= $product_configuration['display'] ?></span></td>
                      </tr>
                      <tr>
                        <td>Camera sau</td>
                        <td><span><?= $product_configuration['camera_back'] ?></span></td>
                      </tr>
                      <tr>
                        <td>Camera Selfie</td>
                        <td><span><?= $product_configuration['camera_front'] ?></span></td>
                      </tr>
                      <tr>
                        <td>RAM&nbsp;</td>
                        <td><span><?= $product_configuration['ram'] ?></span></td>
                      </tr>
                      <tr>
                        <td>Bộ nhớ trong</td>
                        <td><span><?= $product_configuration['storage'] ?></span></td>
                      </tr>
                      <tr>
                        <td>CPU</td>
                        <td><span><?= $product_configuration['cpu'] ?></span></td>
                      </tr>
                      <tr>
                        <td>GPU</td>
                        <td><span><?= $product_configuration['gpu'] ?></span></td>
                      </tr>
                      <tr>
                        <td>Dung lượng pin</td>
                        <td><span><?= $product_configuration['battery'] ?></span></td>
                      </tr>
                      <tr>
                        <td>Thẻ sim</td>
                        <td><span><?= $product_configuration['sim'] ?></span></td>
                      </tr>
                      <tr>
                        <td>Hệ điều hành</td>
                        <td><span><?= $product_configuration['system'] ?></span></td>
                      </tr>
                      <tr>
                        <td>Xuất xứ</td>
                        <td><span><?= $product_configuration['made_in'] ?></span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          <?php endif ?>
        </div>
        <div class="l-pd-comment">
          <div class="g-container"><input hidden="" id="id-page-comment" readonly="" value="993609">
            <div class="card st-card card-normal">
              <h2 class="card-title card-title--badge">Hỏi &amp; Đáp về <?= $product_default['product_name'] ?><span class="badge text-white" style="background: rgb(220, 53, 69);"><?= $total_cmt ?></span></h2>
              <div class="card-body">
                <div style="margin: 0 2rem;">
                  <?php if (auth_info()) :
                    $user = auth_info();
                  ?>
                    <h6>Bạn đang bình luận dưới tên: <span style="color:blue"><?= $user['name'] ?></span></h6><br>
                    <form action="<?= app_url('save-comment') ?>" method="POST" class="c-user-rate-form mb-3 f-comment-0">
                      <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
                      <input type="hidden" name="product_id" value="<?= $product_default['product_id'] ?>">
                      <input type="hidden" name="product_slug" value="<?= $product_default['product_slug'] ?>">
                      <textarea name="comment_content" id="f-comment-0" rows="4" placeholder="Viết câu hỏi của bạn"></textarea>
                      <button class="btn btn-primary" data-id="0">Gửi câu hỏi</button>
                    </form>
                    <p class="f-err" style="display: none;">Mời bạn viết bình luận.(Tối thiểu 3 ký tự)</p>
                  <?php else : ?>
                    <div class="c-user-rate-form mb-3 f-comment-0">
                      <textarea name="" id="f-comment-0" rows="4" disabled placeholder="Viết câu hỏi của bạn">Mời bạn đăng nhập để bình luận.
                    </textarea>
                    </div>
                  <?php endif ?>
                </div>
                <div class="comment-content" id="comment-content">
                  <?php
                  foreach ($comments as $c) : ?>
                    <div class="c-comment " id="f-comment-root">
                      <div class="c-comment-box">
                        <div class="c-comment-box__avatar bg-transparent"><img src="<?= asset($c['avatar'] ?? 'adminlte/dist/img/avatar.png') ?>" alt=""></div>
                        <div class="c-comment-box__content">
                          <div class="c-comment-name"><?= $c['name'] ?><div class="time"><?= date("d-m-Y", strtotime($c['created_at'])) ?></div>
                          </div>
                          <div class="c-comment-text">
                            <p><?= $c['comment_content'] ?></p>
                          </div>
                        </div>
                      </div>
                      <?php if (!empty($c['comment_author'])) : ?>
                        <div class="c-comment-box level2">
                          <div class="c-comment-box__avatar"><img src="<?= $c['avatar'] ?>" alt=""></div>
                          <div class="c-comment-box__content">
                            <div class="c-comment-name"><?= $c['name'] ?? 'Admin' ?>
                              <span class="badge badge-primary">Quản trị viên</span>
                              <div class="time"><?= date("d-m-Y", strtotime($c['created_at'])) ?></div>
                            </div>
                            <div class="c-comment-text">
                              <span>Chào <?= $c['first_name'] ?>,</span>
                              <p><?= $c['comment_author'] ?></p>
                            </div>
                          <?php else : ?>
                            <span class="btn btn-default text-danger p-0 m-0">Quản trị viên sẽ sớm liên lạc với bạn </span>
                          <?php endif ?>

                          <div class="c-comment-status"></div>
                          </div>
                        </div>
                    </div>
                  <?php endforeach; ?>

                </div>
              
              </div>
            </div>
          </div>
        </div>
        <div class="l-pd-productsViewed">
          <div class="g-container">
            <div class="card card-normal">
              <div class="card-title">SẢN PHẨM BẠN LIÊN QUAN</div>
              <div class="card-body">
                <div class="hot-js-swipper swiper-container cdt-sale-js swiper-container-initialized swiper-container-horizontal">
                  <div class="swiper-wrapper">

                    <!-- foreach -->
                    <?php foreach (sp_categories($product_default['category_slug']) as $key => $item) :
                    ?>
                      <div class="swiper-slide">
                        <div class="cdt-product">
                          <div class="cdt-product__img"><a href="<?= app_url('san-pham/' . $item['product_slug']) ?>">
                                <img src="<?= asset('uploads/' . $item['product_image']) ?>" style=" width: 214px; height: 214px; ">
                              </a>
                            <?php if ($item['product_discount'] > 0) : ?>
                              <div class="cdt-product__label">
                                <span class="badge badge-primary">Giảm <?= price_minus_discount($item['product_price'], $item['product_discount']) ?></span>
                              </div>
                            <?php endif ?>
                          </div>
                          <div class="cdt-product__info">
                            <h3>
                              <a href="<?= app_url('san-pham/' . $item['product_slug']) ?>" class="cdt-product__name"><?= $item['product_name'] ?></a>
                            </h3>
                            <div class="cdt-product__show-promo">
                              <?php if ($item['product_discount'] > 0) : ?>
                                <div class="progress justify-content-center">
                                  <?= discount_price($item['product_price'], $item['product_discount']) ?>
                                  <div class="progress-bar" style="width: 100%;"></div>
                                </div>
                                <div class="strike-price">
                                  <strike><?= priceVND($item['product_price']) ?></strike>
                                </div>
                              <?php else : ?>
                                <div class="progress justify-content-center">
                                  <?= priceVND($item['product_price']) ?>
                                  <div class="progress-bar" style="width: 100%;"></div>
                                </div>
                              <?php endif ?>
                            </div>
                            <div class="cdt-product__btn">
                              <a href="<?= app_url('san-pham/' . $item['product_slug']) ?>" class="btn btn-primary btn-sm btn-main">XEM SẢN PHẨM</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php endforeach ?>

                    <!-- endforeach -->


                  </div>
                  <div class="swiper-button-next swiper-button-white"><i class="icon-angle-right"></i></div>
                  <div class="swiper-button-prev swiper-button-white"><i class="icon-angle-left"></i></div><span class="swiper-notification"></span>
                </div>
                <script>
                  new Swiper(".hot-js-swipper", {
                    slidesPerView: 4,
                    spaceBetween: 30,
                    slidesPerGroup: 4,
                    loop: false,
                    loopFillGroupWithBlank: true,
                    navigation: {
                      nextEl: ".swiper-button-next",
                      prevEl: ".swiper-button-prev",
                    },
                  });
                </script>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>