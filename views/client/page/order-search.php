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
<section class="fs-main">
  <div class="f-wrap">
    <div class="row my-5">
      <div class="offset-sm-3 col-sm-6">
        <div class="well">
          <h1>Kiểm tra đơn hàng</h1>
          <form action="" method="POST">
            <div class="bg-vid">
              <video width='100%' loop muted autoplay src="https://cdn.dribbble.com/users/14268/screenshots/8921521/media/dc5be48952b04977b562cf8352b22085.mp4" type="video/mp4"></video>
              <div class="form-group d-flex flex-column text-center justify-content-center mx-5 ">
                <input type="text" class="form-control form-control mb-5" placeholder="Nhập số điện thoại hoặc mã đơn hàng của bạn" name="order_code">
                <button class="btn btn-danger" name="btn-search" type="submit">Tìm kiếm đơn hàng</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="bg-white p-3 mb-5 <?= empty($order) ? 'd-none' : '' ?>">
      <h1 class=" st-name text-left mb-3">Thông tin đơn hàng</h1>
      <form method="post" class="form-inline ml-n2">
        <div class="form-group ml-1">
          <select name="status" class="form-control form-control-sm">
            <option value="" disabled selected>Trạng thái đơn hàng</option>
            <?php foreach ($status as $key => $value) : ?>
              <option value="<?= $key ?>" <?= input_post('status') == (string)$key ? 'selected' : '' ?>><?= $value ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group ml-1">
          <input class="form-control form-control-sm" type="text" name="user_name" placeholder="Nhập tên khách hàng" value="<?= (!empty(input_post('user_name'))) ? input_post('user_name') : '' ?>">
        </div>
        <input type="hidden" value="<?= $order_code ?>" name="order_code">
        <button type="submit" class="btn btn-primary btn-sm mx-2" name="filter">Lọc</button>
        <button type="submit" class="btn btn-primary btn-sm" name="remove">Bỏ lọc</button>
      </form>
      <table class="table text-left table-hover table-condensed">
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
            <!-- <th style="width: 80px">Tác vụ</th> -->
          </tr>
        </thead>
        <tbody>
          <?php foreach ($order as $item) : ?>
            <tr>
              <td class="align-middle"><?= $item['order_id'] ?></td>
              <td class="align-middle"><?= $item['order_code'] ?></td>
              <td class="align-middle"> <span class="badge text-light p-3 bg-<?= $color[$item['order_status']] ?>"><?= $status[$item['order_status']] ?></span></td>
              <td class="align-middle"><?= $item['order_total'] ?></td>
              <td class="align-middle"><?= $item['payment_type'] ?></td>
              <td class="align-middle"><?= $item['name'] ?></td>
              <td class="align-middle"><?= $item['address'] ?></td>
              <td class="align-middle"><?= $item['phone'] ?></td>
              <td class="align-middle"><?= date("d-m-Y", strtotime($item['order_date'])) ?></td>
              <td class="align-middle"><?= empty($item['order_confirm_date']) ? 'Chưa xác nhận' : date("d-m-Y", strtotime($item['order_confirm_date'])) ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</section>