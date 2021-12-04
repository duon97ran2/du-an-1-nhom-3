<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= ADMIN_ASSETS ?>plugins/toastr/toastr.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="./public/shop/css/style.css">
    <link rel="stylesheet" href="./public/shop/plugin/toastr/toastr.min.css">
    <!-- <script src="./public/shop/plugin/jquery/jquery.min.js"></script>
    <script src="./public/shop/plugin/jquery-ui/jquery-ui.min.js"></script>
    <script src="./public/shop/plugin/toastr/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script> -->
</head>

<body>
    <h1><a href="<?= app_url('gio-hang') ?>">Gio hang</a>: <span id="js-cart-total"><?= cart_total() ?></span></h1>
    <h1>Details: <?= $product_default['product_name']; ?></h1>
    <p>
        Price: <?= $product_default['product_variant_price'] ?? $product_default['product_price'] ?>
    </p>
    <p>
        Kho: <?= $product_default['product_variant_quantity'] ?? $product_default['product_quantity'] ?>
    </p>
    <p>
        Quantity: <input type="number" value="1" class="js-quantity-type">
    </p>
    <?php if ($product_default['is_variant'] == 1) : ?>
        <form method="GET">
            <?php foreach ($product_variant as $variant) : ?>
                <label>
                    <input type="radio" name="color" class="js-color-type" value="<?= $variant['product_variant_slug'] ?>" <?= $variant['product_variant_slug'] == $product_default['product_variant_slug'] ? 'checked' : '' ?> onchange="this.form.submit()">
                    <?= $variant['product_variant_name'] ?>
                </label>
            <?php endforeach; ?>
        </form>
        <?php if ($product_default['product_variant_quantity'] > 0) : ?>
            <p>
                <button type="button" id="js-add-to-cart" data-id="<?= $product_default['product_id'] ?>" data-price="<?= $product_default['product_variant_price'] ?? $product_default['product_price'] ?>" data-login="<?= empty(auth_info()) ? 0 : 1 ?>" data-url="<?= app_url('gio-hang/them-san-pham') ?>">Mua ngay</button>
            </p>
        <?php else : ?>
            <p>
                <button>Hết hàng</button>
            </p>
        <?php endif; ?>  
    <?php else: ?>
        <?php if($product_default['product_quantity'] > 0) : ?>
        <?php endif; ?>
    <?php else : ?> //  trang ày bỏ đi h ạk
        <?php if ($product_default['product_quantity'] > 0) : ?>
            <p>
                <button type="button" id="js-add-to-cart" data-id="<?= $product_default['product_id'] ?>" data-price="<?= $product_default['product_variant_price'] ?? $product_default['product_price'] ?>" data-login="<?= empty(auth_info()) ? 0 : 1 ?>" data-url="<?= app_url('gio-hang/them-san-pham') ?>">Mua ngay</button>
            </p>
        <?php else : ?>
            <p>
                <button>Hết hàng</button>
            </p>
        <?php endif; ?>
    <?php endif; ?>
    <hr>
    <?php if ($product_configuration) : ?>
        <p>Thong tin cau hinh</p>
        <pre>
            <?php print_r($product_configuration) ?>
        </pre>
    <?php endif; ?>
    <!-- jQuery -->
    <script src="<?= ADMIN_ASSETS ?>plugins/jquery/jquery.min.js"></script>
    <!-- Toastr -->
    <script src="<?= ADMIN_ASSETS ?>plugins/toastr/toastr.min.js"></script>
    <script src="<?= asset('customize/js/add-to-cart.js') ?>"></script>
</body>

</html>