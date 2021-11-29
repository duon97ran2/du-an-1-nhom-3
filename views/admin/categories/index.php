<section class="content-header">
    <div class="row mb-2">
      <div class="col-sm-6">
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= admin_url('dashboard') ?>">Trang chủ</a></li>
          <li class="breadcrumb-item">Danh muc</li>
        </ol>
      </div>
    </div>
</section>

<div class="card card-default">
    <div class="card-header">
        <a href="<?=ADMIN_URL ?>danh-muc/tao-moi" class="btn btn-primary btn-sm">Thêm danh mục</a>
    </div>
    <div class="card-body">
        <table class="table table-stripped table-bordered">
            <thead>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Danh muc cha</th>
                <th>Ảnh</th>
                <th>Chức năng</th>
            </thead>
            <tbody>
                <?php foreach ($dsCategories as $c) : ?>
                    <tr>
                        <td><?= $c['category_id'] ?></td>
                        <td><?= $c['category_name'] ?></td>
                        <td><?= $c['parent_name'] ?></td>
                        <td>
                            <img src="<?= PUBLIC_ASSETS .$c['category_image'] ?>" width= "100" alt="">
                        </td>
                        <td>
                            <a href="<?= ADMIN_URL. 'danh-muc/sua?category_id=' .$c['category_id'] ?>" class="btn btn-sm btn-info">Sửa</a>
                            <a href="<?= ADMIN_URL. 'danh-muc/xoa?category_id=' .$c['category_id'] ?>" class="btn btn-sm btn-danger">Xóa</a>
                        </td>
                    </tr>
                    <?php endforeach ?> 
                </tbody>
                
        </table>
    </div>
</div>