<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1><a href="<?= app_url('gio-hang') ?>">Gio hang</a>: <span id="js-cart-total"><?= cart_total() ?></span></h1>
        <h1>Shopping carts</h1>
        <table class="table table-bordered">
            <tr>
                <th>Ten</th>
                <th>Mau sac</th>
                <th>Gia tien</th>
                <th>So luong</th>
                <th>Tong tien</th>
                <th></th>
            </tr>
            <?php $total_price = 0; ?>
            <?php foreach($cart_data as $item) : ?>
                <tr>
                    <td><?= $item['product_name'] ?></td>
                    <td><?= $item['product_variant_name'] ?></td>
                    <td><?= priceVND($item['price']) ?></td>
                    <td>
                        <form action="<?= app_url('gio-hang/cap-nhat') ?>" method="POST">
                            <input type="hidden" name="cart_id" value="<?= $item['cart_id'] ?>">
                            <input type="number" name="quantity" class="form-control" onchange="this.form.submit()" value="<?= $item['quantity'] ?>">
                        </form>
                    </td>
                    <td><?= priceVND($item['total_price']) ?></td>
                    <td><a href="<?= app_url('gio-hang/xoa-san-pham?id='.$item['cart_id']) ?>" class="btn btn-danger">Xoa</a></td>
                </tr>
                <?php $total_price += $item['total_price'] ?>
            <?php endforeach; ?>
            <?php if (empty($cart_data)) : ?>
                <tr>
                    <td colspan="5" class="text-center">Danh sach trong</td> 
                </tr>
            <?php endif ?>
        </table>
        <?php if ($cart_data) : ?>
            <p>Tong tien: <?= priceVND($total_price) ?></p>
            <?php if ($total_price > 0) : ?>
                <p><a href="<?= app_url('thanh-toan'); ?>" class="btn btn-primary">Thanh toan</a></p>
            <?php endif ?>
        <?php endif ?>
        <h1>Da mua</h1>
        <table class="table table-bordered">
            <tr>
                <th>Ten</th>
                <th>Mau sac</th>
                <th>Gia tien</th>
                <th>So luong</th>
                <th>Tong tien</th>
                <th></th>
            </tr>
            <?php foreach($cart_buy_data as $item) : ?>
                <tr>
                    <td><?= $item['product_name'] ?></td>
                    <td><?= $item['product_variant_name'] ?></td>
                    <td><?= priceVND($item['price']) ?></td>
                    <td><input type="number" value="<?= $item['quantity'] ?>"></td>
                        <td><?= priceVND($item['total_price']) ?></td>
                    <td><a href="<?= app_url('gio-hang/xoa-san-pham?id='.$item['cart_id']) ?>" class="btn btn-danger">Xoa</a></td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($cart_buy_data)) : ?>
                <tr>
                    <td colspan="6" class="text-center">Danh sach trong</td> 
                </tr>
            <?php endif ?>
        </table>
    </div>
    
    <script src="<?= ADMIN_ASSETS ?>plugins/jquery/jquery.min.js"></script>
</body>
</html>