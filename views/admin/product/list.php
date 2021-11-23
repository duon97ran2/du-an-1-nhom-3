<section class="content-header">
    <div class="row mb-2">
      <div class="col-sm-6">
        <a href="<?= admin_url('san-pham') ?>" class="btn btn-default ml-n2">Danh sách sản phẩm</a>
        <a href="<?= admin_url('san-pham/them-moi') ?>" class="btn btn-primary">Thêm sản phẩm mới</a>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= admin_url('dashboard') ?>">Trang chủ</a></li>
          <li class="breadcrumb-item active">Sản phẩm</li>
        </ol>
      </div>
    </div>
</section>

<div class="card card-default">
    <div class="card-header">
      <form method="get" class="form-inline ml-n2">
        <div class="form-group ml-1">
          <select name="brand" class="form-control form-control-sm">
            <option value="" selected>Thương hiệu</option>
            <?php foreach($brands as $item) : ?>
              <option value="<?= $item['brand_id'] ?>" <?= $item['brand_id'] == input_get('brand') ? 'selected' : '' ?>><?= $item['brand_name'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group ml-1">
          <select name="category" class="form-control form-control-sm">
            <option value="" selected>Danh Mục</option>
            <?php foreach($categories as $item) : ?>
              <option value="<?= $item['category_id'] ?>" <?= $item['category_id'] == input_get('category') ? 'selected' : '' ?>><?= $item['category_name'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group ml-1">
          <select name="status" class="form-control form-control-sm">
            <option value="" selected>Trạng thái</option>
            <option value="true" <?= input_get('status') == 'true' ? 'selected' : '' ?>>Hiển thị</option>
            <option value="false" <?= input_get('status') == 'false' ? 'selected' : '' ?>>Không hiển thị</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary btn-sm ml-1">Lọc</button>
        <a href="<?= admin_url('san-pham') ?>" class="btn btn-primary btn-sm ml-1">Bỏ lọc</a>
      </form>
    </div>
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th style="width: 100px">Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Danh mục</th>
            <th>Thương hiệu</th>
            <th>Giá tiền</th>
            <th>Hàng trong kho</th>
            <th>Trạng thái</th>
            <th>Ngày cập nhật</th>
            <th style="width: 40px">Tác vụ</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($products as $item) : ?>
          <tr>
            <td><img src="<?= asset('uploads/'.$item['product_image']) ?>" alt="<?= $item['product_name'] ?>" class="profile-user-img img-fluid"></td>
            <td><?= $item['product_name'] ?></td>
            <td><?= $item['category_name'] ?></td>
            <td><?= $item['brand_name'] ?></td>
            <td>
            <?php if($item['is_variant'] == 1): ?>
              <ul class="list-money-for-product">
              <?php foreach ($variants as $variant) : ?>
                <?php if($variant['product_id'] == $item['product_id']): ?>
                  <li><?= $variant['product_variant_name'] . ': ' . priceVND($variant['product_variant_price']) ?></li>
                <?php endif; ?>
              <?php endforeach; ?>
              </ul>
            <?php else: ?>
              <?= priceVND($item['product_price']) ?>
            <?php endif; ?>
            </td>
            
            <td>
            <?php if($item['is_variant'] == 1): ?>
              <ul class="list-money-for-product">
              <?php foreach ($variants as $variant) : ?>
                <?php if($variant['product_id'] == $item['product_id']): ?>
                  <li><?= $variant['product_variant_quantity'] == 0 ? ($variant['product_variant_name'].': Hết hàng') : ($variant['product_variant_name'].': Còn '.$variant['product_variant_quantity'] . ' sản phẩm') ?></li>
                <?php endif; ?>
              <?php endforeach; ?>
              </ul>
            <?php else: ?>
              <?= $item['product_quantity'] == 0 ? 'Hết hàng' : ('Còn '.$item['product_quantity'] . ' sản phẩm') ?>
            <?php endif; ?>
            </td>
            <td class="text-center">
                <input type="checkbox" id="product_status_<?= $item['product_id'] ?>" data-url="<?= admin_url('san-pham/cap-nhat-trang-thai') ?>" class="js-checkbox-status d-none" value="1" data-id="<?= $item['product_id'] ?>"  <?= $item['product_status'] == 1 ? "checked" : "" ?>>
                <label for="product_status_<?= $item['product_id'] ?>" class="btn <?= $item['product_status'] == 1 ? "btn-primary" : "btn-danger" ?> btn-sm btn-status">
                  <?= $item['product_status'] == 1 ? "Hiển thị" : "Không hiển thị" ?>
                </label>
            </td>
            <td><?= date("d-m-Y", strtotime($item['updated_at'])) ?></td>
            <td>
              <div class="btn-group">
                  <a href="<?= admin_url('san-pham/cap-nhat?product_id='.$item['product_id']) ?>" class="btn btn-default btn-sm">
                    <i class="fas fa-pen"></i>
                  </a>
                  <button type="button" data-url="<?= admin_url('san-pham/xoa-san-pham?product_id='.$item['product_id']) ?>" class="btn btn-default btn-sm btn_remove_product">
                    <i class="fas fa-trash"></i>
                  </button>
              </div>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
</div>

