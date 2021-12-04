<section class="content-header">
    <div class="row mb-2">
      <div class="col-sm-6">
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= admin_url('dashboard') ?>">Trang chủ</a></li>
          <li class="breadcrumb-item">Qua tang</li>
        </ol>
      </div>
    </div>
</section>

<div class="card card-default">
    <div class="card-header">
    <a href="<?=ADMIN_URL ?>qua-tang/tao-moi" class="btn btn-primary btn-sm">Thêm quà tặng</a>
    </div>
    <div class="card-body">
        <table class="table table-stripped table-bordered">
            <thead>
                <th>ID</th>
                <th>Tên quà tặng</th>
                <th>Ngày bắt đầu</th>
                <th>Ngày kết thúc</th>
                <th>Chức năng</th>
            </thead>
            <tbody>
                <?php foreach ($dsGifts as $g) : ?>
                    <tr>
                        <td><?= $g['gift_id'] ?></td>
                        <td><?= $g['gift_name'] ?></td>
                        <td><?= $g['start_time'] ?></td>
                        <td><?= $g['end_time'] ?></td>
                        <td>
                            <a href="<?= ADMIN_URL. 'qua-tang/sua?gift_id=' .$g['gift_id'] ?>" class="btn btn-sm btn-info">Sửa</a>
                            <a href="<?= ADMIN_URL. 'qua-tang/xoa?gift_id=' .$g['gift_id'] ?>" class="btn btn-sm btn-danger">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>