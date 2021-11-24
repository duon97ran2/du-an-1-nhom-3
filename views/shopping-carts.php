<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Shopping carts</h1>
    <table border="1">
        <tr>
            <th>Ten</th>
            <th>Mau sac</th>
            <th>So luong</th>
            <th>Gia tien</th>
            <th></th>
        </tr>
        <?php $total_price = 0; ?>
        <?php foreach($cart_data as $item) : ?>
            <tr>
                <td><?= $item['product_name'] ?></td>
                <td><?= $item['product_variant_name'] ?></td>
                <td><input type="number" value="<?= $item['quantity'] ?>"></td>
                <td><?= priceVND($item['price']) ?></td>
                <td><button>Xoa</button></td>
            </tr>
            <?php $total_price += $item['price'] ?>
        <?php endforeach; ?>
    </table>
    Tong tien: <?= $total_price ?> <button>Thanh toan</button>
    <h1>Da mua</h1>
    <table border="1">
        <tr>
            <th>Ten</th>
            <th>Mau sac</th>
            <th>So luong</th>
            <th>Gia tien</th>
            <th></th>
        </tr>
        <?php foreach($cart_buy_data as $item) : ?>
            <tr>
                <td><?= $item['product_name'] ?></td>
                <td><?= $item['product_variant_name'] ?></td>
                <td><input type="number" value="<?= $item['quantity'] ?>"></td>
                <td><?= priceVND($item['price']) ?></td>
                <td><button>Mua lai</button></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>