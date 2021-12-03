<section class="content-header">
    <div class="row mb-2">
      <div class="col-sm-6">
        <a href="<?= admin_url('qua-tang') ?>" class="btn btn-default ml-n2">Danh sách qua tang</a>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= admin_url('dashboard') ?>">Trang chủ</a></li>
          <li class="breadcrumb-item">Them qua tang</li>
        </ol>
      </div>
    </div>
</section>

<form action="<?= ADMIN_URL. 'qua-tang/luu-tao-moi'?>" method="post">
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Them qua tang</h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="">Tên quà tặng</label>
                <input id="" class="form-control" type="text" name="gift_name" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Ngày bắt đầu</label>
                <input id="" class="form-control" type="date" name="start_time" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Ngày kết thúc</label>
                <input id="" class="form-control" type="date" name="end_time" placeholder="">
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