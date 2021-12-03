
<main class="container">
    <section class="banner">
        <div class="main_banner">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    foreach ($banner as $b) :
                        if (intval($b['banner_position']) == 1 && intval($b['banner_index']) == 1) {
                    ?>
                            <div class="carousel-item active">
                                <img src="<?= asset('uploads/' . $b['banner_image']) ?>" class="banner-image" alt="...">
                            </div>

                        <?php
                        } else if (intval($b['banner_position']) == 1) {
                        ?>
                            <div class="carousel-item">
                                <img src="<?= asset('uploads/' . $b['banner_image']) ?>" class="banner-image" alt="...">
                            </div>
                    <?php }
                    endforeach; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>

            </div>
        </div>
    </section>

    <!-- end banners -->

    <section class="brands d-flex">
        <?php foreach ($cate_img as $c) :  ?>
            <div class="brands__item ">
                <div class="brands_item--item">
                    <div class="brands_item--box">
                        <a href="#"> <img src="<?= asset($c['category_image']) ?>" alt="" class="brands-image"></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </section>

    <!-- end brands -->
    <section>
        <div class="text-center mt-5 mb-5">
            <h3>BEST SELLER</h3>
            <a href="#">KHÁM PHÁ THÊM <i class="fas fa-arrow-right"></i></a>
        </div>

        <div class="row pb-4 mt-5">
            <?php foreach ($products as $p) : ?>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <div class="product-item">
                        <input type="checkbox" hidden="" id="16" class="input_focus">
                        <label class="i_position" for="16">
                            <i class="far fa-heart"></i>
                        </label>

                        <img src="<?= asset('uploads/' . $p['product_image']) ?>" alt="" class="best_seller_img">
                        <a href="<?= app_url('san-pham/'.$p['product_slug']) ?>" class="title"><span><?= $p['category_name'] ?></span></a>
                        <a href="<?= app_url('san-pham/'.$p['product_slug']) ?>" class="name d-block"><span><?= $p['product_name'] ?> </span></a>
                        <p class="price mt-3 mb-3"><?= $p['product_price'] ?>đ</p>
                        <a href="<?= app_url('san-pham/'.$p['product_slug']) ?>" class="view"><span>XEM SẢN PHẨM</span></a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </section>

    <section>
        <div class="text-center mt-5 mb-5">
            <h3>SẢN PHẨM XEM NHIỀU</h3>
            <a href="#">KHÁM PHÁ THÊM <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="row pb-4 mt-5">
            <?php foreach ($hot_view as $h) : ?>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <div class="product-item">
                        <input type="checkbox" hidden="" id="16" class="input_focus">
                        <label class="i_position" for="16">
                            <i class="far fa-heart"></i>
                        </label>
                        <img src="<?= asset('uploads/' . $h['product_image']) ?>" alt="" class="best_seller_img">
                        <a href="<?= app_url('san-pham/'.$p['product_slug']) ?>" class="title"><span><?= $h['category_name'] ?></span></a>
                        <a href="<?= app_url('san-pham/'.$p['product_slug']) ?>" class="name d-block"><span><?= $h['product_name'] ?> </span></a>
                        <p class="price mt-3 mb-3"><?= $h['product_price'] ?> đ</p>
                        <a href="<?= app_url('san-pham/'.$p['product_slug']) ?>" class="view"><span>XEM SẢN PHẨM</span></a>
                    </div>
                </div>
                <!-- loi cho nao quen cho nao r  -->
            <?php endforeach; ?>

        </div>
    </section>
    <section class="sub_banner d-flex">
        <?php
        foreach ($banner  as $b) :
            if (intval($b['banner_position']) == 0 && intval($b['banner_index']) == 1) {
        ?>
                <div class="sub_banner__item">
                    <a href="" target="<?= $b['banner_target'] ?? '_blank' ?>"><img src="<?= asset('uploads/' . $b['banner_image']) ?>" alt="" class="sub_banner_img"></a>
                </div>
        <?php }
        endforeach; ?>
    </section>
</main>
</div>
