
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
          <!-- <th>ID sp</th> -->
          <th>Tên sản phẩm</th>
          <th>Số lượng comment</th>
          <th>Ngày mới nhất</th>
          <th>Action</th>
        </tr> 
      </thead>
      <tbody>
      
        <?php foreach($cmt as $key => $cbylug):?>
        <tr>
          <td><?= $key +1 ?></td>   
          <!-- <td><?= $cbylug['product_id']?></td> -->
          <td><?=  $cbylug['product_name']?></td>
          <td><?=  $cbylug['so_cmt']?></td>
          <td><?=  $cbylug['created_at']?></td>
          <td>
              <a href="<?= admin_url('comment/chi-tiet?product_id='.$cbylug['product_id']) ?>" class="btn btn-dark">Chi Tiết</a>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
</div>