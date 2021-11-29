
<section class="content-header">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Danh sách comments</h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="<?= admin_url('dashboard') ?>">Trang chủ</a></li>
        <li class="breadcrumb-item active">comment</li>
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
 
  <div class="card-body">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>STT</th>
          <th>Tên sản phẩm</th>
          <th>Số lượng comment</th>
          <th>Ngày mới nhất</th>
          
          <th>Action</th>
        </tr> 
      </thead>
      <tbody>
        <?php foreach($get_cmt_by_slug as $key => $cbylug):?>
        <tr>
          <td><?= $key +1 ?></td>
          <td><?=  $cbylug['product_name']?></td>
          <td><?=  $cbylug['so_luot_bl']?></td>
          <td><?=  $cbylug['created_at']?></td>
          <td>
              <a href="<?= admin_url('comments/chi-tiet') ?>">Chi Tieet</a>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
</div>