<section class="content-header">
    <div class="row mb-2">
        <div class="col-sm-6">
            <a href="<?= admin_url('bai-viet') ?>" class="btn btn-default ml-n2">Danh sách bài viết</a>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= admin_url('dashboard') ?>">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="<?= admin_url('bai-viet') ?>">Bài viết</a></li>
                <li class="breadcrumb-item active">Thêm bài viết mới</li>
            </ol>
        </div>
    </div>
</section>

<?php if (!empty(get_session('message-errors'))) : ?>
    <div class="alert alert-danger">
        <?= get_session('message-errors') ?>
    </div>
    <?php remove_session('message-errors') ?>
<?php endif; ?>

<form action="<?= admin_url('bai-viet/luu-them-moi') ?>" id="quickForm" novalidate method="post" enctype="multipart/form-data">
    <div class="row">

        <div class="col ">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Thông tin</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Ảnh bìa<span class="text-danger">*</span></label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="blog_image" id="customFileImage">
                            <label class="custom-file-label" for="customFileImage">Lựa chọn hình ảnh</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="blog_slug">Tên bài viết<span class="text-danger">*</span></label>
                        <input type="text" class="form-control data-slug blog_check_slug" id="blog_name" data-slug="#blog_slug" name="blog_title" placeholder="Nhập vào">
                    </div>
                    <div class="form-group">
                        <label>Tên bài viết không dấu<span class="text-danger">*</span></label>
                        <input type="text" class="form-control blog_check_slug" data-action="add" data-url="<?= admin_url('bai-viet/kiem-tra-slug') ?>" id="blog_slug" name="blog_slug" placeholder="Nhập vào">
                    </div>

                    <div class="form-group">
                        <label>URL <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="blog_url" placeholder="Nhập vào">
                    </div>
                    <div class="form-group">
                        <label for="">Status</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="blog_status" id="blog_status" value="1" checked>
                            <label class="form-check-label" for="inlineRadio1">Hiển Thị</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="blog_status" id="blog_status" value="2">
                            <label class="form-check-label" for="inlineRadio2">Khóa bài viết</label>
                        </div>

                    </div>
                    
                    <div class="form-group">Mô tả ngắn<span class="text-danger">*</span></label>
                        <input type="text" name="short_descrition" class="form-control">
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="col">
        <div class="form-group">
            <label for="">Nôị dung</label><br>
            <textarea name="blog_content" id="blog_content" class="form-control"></textarea>
        </div>
        <input type="hidden" name="created_at">
        <input type="hidden" name="updated_at">
    </div>
    </div>
   
    <div class="card card-default mb-5 mt-3">
        <div class="card-footer text-right">
            <a href="<?= admin_url('bai-viet') ?>" class="btn btn-secondary btn-cannel">
                Huỷ
            </a>
            <button type="submit" id="js-btn-product-submit" class="btn btn-primary btn-save">
                Lưu
            </button>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        $('#blog_content').summernote({
            height: 195,
            placeholder: 'Nhập vào',
        })
    })
    </script>

</form>