<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.0.2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- FontAwesome 5.15.3 CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="<?= ADMIN_ASSETS ?>plugins/toastr/toastr.min.css">
  <style>
    .colors ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    body {
      background-color: #e5ebf0;
    }

    .colors li {
      margin: 0 20px 0 0;
      display: inline-block;
    }

    .colors label {
      cursor: pointer;
    }

    .colors input {
      display: none;
    }

    .colors input[type="radio"]:checked+.swatch {
      box-shadow: inset 0 0 0 2px white;
    }

    .swatch {
      display: inline-block;
      vertical-align: middle;
      height: 30px;
      width: 30px;
      margin: 0 5px 0 0;
      border: 1px solid #d4d4d4;
    }

    .colors {
      display: flex;
    }
  </style>

</head>

<body>
  <div class="container">

    <div class="row mt-5">
      <div class="col-7">
        <?php if ($product_default['is_variant'] == 1) : ?>
          <img class="p-4 card shadow" src="<?= asset('uploads/' . $product_default['product_variant_image']) ?>" alt="" width="100%">
        <?php else : ?>
          <img class="p-4 card shadow" src="<?= asset('uploads/' . $product_default['product_image']) ?>" alt="" width="100%">
        <?php endif; ?>
      </div>
      <div class="col mx-4 ">
        <div class=" card shadow p-3 mb-3">
          <h2> <?= $product_default['product_name']; ?></h2>
          <div class="star">
            <i class="fa fa-star text-warning" aria-hidden="true"></i>
            <i class="fa fa-star text-warning" aria-hidden="true"></i>
            <i class="fa fa-star text-warning" aria-hidden="true"></i>
            <i class="fa fa-star text-warning" aria-hidden="true"></i>
            <i class="fa fa-star text-warning" aria-hidden="true"></i>
          </div>
          <span class="">Còn lại: <?= $product_default['product_variant_quantity'] ?? $product_default['product_quantity'] ?> (sản phẩm)</span>
          <p>Lượt xem: 43 lượt</p>
          <div class="row">
            <div class="col-12 fs-5 mb-3 d-flex .align-items-center">
              <label for="quantity" class="text-nowrap">Số lượng:</label>
              <input type="number" name='quantity' class="form-control w-25 mx-2 text-center js-quantity-type" value="0" min="0" max="<?= $product_default['product_variant_quantity'] ?? $product_default['product_quantity'] ?>">

            </div>
            <div class="col">
              <?php if ($product_default['is_variant'] == 1) : ?>
                <form method="GET">
                  <div class="colors">
                    <ul>
                      <?php foreach ($product_variant as $variant) : ?>
                        <li>
                          <label>
                            <input type="radio" name="color" class="js-color-type" value="<?= $variant['product_variant_slug'] ?>" <?= $variant['product_variant_slug'] == $product_default['product_variant_slug'] ? 'checked' : '' ?> onchange="this.form.submit()">
                            <span class="swatch" style="background-image:url('<?= asset('uploads/' . $variant['product_variant_image']) ?>');background-size:cover"></span> <?= $variant['product_variant_name'] ?>
                          </label>
                        </li>
                      <?php endforeach; ?>
                      <!-- <li>
                  <label>
                    <input type="radio" name="color" class="js-color-type" onchange="" value="black">
                    <span class="swatch" style="background-color:rgb(9, 50, 211)"></span> BLue
                  </label></li> -->
                    </ul>
                  </div>
                </form>
                <h2 class="text-danger my-2"><?= priceVND($product_default['product_variant_price'] ?? $product_default['product_price']) ?></h2>
                <?php if ($product_default['product_variant_quantity'] > 0) : ?>
                  <button type="button" class='btn btn-primary' id="js-add-to-cart" data-id="<?= $product_default['product_id'] ?>" data-price="<?= $product_default['product_variant_price'] ?? $product_default['product_price'] ?>" data-login="<?= empty(auth_info()) ? 0 : 1 ?>" data-url="<?= app_url('gio-hang/them-san-pham') ?>">Mua ngay</button>
                <?php else : ?>
                  <button class='btn btn-primary disabled'>Hết hàng</button>
                <?php endif; ?>
              <?php else : ?>
                <?php if ($product_default['product_quantity'] > 0) : ?>
                  <button type="button" class='btn btn-primary' id="js-add-to-cart" data-id="<?= $product_default['product_id'] ?>" data-price="<?= $product_default['product_variant_price'] ?? $product_default['product_price'] ?>" data-login="<?= empty(auth_info()) ? 0 : 1 ?>" data-url="<?= app_url('gio-hang/them-san-pham') ?>">Mua ngay</button>
                <?php else : ?>
                  <button class='btn btn-primary disabled'>Hết hàng</button>
                <?php endif; ?>
              <?php endif; ?>
              <button type='button' data-id="<?= $product_default['product_id'] ?>" class="btn btn-danger" id="js-add-to-wishlists" data-login="<?= empty(auth_info()) ? 0 : 1 ?>" data-url="<?= app_url('luu-yeu-thich') ?>"><i class="fa fa-heart" aria-hidden="true"></i> Yêu thích</button>
            </div>
          </div>
        </div>
        <div class="card shadow p-3">
          <h3 class="text-primary"><i class="fas fa-gift  "></i> Quà Tặng</h3>
          <?php foreach ($gifts as $gift) : ?>
            <?php foreach (explode(',', $product_default['product_gifts']) as $item) : ?>
              <ul></ul>
              <?php if ($item == $gift['gift_id']) : ?>
                  <li class='fs-4'><?=$gift['gift_name']?></li>
              <?php endif; ?>
            <?php endforeach; ?>
          <?php endforeach; ?>
        </div>
        <div class="card shadow p-3">
          <h3 class="text-success"><i class="fas fa-shield-alt    "></i> Bảo hành</h3>
          <ul>
            <li> Bảo hành 12 tháng</li>
            <li> 1 đổi 1 trong vòng 30 ngày</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-7">
        <div class="card">
          <div class="card shadow">
            <h2 class="card-header">
              Mô tả
            </h2>
            <div class="card-body">
              <p class="card-text"><?= $product_default['product_description'] ?></p>
            </div>
          </div>
        </div>
        <div class="card mt-3">
          <div class="card shadow">
            <h2 class="card-header">
              Thông tin chi tiết
            </h2>
            <div class="card-body">
              <p class="card-text"><?= $product_default['product_content'] ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="col mx-4">
        <div class="card shadow">
          <h2 class="card-header">
            Thông số kỹ thuật
          </h2>
          <div class="card-body">
            <?php if ($product_configuration) : ?>
              <h4 class="card-title border-bottom pb-2">Màn hình</h4>
              <span><?= $product_configuration['display'] ?></span>
              <h4 class="card-title border-bottom pb-2">Camera trước</h4>
              <span><?= $product_configuration['display'] ?></span>
              <h4 class="card-title border-bottom pb-2">Camera sau</h4>
              <span><?= $product_configuration['display'] ?></span>
              <h4 class="card-title border-bottom pb-2">RAM</h4>
              <span><?= $product_configuration['display'] ?></span>
              <h4 class="card-title border-bottom pb-2">Bộ nhớ</h4>
              <span><?= $product_configuration['display'] ?></span>
              <h4 class="card-title border-bottom pb-2">CPU</h4>
              <span><?= $product_configuration['display'] ?></span>
              <h4 class="card-title border-bottom pb-2">GPU</h4>
              <span><?= $product_configuration['display'] ?></span>
              <h4 class="card-title border-bottom pb-2">Pin</h4>
              <span><?= $product_configuration['display'] ?></span>
              <h4 class="card-title border-bottom pb-2">Pin</h4>
              <span><?= $product_configuration['display'] ?></span>
              <h4 class="card-title border-bottom pb-2">Sim</h4>
              <span><?= $product_configuration['display'] ?></span>
              <h4 class="card-title border-bottom pb-2">Hệ điều hành</h4>
              <span><?= $product_configuration['display'] ?></span>
              <h4 class="card-title border-bottom pb-2">Nơi sản xuất</h4>
              <span><?= $product_configuration['display'] ?></span>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-7">
        <div class="card shadow">
          <h2 class="card-header">
            Đánh giá khách hàng
          </h2>
        </div>
        <div class="card shadow mt-3">
          <h2 class="card-header">
            Bình luận
          </h2>
        </div>
      </div>
    </div>
  </div>
  <!-- jQuery -->
  <script src="<?= ADMIN_ASSETS ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
  <!-- Toastr -->
  <script src="<?= ADMIN_ASSETS ?>plugins/toastr/toastr.min.js"></script>
  <script src="<?= asset('customize/js/add-to-cart.js') ?>"></script>
  <script src="<?= asset('customize/js/add-to-wishlist.js') ?>"></script>
</body>

</html>