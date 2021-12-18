<style>
  /* Chrome, Safari, Edge, Opera */
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  /* Firefox */
  input[type=number] {
    -moz-appearance: textfield;
  }
</style>
<section class="fs-main">
  <div class="f-wrap">
    <div class="row">
      <ol class="ml-2 mt-0 breadcrumb bg-transparent breadcrumb-margin">
        <li class="breadcrumb-item"><a href="<?= app_url() ?>">Trang chủ</a></li>
        <li class="breadcrumb-item active"><a href="<?= app_url('thanh-toan') ?>">Thanh toán</a></li>
      </ol>
    </div>
    <div class="bg-white p-3 mb-5">
      <h1>Sản phẩm cần thanh toán</h1>
      <table id="cart" class="table text-left table-hover table-condensed">
        <thead>
          <tr>
            <th style="width:50%">Sản phẩm</th>
            <th style="width:10%">Giá tiền</th>
            <th style="width:8%">Số lượng</th>
            <th style="width:22%">Tổng</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($cart_data as $item) : ?>
            <tr>
              <td class="align-middle">
                <div class="row">
                  <div class="col-sm-2 hidden-xs"><img src="<?= asset('uploads/' . ($item['product_variant_image'] ?? $item['product_image'])) ?>" class="img-responsive" /></div>
                  <div class="col-sm-10">
                    <h4 class="nomargin">
                      <?= $item['product_name'] ?>
                      <?= $item['product_variant_name'] ? (' - ' . $item['product_variant_name']) : '' ?>
                    </h4>
                  </div>
                </div>
              </td>
              <td class="align-middle"><?= priceVND($item['price']) ?></td>
              <td class="align-middle">
                <input type="hidden" name="cart_id" value="<?= $item['cart_id'] ?>">
                <input type="number" name="quantity" class="form-control text-center rounded-0" disabled value="<?= $item['quantity'] ?>">
              </td>
              <td class="align-middle"><?= priceVND($item['total_price']) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <h1>Đặt hàng</h1>
    <form action="<?= app_url('thanh-toan/kiem-tra') ?>" id="formCheckout" novalidate method="POST">
      <div class="row">
        <div class="col-md-8">
          <div class="well">
            <div class="form-group">
              <label>Họ tên</label>
              <input type="text" class="form-control" value="<?= $auth_info['name'] ?? '' ?>" name="name" placeholder="Họ tên">
              <span class="text-danger"><?= get_session('message-errors')['name'] ?? '' ?></span>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" value="<?= $auth_info['email'] ?? '' ?>" name="email" placeholder="Email">
              <span class="text-danger"><?= get_session('message-errors')['email'] ?? '' ?></span>
            </div>
            <div class="form-group">
              <label>Số điện thoại</label>
              <input type="text" class="form-control" value="<?= $auth_info['phone'] ?? '' ?>" name="phone" placeholder="Số điện thoại">
              <span class="text-danger"><?= get_session('message-errors')['phone'] ?? '' ?></span>
            </div>
            <div class="form-group">
              <label>Địa chỉ</label>
              <input type="text" class="form-control" value="<?= $auth_info['address'] ?? '' ?>" name="address" placeholder="Địa chỉ">
              <span class="text-danger"><?= get_session('message-errors')['address'] ?? '' ?></span>
            </div>
            <div class="form-group">
              <label>Ghi chú</label>
              <textarea name="notes" id="" cols="30" rows="5" class="form-control"></textarea>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="well">
            <h5 class="mb-2">Giá tiền: <span><?= priceVND($total_price) ?></span></h5>
            <h5 class="mb-2">Giảm giá: <span id="js-show-voucher-discount"><?= priceVND($voucher['price'] ?? 0) ?></sp>
            </h5>
            <h5 class="mb-4">Tổng tiền: <span id="js-show-total-price"><?= priceVND($total_price - ($voucher['price'] ?? 0)) ?></span></h5>
            <input type="hidden" name="payment_type" value="shipcod">
            <input type="hidden" name="price" id="js-price" value="<?= $total_price ?>">
            <input type="hidden" name="total_price" id="js-total-price" value="<?= $total_price - ($voucher['price'] ?? 0) ?>">
            <div class="form-group">
              <label>Mã giảm giá</label>
              <input type="text" class="form-control" id="js-voucher-input" data-url="<?= app_url('thanh-toan/kiem-tra-voucher') ?>" value="<?= $voucher['code'] ?? '' ?>" name="voucher" placeholder="Voucher">
              <span class="error invalid-feedback"><?= get_session('message-errors')['voucher'] ?? '' ?></span>
            </div>
            <div>
              <a href="<?= app_url('gio-hang') ?>" class=" m-0 btn btn-secondary">Giỏ hàng</a>
              <button type="submit" class="btn btn-primary">Đặt mua</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    <?php remove_session('message-errors'); ?>
  </div>
</section>