<section class="content-header">
    <div class="row mb-2">
      <div class="col-sm-6">
        <a href="<?= admin_url('danh-muc') ?>" class="btn btn-default ml-n2">Danh sách danh muc</a>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= admin_url('dashboard') ?>">Trang chủ</a></li>
          <li class="breadcrumb-item"><?= $categories['category_name'] ?></li>
        </ol>
      </div>
    </div>
</section>

<form action="<?= ADMIN_URL . 'danh-muc/luu-sua?category_id=' . $categories['category_id'] ?>" method="post" enctype="multipart/form-data">
    <div class="row mb-5">
        <div class="col-6 offset-3">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Sua danh muc <?= $categories['category_name'] ?></h3>
                </div>
                <div class="card-body">
                    <img src="<?= PUBLIC_ASSETS . $categories['category_image'] ?>" width="250" alt="">
                    <div class="form-group">
                        <label for="">Ảnh</label>
                        <input type="file" name="category_image" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tên danh mục</label>
                        <input type="text" name="category_name" id="" class="form-control" value="<?= $categories['category_name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Tên không dấu</label>
                        <input type="text" name="category_slug" id="" class="form-control" value="<?= $categories['category_slug'] ?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="is_parent" value="0">
                        <label for="">
                            <input type="checkbox" name="is_parent" value="1" <?= $categories['is_parent'] == 1 ? 'checked' : '' ?>>
                            La danh muc cha
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="">Danh muc cha</label>
                        <select name="parent_id" id="" class="form-control">
                            <option selected value="0"></option>
                            <?php foreach($cate_parents as $item) : ?>
                            <option value="<?= $item['category_id'] ?>" <?= $categories['parent_id'] == $item['category_id'] ? 'selected' : '' ?>><?= $item['category_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="is_menu" value="0">
                        <label for="">
                            <input type="checkbox" name="is_menu" value="1" <?= $categories['is_menu'] == 1 ? 'checked' : '' ?>>
                            La menu
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="">Duong dan</label>
                        <input type="text" name="menu_url" id="" class="form-control" value="<?= $categories['menu_url'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Vị trí</label>
                        <input type="number" name="category_index" id="" class="form-control" value="<?= $categories['category_index'] ?>">
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center">
                        <a href="<?= ADMIN_URL . 'danh-muc'?>" class="btn btn-sm btn-danger">Hủy</a>
                        &nbsp;  
                        <button type="submit" class="btn btn-primary btn-sm">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>