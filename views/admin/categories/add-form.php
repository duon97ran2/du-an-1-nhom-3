<section class="content-header">
    <div class="row mb-2">
      <div class="col-sm-6">
        <a href="<?= admin_url('danh-muc') ?>" class="btn btn-default ml-n2">Danh sách danh muc</a>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= admin_url('dashboard') ?>">Trang chủ</a></li>
          <li class="breadcrumb-item">Them danh muc</li>
        </ol>
      </div>
    </div>
</section>

<form action="<?= ADMIN_URL. 'danh-muc/luu-tao-moi' ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-6 offset-3 mb-5">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Them danh muc</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Ảnh</label>
                        <input type="file" name="category_image" id="" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Tên danh mục</label>
                        <input type="text" name="category_name" id="" data-slug="#category_slug" class="form-control data-slug" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Tên không dấu</label>
                        <input type="text" name="category_slug" id="category_slug" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="is_parent" value="0">
                        <label for="">
                            <input type="checkbox" name="is_parent" value="1">
                            La danh muc cha
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="">Danh muc cha</label>
                        <select name="parent_id" id="" class="form-control">
                            <option selected value="0"></option>
                            <?php foreach($categories as $item) : ?>
                            <option value="<?= $item['category_id'] ?>"><?= $item['category_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="is_menu" value="0">
                        <label for="">
                            <input type="checkbox" name="is_menu" value="1">
                            La menu
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="">Duong dan</label>
                        <input type="text" name="menu_url" id="" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Vị trí</label>
                        <input type="number" name="category_index" id="" class="form-control" placeholder="">
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
