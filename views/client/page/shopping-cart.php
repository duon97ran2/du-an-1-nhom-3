<section class="fs-main">
  <div class="f-wrap">
    <div class="row">
      <ol class="ml-2 mt-0 breadcrumb bg-transparent breadcrumb-margin">
        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
        <li class="breadcrumb-item active"><a href="<?= app_url('gio-hang') ?>">Giỏ hàng</a></li>
      </ol>
    </div>
    <?php if (empty($cart_data)) : ?>
      <div class="fs-ghnull">
          <p class="fs-ghnl1"><img src="https://fptshop.com.vn/gio-hang-v2/cart/Desktop/images/null.png" alt=""></p>
          <p class="fs-ghnl2">Không có sản phẩm nào trong giỏ hàng của bạn</p>
          <p class="fs-ghnl3"><a href="<?= app_url() ?>" title="Trang chủ">ĐẾN TRANG CHỦ</a></p> 
      </div>
    <?php else: ?>
    <div class="bg-white p-3 mb-5">
      <h1 class="st-name text-left mb-3">Giỏ hàng</h1>
      <table id="cart" class="table text-left table-hover table-condensed">
        <thead>
          <tr>
            <th style="width:50%">Sản phẩm</th>
            <th style="width:10%">Giá tiền</th>
            <th style="width:8%">Số lượng</th>
            <th style="width:22%">Tổng</th>
            <th style="width:10%"></th>
          </tr>
        </thead>
        <tbody>
          <?php $total_price = 0; ?>
            <?php foreach($cart_data as $item) : ?>
                <tr>
                    <td class="align-middle">
                      <div class="row">
                        <div class="col-sm-2 hidden-xs"><img src="<?= asset('uploads/' . ($item['product_image'] ?? $item['product_variant_image'])) ?>" class="img-responsive"/></div>
                        <div class="col-sm-10">
                          <h4 class="nomargin">
                            <?= $item['product_name']?>
                            <?= $item['product_variant_name'] ? (' - ' . $item['product_variant_name']) : '' ?>
                          </h4>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle"><?= priceVND($item['price']) ?></td>
                    <td class="align-middle">
                        <form action="<?= app_url('gio-hang/cap-nhat') ?>" method="POST">
                            <input type="hidden" name="cart_id" value="<?= $item['cart_id'] ?>">
                            <input type="number" name="quantity" class="form-control text-center rounded-0" onchange="this.form.submit()" value="<?= $item['quantity'] ?>">
                        </form>
                    </td>
                    <td class="align-middle"><?= priceVND($item['total_price']) ?></td>
                    <td class="actions align-middle">
                      <a class="btn btn-default text-danger bg-transparent btn-sm rounded-0" href="<?= app_url('gio-hang/xoa-san-pham?id='.$item['cart_id']) ?>"><span class="material-icons">delete</span></a>
                    </td>
                </tr>
              <?php $total_price += $item['total_price'] ?>
          <?php endforeach; ?>
        </tbody>
        <?php if ($cart_data) : ?>
        <tfoot>
          <tr>
            <td colspan="3" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Tổng tiền <?= priceVND($total_price) ?></strong></td>
            <td>
              <a href="<?= app_url('thanh-toan'); ?>" class="btn btn-outline-danger rounded-0 btn-block">Thanh toán <i class="fa fa-angle-right"></i></a>
            </td>
          </tr>
        </tfoot>
        <?php endif ?>
      </table>
    </div>
    
    <?php endif ?>
  </div>
</section>