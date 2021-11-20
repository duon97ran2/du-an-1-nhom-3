<section class="content-header">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Cài đặt trang</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= admin_url('dashboard') ?>">Trang chủ</a></li>
          <li class="breadcrumb-item active">Cài đặt trang</li>
        </ol>
      </div>
    </div>
</section>

<div class="row">
    <!-- left column -->
    <div class="col-md-6 offset-3 mb-5">
        <!-- jquery validation -->
        <div class="card card-primary">
            <form action="<?= admin_url('cau-hinh-trang/kiem-tra') ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <?php if (!empty(get_session('message'))) : ?>
                    <div class="alert alert-success">
                        <?= get_session('message') ?>
                    </div>
                    <?php remove_session('message') ?>
                    <?php endif; ?>
                    
                    <input type="hidden" value="<?= $option['option_id'] ?? '' ?>" name="option_id">
                    <div class="form-group">
                        <label>Tên trang</label>
                        <input type="text" name="app_name" class="form-control" value="<?= $option['app_name'] ?? '' ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Logo</label>
                        <?php if (!empty($option['logo'])) : ?>
                        <div class="text-center">
                          <img class="profile-user-img img-fluid img-circle mb-3" style="height:100px" src="<?= asset('uploads/'.$option['logo']) ?>">
                        </div>
                        <?php endif; ?>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="logo" id="customFileLogo">
                            <label class="custom-file-label" for="customFileLogo">Lựa chọn hình ảnh</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Favicon</label>
                        <?php if (!empty($option['favicon'])) : ?>
                        <div class="text-center">
                          <img class="profile-user-img img-fluid img-circle mb-3" style="height:100px" src="<?= asset('uploads/'.$option['favicon']) ?>">
                        </div>
                        <?php endif; ?>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="favicon" id="customFileFavicon">
                            <label class="custom-file-label" for="customFileFavicon">Lựa chọn hình ảnh</label>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Hotline 1</label>
                            <input type="text" name="hotline_1" value="<?= $option['hotline_1'] ?? '' ?>" class="form-control"/>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Hotline 2</label>
                            <input type="text" name="hotline_2" value="<?= $option['hotline_2'] ?? '' ?>" class="form-control"/>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label>Hotline 3</label>
                            <input type="text" name="hotline_3" value="<?= $option['hotline_3'] ?? '' ?>" class="form-control"/>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ cơ sở</label>
                        <input type="text" name="address" value="<?= $option['address'] ?? '' ?>" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" value="<?= $option['email'] ?? '' ?>" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>Giấy phép</label>
                        <input type="text" name="license" value="<?= $option['license'] ?? '' ?>" class="form-control"/>
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="is_maintenance" value="0">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" name="is_maintenance" value="1" <?= empty($option['is_maintenance']) ? '' : ($option['is_maintenance'] == 1 ? 'checked' : '') ?> id="customSwitch1">
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
