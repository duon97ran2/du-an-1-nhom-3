<section class="fs-main">
  <div class="f-wrap">
    <div class="row">
      <ol class="ml-2 mt-0 breadcrumb bg-transparent breadcrumb-margin">
        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
        <li class="breadcrumb-item active"><a href="/">Giỏ hàng</a></li>
      </ol>
    </div>
    <!-- <div class="fs-ghnull">
                    <p class="fs-ghnl1"><img src="https://fptshop.com.vn/gio-hang-v2/cart/Desktop/images/null.png" alt=""></p>
                    <p class="fs-ghnl2">Không có sản phẩm nào trong giỏ hàng của bạn</p>
                    <p class="fs-ghnl3"><a href="/" title="Trang chủ">ĐẾN TRANG CHỦ</a></p> 
                </div> -->
    <div class="bg-white p-3 mb-5">
      <h1 class="st-name text-left mb-3">Giỏ hàng</h1>
      <table id="cart" class="table text-left table-hover table-condensed">
        <thead>
          <tr>
            <th style="width:50%">Sản phẩm</th>
            <th style="width:10%">Giá tiền</th>
            <th style="width:8%">Số lượng</th>
            <th style="width:22%">Tổng</th>
            <th style="width:10%"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <div class="row">
                <div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive" /></div>
                <div class="col-sm-10">
                  <h4 class="nomargin">Product 1</h4>
                  <p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>
                </div>
              </div>
            </td>
            <td class="align-middle">$1.99</td>
            <td class="align-middle">
              <input type="number" class="form-control text-center rounded-0" value="1">
            </td>
            <td class="align-middle">1.99</td>
            <td class="actions align-middle">
              <button class="btn btn-default text-danger bg-transparent btn-sm rounded-0" onclick="toastr.success('Xoa thanh cong');"><span class="material-icons">delete</span></button>
            </td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="3" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Tổng tiền $1.99</strong></td>
            <td>
              <a href="#" class="btn btn-outline-danger rounded-0 btn-block">Thanh toán <i class="fa fa-angle-right"></i></a>
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</section>