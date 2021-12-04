<main class="main-wrapper">
  <div class="fpt-sale">
    <?php if ($banner) : ?>
      <section class="section-banner swiper-banner margin-30">
        <div class="category-container ">
          <div class="cate-box bg-white ">
            <div class="box-container row-flex ">
              <div class="banner-js-swipper swiper-container gallery-top swiper-container-initialized swiper-container-horizontal">
                <div class="swiper-wrapper">
                  <?php foreach ($banner as $b) : ?>
                    <?php if (intval($b['banner_position']) == 1) : ?>
                      <div class="carousel-item active">
                        <img src="<?= asset('uploads/' . $b['banner_image']) ?>" class="banner-image" alt="...">
                      </div>
                      <div class="swiper-slide">
                        <a href="<?= $b['banner_url'] ?>" target="<?= $b['banner_target'] ?>">
                          <img style="width: 100%;" src="<?= asset('uploads/' . $b['banner_image']) ?>">
                        </a>
                      </div>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </div>
                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
              </div>
            </div>
            <script>
              new Swiper(".banner-js-swipper", {
                spaceBetween: 10,
                navigation: {
                  nextEl: ".swiper-button-next",
                  prevEl: ".swiper-button-prev",
                },
              });
            </script>
          </div>
        </div>
      </section>
    <?php endif; ?>
    <?php if ($cate_img) : ?>
      <section class="section-box st-cate margin-30">
        <div class="category-container">
          <div class="cate-box">
            <div class="row-flex bg-white">
              <?php foreach ($cate_img as $c) :  ?>
                <div class="col6-no col-border">
                  <a href="<?= app_url() ?>" class="ct-item-a ct-transition">
                    <div class="cate-item text-center">
                      <picture class="picture margin-10">
                        <img src="<?= asset($c['category_image']) ?>">
                      </picture>
                      <div class="cate-item-name f15-bold">
                        <?= $c['category_name'] ?>
                      </div>
                    </div>
                  </a>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </section>
    <?php endif; ?>

    <?php if ($hot_sale) : ?>
      <section class="section-box slide-product">
        <div class="category-container">
          <div class="prd-sale cate-box bg-white p-t-15 margin-30">
            <div class="prd-sale p-l-15 p-r-15 margin-18">
              <div class="title f20">
                <span class="material-icons">whatshot</span>
                <h2>Khuyến mãi hot</h2>
              </div>
            </div>
            <div class="prd-sale__product">
              <div class="hot-js-swipper swiper-container cdt-sale-js swiper-container-initialized swiper-container-horizontal">
                <div class="swiper-wrapper">
                  <?php foreach ($hot_sale as $item) : ?>
                    <div class="swiper-slide">
                      <div class="cdt-product">
                        <div class="cdt-product__img">
                          <a href="<?= app_url('san-pham/' . $item['product_slug']) ?>">
                            <a href="<?= app_url('san-pham/' . $item['product_slug']) ?>">
                              <img src="<?= asset('uploads/' . $item['product_image']) ?>" style=" width: 214px; height: 214px; ">
                            </a>
                          </a>
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
                        </div>
                      </div>
                    <?php endforeach ?>
                    </div>
                    <div class="swiper-button-next swiper-button-white" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"><i class="icon-angle-right"></i></div>
                    <div class="swiper-button-prev swiper-button-white" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="true"><i class="icon-angle-left"></i></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                </div>
                <script>
                  new Swiper(".hot-js-swipper", {
                    slidesPerView: 4,
                    spaceBetween: 0,
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
      </section>
    <?php endif; ?>
  </div>
  <section class="section-box">
    <div class="category-container">
      <div class="cate-box cat-prd box-pad15 bg-white margin-50">
        <div class="cat-prd-oustanding margin-18">
          <div class="title f20">
            <h2>Samsung</h2>
          </div>
          <div class="cat-prd-tabs"><a href="/dien-thoai">Xem tất cả</a></div>
        </div>
        <div class="cat-prd__product">
          <div class="row-flex">
            <?php foreach ($sp_cate as $item) : ?>
              <div class="cdt-product">
                <div class="cdt-product__img">
                  <a href="<?= app_url('san-pham/' . $item['product_slug']) ?>">
                    <a href="<?= app_url('san-pham/' . $item['product_slug']) ?>">
                      <img src="<?= asset('uploads/' . $item['product_image']) ?>" style=" width: 214px; height: 214px; ">
                    </a>
                  </a>
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
            <?php endforeach ?>

          </div>
        </div>
      </div>
  </section>
</main>