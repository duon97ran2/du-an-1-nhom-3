
<section class="content-header">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Danh sách bài viết</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?= admin_url('dashboard') ?>">Trang chủ</a></li>
        <li class="breadcrumb-item active">bài viết</li>
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
    <a href="<?= admin_url('bai-viet/them-moi') ?>" class="btn btn-primary btn-sm ml-n2">Thêm bài viết mới</a>
  </div>
  <div class="card-body">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>STT</th>
          <th>Tên bài viết</th>
          <th>Ảnh bìa</th>
          <th>url</th>
          <th>status</th>
          <th>người tạo</th>
          <th>ngày viết</th>
          <th>ngày cập nhật</th>
          <th>Action</th>
        </tr> 
      </thead>
      <tbody>
      
        <?php foreach($blogs as $key => $b):?>
        <tr>
          <td><?= $key +1 ?></td>   
          <td><?= $b['blog_title']?></td>
          <td><img src="<?= asset('uploads/' . $b['blog_image']) ?>" width="100"></td>
          <td><?=  $b['blog_url']?></td>
          <td><?=  $b['blog_status'] == 1 ? 'đang hiển thị' : 'đã khóa' ?></td>
          <td><?=  $b['name']?></td>
          <td><?=  $b['created_at']?></td>
          <td><?=  $b['updated_at']?></td>
          <td>
              <a href="<?= admin_url('bai-viet/chi-tiet?blog_id='.$b['blog_id']) ?>" class="btn btn-dark">chi tiết</a>
              <a href="javascript:;" 
                    data-url="<?=admin_url('bai-viet/xoa?blog_id='.$b['blog_id'])?>" 
                    data-name="bài viết <?= $b['blog_title'] ?>" 
                    class="btn btn-danger btn_remove_blog">Xóa</a>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
</div>