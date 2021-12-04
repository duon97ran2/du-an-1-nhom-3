<!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->

<section class="content-header">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Chi tiết comment</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= admin_url('dashboard') ?>">Trang chủ</a></li>
                <li class="breadcrumb-item active">chi tiets comment</li>
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
                    <th>Nội dung</th>
                    <th>Người bình luận</th>
                    <th>Ngày bình luận</th>
                    <th>Admin rep </th>
                    <th width="180px">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cmt_detail as $key => $detail) : ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $detail['comment_content']  ?></td>
                        <td><?= $detail['name']  ?></td>
                        <td><?= $detail['created_at']  ?></td>
                        <td class="result"><?= $detail['comment_author'] ?></td>
                        <td class="form_rep" style="display:none">
                            <form action="<?= admin_url('comment/tra-loi') ?>" method="POST">
                                <input type="hidden" name="comment_id" value="<?= $detail['comment_id'] ?>"></input>
                                <input type="hidden" name="product_id" value="<?= $product_id ?>"></input>
                                <label for="">Rep comment</label><br>
                                <textarea name="comment_author" cols="30" rows="3"><?= $detail['comment_author'] ?></textarea><br>
                                <button class="btn btn-success">Gửi</button>
                                <a href="javascript:;" class="btn btn-primary cannel">Cancel</a>
                            </form>

                        </td>
                        <td>
                            <a href="javascript:;" class="btn btn-primary btn_admin_rep_cmt">Trả lời</a>
                            <a href="javascript:;" data-url="<?= admin_url('comment/xoa?comment_id=' . $detail['comment_id']) ?>" data-name="<?= $detail['comment_content'] ?>" class="btn btn-danger btn_remove_item">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <script>
                    $('.btn_admin_rep_cmt').on('click', function() {
                        let btn_rep = $(this).parent().parent().find('.form_rep');
                        let result = $(this).parent().parent().find('.result');
                        btn_rep.toggle();
                        result.toggle();
                    })

                    $('.form_rep .cannel').on('click', function() {
                        $(this).parent().parent().parent().find('.btn_admin_rep_cmt').click();
                    })
                    $('.submit').on('click', function() {
                        $('#form_rep').css('display', 'none');
                        $('#result').css('display', 'block');
                    })
                </script> 
            </tbody>
        </table>

    </div>
</div>
<a href="<?= admin_url('comment') ?>" class="btn btn-primary">Quay lại</a>
</div>