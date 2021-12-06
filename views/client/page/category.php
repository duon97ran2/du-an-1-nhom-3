<main class="py-5">
    <?php if ($banners) : ?>
    <section class="section-banner swiper-banner margin-30 mb-5">
        <div class="category-container">
            <div class="cate-box bg-white ">
                <div class="box-container row-flex">
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
    <section class="category-container">
        <div class="mx-2 row fspdbox">
            <div class="col-3 p-0">
                <form class="cdt-filter" method="GET">
                    <div class="cdt-filter__block">
                        <div class="cdt-filter__title">Thương hiệu</div>
                        <div class="cdt-filter__checklist listfilterv4 filterBrand">
                            <label class="radio-select">
                                <input type="radio" name="brand" value="" onclick="this.form.submit()" <?= empty(input_get('brand')) ? 'checked' : ''  ?>>
                                <div class="checkbox frowitem">
                                    <a><i class="iconcate-checkbox"></i>Toàn bộ</a>
                                </div>
                            </label>
                            <?php if(brand_page()): ?>
                                <?php foreach (brand_page() as $brand) : ?>
                                <label class="radio-select">
                                    <input type="radio" name="brand" value="<?= $brand['brand_id'] ?>" onclick="this.form.submit()" <?= input_get('brand') == $brand['brand_id'] ? 'checked' : ''  ?>>
                                    <div class="checkbox frowitem">
                                        <a><i class="iconcate-checkbox"></i><?= $brand['brand_name'] ?></a>
                                    </div>
                                </label>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="cdt-filter__block">
                        <div class="cdt-filter__title">Mức giá</div>
                        <div class="cdt-filter__checklist listfilterv4 filterPrice">
                            <label class="radio-select">
                                <input type="radio" name="price" value="" onclick="this.form.submit()" <?= empty(input_get('price')) ? 'checked' : ''  ?>>
                                <div class="checkbox frowitem">
                                    <a><i class="iconcate-checkbox"></i>Toàn bộ</a>
                                </div>
                            </label>
                            <label class="radio-select">
                                <input type="radio" name="price" value="duoi-2-trieu" onclick="this.form.submit()" <?= input_get('price') == 'duoi-2-trieu' ? 'checked' : ''  ?>>
                                <div class="checkbox frowitem">
                                    <a><i class="iconcate-checkbox"></i>Dưới 2 triệu</a>
                                </div>
                            </label>
                            <label class="radio-select">
                                <input type="radio" name="price" value="tu-2-4-trieu" onclick="this.form.submit()" <?= input_get('price') == 'tu-2-4-trieu' ? 'checked' : ''  ?>>
                                <div class="checkbox frowitem">
                                    <a><i class="iconcate-checkbox"></i>Từ 2 - 4 triệu</a>
                                </div>
                            </label>
                            <label class="radio-select">
                                <input type="radio" name="price" value="tu-4-7-trieu" onclick="this.form.submit()" <?= input_get('price') == 'tu-4-7-trieu' ? 'checked' : ''  ?>>
                                <div class="checkbox frowitem">
                                    <a><i class="iconcate-checkbox"></i>Từ 4 - 7 triệu</a>
                                </div>
                            </label>
                            <label class="radio-select">
                                <input type="radio" name="price" value="tu-7-13-trieu" onclick="this.form.submit()" <?= input_get('price') == 'tu-7-13-trieu' ? 'checked' : ''  ?>>
                                <div class="checkbox frowitem">
                                    <a><i class="iconcate-checkbox"></i>Từ 7 - 13 triệu</a>
                                </div>
                            </label>
                            <label class="radio-select">
                                <input type="radio" name="price" value="tren-13-trieu" onclick="this.form.submit()" <?= input_get('price') == 'tren-13-trieu' ? 'checked' : ''  ?>>
                                <div class="checkbox frowitem">
                                    <a><i class="iconcate-checkbox"></i>Trên 13 triệu</a>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="cdt-filter__block">
                        <div class="cdt-filter__title">Khác</div>
                        <div class="cdt-filter__checklist listfilterv4 filterPrice">
                            <label class="radio-select">
                                <input type="radio" name="other" value="uu-dai" onclick="this.form.submit()" <?= input_get('other') == 'uu-dai' ? 'checked' : ''  ?>>
                                <div class="checkbox frowitem">
                                    <a><i class="iconcate-checkbox"></i>Ưu đãi</a>
                                </div>
                            </label>
                            <label class="radio-select">
                                <input type="radio" name="other" value="giam-gia" onclick="this.form.submit()" <?= input_get('other') == 'giam-gia' ? 'checked' : ''  ?>>
                                <div class="checkbox frowitem">
                                    <a><i class="iconcate-checkbox"></i>Giảm giá</a>
                                </div>
                            </label>
                            <label class="radio-select">
                                <input type="radio" name="other" value="" onclick="this.form.submit()" <?= empty(input_get('other')) ? 'checked' : ''  ?>>
                                <div class="checkbox frowitem">
                                    <a><i class="iconcate-checkbox"></i>Toàn bộ</a>
                                </div>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-9 p-0 pl-4">
                <div class="card mb-5 fpheadbox">
                    <div class="card-header">
                        <div class="cdt-head">
                            <h1 class="cdt-head__title"><?= $category_name . ' ' . $brand_name ?></h1>
                        </div>
                    </div>
                    <?php if(brand_page()): ?>
                    <div class="card-body cdt-brand-pd">
                        <div class="cdt-brand-img brand-js-swipper swiper-container swiper-container-horizontal">
                            <div class="swiper-wrapper">
                                <?php foreach (brand_page() as $brand) : ?>
                                <div class="swiper-slide">
                                    <a href="<?= app_url('danh-muc'.$category_slug.'?brand='. $brand['brand_id']) ?>">
                                        <img src="<?= asset($brand['brand_image']) ?>" alt="Vsmart">
                                    </a>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="swiper-button-next swiper-button-white"></div>
                            <div class="swiper-button-prev swiper-button-white"></div>
                        </div>
                        <script>
                            new Swiper(".brand-js-swipper", {
                                slidesPerView: 7,
                                spaceBetween: 0,
                                slidesPerGroup: 7,
                                loop: false,
                                loopFillGroupWithBlank: true,
                                navigation: {
                                    nextEl: ".swiper-button-next",
                                    prevEl: ".swiper-button-prev",
                                },
                            });
                        </script>
                    </div>
                    <?php endif; ?>
                </div>
                <?php if ($products) : ?>
                <div class="card fplistbox">
                    <div class="card-body p-0 p-t-15 p-b-30 fplistpdbox">
                        <div class="cdt-product-wrapper m-b-20" id="js-data-product">
                            <!-- <?php foreach($products as $item) : ?>
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
                                        <?php if ($item['display'] || $item['ram'] || $item['storage']) : ?>
                                        <div class="cdt-product__config">
                                            <div class="cdt-product__config__param">
                                                <span data-title="Màn hình">
                                                    <span class="material-icons align-top">phone_iphone</span>
                                                    <?= $item['display'] ?? '??' ?>
                                                </span>
                                                <span data-title="RAM">
                                                    <span class="material-icons align-top">memory</span>
                                                    <?= $item['ram'] ?>
                                                </span>
                                                <span data-title="Bộ nhớ trong">
                                                    <span class="material-icons align-top">album</span>
                                                    <?= $item['storage'] ?? '??' ?>
                                                </span>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                        <div class="cdt-product__btn">
                                            <a href="<?= app_url('san-pham/' . $item['product_slug']) ?>" class="btn btn-primary btn-sm btn-main">XEM SẢN PHẨM</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="cdt-product--loadmore mb-5"><a class="btn btn-light js-load-moresss">Xem thêm</a></div> -->
                        </div>
                        <script>
                            $(function() {
                                let limit = 12;
                                let total_product = Number("<?= count($products) ?>");
                                (function data_product() {
                                    $.ajax({
                                        type: "get",
                                        url: "<?= app_url('danh-muc-xem-them') ?>",
                                        data: {
                                            slug: "<?= input_get('slug') ?>",
                                            brand: "<?= input_get('brand') ?>",
                                            price: "<?= input_get('price') ?>",
                                            other: "<?= input_get('other') ?>",
                                            limit: limit,
                                        },
                                        success: function(response) {
                                            $('#js-data-product').html(response);
                                            $('.js-load-moresss').on('click', function() {
                                                limit += 12;
                                                $('.js-load-moresss img').show();
                                                setTimeout(function(){
                                                    data_product();
                                                }, 1000);
                                            });
                                        }
                                    });
                                    $('.js-load-moresss img').hide();
                                })();
                                $('.js-load-moresss').on('click', function() {
                                    $('.js-load-moresss img').show();
                                });
                            });
                        </script>
                    </div>
                </div>
                <?php else : ?>
                    <div class="card fplistbox">
                    <div class="card-body p-0 p-t-15 p-b-30 fplistpdbox">
                        <div class="fs-ghnull">
                            <p class="fs-ghnl1"><img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg//assets/a60759ad1dabe909c46a817ecbf71878.png" alt="" width="150px"></p>
                            <p class="fs-ghnl2">Không có sản phẩm nào</p>
                            <p class="fs-ghnl3"><a href="<?= app_url() ?>" title="Trang chủ">ĐẾN TRANG CHỦ</a></p> 
                        </div>
                    </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>