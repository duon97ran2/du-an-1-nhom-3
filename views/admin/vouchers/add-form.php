<form action="<?= ADMIN_URL . 'phieu-giam-gia/luu-tao-moi?voucher_id=' . $vouchers['voucher_id'] ?>" method="post" >
    <div class="row">
        <div class="form-group">
                <label for="">Mã voucher</label>
                <input type="text" name="voucher_code" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Số lượng</label>
                <input type="number" name="limit_number" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Thời gian kết thúc</label>
                <input type="datetime" name="end_time" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Mô tả</label>
                <input type="text" name="description" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Giá sử dụng</label>
                <input type="float" name="apply_price" class="form-control" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Giá tối thiểu</label>
                <input type="float" name="minimum_order_price" class="form-control" placeholder="">
            </div>
    <br>
            <div class="d-flex justify-content-center">
                <a href="<?= ADMIN_URL . 'phieu-giam-gia'?>" class="btn btn-sm btn-danger">Hủy</a>
                &nbsp;  
                <button type="submit" class="btn btn-primary btn-sm">Lưu</button>
            </div>
</form>