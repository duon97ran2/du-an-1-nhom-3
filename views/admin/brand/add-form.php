<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    .error {color: #FF0000;}
    </style>
</head>
<body>
    
</body>
</html>
<form action="<?= ADMIN_URL . 'thuong-hieu/luu-tao-moi' ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-6 offset-3">
            <div class="form-group">
                <label for="">Tên thương hiệu</label>
                <input type="text" name="brand_name" id="" class="form-control" placeholder="">
                <span class="text-danger">*<?= $_SESSION['errors']['brand_name'] ?? '' ?></span>
                
            </div>
            <div class="form-group">
                <label for="">Slug</label>
                <input type="text" name="brand_slug" id="" class="form-control" placeholder="">
                <span class="text-danger">*<?= $_SESSION['errors']['brand_slug'] ?? '' ?></span>
            </div>
            <div class="form-group">
                <label for="">Logo thương hiệu</label>
                <input type="file" name="brand_image" id="" class="form-control" placeholder="">
                <span class="text-danger">*<?= $_SESSION['errors']['brand_image'] ?? '' ?></span>
            </div>
            <br>
            <div class="d-flex justify-content-center">
                <a href="<?= ADMIN_URL . 'thuong-hieu'?>" class="btn btn-sm btn-danger">Hủy</a>
                &nbsp;  
                <button type="submit" class="btn btn-primary btn-sm">Lưu</button>
            </div>
            <?php unset($_SESSION['errors']) ?>
        </div>
    </div>
</form>