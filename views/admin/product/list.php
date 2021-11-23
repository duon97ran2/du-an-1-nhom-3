<section class="content-header">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Danh sách sản phẩm</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= admin_url('dashboard') ?>">Trang chủ</a></li>
          <li class="breadcrumb-item active">Sản phẩm</li>
        </ol>
      </div>
    </div>
</section>


<?php if (!empty(get_session('message'))) : ?>
<div class="alert alert-success">
    <?= get_session('message') ?>
</div>
<?php remove_session('message') ?>
<?php endif; ?>

<div class="card card-default">
    <div class="card-header">
      <a href="<?= admin_url('san-pham/them-moi') ?>" class="btn btn-primary btn-sm ml-n2">Thêm sản phẩm mới</a>
    </div>
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Danh mục</th>
            <th>Thương hiệu</th>
            <th>Số lượng hàng</th>
            <th>Trạng thái</th>
            <th>Ngày tạo</th>
            <th>Ngày sửa</th>
            <th>Tác vụ</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
              <div class="btn-group">
                <button type="button" class="btn btn-default">
                    <i class="fas fa-align-left"></i>
                  </button>
                  <button type="button" class="btn btn-default">
                    <i class="fas fa-align-right"></i>
                  </button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
</div>