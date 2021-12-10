<section class="fs-main">
  <div class="f-wrap">
    <div class="row my-5">
      <div class="col-8 offset-2">
        <div class="well">
          <div class="bg-white p-3 mb-5 text-center">
            <h1>Danh sách yêu thích</h1>
            <div class="bg-vid my-5">
              <video width='75%' loop muted autoplay src="https://cdn.dribbble.com/users/414694/screenshots/10555834/media/744591f724f0061f26482a570e274526.mp4" type="video/mp4"></video>
            </div>
            <table class="table text-center table-hover table-condensed">
              <thead>
                <tr>
                  <th>Mã sản phẩm</th>
                  <th>Tên sản phẩm</th>
                  <th>Giá</th>
                  <th>Trạng thái</th>
                  <td>Tác vụ</td>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($list as $item) : ?>
                  <tr>
                    <td class="align-middle"><?= $item['product_id'] ?></td>
                    <td class="align-middle">
                      <div class="row">
                        <div class="col-sm-2 hidden-xs"><img src="<?= asset('uploads/' . ($item['product_image'] )) ?>" class="img-responsive" /></div>
                        <?= $item['product_name'] ?>
                      </div>
                    </td>
                    <td class="align-middle"><?= $item['product_price'] ?></td>
                    <td class="align-middle"><?= $item['product_quantity'] != 0 ? 'Còn hàng' : 'Hết hàng' ?></td>
                    <td><a name="" id="" class="btn btn-primary m-0" href="xoa-yeu-thich?id=<?= $item['wishlist_id'] ?>" role="button">Xóa yêu thích</a></td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>