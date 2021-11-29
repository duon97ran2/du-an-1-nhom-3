<form action="<?= ADMIN_URL . 'phieu-giam-gia/luu-sua?voucher_id=' . $vouchers['voucher_id'] ?>" method="post" >
    <div class="row">
        <div class="col-6 offset-3">
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
                <input type="datetime" name="end_time" id="" class="form-control" placeholder="" value="<?= $vouchers['end_time'] ?>">
            </div>
            <div class="form-group">
                <label for="">Mô tả</label>
                <input type="text" name="description" id="" class="form-control" placeholder="" value="<?= $vouchers['description'] ?>">
            </div>
            <div class="form-group">
                <label for="">Giá sử dụng</label>
                <input type="number" name="apply_price" id="" class="form-control" placeholder="" value="<?= $vouchers['apply_price'] ?>">
            </div>
            <div class="form-group">
                <label for="">Giá tối thiểu</label>
                <input type="number" name="minimum_order_price" id="" class="form-control" placeholder="" value="<?= $vouchers['minimum_order_price'] ?>">
            </div>
    </div>
    <br>
            <div class="d-flex justify-content-center">
                <a href="<?= ADMIN_URL . 'phieu-giam-gia'?>" class="btn btn-sm btn-danger">Hủy</a>
                &nbsp;  
                <button type="submit" class="btn btn-primary btn-sm">Lưu</button>
            </div>
</form>