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
      <div class="col">
        <div class="well">
          <div class="bg-white p-3 mb-5">
            <h1 class=" st-name text-center mb-3">Thông tin đơn hàng của bạn</h1>
            <table class="table text-center table-hover table-condensed">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Mã đơn</th>
                  <th>Trạng thái</th>
                  <th>Tổng tiền</th>
                  <th>Hình thức thanh toán</th>
                  <th>Địa chỉ</th>
                  <th>Số điện thoại</th>
                  <th>Ngày đặt</th>
                  <th>Ngày cập nhật</th>
                  <!-- <th style="width: 80px">Tác vụ</th> -->
                </tr>
              </thead>
              <tbody>
                <?php foreach ($orders as $item) : ?>
                  <tr>
                    <td class="align-middle"><?= $item['order_id'] ?></td>
                    <td class="align-middle"><?= $item['order_code'] ?></td>
                    <td class="align-middle"> <span class="badge text-light p-3 bg-<?= $color[$item['order_status']] ?>"><?= $status[$item['order_status']] ?></span></td>
                    <td class="align-middle"><?= $item['order_total'] ?></td>
                    <td class="align-middle"><?= $item['payment_type'] ?></td>
                    <td class="align-middle"><?= $item['address'] ?></td>
                    <td class="align-middle"><?= $item['phone'] ?></td>
                    <td class="align-middle"><?= date("d-m-Y", strtotime($item['order_date'])) ?></td>
                    <td class="align-middle"><?= empty($orders['order_confirm_date']) ? 'Chưa xác nhận' : date("d-m-Y", strtotime($orders['order_confirm_date'])) ?></td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>