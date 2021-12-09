<footer>
  <div class="fs-footer fhidedt">
    <div class="f-wrap">
      <div class="fs-ftrow clearfix">
        <div class="fs-ftcol fs-ftcol1">
          <ul class="fs-ftul">
            <li><a target="_blank" rel="nofollow noopener" href="">Giới thiệu về công ty</a></li>
            <li><a href="" title="Câu hỏi thường gặp mua hàng">Câu hỏi thường gặp mua hàng</a></li>
            <li><a href="" title="">Chính sách bảo mật</a></li>
            <li><a href="" title="">Quy chế hoạt động</a></li>
            <li><a href="" title="">Kiểm tra hóa đơn điện tử</a></li>
            <li><a href="" title="">Tra cứu thông tin bảo hành</a></li>
          </ul>
        </div>
        <div class="fs-ftcol fs-ftcol1">
          <ul class="fs-ftul">
            <li><a href="">Tin tuyển dụng</a></li>
            <li><a href="" title="">Tin khuyến mãi</a></li>
            <li><a href="" title="">Hướng dẫn mua online</a></li>
            <li><a href="" title="">Hướng dẫn mua trả góp</a></li>
            <li><a href="" title="">Chính sách trả góp</a></li>
          </ul>
        </div>
        <div class="fs-ftcol fs-ftcol1">
          <ul class="fs-ftul">
            <li><a href="">Hệ thống cửa hàng</a></li>
            <li><a href="" title="">Hệ thống bảo hành</a></li>
            <li><a href="" title="">Bán hàng doanh nghiệp</a></li>
            <!-- <li><a href="//fptshop.com.vn/kiem-tra-hang-apple-chinh-hang" title="">Kiểm tra hàng Apple chính hãng</a></li> -->
            <li><a href="" title="">Giới thiệu máy đổi trả</a></li>
            <li><a href="" title="">Chính sách đổi trả</a></li>
          </ul>
        </div>
        <div class="fs-ftcol  fs-ftcol2">
          <ul class="fs-ftr2 clearfix">
            <li>
              <p class="fs-ftrtit" style="font-size: 15px;">Tư vấn mua hàng (Miễn phí)</p>
              <a href="tel:<?= option_info('hotline_1')?>" title=""><?= option_info('hotline_1')?> </a> <span>(Nhánh 1)</span>
              <p class="fs-ftrtit">Hỗ trợ kỹ thuật</p>
              <a href="tel:<?= option_info('hotline_2')?>" title=""><?= option_info('hotline_2')?> </a><span>(Nhánh 2)</span>
            </li>
            <li>
              <p class="fs-ftrtit" style="font-size: 15px;">Góp ý, khiếu nại dịch vụ (8h00-22h00)</p>
              <a href="tel:<?= option_info('hotline_3')?>" title=""><?= option_info('hotline_3')?></a><br>
              <!-- <a href="tel:18006601" title="">1800 6601 </a><span>(Nhánh 3)</span> -->
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="fs-ftbott">© 2021 <a href="<?= app_url() ?>"><?= (!empty(option_info()) ? option_info()['app_name'] : 'Document') ?></a></div>
</footer>
<?php if(isset($scripts)):?>
<?php foreach ($scripts as $script) : ?>
<script src="<?= asset($script) ?>"></script>
<?php endforeach; ?>
<?php endif; ?>
<?php if (!empty(get_session('message-errors'))) : ?>
<script>
    $(function () {
      toastr.error('<?= get_session('message-errors') ?>')
    });
</script>
<?php remove_session('message-errors') ?>
<?php endif; ?>

<?php if (!empty(get_session('message'))) : ?>
<script>
    $(function () {
      toastr.success('<?= get_session('message') ?>')
    });
</script>
<?php remove_session('message') ?>
<?php endif; ?>

<script>
  if ($('#js-cart-total').data('total') <= 0) {
    $('#js-cart-total').css('display', 'none');
  }else {
    $('#js-cart-total').show();
  }
</script>