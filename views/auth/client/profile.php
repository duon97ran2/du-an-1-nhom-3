<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.0.2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- FontAwesome 5.15.3 CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- (Optional) Use CSS or JS implementation -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="<?= ADMIN_ASSETS ?>dist/css/adminlte.min.css">
  <style>
    .banner {
      height: 300px;
      position: relative;
    }

    .avatar img {
      width: 200px;
      height: 200px;
      object-fit: cover;
      border-radius: 50%;
      border: 5px solid white;
    }

    .avatar {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .sidebar {
      overflow: hidden;
    }

    .sidebar li:hover {
      background: #e8e8e8;
    }

    .sidebar li a.active {
      background: blue;
      color: white;
    }

    .avatar button {
      background: transparent;
      border: none;
    }

    .avatar figure {
      position: relative;
    }

    .avatar figure .nav-icon {
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      font-size: 50px;
      padding: 10px;
      color: #2e2e2e;
      background: #e8e8e8;
      border-radius: 50%;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="banner bg-primary text-center text-light">
      <div class="avatar">
        <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop ">
          <figure>
            <img src="<?= PUBLIC_ASSETS . $avatar ?>">
            <i title="Thay đổi ảnh đại diện" class="nav-icon fas fa-camera"></i>
          </figure>
        </button>
        <h3 class="name text-center fw-bolder text-uppercase m-0">
          <?= $name ?>
        </h3>
        <h4 class="role text-center fw-normal fs-5 text-uppercase">
          <?= $role ?>
        </h4>

      </div>
    </div>
    <div class="row my-2">
      <div class="col-3">
        <div class="sidebar card p-0 rounded ">
          <ul class="nav justify-content-center|justify-content-end d-block">
            <li class="nav-item">
              <a class="nav-link bg-primary active" href="#">Thông tin cá nhân</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="#">Đổi mật khẩu</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="#">Đơn hàng</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-9">
        <div class="card">
          <div class="card-header ">
            <h5 class="card-title my-2">Chỉnh sửa thông tin</h5>
          </div>
          <form action="<?= app_url('thong-tin-ca-nhan/luu-sua?id=') . $user_id ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                <label class="text-primary fw-bold my-2 " for="name">Họ và tên</label>
                <input type="text" name="name" id="" class="form-control" placeholder="" value="<?= $name ?>">
              </div>
              <div class="form-group">
                <label class="text-primary fw-bold my-2 " for="email">Email</label>
                <input disabled id="" class="form-control" placeholder="" value="<?= $email ?>">
              </div>
              <div class="d-flex my-2 ">
                <label class="text-primary fw-bold" for="gender">Giới tính</label>
                <div class="radio icheck-primary d-inline mx-3">
                  <input type="radio" id="male" name="gender" <?php echo ($gender == 0) ? 'checked' : '' ?> value="0" /> Nam
                </div>
                <div class="radio icheck-primary d-inline mx-3">
                  <input type="radio" id="female" name="gender" <?php echo ($gender == 1) ? 'checked' : '' ?> value="1" /> Nữ
                  <label class="text-primary fw-bold my-2 " for="female"></label>
                </div>
                <div class="radio icheck-primary d-inline mx-3">
                  <input type="radio" id="other" name="gender" <?php echo ($gender == 2) ? 'checked' : '' ?> value="2" /> Giới tính khác
                </div>
              </div>
              <div class="form-group">
                <label class="text-primary fw-bold my-2 " for="phone">Số điện thoại</label>
                <input type="text" name="phone" id="" class="form-control" placeholder="" value="<?= $phone ?>">
              </div>
              <div class="form-group">
                <label class="text-primary fw-bold my-2 " for="address">Địa chỉ</label>
                <input type="text" name="address" id="" class="form-control" placeholder="" value="<?= $address ?>">
              </div>
              <br>
              <div class="d-flex">
                &nbsp;
                <button type="submit" class="btn btn-primary btn-sm">Lưu</button>
              </div>
            </div>
          </form>
        </div>
        <div class="avatar-change"></div>
      </div>
    </div>
  </div>
  <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="<?= app_url('thong-tin-ca-nhan/luu-sua?id=') . $user_id ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label class='required' for="avatar">Ảnh đại diện</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="avatar">
                  <label class="custom-file-label" for="avatar">Lựa chọn hình ảnh</label>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
              <button type="submit" class="btn btn-primary">Thay đổi</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="<?= ADMIN_ASSETS ?>plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?= ADMIN_ASSETS ?>plugins/jquery-ui/jquery-ui.min.js"></script>
  <script src="<?= ADMIN_ASSETS ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <script>
    $(function() {
      bsCustomFileInput.init();
      //Bootstrap Duallistbox
    });
  </script>
</body>

</html>