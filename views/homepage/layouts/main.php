<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title><?= $page_title ?? 'Home' ?><?= (!empty(option_info()) ? ' - ' . option_info('app_name') : '') ?></title>
    <?php if(!empty(option_info('favicon'))): ?>
    <link rel="icon" type="image/png" href="<?= asset('uploads/'.option_info('favicon')) ?>"/>
    <?php endif; ?>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css" />
    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= PUBLIC_ASSETS ?>css/trang-chu.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
</head>

<body>
    <!-- Preloader -->

    <!-- Main Sidebar Container -->

    <div class="container-fluid">
        <section class="container ">
            <div class="d-flex justify-content-between mt-2">
                <!-- logo -->
                <div class="logo ">
                    <a href="">
                        <img src="<?= asset('uploads/' . option_info('logo')) ?>" alt="" width="100px">
                    </a>
                </div>
                <!-- end logo -->

                <div class="d-flex">
                    <div class="nav-item login_hover">
                        <a class="nav-link" href=""><i class="fas fa-star"></i>TÀI KHOẢN</a>


                        <div class="login">
                            <?php
                            if (!empty(auth_info())) {
                                echo "<a href='"     . app_url('dang-xuat') . "'>Đăng xuất</a><br>";
                                echo "<a href='" . app_url('dang-xuat') . "'>Thoong tin ca nhan</a><br>";;
                            } else {
                                echo "<a href='" . app_url('dang-nhap') . "'>Đăng nhập</a><br>";
                            }
                            ?>
                        </div>
                    </div>

                    <div class="nav-item login_hover">
                        <a class="nav-link" href=""><i class="fas fa-star"></i>TIN TỨC</a>
                    </div>

                    <div class="nav-item login_hover">
                        <a class="nav-link" href=""><i class="fas fa-star"></i>KIỂM TRA ĐƠN HÀNG</a>
                    </div>

                    <div class="nav-item focus_cart">
                        <a class="nav-link" href="<?= app_url('gio-hang') ?>"><label for="nav_input"><small>(<?= cart_total() ?>)</small> GIỎ HÀNG <i class="fas fa-shopping-bag"></i>
                    </div>

                    <div class="focus_cart">
                        <a class="" href="#"><label for="nav_input1"><i class="fas fa-search mt-0"></i></label></a>
                        <input type="checkbox" hidden class="nav_input1" id="nav_input1">
                        <p></p>
                        <label for="nav_input1" class="over_lay"></label>
                        <div class="search bg-white">
                            <div class="cart_header ">
                                <div class="exit ps-4">
                                    <label for="nav_input1" class="fas fa-times"></label>
                                </div>
                            </div>
                            <div class="cart_body">
                                <div class="frmSearch p-4">
                                    <?php
                                    include_once "search.php";
                                    //looci ham search form
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </section>
    </div>

    <div class="menu bg-primary">
        <div class="container">
            <ul class="d-flex justify-content-start p-2">
                <?php if(menu_page()): ?>
                <?php foreach (menu_page() as $Cate) : ?>
                    <li>
                        <a href="<?= $Cate['menu_url'] ?? app_url('danh-muc/'.$Cate['category_slug'])?>" class="text-light me-3">
                            <?= $Cate['category_name'] ?>
                        </a>
                        <?php if(empty($Cate['menu_url'])) : ?>
                            <!-- vì ở đây t để nếu menu url = '' mưới chạy r uki -->
                            <div class="menu--sub">
                                <div class="row">
                                    <div class="col-2">
                                        <div class="menu--sub-title">
                                            Hãng sản xuất
                                        </div>
                                        <div class="menu--sub-content">
                                            <?php foreach ($list_brand as $l) : ?> 
                                                <!-- mấy cái này tương tự uki, trong này chỉ xài cái category slug thôi nhé -->
                                                <ul>
                                                    <li><a href="#"><?= $l['brand_name'] ?></a></li>
                                                </ul>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="menu--sub-title">
                                            Mức giá
                                        </div>
                                        <div class="menu--sub-content">
                                            <ul>
                                                <?php
                                                if (!isset($list_price)) {
                                                } else {
                                                    $price = 0;
                                                    for ($i = 0; $i <= 40; $i++) {
                                                        for ($j = 0; $j < count($list_price); $j++) {
                                                            if ((intval($list_price[$j]['product_price']) >= $price) && (intval($list_price[$j]['product_price']) <= ($price + 1000000))) {
                                                ?>

                                                                <li><a href="<?= BASE_URL ?>?from_price=<?= $price ?>&to_price=<?= $price + 1000000 ?>&category_id=<?= $Cate[0] ?>">Từ <?= number_format($price) ?> VNĐ Đến <?= number_format($price + 1000000) ?> VNĐ</a></li>

                                                <?php
                                                                $price += 1000000;
                                                            }
                                                        }
                                                        $price += 1000000;
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="menu--sub-title">
                                            Bán chạy
                                        </div>
                                        <div class="menu--sub-content">
                                            <ul>
                                                <li class="d-flex align-items-center"><a href="">
                                                        <img width="100px" src="https://interactive-examples.mdn.mozilla.net/media/cc0-images/grapefruit-slice-332-332.jpg" alt=""></a>
                                                    <p class="flex-fill"><span class="text-danger">Name</span>
                                                        <br>
                                                        <span class="text-primary">Price</span>
                                                    </p>
                                                </li> <br>
                                                <li class="d-flex align-items-center"><a href="">
                                                        <img width="100px" src="https://interactive-examples.mdn.mozilla.net/media/cc0-images/grapefruit-slice-332-332.jpg" alt=""></a>
                                                    <p class="flex-fill"><span class="text-danger">Name</span>
                                                        <br>
                                                        <span class="text-primary">Price</span>
                                                    </p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="menu-sub-banner">
                                            <a href=""><img src="https://cellphones.com.vn/sforum/wp-content/uploads/2021/03/su-kien-Apple-1.jpg" width="100%" alt="" mt-5></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
                <?php endif; ?>
            </ul>


        </div>
    </div>
    <!-- </div> -->

    <?php include_once $businessView; ?>

    <?php include_once "./views/homepage/layouts/footer.php" ?>
</body>

</html>