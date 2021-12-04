
<section class="content-header">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Danh sách banner</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?= admin_url('dashboard') ?>">Trang chủ</a></li>
        <li class="breadcrumb-item active">banners</li>
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
    <a href="<?= admin_url('banner/them-moi') ?>" class="btn btn-primary btn-sm ml-n2">Thêm banner mới</a>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>STT</th>
          <th>Tên banner</th>
          <th>URL</th>
          <th>Ảnh</th>
          <th>index</th>
          <th>Target</th>
          <th>Vị trí</th>
          <th>Trạng Thái</th>
          <th>Ngày tạo</th>
          <th>Action</th>
        </tr> 
      </thead>
      <tbody>
        <?php foreach($banners as $key => $b) : ?>
          <tr>
            <td><?= $key+1?></td>
            <td><?= $b['banner_name'] ?></td>
            <td><a href="<?= $b['banner_url'] ?>" target="<?= $b['banner_target'] ?>">Chi tiet</a></td>
            <td><img src="<?= asset('uploads/' . $b['banner_image']) ?>" width="100"></td>
            <td><?= $b['banner_index'] ?></td>
            <td><?= $b['banner_target'] == 1 ? "_blank" : "_self"?></td>
            <td><?= $b['banner_position'] == 1 ? "main_banner" : "sub_banner"?></td>
            <td><?= $b['is_active']== 1 ? "active" : "hidden"?></td>
            <td><?= $b['created_at'] ?></td>
           
            <td>
             
              <a href="<?=admin_url('banner/luu-cap-nhat?banner_id='.$b['banner_id'])?>" class="btn btn-info">Update</a>
              <a href="javascript:;" 
                      data-url="<?=admin_url('banner/xoa?banner_id=' .$b['banner_id'])?>" 
                      data-name="<?= $b['banner_name'] ?>" 
                      class="btn btn-danger btn_remove_banner">Xóa</a>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>