<main class="py-5">
    <section class="category-container">
        <h3>Tìm thấy <?= count($result) ?> kết quả với từ khóa "<?= $keyword ?>"</h3>
        <?php if($result) : ?>
        <div class="mx-2 row mt-5">
            <section class="section-box">
                <div class="category-container">
                    <div class="cate-box cat-prd box-pad15 bg-white margin-50">
                        <div class="cat-prd__product">
                            <div class="row-flex">
                                <?php foreach ($result as $item) : ?>
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
                </div>
            </section>
        </div>
        <?php else : ?>
            <div class="card fplistbox mt-5">
                <div class="card-body p-0 p-t-15 p-b-30 fplistpdbox">
                    <div class="fs-ghnull">
                        <p class="fs-ghnl1"><img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg//assets/a60759ad1dabe909c46a817ecbf71878.png" alt="" width="150px"></p>
                        <p class="fs-ghnl2">Không có sản phẩm nào</p>
                        <p class="fs-ghnl3"><a href="<?= app_url() ?>" title="Trang chủ">ĐẾN TRANG CHỦ</a></p> 
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </section>
</main>