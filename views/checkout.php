<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?= ADMIN_ASSETS ?>plugins/toastr/toastr.min.css">
</head>
<body>
    <div class="container">
        <h1><a href="<?= app_url('gio-hang') ?>">Giỏ hàng</a>: <span id="js-cart-total"><?= cart_total() ?></span></h1>
        <h1>Đặt hàng</h1>
        <form action="<?= app_url('thanh-toan/kiem-tra') ?>" id="formCheckout" novalidate method="POST">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <input type="text" class="form-control" value ="<?= $auth_info['name'] ?? '' ?>" name="name" placeholder="Họ tên">
                        <span class="text-danger"><?= get_session('message-errors')['name'] ?? '' ?></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" value ="<?= $auth_info['email'] ?? '' ?>" name="email" placeholder="Email">
                        <span class="text-danger"><?= get_session('message-errors')['email'] ?? '' ?></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" value ="<?= $auth_info['phone'] ?? '' ?>" name="phone" placeholder="Số điện thoại">
                        <span class="text-danger"><?= get_session('message-errors')['phone'] ?? '' ?></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" value ="<?= $auth_info['address'] ?? '' ?>" name="address" placeholder="Địa chỉ">
                        <span class="text-danger"><?= get_session('message-errors')['address'] ?? '' ?></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <p>Đặt <?= $total_cart ?> sản phẩm</p>
                    <p>Giá tiền: <?= priceVND($total_price) ?></p>
                    <p>Giảm giá: <?= priceVND($voucher['price'] ?? 0) ?></p>
                    <p>Tổng tiền: <span id="js-show-total-price"><?= priceVND($total_price - ($voucher['price'] ?? 0)) ?></span></p>
                    <input type="hidden" name="payment_type" value="shipcod">
                    <input type="hidden" name="price" id="js-price" value="<?= $total_price ?>">
                    <input type="hidden" name="total_price" id="js-total-price" value="<?= $total_price - ($voucher['price'] ?? 0) ?>">
                    <div class="form-group">
                        <input type="text" class="form-control" id="js-voucher-input" data-url="<?= app_url('thanh-toan/kiem-tra-voucher') ?>" value="<?= $voucher['code'] ?? '' ?>" name="voucher" placeholder="Voucher">
                        <span class="error invalid-feedback"><?= get_session('message-errors')['voucher'] ?? '' ?></span>
                    </div>
                    <p>
                        <a href="<?= app_url('gio-hang') ?>" class="mr-2 btn btn-secondary">Giỏ hàng</a>
                        <button type="submit" class="btn btn-primary">Đặt mua</button>
                    </p>
                </div>
            </div>
        </form>
        <?php remove_session('message-errors'); ?>
    </div>
    <!-- jQuery -->
    <script src="<?= ADMIN_ASSETS ?>plugins/jquery/jquery.min.js"></script>
    <!-- JQUERY validate -->
    <script src="<?= ADMIN_ASSETS ?>plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?= ADMIN_ASSETS ?>plugins/jquery-validation/additional-methods.min.js"></script>
    <!-- Toastr -->
    <script src="<?= ADMIN_ASSETS ?>plugins/toastr/toastr.min.js"></script>
    <!-- js -->
    <script src="<?= asset('customize/js/add-to-cart.js') ?>"></script>
</body>
</html>