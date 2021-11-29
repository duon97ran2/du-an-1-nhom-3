<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.0.2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- FontAwesome 5.15.3 CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        <img class="p-4 card shadow" src="./6-dieu-dang-mong-doi-o-sieu-pham-iphone-13-iphone-27.jpg" alt=""
          width="100%">
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
              <input type="number" name='quantity' class="form-control w-25 mx-2 text-center js-quantity-type" value="1"
                min=1 max=''>

            </div>
            <div class="col">
            <?php if($product_default['is_variant'] == 1): ?>
              <form method="GET">
                <div class="colors">
                  <ul>
                  <?php foreach($product_variant as $variant): ?>
                    <li>
                      <label>
                        <input type="radio" name="color" class="js-color-type" value="<?= $variant['product_variant_slug'] ?>" <?= $variant['product_variant_slug'] == $product_default['product_variant_slug'] ? 'checked' : '' ?> onchange="this.form.submit()">
                        <span class="swatch" style="background-color:<?= $variant['product_variant_name'] ?>"></span> <?= $variant['product_variant_name'] ?>
                      </label>
                    </li>
                  <?php endforeach;?>
                  <!-- <li>
                  <label>
                    <input type="radio" name="color" class="js-color-type" onchange="" value="black">
                    <span class="swatch" style="background-color:rgb(9, 50, 211)"></span> BLue
                  </label></li> -->
                  </ul>
                </div>
              </form>
              <h2 class="text-danger my-2"><?= $product_default['product_variant_price'] ?? $product_default['product_price'] ?></h2>
              <button class="btn btn-primary"><i class="fas fa-cart-plus"></i> Mua ngay</button>
              <button class="btn btn-danger"><i class="fa fa-heart" aria-hidden="true"></i> Yêu thích</button>
            </div>
            <?php endif;?>
          </div>
        </div>
        <div class="card shadow p-3">
          <h3 class="text-primary"><i class="fas fa-gift    "></i> Quà Tặng</h3>
          <label for="gift_1" class="d-block fs-4">
            <input type="checkbox" name="gift_1" id="">
            gift_1
          </label>
          <label for="gift_2" class="d-block fs-4">
            <input type="checkbox" name="gift_2" id="">
            gift_2
          </label>
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
              Thông tin chi tiết
            </h2>
            <div class="card-body">
              <h5 class="card-title">Product name</h5>
              <p class="card-text">Content</p>
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
          <?php if($product_configuration) : ?>
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
          <?php endif;?>
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
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
</body>

</html>