<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1><a href="<?= app_url('gio-hang') ?>">Gio hang</a>: <span id="js-cart-total"><?= cart_total() ?></span></h1>
        <h1>Checkout</h1>
        <form action="<?= app_url('thanh-toan/kiem-tra') ?>" method="POST">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <input type="text" class="form-control" value ="<?= $auth_info['name'] ?? '' ?>" name="name" placeholder="Họ tên" required>
                        <span class="text-danger"><?= get_session('message-errors')['name'] ?? '' ?></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" value ="<?= $auth_info['email'] ?? '' ?>" name="email" placeholder="Email" required>
                        <span class="text-danger"><?= get_session('message-errors')['email'] ?? '' ?></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" value ="<?= $auth_info['phone'] ?? '' ?>" name="phone" placeholder="Số điện thoại" required>
                        <span class="text-danger"><?= get_session('message-errors')['phone'] ?? '' ?></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" value ="<?= $auth_info['address'] ?? '' ?>" name="address" placeholder="Địa chỉ" required>
                        <span class="text-danger"><?= get_session('message-errors')['address'] ?? '' ?></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <p>Thanh toan <?= $total_cart ?> san pham</p>
                    <p>Gia tien: <?= priceVND($total_price) ?></p>
                    <p>Giam gia: <?= priceVND($voucher['price'] ?? 0) ?></p>
                    <p>Tong tien: <?= priceVND($total_price - ($voucher['price'] ?? 0)) ?></p>
                    <input type="hidden" name="payment_type" value="shipcod">
                    <input type="hidden" name="price" value="<?= $total_price ?>">
                    <input type="hidden" name="total_price" value="<?= $total_price - ($voucher['price'] ?? 0) ?>">
                    <p>
                        <a href="<?= app_url('gio-hang') ?>" class="mr-2 btn btn-secondary">Gio hang</a>
                        <button type="submit" name="action" value="thanh-toan" class="btn btn-primary">Thanh toan</button>
                    </p>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-md-8">
                <form action="<?= app_url('thanh-toan/kiem-tra') ?>" method="POST">
                    <div class="row mb-3">
                        <div class="col-md-7">
                            <div class="form-group">
                                <input type="hidden" name="price" value="<?= $total_price ?>">
                                <input type="text" class="form-control" value="<?= $voucher['code'] ?? '' ?>" name="voucher" placeholder="Voucher">
                                <span class="text-danger"><?= get_session('message-errors')['voucher'] ?? '' ?></span>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary" name="action" value="voucher">Ap dung</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php remove_session('message-errors'); ?>
    </div>
</body>
</html>