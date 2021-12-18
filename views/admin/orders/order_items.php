<?php
$status = [
  0 => 'Chờ xác nhận',
  1 => 'Đã xác nhận',
  2 => 'Giao thành công',
  3 => 'Đã hủy đơn hàng',
];
$color = [
  0 => 'warning',
  1 => 'info',
  2 => 'success',
  3 => 'danger',
];
?>
<section class="content-header">
  <div class="row mb-2">
    <div class="col-sm-6 text-nowrap">
      <a href="<?= admin_url('don-hang') ?>" class="btn btn-default ml-n2 mb-2">Danh sách đơn hàng</a>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?= admin_url('dashboard') ?>">Trang chủ</a></li>
        <li class="breadcrumb-item active">Đơn hàng</li>
      </ol>
    </div>
  </div>
</section>
<div class="card">
  <div class="card-header">
    <h2>Thông tin các sản phẩm trong đơn hàng <?= $order['order_code'] ?></h2>
    <h4>Trạng thái: <?= $status[$order['order_status']] ?></h4>
    <h4>Ghi chú: <?= $order['notes']??'Không có' ?></h4>
    <?php if ($order['order_status'] == 0 || $order['order_status'] == 1) : ?>
      <a type="button" href="<?= admin_url('don-hang/them-chi-tiet?id=' . $order_id) ?>" class="btn btn-primary">Thêm sản phẩm vào đơn hàng</a><?php endif ?>
  </div>
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped text-center">
      <thead>
        <tr>
          <th>Mã sản phẩm</th>
          <th>Tên sản phẩm</th>
          <th>Giá tiền</th>
          <th width="100px">Số lượng</th>
          <th>Màu</th>
          <th>Tổng tiền</th>
          <th>Tác vụ</th>
          <!-- <th style="width: 40px">Tác vụ</th> -->
        </tr>
      </thead>
      <tbody>
        <?php foreach ($order_items as $item) : ?>
          <tr>
            <form action="<?= admin_url('don-hang/sua-chi-tiet') ?>" method="post">
              <td class="align-middle"><?= $item['product_id'] ?></td>
              <td class="align-middle"><?= $item['product_name'] ?></td>
              <td class="align-middle"><?= priceVND( $item['price']) ?></td><input type="hidden" value="<?= $item['price'] ?>">
              <input type="hidden" name="id" value="<?= $item['id'] ?>">
              <td class="align-middle"><input type="number"  name="quantity" min="1" class="form-control w-100" value="<?= $item['quantity'] ?>" <?= ($order['order_status'] == 2 || $order['order_status'] == 3)?'disabled' :'' ?> onchange="this.form.submit()"></td>
              <td class="align-middle"><?= $item['color'] ?></td>
              <td class="align-middle"><?= priceVND( $item['total_price']) ?></td>
              <?php if ($order['order_status'] == 0 || $order['order_status'] == 1) : ?>
                <td class="align-middle"><a class="btn btn-danger btn-sm " href="<?= admin_url('don-hang/xoa-chi-tiet?id=' . $item['id']) ?>" role="button"> Xóa</a></td>
              <?php endif ?>
            </form>
          </tr>
        <?php endforeach; ?>
        <tr>
          <td class="text-end fw-bold" colspan="5" id="total">Tổng</td>
          <td><?=priceVND( $order['order_total'] ) ?></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>