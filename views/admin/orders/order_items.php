<section class="content-header">
  <div class="row mb-2">
    <div class="col-sm-6">
      <a href="javascript:;" class="btn btn-default ml-n2">Thông tin các sản phẩm trong đơn hàng <?= $order_code ?></a>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?= admin_url('dashboard') ?>">Trang chủ</a></li>
        <li class="breadcrumb-item active">Đơn hàng</li>
      </ol>
    </div>
  </div>
</section>
.<div class="card">
  <div class="card-header"></div>
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped text-center">
      <thead>
        <tr>
          <th>Mã sản phẩm</th>
          <th>Tên sản phẩm</th>
          <th>Giá tiền</th>
          <th>Số lượng</th>
          <th>Màu</th>
          <th>Tổng tiền</th>
          <th style="width: 40px">Tác vụ</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($order_items as $item) : ?>
          <tr>
            <td class="align-middle"><?= $item['product_id'] ?></td>
            <td class="align-middle"><?= $item['product_name'] ?></td>
            <td class="align-middle"><?= $item['price'] ?></td>
            <td class="align-middle"><?= $item['quantity'] ?></td>
            <td class="align-middle"><?= $item['color'] ?></td>
            <td class="align-middle"><?= $item['total_price'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="card-footer">
    <div class="btn-group justify-content-end" role="group" aria-label="Button group">
      <a class="btn btn-primary btn-sm " href="#" role="button"> Xác nhận </a>
      <a class="btn btn-primary btn-sm btn_cancel_order" data-name="<?= $order_code ?>" data-url="<?= admin_url('don-hang/cap-nhat?order_id='.input_get('order_id')).'&order_status=4' ?>"  role="button"> Hủy đơn </a>
    </div>
  </div>
</div>