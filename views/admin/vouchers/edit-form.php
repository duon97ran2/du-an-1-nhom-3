<section class="content-header">
    <div class="row mb-2">
      <div class="col-sm-6">
        <a href="<?= admin_url('phieu-giam-gia') ?>" class="btn btn-default ml-n2">Danh sách phiếu giảm giá</a>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= admin_url('dashboard') ?>">Trang chủ</a></li>
          <li class="breadcrumb-item"><?= $vouchers['voucher_code'] ?></li>
        </ol>
      </div>
    </div>
</section>

<form action="<?= ADMIN_URL . 'phieu-giam-gia/luu-sua?voucher_id=' . $vouchers['voucher_id'] ?>" method="post" >
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Cập nhật <?= $vouchers['voucher_code'] ?></h3>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="">Mã voucher</label>
                <input type="text" name="voucher_code" id="" class="form-control" placeholder="" value="<?= $vouchers['voucher_code'] ?>">
            </div>
            <div class="form-group">
                <label for="">Số lượng</label>
                <input type="number" name="limit_number" id="" class="form-control" placeholder="" value="<?= $vouchers['limit_number'] ?>">
            </div>
            <div class="form-group">
                <label for="">Thời gian kết thúc</label>
                <input type="date" name="end_time" id="" class="form-control" placeholder="" value="<?= $vouchers['end_time'] ?>">
            </div>
            <div class="form-group">
                <label for="">Mô tả</label>
                <input type="text" name="description" id="" class="form-control" placeholder="" value="<?= $vouchers['description'] ?>">
            </div>
            <div class="form-group">
                <label for="">Giá áp dụng</label>
                <input type="number" name="apply_price" id="" class="form-control" placeholder="" value="<?= $vouchers['apply_price'] ?>">
            </div>
            <div class="form-group">
                <label for="">Giá đơn hàng áp dụng tối thiểu</label>
                <input type="number" name="minimum_order_price" id="" class="form-control" placeholder="" value="<?= $vouchers['minimum_order_price'] ?>">
            </div>
        </div>    
        <div class="card-footer">
            <div class="d-flex justify-content-center">
                <a href="<?= ADMIN_URL . 'phieu-giam-gia'?>" class="btn btn-sm btn-danger">Hủy</a>
                &nbsp;  
                <button type="submit" class="btn btn-primary btn-sm">Lưu</button>
            </div>
        </div>
    </div>
</form>