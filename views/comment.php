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
        <main class="l-main">
            <div class="l-pd">
                <!-- <div class="l-pd-header">
                    <div class="g-container">
                        <div class="row">
                            <ol class="breadcrumb bg-transparent breadcrumb-margin">
                                <li class="breadcrumb-item "><a href="/" title="Trang chủ">Trang chủ</a></li>
                                <li class="breadcrumb-item "><a href="/dien-thoai" title="Điện thoại">Điện thoại</a></li>
                                <li class="breadcrumb-item  active"><a href="/dien-thoai/apple-iphone" title="Apple (iPhone)">Apple (iPhone)</a></li>
                            </ol>
                        </div>
                    </div>
                    <div class="g-container">
                        <div class="l-pd-top">
                            <h1 class="st-name">iPhone 13 Pro Max 128GB</h1>
                        </div>
                        <div class="l-pd-row clearfix">
                            <div class="l-pd-left">
                                <div class="st-slider ">
                                    <div class="swiper-container js--pd-slider swiper-custom swiper-container-initialized swiper-container-horizontal">
                                        <div class="swiper-wrapper js--slide--full" style="transform: translate3d(0px, 0px, 0px);">
                                            <div class="swiper-slide swiper-slide-active" data-src="https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2021/9/15/637673217820889289_iphone-13-pro-max-vang-1.jpg" style="width: 585px; margin-right: 15px;"><img src="https://images.fpt.shop/unsafe/fit-in/585x390/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/9/15/637673217820889289_iphone-13-pro-max-vang-1.jpg" alt="637673217820889289_iphone-13-pro-max-vang-1" class=""></div>
                                        </div>
                                        <div class="swiper-pagination"></div>
                                        <div class="swiper-button-next" style="display: none;"><span><i class="icon-right-open-big"></i></span></div>
                                        <div class="swiper-button-prev" style="display: none;"><span><i class="icon-left-open-big"></i></span></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="l-pd-right">
                                <div class="st-price">
                                    <div class="st-price__left">
                                        <div class="st-price-main">33.990.000₫</div>
                                    </div>
                                </div>
                                <div class="st-select-color">
                                    <label for="color-vang" class="select-color-cus">
                                        <input type="radio" id="color-vang" class="width-0" name="color" checked>
                                        <div class="st-select-color__item js--select-color-item">
                                            <div class="img">
                                                <img src="https://images.fpt.shop/unsafe/fit-in/40x40/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/9/15/637673217820889289_iphone-13-pro-max-vang-1.jpg" alt="Vàng">
                                            </div>
                                            <p title="Vàng">Vàng</p>
                                        </div>
                                    </label>
                                    <label for="color-xanh" class="select-color-cus">
                                        <input type="radio" id="color-xanh" class="width-0" name="color">
                                        <div class="st-select-color__item js--select-color-item">
                                            <div class="img">
                                                <img src="https://images.fpt.shop/unsafe/fit-in/40x40/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/9/15/637673217826201634_iphone-13-pro-max-xanh-1.jpg" alt="Xanh">
                                            </div>
                                            <p title="Xanh">Xanh</p>
                                        </div>
                                    </label>
                                </div>
                                <div class="st-boxPromo">
                                    <div class="title">Nhận ngay khuyến mại đặc biệt</div>
                                    <ul class="st-boxPromo__list st-boxPromo__list--more">
                                        <li>
                                            <span class="icon-chekc material-icons">check_circle</span>
                                            <div><span>Trả góp 0% </span></div>
                                        </li>
                                        <li>
                                            <span class="icon-chekc material-icons">check_circle</span>
                                            <div><span>Giảm 50% mua sim data khủng 90GB </span></div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="st-pd-btn">
                                    <button class="btn btn-info btn-xl btn--lg" id="btn-buy-now">
                                        <div><strong>MUA NGAY</strong></div>
                                        <p>Giao hàng miễn phí hoặc nhận tại shop</p>
                                    </button>
                                    <button class="btn btn-danger btn-xl btn--sm" id="btn-buy-now">
                                        <div><strong><span class="material-icons">favorite</span></strong></div>
                                        <p> Yêu thích </p>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                
                <div class="l-pd-body">
                    <div class="g-container">
                        <div class="l-pd-body__wrapper">
                            <div class="l-pd-body__left">
                                <div class="card re-card st-card st-card--article js--st-card--article">
                                    <h2 class="card-title">Đặc điểm nổi bật của iPhone 13 Pro Max</h2>
                                    <div class="card-body">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="l-pd-body__right">
                                <div class="card re-card st-card">
                                    <h2 class="card-title">Thông số kỹ thuật</h2>
                                    <div class="card-body">
                                        <table class="st-pd-table mb30">
                                            <tbody>
                                                <tr>
                                                    <td>Màn hình</td>
                                                    <td><span>6.7", Super Retina XDR, OLED, 2778 x 1284 Pixel</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Camera sau</td>
                                                    <td><span>12.0 MP + 12.0 MP + 12.0 MP</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Camera Selfie</td>
                                                    <td><span>12.0 MP</span></td>
                                                </tr>
                                                <tr>
                                                    <td>RAM&nbsp;</td>
                                                    <td><span>6 GB</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Bộ nhớ trong</td>
                                                    <td><span>128 GB</span></td>
                                                </tr>
                                                <tr>
                                                    <td>CPU</td>
                                                    <td><span>A15 Bionic</span></td>
                                                </tr>
                                                <tr>
                                                    <td>GPU</td>
                                                    <td><span>Apple GPU 5 nhân</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Dung lượng pin</td>
                                                    <td><span>4352 mAh</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Thẻ sim</td>
                                                    <td><span>2, 1 eSIM, 1 Nano SIM</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Hệ điều hành</td>
                                                    <td><span>iOS 15</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Xuất xứ</td>
                                                    <td><span>Trung Quốc</span></td>
                                                </tr>
                                                <tr>
                                                    <td>Thời gian ra mắt</td>
                                                    <td><span>09/2021</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                            <div class="l-pd-comment">
                                <div class="g-container"><input hidden="" id="id-page-comment" readonly="" value="993609">
                                    <div class="card st-card card-normal">
                                        <h2 class="card-title card-title--badge">Hỏi &amp; Đáp về <span class="badge text-white" style="background: rgb(220, 53, 69);">13</span></h2>
                                        <div class="card-body">
                                            <div style="margin: 0 2rem;">
                                                <div class="c-user-rate-form f-comment-0"><textarea name="" id="f-comment-0" rows="4" placeholder="Viết câu hỏi của bạn"></textarea><button class="btn btn-primary" data-id="0">Gửi câu hỏi</button></div>
                                                <p class="f-err" style="display: none;">Mời bạn viết bình luận.(Tối thiểu 3 ký tự)</p>
                                            </div>
                                            <div class="comment-content">
                                                
                                                <?php foreach($comment as $c):?>
                                                    <div class="c-comment " id="f-comment-root">
                                                        <div class="c-comment-box">
                                                            <div class="c-comment-box__avatar"><img src="<?= asset($c['avatar'])?>" alt=""></div>
                                                            <div class="c-comment-box__content">
                                                                <div class="c-comment-name"><?= $c['name']?><div class="time"><?= $c['created_at']?></div>
                                                                </div>
                                                                <div class="c-comment-text"><?= $c['comment_content']?></div>
                                                                <div class="c-comment-status"><a style="cursor: pointer;">Trả lời</a></div>
                                                            </div>
                                                        </div>
                                                        <div class="c-comment-box level2">
                                                            <div class="c-comment-box__avatar">KVC-ADM</div>
                                                            <div class="c-comment-box__content">
                                                                <div class="c-comment-name">Adminstrator<span class="badge badge-primary">Quản trị viên</span>
                                                                    <div class="time">7 giờ trước</div>
                                                                </div>
                                                                <div class="c-comment-text">
                                                                    <p>Chào <?= $c['first_name']?></p>
                                                                    <p><?=$c['comment_author']?></p>
                                                                    <p>Thân mến!</p>
                                                                </div>
                                                                <div class="c-comment-status"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach;?>
                                                
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
                                                <div class="swiper-slide">
                                                    <div class="cdt-product">
                                                        <div class="cdt-product__img">
                                                            <a href="./details.html">
                                                                <span class=" lazy-load-image-background opacity lazy-load-image-loaded">
                                                                    <img src="https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/9/15/637673213598401263_iphone-13-pro-max-dd-1.jpg" alt="iPhone 13 Pro Max 128GB" title="iPhone 13 Pro Max 128GB">
                                                                </span>
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
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="cdt-product">
                                                        <div class="cdt-product__img">
                                                            <a href="./details.html">
                                                                <span class=" lazy-load-image-background opacity lazy-load-image-loaded">
                                                                    <img src="https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/9/15/637673213598401263_iphone-13-pro-max-dd-1.jpg" alt="iPhone 13 Pro Max 128GB" title="iPhone 13 Pro Max 128GB">
                                                                </span>
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
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="cdt-product">
                                                        <div class="cdt-product__img">
                                                            <a href="./details.html">
                                                                <span class=" lazy-load-image-background opacity lazy-load-image-loaded">
                                                                    <img src="https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/9/15/637673213598401263_iphone-13-pro-max-dd-1.jpg" alt="iPhone 13 Pro Max 128GB" title="iPhone 13 Pro Max 128GB">
                                                                </span>
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
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="cdt-product">
                                                        <div class="cdt-product__img">
                                                            <a href="./details.html">
                                                                <span class=" lazy-load-image-background opacity lazy-load-image-loaded">
                                                                    <img src="https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/9/15/637673213598401263_iphone-13-pro-max-dd-1.jpg" alt="iPhone 13 Pro Max 128GB" title="iPhone 13 Pro Max 128GB">
                                                                </span>
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
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide">
                                                    <div class="cdt-product">
                                                        <div class="cdt-product__img">
                                                            <a href="./details.html">
                                                                <span class=" lazy-load-image-background opacity lazy-load-image-loaded">
                                                                    <img src="https://images.fpt.shop/unsafe/fit-in/214x214/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2021/9/15/637673213598401263_iphone-13-pro-max-dd-1.jpg" alt="iPhone 13 Pro Max 128GB" title="iPhone 13 Pro Max 128GB">
                                                                </span>
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-button-next swiper-button-white" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"><i class="icon-angle-right"></i></div>
                                            <div class="swiper-button-prev swiper-button-white" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="true"><i class="icon-angle-left"></i></div><span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
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