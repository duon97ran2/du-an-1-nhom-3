<style>
  .avatar {
    border-radius: 50%;
  }

  .avatar button {
    border-radius: 50%;
    overflow: hidden;
    position: relative;
    outline: none;
    width: 200px;
    height: 200px;
  }

  .avatar button img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .avatar i {
    width: 100%;
    position: absolute;
    font-size: 50px;
    color: white;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 99;
    opacity: 0;
  }

  .avatar:hover i,
  .avatar:hover #overlay {
    opacity: 1;
    transition: 0.5s ease-in;
  }

  #overlay {
    position: absolute;
    opacity: 0;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(255, 99, 71, 0.6);
    z-index: 2;
    cursor: pointer;
  }

  .avatar input {
    display: none;
  }
</style>

<section class="fs-main">
  <div class="f-wrap">
    <div class="row">
    
      <ol class="ml-2 mt-0 breadcrumb bg-transparent breadcrumb-margin">
        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
        <li class="breadcrumb-item active"><a href="<?= app_url('thong-tin-ca-nhan')?> ">Thông tin cá nhân</a></li>
      </ol>
    </div>
    <form action="<?= app_url('thong-tin-ca-nhan/luu-sua?id=') . $user['user_id'] ?>" method="post" enctype="multipart/form-data">
    <div class="row my-5">
      <div class="col-5">
        <div class="well">
          <div class="avatar text-center mb-5 " title="Thay đổi ảnh đại diện">
            <button type="button" class="border border-0 mb-5" id="btn-upload">
              <img width="100%" src="<?= $user['avatar'] ? asset($user['avatar']) : ADMIN_ASSETS . 'dist/img/avatar.png' ?>" id="avatar-img" alt="User Image">
              <i class="material-icons">
                photo_camera
              </i>
              <div id="overlay"></div>
            </button>
            
            <input type="file" name="avatar" accept=".jpg, .jpeg, .png" id="avatar"><br>
            <span class='text-danger'><?= print_errors('avatar')?></span>
          </div>
          
          <h2 class="name text-center text-uppercase font-italic">
            <?= $user['name'] ?>
          </h2>
          <h4 class="role text-center text-uppercase ">
            <?= $user['role'] ?>
          </h4>
          <div class="d-flex text-center justify-content-center mt-3">
            <a href='<?= app_url('thong-tin-ca-nhan/doi-mat-khau') ?>' class="btn btn-primary btn-sm mr-3">
              Đổi mật khẩu  
            </a>
            <a href='<?= app_url('thong-tin-ca-nhan/don-hang')?>' class="btn btn-primary btn-sm">
              Xem đơn hàng  
            </a>
          </div>
        </div>
      </div>
      <div class="col-7">
        <div class="well">
            <div class="card-body">
              <div class="form-group">
                <label class="text-primary fw-bold my-2 " for="name">Họ và tên</label>
                <input type="text" name="name" id="" class="form-control" placeholder="" value="<?= $user['name'] ?>">
                <span class='text-danger'><?= print_errors('name')?></span>
              </div>
              <div class="form-group">
                <label class="text-primary fw-bold my-2 " for="email">Email</label>
                <input disabled id="" class="form-control" placeholder="" value="<?= $user['email'] ?>">
              </div>
              <div class="d-flex my-2 ">
                <label class="text-primary fw-bold" for="gender">Giới tính</label>
                <div class="radio icheck-primary d-inline mx-3">
                  <input type="radio" id="male" name="gender" <?php echo ($user['gender'] == 0) ? 'checked' : '' ?> value="0" /> Nam
                </div>
                <div class="radio icheck-primary d-inline mx-3">
                  <input type="radio" id="female" name="gender" <?php echo ($user['gender'] == 1) ? 'checked' : '' ?> value="1" /> Nữ
                  <label class="text-primary fw-bold my-2 " for="female"></label>
                </div>
                <div class="radio icheck-primary d-inline mx-3">
                  <input type="radio" id="other" name="gender" <?php echo ($user['gender'] == 2) ? 'checked' : '' ?> value="2" /> Giới tính khác
                </div>
              </div>
              <div class="form-group">
                <label class="text-primary fw-bold my-2 " for="phone">Số điện thoại</label>
                <input type="text" name="phone" id="" class="form-control" placeholder="" value="<?= $user['phone'] ?>">
                <span class='text-danger'><?= print_errors('phone')?></span>
              </div>
              <div class="form-group">
                <label class="text-primary fw-bold my-2 " for="address">Địa chỉ</label>
                <input type="text" name="address" id="" class="form-control" placeholder="" value="<?= $user['address'] ?>">
                <span class='text-danger'><?= print_errors('address')?></span>
              </div>
              <br>
              <div class="d-flex">
                &nbsp;
                <button type="submit" class="btn btn-primary btn-sm">Lưu</button>
              </div>
            </div>
        </div>
      </div>
    </div>
    </form>
  </div>

</section>