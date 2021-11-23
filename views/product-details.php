<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
</head>
<body>
    <h1>Details: <?= $product_default['product_name']; ?></h1>
    <p>
        Price: <?= $product_default['product_variant_price'] ?? $product_default['product_price'] ?>
    </p>
    <p>
        Quantity: <?= $product_default['product_variant_quantity'] ?? $product_default['product_quantity'] ?>
    </p>
    <?php if($product_default['is_variant'] == 1): ?>
        <form method="GET">
            <?php foreach($product_variant as $variant): ?>
                <label>
                    <input type="radio" name="color" value="<?= $variant['product_variant_slug'] ?>" <?= $variant['product_variant_slug'] == $product_default['product_variant_slug'] ? 'checked' : '' ?> onchange="this.form.submit()"> 
                    <?= $variant['product_variant_name'] ?>
                </label>
            <?php endforeach; ?>
        </form>
        <?php if($product_default['product_variant_quantity'] > 0) : ?>
            <p>
                <button onclick="alert('Them thanh cong')">Mua ngay</button>
            </p>
        <?php else: ?>
            <p>
                <button>Hết hàng</button>
            </p>
        <?php endif; ?>    
    <?php else: ?>
        <?php if($product_default['product_quantity'] > 0) : ?>
            <p>
                <button onclick="alert('Them thanh cong')">Mua ngay</button>
            </p>
        <?php else: ?>
            <p>
                <button>Hết hàng</button>
            </p>
        <?php endif; ?>  
    <?php endif; ?>
    <hr>
    <?php if($product_configuration) : ?>
        <p>Thong tin cau hinh</p>
        <pre>
            <?php print_r($product_configuration) ?>
        </pre>
    <?php endif; ?> 
</body>
</html>