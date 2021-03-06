<main class="main-wrapper">
  <div class="fpt-sale">
    <?php if ($banners) : ?>
      <section class="section-banner swiper-banner margin-30">
        <div class="category-container ">
          <div class="cate-box bg-white ">
            <div class="box-container row-flex" style="padding-bottom: 5px;">
              <div class="banner-js-swipper swiper-container gallery-top swiper-container-initialized swiper-container-horizontal">
                <div class="swiper-wrapper">
                  <?php foreach ($banners as $b) : ?>
                    <div class="swiper-slide">
                      <a href="<?= $b['banner_url'] ?>" target="<?= $b['banner_target'] ?>">
                        <img style="width: 100%;height: 400px;" src="<?= asset('uploads/' . $b['banner_image']) ?>">
                      </a>
                    </div>
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

    <?php if (brand_page()) : ?>
      <section class="section-box st-cate margin-30">
        <div class="category-container">
          <div class="cate-box">
            <div class="brand-js-swipper swiper-container gallery-top swiper-container-initialized swiper-container-horizontal">
              <div class="swiper-wrapper">
                <?php foreach (brand_page() as $b) :  ?>
                  <div class="bg-white col-border swiper-slide">
                    <a href="<?= app_url('danh-muc?brand=' . $b['brand_id']) ?>" class="ct-item-a ct-transition">
                      <div class="cate-item text-center">
                        <picture class="picture margin-10">
                          <img src="<?= asset($b['brand_image']) ?>">
                        </picture>
                        <div class="cate-item-name f15-bold">
                          <?= $b['brand_name'] ?>
                        </div>
                      </div>
                    </a>
                  </div>
                <?php endforeach; ?>
              </div>
              <div class="swiper-button-next swiper-button-white"></div>
              <div class="swiper-button-prev swiper-button-white"></div>
            </div>
            <script>
              new Swiper(".brand-js-swipper", {
                slidesPerView: 6,
                slidesPerGroup: 6,
                loop: false,
                loopFillGroupWithBlank: true,
                spaceBetween: 0,
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

    <?php if ($hot_sale) : ?>
      <section class="section-box slide-product">
        <div class="category-container">
          <div class="prd-sale cate-box bg-white p-t-15 margin-30">
            <div class="prd-sale p-l-15 p-r-15 margin-18">
              <div class="title f20">
                <span class="material-icons align-middle" style="margin-top: -5px;">local_fire_department</span>
                <h2>Khuy???n m??i hot</h2>
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
                            <img src="<?= asset('uploads/' . $item['product_image']) ?>" style=" width: 214px; height: 214px; ">
                          </a>
                          <?php if ($item['product_discount'] > 0) : ?>
                          <a href="<?= app_url('san-pham/' . $item['product_slug']) ?>">
                            <div style="background-image: url('https://statics.toiday.com/frame_sale.png');background-size: 100% 100%;width: 100%;width: 100%;position: absolute;top: -4px;left: -4px;bottom: -4px;right: -4px;"></div>
                            <div class="cdt-product__label" style="top: 0;">
                              <span class="badge badge-primary">Gi???m <?= price_minus_discount($item['product_price'], $item['product_discount']) ?></span>
                            </div>
                          </a>
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
                        </div>
                      </div>
                    </div>
                  <?php endforeach ?>
                  <div class="swiper-button-next swiper-button-white"></div>
                  <div class="swiper-button-prev swiper-button-white"></div>
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

    <?php if ($hot_view) : ?>
      <section class="section-box slide-product">
        <div class="category-container">
          <div class="prd-sale cate-box bg-white p-t-15 margin-30">
            <div class="prd-sale p-l-15 p-r-15 margin-18">
              <div class="title f20">
                <span class="material-icons align-middle" style="margin-top: -5px;">star</span>
                <h2>???????c quan t??m nhi???u</h2>
              </div>
            </div>
            <div class="prd-sale__product">
              <div class="view-js-swipper swiper-container cdt-sale-js swiper-container-initialized swiper-container-horizontal">
                <div class="swiper-wrapper">
                  <?php foreach ($hot_view as $item) : ?>
                    <div class="swiper-slide">
                      <div class="cdt-product">
                        <div class="cdt-product__img">
                          <a href="<?= app_url('san-pham/' . $item['product_slug']) ?>">
                            <img src="<?= asset('uploads/' . $item['product_image']) ?>" style=" width: 214px; height: 214px; ">
                          </a>
                          <?php if ($item['product_discount'] > 0) : ?>
                            <div class="cdt-product__label">
                              <span class="badge badge-primary">Gi???m <?= price_minus_discount($item['product_price'], $item['product_discount']) ?></span>
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
                        </div>
                      </div>
                    </div>
                  <?php endforeach ?>
                  <div class="swiper-button-next swiper-button-white"></div>
                  <div class="swiper-button-prev swiper-button-white"></div>
                </div>
                <script>
                  new Swiper(".view-js-swipper", {
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

  <?php if ($lst_categories) : ?>
    <?php foreach ($lst_categories as $cate) : ?>
      <?php if($cate['product_count'] > 0) : ?>
        <section class="section-box">
          <div class="category-container">
            <div class="cate-box cat-prd box-pad15 bg-white margin-50">
              <div class="cat-prd-oustanding margin-18">
                <div class="title f20">
                  <h2><?= $cate['category_name'] ?></h2>
                </div>
                <div class="cat-prd-tabs"><a href="<?= app_url('danh-muc/' . $cate['category_slug']) ?>">Xem t???t c???</a></div>
              </div>
              <div class="cat-prd__product">
                <div class="row-flex">
                  <?php foreach (sp_categories($cate['category_slug']) as $key => $item) : ?>
                    <div class="cdt-product">
                      <div class="cdt-product__img">
                        <a href="<?= app_url('san-pham/' . $item['product_slug']) ?>">
                          <img src="<?= asset('uploads/' . $item['product_image']) ?>" style=" width: 214px; height: 214px; ">
                        </a>
                        <?php if ($item['product_discount'] > 0) : ?>
                          <div class="cdt-product__label">
                            <span class="badge badge-primary">Gi???m <?= price_minus_discount($item['product_price'], $item['product_discount']) ?></span>
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
                          <a href="<?= app_url('san-pham/' . $item['product_slug']) ?>" class="btn btn-primary btn-sm btn-main">XEM S???N PH???M</a>
                        </div>
                      </div>
                    </div>
                  <?php endforeach ?>
                </div>
              </div>
            </div>
          </div>
        </section>
      <?php endif; ?>
    <?php endforeach; ?>
  <?php endif; ?>
</main>