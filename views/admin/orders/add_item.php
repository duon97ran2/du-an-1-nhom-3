<section class="content-header">
  <div class="row mb-2">
    <div class="col-sm-6">
      <a href="<?= admin_url('don-hang') ?>" class="btn btn-default ml-n2">Danh sách đơn hàng</a>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?= admin_url('dashboard') ?>">Trang chủ</a></li>
        <li class="breadcrumb-item active">Đơn hàng</li>
      </ol>
    </div>
  </div>
</section>
<div class="card card-default">
  <div class="card-header">
    <h2 class="m-0">Thêm sản phẩm vào đơn hàng</h2><br>
    <form method="get" class="form-inline ml-n2">
      <div class="form-group ml-1">
        <select name="brand" class="form-control form-control-sm">
          <option value="" selected>Thương hiệu</option>
          <?php foreach ($brands as $item) : ?>
            <option value="<?= $item['brand_id'] ?>" <?= $item['brand_id'] == input_get('brand') ? 'selected' : '' ?>><?= $item['brand_name'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group ml-1">
        <select name="category" class="form-control form-control-sm">
          <option value="" selected>Danh Mục</option>
          <?php foreach ($categories as $item) : ?>
            <option value="<?= $item['category_id'] ?>" <?= $item['category_id'] == input_get('category') ? 'selected' : '' ?>><?= $item['category_name'] ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <input type="hidden" name="id" value="<?= input_get('id')?>">
      <button type="submit" class="btn btn-primary btn-sm ml-1">Lọc</button>
      <a href="<?= admin_url('don-hang/them-chi-tiet?id='.input_get('id')) ?>" class="btn btn-primary btn-sm ml-1">Bỏ lọc</a>
    </form>
  </div>
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped text-center">
      <thead>
        <tr>
          <th>Tên sản phẩm</th>
          <th>Màu</th>
          <th>Giá</th>
          <th width="100px">Số lượng</th>
          <th width="200px">Thao tác</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($products as $product) : ?>
          <?php if ($product['is_variant'] == 1) : ?>
            <?php foreach ($variants as $variant) : ?>
              <?php if ($product['product_id'] == $variant['product_id']) : ?>
                <form action="<?= admin_url('don-hang/luu-chi-tiet') ?>" method="post">
                  <tr>
                    <td><?= $product['product_name'] ?></td>
                    <input type="hidden" name='product_id' value="<?= $product['product_id'] ?>">
                    <input type="hidden" name='color' value="<?= $variant['product_variant_name'] ?>">
                    <input type="hidden" name='product_price' value="<?= $variant['product_variant_price'] ?>">
                    <input type="hidden" name='order_id' value="<?= $id ?>">
                    <td><?= $variant['product_variant_name'] ?></td>
                    <td><?= $variant['product_variant_price'] ?></td>
                    <td><input type="number" class="form-control text-center rounded-0" name='quantity' value="1" min="1"></td>
                    <td><button type="submit" class=" btn btn-primary">Thêm vào đơn hàng</button></td>
                  </tr>
                </form>
              <?php endif ?>
            <?php endforeach ?>
          <?php else : ?>
            <form action="<?= admin_url('don-hang/luu-chi-tiet') ?>" method="post">
              <tr>
                <td><?= $product['product_name'] ?></td>
                <input type="hidden" name='product_id' value="<?= $product['product_id'] ?>">
                <input type="hidden" name='color'>
                <input type="hidden" name='product_price' value="<?= $product['product_price'] ?>">
                <input type="hidden" name='order_id' value="<?= input_get('id') ?>">
                <td></td>
                <td><?= $product['product_price'] ?></td>
                <td><input type="number" class="form-control text-center rounded-0" name='quantity' value="1" min="1"></td>
                <td><button type="submit" class="btn btn-primary">Thêm vào đơn hàng</button></td>
              </tr>
            </form>
          <?php endif ?>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>