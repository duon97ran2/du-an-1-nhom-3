<section class="content-header">
    <div class="row mb-2">
      <div class="col-sm-6">
        <a href="<?= admin_url('qua-tang') ?>" class="btn btn-default ml-n2">Danh sách qua tang</a>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= admin_url('dashboard') ?>">Trang chủ</a></li>
          <li class="breadcrumb-item"><?= $gifts['gift_name'] ?></li>
        </ol>
      </div>
    </div>
</section>

<form action="<?= ADMIN_URL . 'qua-tang/luu-sua?gift_id=' . $gifts['gift_id'] ?>" method="post">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Cap nhat <?= $gifts['gift_name'] ?></h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="">Tên quà tặng</label>
                <input type="text" name="gift_name" id="" class="form-control" placeholder="" value="<?= $gifts['gift_name'] ?>">
            </div>
            <div class="form-group">
                <label for="">Ngày bắt đầu</label>
                <input type="date" name="start_time" id="" class="form-control" placeholder="" value="<?= date("Y-m-d", strtotime($gifts['start_time'])) ?>">
            </div>
            <div class="form-group">
                <label for="">Ngày kết thúc</label>
                <input type="date" name="end_time" id="" class="form-control" placeholder="" value="<?= date("Y-m-d", strtotime($gifts['end_time'])) ?>">
            </div>
        </div>
        <div class="card-footer">
            <div class="d-flex justify-content-center">
                <a href="<?= ADMIN_URL . 'qua-tang'?>" class="btn btn-sm btn-danger">Hủy</a>
                &nbsp;  
                <button type="submit" class="btn btn-primary btn-sm">Lưu</button>
            </div>
        </div>
    </div>  
</form>