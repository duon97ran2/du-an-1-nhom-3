<section class="content-header">
    <div class="row mb-2">
      <div class="col-sm-6">
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= admin_url('dashboard') ?>">Trang chủ</a></li>
          <li class="breadcrumb-item">Phieu giam gia</li>
        </ol>
      </div>
    </div>
</section>

<div class="card card-default">
    <div class="card-header">
        <a href="<?=ADMIN_URL?>phieu-giam-gia/tao-moi" class="btn btn-primary btn-sm">Thêm qua tang</a>
    </div>
    <div class="card-body">
        <table class="table table-stripped table-bordered">
            <thead>
                <th>ID</th>
                <th>Mã voucher</th>
                <th>Số lượng</th>
                <th>Thời gian kết thúc</th>
                <th>Mô tả</th>
                <th>Giá sử dụng</th>
                <th>Giá tối thiểu</th>
                <th>Chức năng</th>
            </thead>
            <tbody>
                <?php foreach ($dsVouchers as $v) : ?>
                    <tr>
                        <td><?= $v['voucher_id'] ?></td>
                        <td><?= $v['voucher_code'] ?></td>
                        <td><?= $v['limit_number'] ?></td>
                        <td><?= $v['end_time'] ?></td>
                        <td><?= $v['description'] ?></td>
                        <td><?= $v['apply_price'] ?></td>
                        <td><?= $v['minimum_order_price'] ?></td>
                        <td>
                            <a href="<?= ADMIN_URL. 'phieu-giam-gia/sua?voucher_id=' .$v['voucher_id'] ?>" class="btn btn-sm btn-info">Sửa</a>
                            <a href="<?= ADMIN_URL. 'phieu-giam-gia/xoa?voucher_id=' .$v['voucher_id'] ?>" class="btn btn-sm btn-danger">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>