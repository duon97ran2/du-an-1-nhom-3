<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.0.2 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
  </style>
</head>

<body>
  <div class="container">
    <div class="banner bg-primary text-center text-light">
      <div class="avatar">
        <img src="<?= PUBLIC_ASSETS . $avatar ?>">
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
        <div class="sidebar card rounded ">
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
                <label class="text-primary fw-bold my-2 "for="name">Họ và tên</label>
                <input type="text" name="name" id="" class="form-control" placeholder="" value="<?= $name ?>">
              </div>
              <div class="form-group">
                <label class="text-primary fw-bold my-2 "for="email">Email</label>
                <input type="email" name="email" id="" class="form-control" placeholder="" value="<?= $email ?>">
              </div>
              <div class="d-flex my-2 ">
                <label class="text-primary fw-bold"for="gender">Giới tính</label>
                <div class="radio icheck-primary d-inline mx-3">
                  <input type="radio" id="male" name="gender" <?php echo ($gender == 0) ? 'checked' : '' ?> value="0" /> Nam
                </div>
                <div class="radio icheck-primary d-inline mx-3">
                  <input type="radio" id="female" name="gender" <?php echo ($gender == 1) ? 'checked' : '' ?> value="1" /> Nữ
                  <label class="text-primary fw-bold my-2 "for="female"></label>
                </div>
                <div class="radio icheck-primary d-inline mx-3">
                  <input type="radio" id="other" name="gender" <?php echo ($gender == 2) ? 'checked' : '' ?> value="2" /> Giới tính khác
                </div>
              </div>
              <div class="form-group">
                <label class="text-primary fw-bold my-2 "for="phone">Số điện thoại</label>
                <input type="text" name="phone" id="" class="form-control" placeholder="" value="<?= $phone ?>">
              </div>
              <div class="form-group">
                <label class="text-primary fw-bold my-2 "for="address">Địa chỉ</label>
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

      </div>
    </div>
  </div>
  <!-- Bootstrap JavaScript Libraries -->
</body>

</html>