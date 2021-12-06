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
.<div class="card">
  <div class="card-header">
    <h2>Thông tin các sản phẩm trong đơn hàng <?= $order_code ?></h2>
  </div>
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
          <!-- <th style="width: 40px">Tác vụ</th> -->
        </tr>
      </thead>
      <tbody>
        <?php foreach ($order_items as $item) : ?>
          <tr>
            <?php $total+=$item['total_price'] ?>
            <td class="align-middle"><?= $item['product_id'] ?></td>
            <td class="align-middle"><?= $item['product_name'] ?></td>
            <td class="align-middle"><?= $item['price'] ?></td><input type="hidden" value="<?= $item['price'] ?>">
            <td class="align-middle quantity"><input type="number" class="price" value="<?= $item['quantity'] ?>"></td>
            <td class="align-middle"><?= $item['color'] ?></td>
            <td class="align-middle"><?= $item['total_price'] ?></td>
          </tr>
        <?php endforeach; ?>
        <tr>
          <td class="text-end fw-bold" colspan="5" id="total">Tổng</td>
          <td><?=$total?></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>