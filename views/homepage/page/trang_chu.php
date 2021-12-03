<!DOCTYPE html>
<html lang="vi">

<head>
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="./public/shop/css/style.css">
    <link rel="stylesheet" href="./public/shop/plugin/toastr/toastr.min.css">
    <script src="./public/shop/plugin/jquery/jquery.min.js"></script>
    <script src="./public/shop/plugin/jquery-ui/jquery-ui.min.js"></script>
    <script src="./public/shop/plugin/toastr/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
</head>
<body>
    <header class="fs-header">
        <div class="f-hdtop">
            <div class="f-wrap">
                <a class="fs-logo" href="/">
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
                        <a href="./login.html" title="">
                            <i class="material-icons">person</i>
                            <span>Tài khoản</span>
                        </a>
                        <!-- <ul class="fs-hdmsub fs-hdmsubsmall">
                            <li><a href="">Thông tin tài khoản</a></li>
                        </ul> -->
                    </li>
                    <li>
                        <a href="./giohang.html" title="">
                            <i class="material-icons">shopping_cart</i>
                            <span>Giỏ hàng</span>
                            <b class="fs-cartic countTotalCart">1</b>
                        </a>
                    </li>
                </ul>
                <div class="fs-search">
                    <form action="" method="get" autocomplete="off">
                        <label for="key" class="mf-vhiditem">Nhập tên điện thoại, máy tính, phụ kiện... cần tìm</label>
                        <input class="fs-stxt" type="text" id="key" name="" placeholder="Nhập tên điện thoại, máy tính, phụ kiện... cần tìm" autocomplete="off" maxlength="50">
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
            </div>
            <input id="queryID" queryid="" hidden="" style="display:none">
            <input id="userIP" ip-user="14.226.4.149" hidden="" style="display:none">
        </div>
        <nav class="fs-menu">
            <div class="f-wrap">
                <ul class="fs-mnul clearfix">
                    <li>
                        <a href="/dien-thoai" title="ĐIỆN THOẠI">
                            <div class="base-ic"></div> ĐIỆN THOẠI 
                        </a>
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
                    </li>
                    <li>
                        <a href="/may-doi-tra" title="">
                            <div class="base-ic"></div> Máy cũ giá rẻ
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div id="root">
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
                                <?php foreach($hot_sale as $item) : ?>
                                <div class="swiper-slide">
                                    <div class="cdt-product">
                                        <div class="cdt-product__img">
                                        <a href="<?= app_url('san-pham/'.$item['product_slug']) ?>">
                                            <a href="<?= app_url('san-pham/'.$item['product_slug']) ?>">
                                                <img src="<?= asset('uploads/'.$item['product_image']) ?>" style=" width: 214px; height: 214px; ">
                                            </a>
                                        </a>
                                        </div>
                                        <div class="cdt-product__info">
                                        <h3>
                                            <a href="<?= app_url('san-pham/'.$item['product_slug']) ?>" class="cdt-product__name"><?= $item['product_name'] ?></a>
                                        </h3>
                                        <div class="cdt-product__show-promo">
                                            <?php if ($item['product_discount'] > 0) : ?>
                                                <div class="progress justify-content-center">
                                                    <?= priceVND($item['product_price']) ?>
                                                    <div class="progress-bar" style="width: 100%;"></div>
                                                </div>
                                                <div class="strike-price">
                                                    <strike><?= priceVND($item['product_price']) ?></strike>
                                                </div>
                                            <?php else: ?>
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
                        <h2>ĐIỆN THOẠI</h2>
                    </div>
                    <div class="cat-prd-tabs"><a href="/dien-thoai">Xem tất cả</a></div>
                    </div>
                    <div class="cat-prd__product">
                    <div class="row-flex">
                        <div class="cdt-product">
                        <div class="cdt-product__img">
                            <a href="./details.html">
                            <img src="https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/9/15/637673213598401263_iphone-13-pro-max-dd-1.jpg" alt="iPhone 13 Pro Max 128GB" title="iPhone 13 Pro Max 128GB">
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
                            <img src="https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/9/15/637673213598401263_iphone-13-pro-max-dd-1.jpg" alt="iPhone 13 Pro Max 128GB" title="iPhone 13 Pro Max 128GB">
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
                            <img src="https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/9/15/637673213598401263_iphone-13-pro-max-dd-1.jpg" alt="iPhone 13 Pro Max 128GB" title="iPhone 13 Pro Max 128GB">
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
                            <img src="https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/9/15/637673213598401263_iphone-13-pro-max-dd-1.jpg" alt="iPhone 13 Pro Max 128GB" title="iPhone 13 Pro Max 128GB">
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
                            <img src="https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/9/15/637673213598401263_iphone-13-pro-max-dd-1.jpg" alt="iPhone 13 Pro Max 128GB" title="iPhone 13 Pro Max 128GB">
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
                            <img src="https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/9/15/637673213598401263_iphone-13-pro-max-dd-1.jpg" alt="iPhone 13 Pro Max 128GB" title="iPhone 13 Pro Max 128GB">
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
                            <img src="https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/9/15/637673213598401263_iphone-13-pro-max-dd-1.jpg" alt="iPhone 13 Pro Max 128GB" title="iPhone 13 Pro Max 128GB">
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
                            <img src="https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/9/15/637673213598401263_iphone-13-pro-max-dd-1.jpg" alt="iPhone 13 Pro Max 128GB" title="iPhone 13 Pro Max 128GB">
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
                    </div>
                </div>
                </div>
            </section>
            <section class="section-box">
                <div class="category-container">
                <div class="cate-box cat-prd box-pad15 bg-white margin-50">
                    <div class="cat-prd-oustanding margin-18">
                    <div class="title f20">
                        <h2>TABLET</h2>
                    </div>
                    <div class="cat-prd-tabs"><a href="/dien-thoai">Xem tất cả</a></div>
                    </div>
                    <div class="cat-prd__product">
                    <div class="row-flex">
                        <div class="cdt-product">
                        <div class="cdt-product__img">
                            <a href="./details.html">
                            <img src="https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/11/21/637730981458887101_Masstel-Tab-10M-4G-dd.jpg" alt="iPhone 13 Pro Max 128GB" title="iPhone 13 Pro Max 128GB">
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
                            <img src="https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/11/21/637730981458887101_Masstel-Tab-10M-4G-dd.jpg" alt="iPhone 13 Pro Max 128GB" title="iPhone 13 Pro Max 128GB">
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
                            <img src="https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/11/21/637730981458887101_Masstel-Tab-10M-4G-dd.jpg" alt="iPhone 13 Pro Max 128GB" title="iPhone 13 Pro Max 128GB">
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
                            <img src="https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/11/21/637730981458887101_Masstel-Tab-10M-4G-dd.jpg" alt="iPhone 13 Pro Max 128GB" title="iPhone 13 Pro Max 128GB">
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
                            <img src="https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/11/21/637730981458887101_Masstel-Tab-10M-4G-dd.jpg" alt="iPhone 13 Pro Max 128GB" title="iPhone 13 Pro Max 128GB">
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
                            <img src="https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/11/21/637730981458887101_Masstel-Tab-10M-4G-dd.jpg" alt="iPhone 13 Pro Max 128GB" title="iPhone 13 Pro Max 128GB">
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
                            <img src="https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/11/21/637730981458887101_Masstel-Tab-10M-4G-dd.jpg" alt="iPhone 13 Pro Max 128GB" title="iPhone 13 Pro Max 128GB">
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
                            <img src="https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/11/21/637730981458887101_Masstel-Tab-10M-4G-dd.jpg" alt="iPhone 13 Pro Max 128GB" title="iPhone 13 Pro Max 128GB">
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
                    </div>
                </div>
                </div>
            </section>
        </main>
    </div>
    <footer>
        <div class="fs-footer fhidedt">
            <div class="f-wrap">
                <div class="fs-ftrow clearfix">
                    <div class="fs-ftcol fs-ftcol1">
                        <ul class="fs-ftul">
                            <li><a target="_blank" rel="nofollow noopener" href="http://frt.vn/">Giới thiệu về công ty</a></li>
                            <li><a href="//fptshop.com.vn/ho-tro/cau-hoi-thuong-gap" title="Câu hỏi thường gặp mua hàng">Câu hỏi thường gặp mua hàng</a></li>
                            <li><a href="//fptshop.com.vn/ho-tro/chinh-sach-bao-mat" title="">Chính sách bảo mật</a></li>
                            <li><a href="//fptshop.com.vn/tos" title="">Quy chế hoạt động</a></li>
                            <li><a href="http://hddt.fptshop.com.vn/" title="">Kiểm tra hóa đơn điện tử</a></li>
                            <li><a href="//fptshop.com.vn/kiem-tra-bao-hanh?tab=thong-tin-bao-hanh" title="">Tra cứu thông tin bảo hành</a></li>
                        </ul>
                    </div>
                    <div class="fs-ftcol fs-ftcol1">
                        <ul class="fs-ftul">
                            <li><a href="//vieclam.fptshop.com.vn/">Tin tuyển dụng</a></li>
                            <li><a href="//fptshop.com.vn/tin-tuc/Tin-khuyen-mai" title="">Tin khuyến mãi</a></li>
                            <li><a href="//fptshop.com.vn/ho-tro/huong-dan-mua-hang" title="">Hướng dẫn mua online</a></li>
                            <li><a href="//fptshop.com.vn/tra-gop" title="">Hướng dẫn mua trả góp</a></li>
                            <li><a href="https://fptshop.com.vn/ho-tro/chinh-sach-tra-gop" title="">Chính sách trả góp</a></li>
                        </ul>
                    </div>
                    <div class="fs-ftcol fs-ftcol1">
                        <ul class="fs-ftul">
                            <li><a href="//fptshop.com.vn/cua-hang">Hệ thống cửa hàng</a></li>
                            <li><a href="//fptshop.com.vn/ho-tro/chinh-sach-bao-hanh" title="">Hệ thống bảo hành</a></li>
                            <li><a href="https://fptshop.com.vn/ban-hang-doanh-nghiep" title="">Bán hàng doanh nghiệp</a></li>
                            <!-- <li><a href="//fptshop.com.vn/kiem-tra-hang-apple-chinh-hang" title="">Kiểm tra hàng Apple chính hãng</a></li> -->
                            <li><a href="//fptshop.com.vn/ho-tro/gioi-thieu-may-doi-tra" title="">Giới thiệu máy đổi trả</a></li>
                            <li><a href="https://fptshop.com.vn/ho-tro/chinh-sach-doi-san-pham" title="">Chính sách đổi trả</a></li>
                        </ul>
                    </div>
                    <div class="fs-ftcol  fs-ftcol2">
                        <ul class="fs-ftr2 clearfix">
                            <li>
                                <p class="fs-ftrtit" style="font-size: 15px;">Tư vấn mua hàng (Miễn phí)</p>
                                <a href="tel:18006601" title="">1800 6601 </a> <span>(Nhánh 1)</span>
                                <p class="fs-ftrtit">Hỗ trợ kỹ thuật</p>
                                <a href="tel:18006601" title="">1800 6601 </a><span>(Nhánh 2)</span>
                            </li>
                            <li>
                                <p class="fs-ftrtit" style="font-size: 15px;">Góp ý, khiếu nại dịch vụ (8h00-22h00)</p>
                                <a href="tel:18006616" title="">1800 6616</a><br>
                                <!-- <a href="tel:18006601" title="">1800 6601 </a><span>(Nhánh 3)</span> -->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="fs-ftbott">© 2021 PolyMobile</div>
    </footer>
</body>

</html>