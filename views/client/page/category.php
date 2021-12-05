<main class="py-5">
    <section class="section-banner swiper-banner margin-30 mb-5">
        <div class="category-container">
            <div class="cate-box bg-white ">
                <div class="box-container row-flex ">
                    <div class="banner-js-swipper swiper-container gallery-top swiper-container-initialized swiper-container-horizontal">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a href="/" target="_blank">
                                    <img style="width: 100%;height: 350px;" src="https://images.fpt.shop/unsafe/fit-in/800x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/11/30/637739131345545712_F-H1_800x300.png" alt="Sắm Samsung, trúng quà 60 triệu" title="Sắm Samsung, trúng quà 60 triệu">
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="/" target="_blank">
                                    <img style="width: 100%;height: 350px;" src="https://images.fpt.shop/unsafe/fit-in/800x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/11/30/637739130550071063_F-H1_800x300.png" alt="iPhone 13 Series ưu đãi đến 5 triệu" title="iPhone 13 Series ưu đãi đến 5 triệu" class="swiper-lazy swiper-lazy-loaded">
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a href="/" target="_blank">
                                    <img style="width: 100%;height: 350px;" src="https://images.fpt.shop/unsafe/fit-in/800x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/11/30/637738655803121919_F-H1_800x300.png" alt="Reno6 Z | Reno6 5G giảm đến 500.000Đ" title="Reno6 Z | Reno6 5G giảm đến 500.000Đ" class="swiper-lazy">
                                </a>
                            </div>
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
                            <label class="radio-select">
                                <input type="radio" name="brand" value="1" onclick="this.form.submit()" <?= input_get('brand') == '1' ? 'checked' : ''  ?>>
                                <div class="checkbox frowitem">
                                    <a><i class="iconcate-checkbox"></i>Thương hiệu A</a>
                                </div>
                            </label>
                            <label class="radio-select">
                                <input type="radio" name="brand" value="2" onclick="this.form.submit()" <?= input_get('brand') == '2' ? 'checked' : ''  ?>>
                                <div class="checkbox frowitem">
                                    <a><i class="iconcate-checkbox"></i>Thương hiệu B</a>
                                </div>
                            </label>
                            <label class="radio-select">
                                <input type="radio" name="brand" value="3" onclick="this.form.submit()" <?= input_get('brand') == '3' ? 'checked' : ''  ?>>
                                <div class="checkbox frowitem">
                                    <a><i class="iconcate-checkbox"></i>Thương hiệu C</a>
                                </div>
                            </label>
                            <label class="radio-select">
                                <input type="radio" name="brand" value="4" onclick="this.form.submit()" <?= input_get('brand') == '4' ? 'checked' : ''  ?>>
                                <div class="checkbox frowitem">
                                    <a><i class="iconcate-checkbox"></i>Thương hiệu D</a>
                                </div>
                            </label>
                            <label class="radio-select">
                                <input type="radio" name="brand" value="5" onclick="this.form.submit()" <?= input_get('brand') == '5' ? 'checked' : ''  ?>>
                                <div class="checkbox frowitem">
                                    <a><i class="iconcate-checkbox"></i>Thương hiệu E</a>
                                </div>
                            </label>
                            <label class="radio-select">
                                <input type="radio" name="brand" value="6" onclick="this.form.submit()" <?= input_get('brand') == '6' ? 'checked' : ''  ?>>
                                <div class="checkbox frowitem">
                                    <a><i class="iconcate-checkbox"></i>Thương hiệu F</a>
                                </div>
                            </label>
                            <label class="radio-select">
                                <input type="radio" name="brand" value="7" onclick="this.form.submit()" <?= input_get('brand') == '7' ? 'checked' : ''  ?>>
                                <div class="checkbox frowitem">
                                    <a><i class="iconcate-checkbox"></i>Thương hiệu G</a>
                                </div>
                            </label>
                            <label class="radio-select">
                                <input type="radio" name="brand" value="8" onclick="this.form.submit()" <?= input_get('brand') == '8' ? 'checked' : ''  ?>>
                                <div class="checkbox frowitem">
                                    <a><i class="iconcate-checkbox"></i>Thương hiệu H</a>
                                </div>
                            </label>
                            <label class="radio-select">
                                <input type="radio" name="brand" value="9" onclick="this.form.submit()" <?= input_get('brand') == '9' ? 'checked' : ''  ?>>
                                <div class="checkbox frowitem">
                                    <a><i class="iconcate-checkbox"></i>Thương hiệu T</a>
                                </div>
                            </label>
                            <label class="radio-select">
                                <input type="radio" name="brand" value="10" onclick="this.form.submit()" <?= input_get('brand') == '10' ? 'checked' : ''  ?>>
                                <div class="checkbox frowitem">
                                    <a><i class="iconcate-checkbox"></i>Thương hiệu I</a>
                                </div>
                            </label>
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
                                <input type="radio" name="price" value="2000000-4000000" onclick="this.form.submit()" <?= input_get('price') == '2000000-4000000' ? 'checked' : ''  ?>>
                                <div class="checkbox frowitem">
                                    <a><i class="iconcate-checkbox"></i>Từ 2 - 4 triệu</a>
                                </div>
                            </label>
                            <label class="radio-select">
                                <input type="radio" name="price" value="4000000-6000000" onclick="this.form.submit()" <?= input_get('price') == '4000000-6000000' ? 'checked' : ''  ?>>
                                <div class="checkbox frowitem">
                                    <a><i class="iconcate-checkbox"></i>Từ 4 - 6 triệu</a>
                                </div>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-9 p-0 pl-4">
                <?php if ($cate_name) : ?>
                <div class="card mb-5 fpheadbox">
                    <div class="card-header">
                        <div class="cdt-head">
                            <h1 class="cdt-head__title"><?= $cate_name ?></h1>
                        </div>
                    </div>
                    <div class="card-body cdt-brand-pd">
                        <div class="cdt-brand-img brand-js-swipper swiper-container swiper-container-horizontal">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a href="<?= app_url('danh-muc'.$slug.'?brand=1') ?>">
                                        <img src="https://images.fpt.shop/unsafe/fit-in/108x40/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2020/8/26/637340491898901930_Vsmart@2x.jpg" alt="Vsmart">
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="<?= app_url('danh-muc'.$slug.'?brand=2') ?>">
                                        <img src="https://images.fpt.shop/unsafe/fit-in/108x40/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2020/8/26/637340493755614653_Nokia@2x.jpg" alt="Nokia">
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="<?= app_url('danh-muc'.$slug.'?brand=3') ?>">
                                        <img src="https://images.fpt.shop/unsafe/fit-in/108x40/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2020/8/26/637340491898901930_Masstel@2x.jpg" alt="Masstel">
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="<?= app_url('danh-muc'.$slug.'?brand=4') ?>">
                                        <img src="https://images.fpt.shop/unsafe/fit-in/108x40/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2020/8/26/637340490193124614_iPhone-Apple@2x.jpg" alt="Apple (iPhone)">
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="<?= app_url('danh-muc'.$slug.'?brand=5') ?>">
                                        <img src="https://images.fpt.shop/unsafe/fit-in/108x40/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2020/8/26/637340490904217021_Samsung@2x.jpg" alt="Samsung">
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="<?= app_url('danh-muc'.$slug.'?brand=6') ?>">
                                        <img src="https://images.fpt.shop/unsafe/fit-in/108x40/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2020/8/26/637340491304997311_Oppo@2x.jpg" alt="OPPO">
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="<?= app_url('danh-muc'.$slug.'?brand=7') ?>">
                                        <img src="https://images.fpt.shop/unsafe/fit-in/108x40/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/6/2/637582325361253577_Xiaomi@2x.jpg" alt="Xiaomi">
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="<?= app_url('danh-muc'.$slug.'?brand=8') ?>">
                                        <img src="https://images.fpt.shop/unsafe/fit-in/108x40/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2020/8/26/637340491898745716_Vivo@2x.jpg" alt="Vivo">
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="<?= app_url('danh-muc'.$slug.'?brand=9') ?>">
                                        <img src="https://images.fpt.shop/unsafe/fit-in/108x40/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/10/22/637705137962743415_Tecno@2x.jpg" alt="Tecno">
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="<?= app_url('danh-muc'.$slug.'?brand=10') ?>">
                                        <img src="https://images.fpt.shop/unsafe/fit-in/108x40/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2020/8/26/637340491898745716_Realme@2x.jpg" alt="Realme">
                                    </a>
                                </div>
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
                    <div class="cdt-list-tag" style="display: none;"><span>Lọc theo: </span></div>
                </div>
                <div class="card fplistbox">
                    <div class="card-body p-0 p-t-15 p-b-30 fplistpdbox">
                        <div class="cdt-product-wrapper m-b-20">
                            <div class="cdt-product">
                                <div class="cdt-product__img">
                                    <a href="./details.html">
                                        <img src="https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/11/21/637730981458887101_Masstel-Tab-10M-4G-dd.jpg" alt="iPhone 13 Pro Max 128GB" title="iPhone 13 Pro Max 128GB" >
                                    </a>
                                </div>
                                <div class="cdt-product__info">
                                    <h3><a href="./details.html" title="iPhone 13 Pro Max 128GB" class="cdt-product__name">iPhone 13 Pro Max 128GB</a></h3>
                                    <div class="cdt-product__show-promo">
                                        <div class="progress justify-content-center">
                                            23.699.000 ₫
                                            <div class="progress-bar" style="width: 100%;"></div>
                                        </div>
                                        <div class="strike-price">
                                            <strike>25.499.000 ₫</strike>
                                        </div>
                                    </div>
                                    <div class="cdt-product__btn">
                                        <a href="./details.html" class="btn btn-primary btn-sm btn-main">MUA NGAY</a>
                                    </div>
                                </div>
                            </div>
                            <div class="cdt-product">
                                <div class="cdt-product__img">
                                    <a href="./details.html">
                                        <img src="https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/11/21/637730981458887101_Masstel-Tab-10M-4G-dd.jpg" alt="iPhone 13 Pro Max 128GB" title="iPhone 13 Pro Max 128GB" >
                                    </a>
                                </div>
                                <div class="cdt-product__info">
                                    <h3><a href="./details.html" title="iPhone 13 Pro Max 128GB" class="cdt-product__name">iPhone 13 Pro Max 128GB</a></h3>
                                    <div class="cdt-product__show-promo">
                                        <div class="progress justify-content-center">
                                            23.699.000 ₫
                                            <div class="progress-bar" style="width: 100%;"></div>
                                        </div>
                                        <div class="strike-price">
                                            <strike>25.499.000 ₫</strike>
                                        </div>
                                    </div>
                                    <div class="cdt-product__btn">
                                        <a href="./details.html" class="btn btn-primary btn-sm btn-main">MUA NGAY</a>
                                    </div>
                                </div>
                            </div>
                            <div class="cdt-product">
                                <div class="cdt-product__img">
                                    <a href="./details.html">
                                        <img src="https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/11/21/637730981458887101_Masstel-Tab-10M-4G-dd.jpg" alt="iPhone 13 Pro Max 128GB" title="iPhone 13 Pro Max 128GB" >
                                    </a>
                                </div>
                                <div class="cdt-product__info">
                                    <h3><a href="./details.html" title="iPhone 13 Pro Max 128GB" class="cdt-product__name">iPhone 13 Pro Max 128GB</a></h3>
                                    <div class="cdt-product__show-promo">
                                        <div class="progress justify-content-center">
                                            23.699.000 ₫
                                            <div class="progress-bar" style="width: 100%;"></div>
                                        </div>
                                        <div class="strike-price">
                                            <strike>25.499.000 ₫</strike>
                                        </div>
                                    </div>
                                    <div class="cdt-product__btn">
                                        <a href="./details.html" class="btn btn-primary btn-sm btn-main">MUA NGAY</a>
                                    </div>
                                </div>
                            </div>
                            <div class="cdt-product">
                                <div class="cdt-product__img">
                                    <a href="./details.html">
                                        <img src="https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/11/21/637730981458887101_Masstel-Tab-10M-4G-dd.jpg" alt="iPhone 13 Pro Max 128GB" title="iPhone 13 Pro Max 128GB" >
                                    </a>
                                </div>
                                <div class="cdt-product__info">
                                    <h3><a href="./details.html" title="iPhone 13 Pro Max 128GB" class="cdt-product__name">iPhone 13 Pro Max 128GB</a></h3>
                                    <div class="cdt-product__show-promo">
                                        <div class="progress justify-content-center">
                                            23.699.000 ₫
                                            <div class="progress-bar" style="width: 100%;"></div>
                                        </div>
                                        <div class="strike-price">
                                            <strike>25.499.000 ₫</strike>
                                        </div>
                                    </div>
                                    <div class="cdt-product__btn">
                                        <a href="./details.html" class="btn btn-primary btn-sm btn-main">MUA NGAY</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="cdt-product--loadmore mb-5"><a class="btn btn-light">Xem thêm</a></div>
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