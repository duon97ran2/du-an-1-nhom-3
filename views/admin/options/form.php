<div class="row">
    <!-- left column -->
    <div class="col-md-6 offset-3 mb-5">
        <!-- jquery validation -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">
                    Cấu hình trang
                </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="quickForm" novalidate="novalidate">
                <div class="card-body">
                    <input type="hidden" value="<?= $option_id ?>" name="option_id">
                    <div class="form-group">
                        <label>Tên trang</label>
                        <input type="text" name="app_name" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Logo</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="logo" id="customFile">
                          <label class="custom-file-label" for="customFile">Lựa chọn ảnh</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Favicon</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="favicon" id="customFile">
                          <label class="custom-file-label" for="customFile">Lựa chọn ảnh</label>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Hotline 1</label>
                            <input type="text" name="hotline_1" class="form-control"/>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Hotline 2</label>
                            <input type="text" name="hotline_2" class="form-control"/>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Hotline 3</label>
                            <input type="text" name="hotline_3" class="form-control"/>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ cơ sở</label>
                        <input type="text" name="address" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Giấy phép</label>
                        <input type="text" name="license" class="form-control"/>
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="is_maintenance" value="0">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" name="is_maintenance" value="1" id="customSwitch1">
                        <label class="custom-control-label" for="customSwitch1">Bảo trì</label>
                      </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <div class="row">
                    <div class="col-md-6">
                        <a href="<?= admin_url('dashboard') ?>" class="btn btn-secondary btn-block">
                            Huỷ
                        </a>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary btn-block">
                            Lưu
                        </button>
                    </div>
                  </div>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    <!--/.col (left) -->
    <!-- right column -->
    <div class="col-md-6"></div>
    <!--/.col (right) -->
</div>
