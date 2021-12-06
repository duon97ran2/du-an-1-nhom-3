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
    <div class="col-sm-6">
      <a href="<?= admin_url('don-hang') ?>" class="btn btn-default ml-n2">Danh sách đơn hàng</a>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?= admin_url('dashboard') ?>">Trang chủ</a></li>
        <li class="breadcrumb-item active">Đơn hàng</li>
      </ol>
    </div>
  </div>
</section>
<div class="card card-default">
  <div class="card-header">
    <form method="get" class="form-inline ml-n2">
      <div class="form-group ml-1">
        <select name="status" class="form-control form-control-sm">
          <option value="" disabled selected>Trạng thái đơn hàng</option>
          <?php foreach ($status as $key => $value) : ?>
            <option value="<?= $key ?>" <?= input_get('status') == (string)$key ? 'selected' : '' ?>><?= $value ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group ml-1">
        <input class="form-control form-control-sm" type="text" name="order_code" placeholder="Nhập mã đơn hàng" value="<?= (!empty(input_get('order_code'))) ? input_get('order_code') : '' ?>">
      </div>
      <button type="submit" class="btn btn-primary btn-sm ml-1">Lọc</button>
      <a href="<?= admin_url('don-hang') ?>" class="btn btn-primary btn-sm ml-1">Bỏ lọc</a>
    </form>
  </div>
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped text-center">
      <thead>
        <tr>
          <th>ID</th>
          <th>Mã đơn</th>
          <th>Trạng thái</th>
          <th>Tổng tiền</th>
          <th>Hình thức thanh toán</th>
          <th>Tên khách hàng</th>
          <th>Địa chỉ</th>
          <th>Số điện thoại</th>
          <th>Ngày đặt</th>
          <th>Ngày cập nhật</th>
          <th style="width: 80px">Tác vụ</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($orders as $item) : ?>
          <tr>
            <td class="align-middle"><?= $item['order_id'] ?></td>
            <td class="align-middle"><a href="<?= admin_url('don-hang/chi-tiet?order_id=' . $item['order_id'] . '&order_code=' . $item['order_code']) ?>" class="btn btn-primary btn-sm"><?= $item['order_code'] ?></a></td>
            <td class="align-middle"> <span class="badge bg-<?= $color[$item['order_status']] ?> p-2"><?= $status[$item['order_status']] ?></span></td>
            <td class="align-middle"><?= $item['order_total'] ?></td>
            <td class="align-middle"><?= $item['payment_type'] ?></td>
            <td class="align-middle"><?= $item['name'] ?></td>
            <td class="align-middle"><?= $item['address'] ?></td>
            <td class="align-middle"><?= $item['phone'] ?></td>
            <td class="align-middle"><?= date("d-m-Y", strtotime($item['order_date'])) ?></td>
            <td class="align-middle"><?= empty($item['order_confirm_date']) ? 'Chưa xác nhận' : date("d-m-Y", strtotime($item['order_confirm_date'])) ?></td>
            <td class="align-middle">
              <div class="btn-group">
                <?php if ($item['order_status'] == 0) : ?>
                  <a class="btn btn-primary btn-sm text-nowrap btn_confirm_order" data-name="<?= $item['order_code'] ?>" data-url="<?= admin_url('don-hang/cap-nhat?order_id=' . $item['order_id']) . '&order_status=1' ?>" role="button"> Xác nhận </a>
                <?php endif ?>
                <?php if ($item['order_status'] == 1) : ?>
                  <a class="btn btn-success btn-sm btn_complete_order text-nowrap " data-name="<?= $item['order_code'] ?>" data-url="<?= admin_url('don-hang/cap-nhat?order_id=' . $item['order_id']) . '&order_status=2' ?>" role="button"> Hoàn thành </a>
                <?php endif ?>
                <?php if ($item['order_status'] == 1 || $item['order_status'] == 0) : ?>
                  <a class="btn btn-danger btn-sm btn_cancel_order text-nowrap" data-name="<?= $item['order_code'] ?>" data-url="<?= admin_url('don-hang/cap-nhat?order_id=' . $item['order_id']) . '&order_status=3' ?>" role="button"> Hủy đơn </a>
                <?php endif ?>
                <?php if ($item['order_status'] == 3) : ?>
                  <a class="btn btn-danger btn-sm text-light m-0   btn_delete text-nowrap" data-name="<?= $item['order_code'] ?>" data-url="<?= admin_url('don-hang/xoa?order_id=' . $item['order_id'])?>" role="button"> Xóa </a>
                <?php endif ?>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>